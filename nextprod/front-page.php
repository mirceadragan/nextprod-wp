<?php get_header(); $img = esc_url(get_template_directory_uri()) . '/assets/'; ?>
<section class="hero">
	<div class="hero-inner">
		<p class="intro"><?php np_e('pasiune pentru'); ?></p>
		<h1><?php np_e('marochinărie'); ?></h1>
		<p><?php np_e('Meșteșug, precizie și piele de calitate.'); ?><br><?php np_e('Produse de lux, create pentru brandul dumneavoastră.'); ?></p>
		<a class="btn" href="<?php echo esc_url(np_url('servicii')); ?>"><?php np_e('Descoperă ce realizăm'); ?></a>
	</div>
</section>

<section class="wrap">
	<h2 class="heading"><?php np_e('De la idee la produs'); ?></h2>
	<div class="cards">
		<article>
			<a href="<?php echo esc_url(np_url('servicii')); ?>"><img src="<?php echo $img; ?>leather.webp" alt="<?php np_a('Piele pentru realizarea articolelor de marochinărie'); ?>" loading="lazy"><h3><?php np_e('Materiale și personalizare'); ?></h3></a>
			<p><?php np_e('Piele din surse sustenabile, materiale premium și detalii care dau identitate fiecărui brand.'); ?></p>
		</article>
		<article>
			<a href="<?php echo esc_url(np_url('servicii')); ?>"><img src="<?php echo $img; ?>patterns.webp" alt="<?php np_a('Tăierea tiparelor pentru un produs din piele'); ?>" loading="lazy"><h3><?php np_e('Tipare și prototipuri'); ?></h3></a>
			<p><?php np_e('Transformăm schițele în produse, prin expertiză tehnică, tipare precise și dezvoltarea atentă a prototipurilor.'); ?></p>
		</article>
		<article>
			<a href="<?php echo esc_url(np_url('servicii')); ?>"><img src="<?php echo $img; ?>work.webp" alt="<?php np_a('Realizarea unei componente din piele în atelier'); ?>" loading="lazy"><h3><?php np_e('Producție și finisare'); ?></h3></a>
			<p><?php np_e('Execuție artizanală, tehnologii moderne și control riguros al calității, în fiecare etapă.'); ?></p>
		</article>
	</div>
</section>

<section class="quote">
	<div class="mark">“</div>
	<blockquote><?php np_e('Meșteșugul tradițional, îmbinat cu un control riguros al calității, constituie pilonii proiectelor noastre.'); ?></blockquote>
	<div class="eyebrow"><?php np_e('Filosofia Next Prod Servicii'); ?></div>
</section>

<section class="wrap split">
	<div>
		<p class="eyebrow"><?php np_e('Despre noi'); ?></p>
		<h2><?php np_e('Peste 30 de ani de experiență. Aceeași atenție pentru fiecare detaliu.'); ?></h2>
		<p><?php np_e('Echipa noastră oferă asistență completă în dezvoltarea produselor, tehnicile de producție și controlul calității. În fabrica noastră din Sibiu, îmbinăm tradiția prelucrării artizanale a pielii cu tehnologii moderne.'); ?></p>
		<a class="btn line" href="<?php echo esc_url(np_url('despre-noi')); ?>"><?php np_e('Cunoaște echipa și atelierul'); ?></a>
	</div>
	<img src="<?php echo $img; ?>hand-stitch.webp" style="object-position:62% center" alt="<?php np_a('Lucru manual la o piesă din piele'); ?>" loading="lazy">
</section>

<section class="wrap atelier">
	<h2 class="heading"><?php np_e('Atelierul nostru din Sibiu'); ?></h2>
	<div class="atelier-grid">
		<img src="<?php echo $img; ?>atelier-1.webp" alt="<?php np_a('Posturi de lucru în atelierul de producție'); ?>" loading="lazy">
		<img src="<?php echo $img; ?>atelier-2.webp" alt="<?php np_a('Mașini de cusut în atelierul de marochinărie'); ?>" loading="lazy">
	</div>
</section>

<?php get_template_part('parts/cta'); ?>
<?php get_footer(); ?>
