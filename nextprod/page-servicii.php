<?php get_header(); $img = esc_url(get_template_directory_uri()) . '/assets/'; ?>
<section class="hero subhero">
	<div class="hero-inner">
		<p class="intro"><?php np_e('Serviciile noastre'); ?></p>
		<h1><?php np_e('Ideile prind formă'); ?></h1>
	</div>
</section>

<section class="wrap split">
	<div>
		<p class="eyebrow"><?php np_e('Dezvoltare completă'); ?></p>
		<h2><?php np_e('Un proces atent. Un produs cu identitate.'); ?></h2>
		<p><?php np_e('Oferim fiecărui client posibilitatea de a crea produse sub propriul său brand. Vă ghidăm etapă cu etapă, de la viziunea designerului până la realizarea colecției.'); ?></p>
		<a class="btn line" href="<?php echo esc_url(np_url('contact')); ?>"><?php np_e('Să discutăm proiectul'); ?></a>
	</div>
	<img src="<?php echo $img; ?>finish.webp" alt="<?php np_a('Finisarea manuală a componentelor din piele'); ?>" loading="lazy">
</section>

<section class="wrap long steps">
<?php
$steps = [
	['Analiză și consultanță', 'Analizăm dosarele tehnice și specificațiile de design. Discutăm materialele, termenele de execuție, prețurile și cerințele proiectului.'],
	['Materiale și accesorii', 'Selectăm materiale premium și recomandăm fermoare, catarame și accesorii metalice potrivite designului.'],
	['Tipare și prototipuri', 'Evaluăm fezabilitatea, realizăm tiparele și dezvoltăm prototipuri. Identificăm eventualele obstacole tehnice înainte de producția în serie.'],
	['Personalizare pentru brandul dumneavoastră', 'Stabilim accesoriile cu branding, logo-urile în relief și detaliile realizate la comandă.'],
	['Producție și finisaje manuale', 'După aprobarea prototipurilor, planificăm colecțiile. Tăierea, cusăturile, asamblarea și aplicarea culorii prin tamponare sau pensulare sunt realizate cu atenție meticuloasă.'],
	['Control, ambalare și expediere', 'Verificăm fiecare etapă, de la recepția pielii și accesoriilor până la produsul finit. Asigurăm ambalarea sigură și expedierea promptă.'],
];
foreach ($steps as [$title, $text]) : ?>
	<article class="step"><div><h3><?php np_e($title); ?></h3><p><?php np_e($text); ?></p></div></article>
<?php endforeach; ?>
</section>

<?php get_template_part('parts/cta'); ?>
<?php get_footer(); ?>
