<?php get_header(); $img = esc_url(get_template_directory_uri()) . '/assets/';
$email   = get_theme_mod('nextprod_email');
$phone   = get_theme_mod('nextprod_phone');
$address = get_theme_mod('nextprod_address'); ?>
<section class="hero subhero">
	<div class="hero-inner">
		<p class="intro"><?php np_e('Contact'); ?></p>
		<h1><?php np_e('Haideți să colaborăm'); ?></h1>
	</div>
</section>

<section class="wrap split">
	<div>
		<p class="eyebrow"><?php np_e('Un nou proiect începe cu o conversație'); ?></p>
		<h2><?php np_e('Vă așteptăm în atelierul nostru.'); ?></h2>
		<p><?php np_e('Suntem încântați să vă invităm la sediul firmei noastre, unde ne putem întâlni personal și putem dezvolta noul dumneavoastră proiect.'); ?></p>
		<div class="contactbox">
			<?php if ($email) : ?><p><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p><?php endif; ?>
			<?php if ($phone) : ?><p><a href="tel:<?php echo esc_attr(preg_replace('/[^+0-9]/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a></p><?php endif; ?>
			<?php if ($address) : ?><p><?php echo esc_html($address); ?></p><?php endif; ?>
		</div>
		<div class="badge"><strong>SC NEXT PROD SERVICII SRL</strong><br><?php np_e('Sibiu, România'); ?></div>
		<p><?php np_e('Pentru prima discuție, pregătiți schițele, tipul produselor, cantitatea estimată și calendarul dorit. Vom analiza împreună detaliile colaborării.'); ?></p>
	</div>
	<img src="<?php echo $img; ?>work.webp" alt="<?php np_a('Producția articolelor din piele în atelierul din Sibiu'); ?>" loading="lazy">
</section>
<?php get_footer(); ?>
