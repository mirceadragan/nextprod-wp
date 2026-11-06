<?php
require_once get_template_directory() . '/inc/i18n.php';

add_action('after_setup_theme', function () {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('custom-logo');
});

add_action('wp_enqueue_scripts', function () {
	$ver = wp_get_theme()->get('Version');
	wp_enqueue_style('nextprod', get_stylesheet_uri(), [], $ver);
	wp_enqueue_script('nextprod', get_template_directory_uri() . '/script.js', [], $ver, true);
});

function nextprod_contact() { return get_theme_mod('nextprod_email', ''); }

add_action('customize_register', function ($c) {
	$c->add_section('nextprod_contact', ['title' => 'Date de contact Next Prod Servicii']);
	foreach (['email' => 'E-mail', 'phone' => 'Telefon', 'address' => 'Adresa completă'] as $key => $label) {
		$c->add_setting('nextprod_' . $key, ['default' => '', 'sanitize_callback' => $key === 'email' ? 'sanitize_email' : 'sanitize_text_field']);
		$c->add_control('nextprod_' . $key, ['label' => $label, 'section' => 'nextprod_contact', 'type' => $key === 'email' ? 'email' : 'text']);
	}
});

/**
 * Creează paginile de care au nevoie șabloanele (dacă lipsesc), setează Acasă
 * ca pagină de pornire statică și legăturile permanente „Nume articol”.
 * Rulează la activarea temei; este idempotentă (nu dublează nimic).
 */
/** Creează paginile care lipsesc (fără să modifice nimic altceva). Returnează slug => ID. */
function nextprod_ensure_pages() {
	$pages = [
		'acasa'      => 'Acasă',
		'despre-noi' => 'Despre noi',
		'servicii'   => 'Servicii',
		'produse'    => 'Produse',
		'proiecte'   => 'Proiecte',
		'contact'    => 'Contact',
	];
	$ids = [];
	foreach ($pages as $slug => $title) {
		$existing = get_page_by_path($slug, OBJECT, 'page');
		$ids[$slug] = $existing ? $existing->ID : wp_insert_post([
			'post_title'  => $title,
			'post_name'   => $slug,
			'post_status' => 'publish',
			'post_type'   => 'page',
		]);
	}
	return $ids;
}

function nextprod_setup_pages() {
	$ids = nextprod_ensure_pages();
	if (get_option('show_on_front') !== 'page' || !get_option('page_on_front')) {
		update_option('show_on_front', 'page');
		update_option('page_on_front', $ids['acasa']);
	}
	if (!get_option('permalink_structure')) {
		global $wp_rewrite;
		$wp_rewrite->set_permalink_structure('/%postname%/');
	}
	flush_rewrite_rules();
}
add_action('after_switch_theme', 'nextprod_setup_pages');

/** Iconița site-ului (favicon) din logo. Dacă în WordPress e setată o „Iconiță site”, aceea are prioritate. */
add_action('wp_head', function () {
	if (has_site_icon()) return;
	$u = esc_url(get_template_directory_uri() . '/assets/icons/');
	echo '<link rel="icon" href="' . $u . 'favicon.ico" sizes="any">' . "\n";
	echo '<link rel="icon" type="image/png" sizes="32x32" href="' . $u . 'icon-32.png">' . "\n";
	echo '<link rel="icon" type="image/png" sizes="192x192" href="' . $u . 'icon-192.png">' . "\n";
	echo '<link rel="apple-touch-icon" href="' . $u . 'apple-touch-icon.png">' . "\n";
}, 2);
