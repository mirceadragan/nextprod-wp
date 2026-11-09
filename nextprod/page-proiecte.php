<?php get_header(); $img = esc_url(get_template_directory_uri()) . '/assets/proiecte/'; ?>
<section class="hero subhero">
	<div class="hero-inner">
		<p class="intro"><?php np_e('Proiecte'); ?></p>
		<h1><?php np_e('Realizate pentru clienții noștri'); ?></h1>
	</div>
</section>

<section class="wrap long">
	<p class="eyebrow"><?php np_e('Producție la comandă'); ?></p>
	<h2><?php np_e('Produse complete sau doar o parte din ele'); ?></h2>
	<p><?php np_e('Pe lângă produsele finite, realizăm și produse parțiale, componente sau doar accesorii, în funcție de nevoile fiecărui client și de modelul său de afaceri.'); ?></p>
	<p><?php np_e('Mai jos sunt câteva dintre proiectele realizate pentru clienții noștri: genți finite, interioare și organizatoare, mânere, curele și componente livrate gata de asamblare.'); ?></p>
</section>

<section class="wrap projects-wrap">
	<div class="projects" data-close="<?php np_a('Închide'); ?>" data-prev="<?php np_a('Anterioara'); ?>" data-next="<?php np_a('Următoarea'); ?>">
<?php
$projects = [
	21 => 'Geantă matlasată roz',
	22 => 'Geantă cognac, vedere din spate',
	23 => 'Geantă cognac, vedere din față',
	24 => 'Geantă tote neagră',
	25 => 'Geantă matlasată bej cu lanț',
	26 => 'Geantă neagră cu mâner',
	27 => 'Geantă matlasată neagră cu lanț',
	2  => 'Componente din piele cognac: buzunare, mânere și curele',
	3  => 'Interior pentru valiză',
	4  => 'Măsurarea unei huse cu model pied-de-poule',
	5  => 'Set de componente gri cu benzi',
	6  => 'Organizator turcoaz pentru ceasuri',
	7  => 'Interior de geantă, negru',
	8  => 'Organizator negru cu trei compartimente',
	10 => 'Husă cu model pied-de-poule',
	11 => 'Organizator gri pentru bijuterii',
	12 => 'Mânere crem',
	13 => 'Set de componente verzi',
	15 => 'Set de componente turcoaz',
	16 => 'Organizator negru pentru inele',
	17 => 'Suporturi gri cu bucle',
	18 => 'Mânere roșii',
	19 => 'Piese negre cilindrice',
	20 => 'Oglindă cu ramă din piele, față și spate',
];
$ver = '?v=' . rawurlencode(wp_get_theme()->get('Version'));
foreach ($projects as $n => $caption) :
	$file = $img . sprintf('proiect-%02d.webp', $n) . $ver; ?>
		<figure><a href="<?php echo $file; ?>" class="lightbox"><img src="<?php echo $file; ?>" alt="<?php np_a($caption); ?>" loading="lazy"></a><figcaption><?php np_e($caption); ?></figcaption></figure>
<?php endforeach; ?>
	</div>
</section>

<?php get_template_part('parts/cta'); ?>
<?php get_footer(); ?>
