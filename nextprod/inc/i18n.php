<?php
/**
 * Multilingv fără plugin: EN (implicit, fără prefix), RO (/ro/), IT (/it/).
 * Limba implicită se schimbă din NP_DEFAULT (adresele se recalculează singure).
 *
 * - Textele din șabloane sunt scrise în română și trec prin np_e() / np_a() / np_t().
 *   Traducerile sunt în lang/en.php și lang/it.php (cheia = textul românesc exact).
 *   Un text fără traducere apare în română — nu se strică nimic.
 * - Adresele traduse sunt definite în NP_SLUGS; paginile WordPress rămân aceleași
 *   (slug-urile românești), limba vine din prefixul URL-ului.
 */

const NP_DEFAULT = 'en';

const NP_LANGS = [
	'en' => ['label' => 'EN', 'locale' => 'en-GB', 'og' => 'en_GB'],
	'ro' => ['label' => 'RO', 'locale' => 'ro-RO', 'og' => 'ro_RO'],
	'it' => ['label' => 'IT', 'locale' => 'it-IT', 'og' => 'it_IT'],
];

/** cheie (slug-ul paginii românești) => slug în fiecare limbă */
const NP_SLUGS = [
	'acasa'      => ['ro' => '',           'en' => '',         'it' => ''],
	'despre-noi' => ['ro' => 'despre-noi', 'en' => 'about-us', 'it' => 'chi-siamo'],
	'servicii'   => ['ro' => 'servicii',   'en' => 'services', 'it' => 'servizi'],
	'produse'    => ['ro' => 'produse',    'en' => 'products', 'it' => 'prodotti'],
	'proiecte'   => ['ro' => 'proiecte',   'en' => 'projects', 'it' => 'progetti'],
	'contact'    => ['ro' => 'contact',    'en' => 'contact',  'it' => 'contatti'],
];

/** Limba curentă: 'ro' | 'en' | 'it' (NP_DEFAULT dacă URL-ul nu are prefix) */
function np_lang() {
	$l = get_query_var('nplang');
	return isset(NP_LANGS[$l]) ? $l : NP_DEFAULT;
}

/** Traduce un text românesc în limba curentă (sau în $lang). */
function np_t($ro, $lang = null) {
	static $dict = [];
	$lang = $lang ?: np_lang();
	if ($lang === 'ro') return $ro;
	if (!isset($dict[$lang])) {
		$file = get_template_directory() . "/lang/$lang.php";
		$dict[$lang] = is_readable($file) ? include $file : [];
	}
	return $dict[$lang][$ro] ?? $ro;
}
function np_e($ro) { echo esc_html(np_t($ro)); }
function np_a($ro) { echo esc_attr(np_t($ro)); }

/** URL-ul unei pagini (cheie din NP_SLUGS) în limba curentă sau în $lang. */
function np_url($key = 'acasa', $lang = null) {
	$lang = $lang ?: np_lang();
	$slug = NP_SLUGS[$key][$lang] ?? '';
	$path = ($lang === NP_DEFAULT ? '' : $lang . '/') . ($slug !== '' ? $slug . '/' : '');
	return home_url('/' . $path);
}

/** Cheia paginii curente din NP_SLUGS sau null (ex. articole, 404). */
function np_current_key() {
	if (is_front_page()) return 'acasa';
	if (is_page()) {
		$slug = get_post_field('post_name', get_queried_object_id());
		if (isset(NP_SLUGS[$slug])) return $slug;
	}
	return null;
}

/* ---------- rutare ---------- */

add_filter('query_vars', function ($vars) { $vars[] = 'nplang'; return $vars; });

add_action('init', function () {
	$front = (int) get_option('page_on_front');
	foreach (array_keys(NP_LANGS) as $l) {
		$prefix = $l === NP_DEFAULT ? '' : $l . '/';
		if ($prefix) add_rewrite_rule("^$l/?$", $front ? "index.php?page_id=$front&nplang=$l" : "index.php?nplang=$l", 'top');
		foreach (NP_SLUGS as $key => $slugs) {
			if ($key === 'acasa') continue;
			add_rewrite_rule('^' . $prefix . $slugs[$l] . '/?$', 'index.php?pagename=' . $key . '&nplang=' . $l, 'top');
		}
	}
	// După o actualizare a temei (fără reactivare) regulile trebuie regenerate o dată.
	$sig = md5(wp_json_encode([NP_DEFAULT, NP_SLUGS, $front, wp_get_theme()->get('Version')]));
	if (get_option('nextprod_rewrite_sig') !== $sig) {
		if (function_exists('nextprod_ensure_pages')) nextprod_ensure_pages(); // pagini noi apărute într-o actualizare
		flush_rewrite_rules(false);
		update_option('nextprod_rewrite_sig', $sig);
	}
}, 20);

// WordPress ar redirecționa /about-us/ către /despre-noi/ — nu pentru adresele noastre.
add_filter('redirect_canonical', function ($redirect) { return get_query_var('nplang') ? false : $redirect; });

// Adresele native ale paginilor (/despre-noi/, linkuri vechi) -> 301 către versiunea RO (/ro/despre-noi/).
add_action('template_redirect', function () {
	if (get_query_var('nplang') || is_front_page()) return;
	$key = np_current_key();
	if ($key) { wp_safe_redirect(np_url($key, 'ro'), 301); exit; }
});

/* ---------- <html lang>, <title>, canonical, hreflang ---------- */

add_filter('language_attributes', function ($out) {
	if (is_admin()) return $out;
	return preg_replace('/lang="[^"]*"/', 'lang="' . NP_LANGS[np_lang()]['locale'] . '"', $out);
});

add_filter('document_title_parts', function ($parts) {
	if (isset($parts['title']) && np_current_key() && !is_front_page()) $parts['title'] = np_t($parts['title']);
	if (isset($parts['tagline'])) $parts['tagline'] = np_t($parts['tagline']);
	return $parts;
});

add_filter('body_class', function ($c) { $c[] = 'lang-' . np_lang(); return $c; });

remove_action('wp_head', 'rel_canonical');
add_action('wp_head', function () {
	$key = np_current_key();
	if (!$key) { if (is_singular()) rel_canonical(); return; }
	echo '<link rel="canonical" href="' . esc_url(np_url($key)) . '">' . "\n";
	foreach (NP_LANGS as $l => $info) {
		echo '<link rel="alternate" hreflang="' . esc_attr($info['locale']) . '" href="' . esc_url(np_url($key, $l)) . '">' . "\n";
	}
	echo '<link rel="alternate" hreflang="x-default" href="' . esc_url(np_url($key, NP_DEFAULT)) . '">' . "\n";
	echo '<meta property="og:locale" content="' . esc_attr(NP_LANGS[np_lang()]['og']) . '">' . "\n";
}, 1);

/** Selectorul de limbă (RO | EN | IT) — trimite la aceeași pagină în cealaltă limbă. */
function np_language_switcher() {
	$key = np_current_key() ?: 'acasa';
	$cur = np_lang();
	echo '<span class="lang" role="group" aria-label="' . esc_attr(np_t('Limba')) . '">';
	foreach (NP_LANGS as $l => $info) {
		printf(
			'<a href="%s" hreflang="%s" lang="%s"%s>%s</a>',
			esc_url(np_url($key, $l)),
			esc_attr($info['locale']),
			esc_attr($info['locale']),
			$l === $cur ? ' class="active" aria-current="true"' : '',
			esc_html($info['label'])
		);
	}
	echo '</span>';
}
