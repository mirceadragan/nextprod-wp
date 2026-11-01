<?php get_header(); $img = esc_url(get_template_directory_uri()) . '/assets/'; ?>
<section class="hero subhero">
	<div class="hero-inner">
		<p class="intro"><?php np_e('Ce realizăm'); ?></p>
		<h1><?php np_e('Piele. Formă. Identitate.'); ?></h1>
	</div>
</section>

<section class="wrap">
	<h2 class="heading"><?php np_e('Marochinărie pentru brandul dumneavoastră'); ?></h2>
	<div class="gallery">
<?php
$gallery = [
	'hero.webp'   => 'Genți de mână și genți de umăr',
	'bags.webp'   => 'Genți de voiaj și rucsacuri',
	'wallet.webp' => 'Portofele și mici articole din piele',
	'sleeve.webp' => 'Huse și accesorii pentru laptop',
	'leather-buttons.webp' => 'Detalii și componente îmbrăcate în piele',
	'strap-stitch.webp' => 'Cusături și finisaje artizanale',
];
foreach ($gallery as $file => $caption) : ?>
		<figure><img src="<?php echo $img . $file; ?>" alt="<?php np_a($caption); ?>" loading="lazy"><figcaption><?php np_e($caption); ?></figcaption></figure>
<?php endforeach; ?>
	</div>
</section>

<section class="wrap long">
	<h2><?php np_e('O gamă variată de posibilități'); ?></h2>
	<div class="products">
<?php
foreach (['Genți shopper', 'Genți de umăr', 'Genți tote', 'Genți plic', 'Rucsacuri', 'Genți de voiaj', 'Genți pentru laptop', 'Genți tip sac', 'Portofele', 'Portcarduri', 'Curele', 'Coperți pentru pașaport'] as $p) : ?>
		<span><?php np_e($p); ?></span>
<?php endforeach; ?>
	</div>
	<p><?php np_e('Fiecare piesă este creată cu atenție, folosind materiale de înaltă calitate, pentru durabilitate și un aspect estetic deosebit. Produsele sunt dezvoltate în funcție de designul și specificațiile fiecărui client.'); ?></p>
</section>

<?php get_template_part('parts/cta'); ?>
<?php get_footer(); ?>
