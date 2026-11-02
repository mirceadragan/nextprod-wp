<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header>
	<div class="nav">
		<a class="brand" href="<?php echo esc_url(np_url('acasa')); ?>" aria-label="Next Prod Servicii, <?php np_a('Acasă'); ?>">NEXT PROD SERVICII<small>LUXURY LEATHER GOODS</small></a>
		<button class="menu" aria-expanded="false" aria-controls="navlinks" aria-label="<?php np_a('Deschide meniul'); ?>" data-open="<?php np_a('Deschide meniul'); ?>" data-close="<?php np_a('Închide meniul'); ?>">☰</button>
		<nav class="navlinks" id="navlinks">
			<a href="<?php echo esc_url(np_url('acasa')); ?>"><?php np_e('Acasă'); ?></a>
			<a href="<?php echo esc_url(np_url('despre-noi')); ?>"><?php np_e('Despre noi'); ?></a>
			<a href="<?php echo esc_url(np_url('servicii')); ?>"><?php np_e('Servicii'); ?></a>
			<a href="<?php echo esc_url(np_url('produse')); ?>"><?php np_e('Produse'); ?></a>
			<a class="outline" href="<?php echo esc_url(np_url('contact')); ?>"><?php np_e('Hai să colaborăm'); ?></a>
			<?php np_language_switcher(); ?>
		</nav>
	</div>
</header>
<main>
