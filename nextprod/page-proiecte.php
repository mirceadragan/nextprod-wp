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
	<p><?php np_e('Mai jos sunt câteva dintre proiectele realizate pentru clienții noștri: interioare și organizatoare, mânere, curele și componente livrate gata de asamblare.'); ?></p>
</section>

<section class="wrap projects-wrap">
	<div class="projects" data-close="<?php np_a('Închide'); ?>" data-prev="<?php np_a('Anterioara'); ?>" data-next="<?php np_a('Următoarea'); ?>">
<?php
$projects = [
	'Atelierul de producție',
	'Componente din piele cognac: buzunare, mânere și curele',
	'Interior pentru valiză',
	'Măsurarea unei huse cu model pied-de-poule',
	'Set de componente gri cu benzi',
	'Organizator turcoaz pentru ceasuri',
	'Interior de geantă, negru',
	'Organizator negru cu trei compartimente',
	'Tăviță modulară bleumarin',
	'Husă cu model pied-de-poule',
	'Organizator gri pentru bijuterii',
	'Mânere crem',
	'Set de componente verzi',
	'Casetă cu interior turcoaz',
	'Set de componente turcoaz',
	'Organizator negru pentru inele',
	'Suporturi gri cu bucle',
	'Mânere roșii',
	'Piese negre cilindrice',
	'Oglindă cu ramă din piele, față și spate',
];
foreach ($projects as $i => $caption) :
	$file = $img . sprintf('proiect-%02d.webp', $i + 1); ?>
		<figure><a href="<?php echo $file; ?>" class="lightbox"><img src="<?php echo $file; ?>" alt="<?php np_a($caption); ?>" loading="lazy"></a><figcaption><?php np_e($caption); ?></figcaption></figure>
<?php endforeach; ?>
	</div>
	<p class="note"><?php np_e('Mărcile clienților au fost eliminate din fotografii din motive de confidențialitate.'); ?></p>
</section>

<?php get_template_part('parts/cta'); ?>
<?php get_footer(); ?>
