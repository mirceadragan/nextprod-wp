<?php get_header(); $img = esc_url(get_template_directory_uri()) . '/assets/'; ?>
<section class="hero subhero">
	<div class="hero-inner">
		<p class="intro"><?php np_e('Despre noi'); ?></p>
		<h1><?php np_e('Tradiție în fiecare detaliu'); ?></h1>
	</div>
</section>

<section class="wrap split">
	<div>
		<p class="eyebrow">Next Prod Servicii</p>
		<h2><?php np_e('Măiestrie și calitate, de la prima schiță.'); ?></h2>
		<p><?php np_e('Echipa noastră de profesioniști, cu o experiență de peste 30 de ani în domeniul marochinăriei, oferă asistență completă pe parcursul proceselor de dezvoltare, tehnicilor de producție și procedurilor de control al calității.'); ?></p>
		<p><?php np_e('În cadrul fabricii noastre, fiecare etapă a procesului de fabricație este urmărită cu meticulozitate pentru a satisface cele mai înalte standarde de calitate și sustenabilitate.'); ?></p>
	</div>
	<img src="<?php echo $img; ?>straps.webp" alt="<?php np_a('Marcarea la cald a marginilor unor curele din piele'); ?>" loading="lazy">
</section>

<section class="quote">
	<blockquote><?php np_e('Capacitatea de a da formă unei idei.'); ?></blockquote>
	<p><?php np_e('Îi considerăm pe clienții noștri o parte esențială a echipei.'); ?></p>
</section>

<section class="wrap long">
	<h2><?php np_e('Misiunea noastră'); ?></h2>
	<p><?php np_e('Ne angajăm să aducem valoare și satisfacție clienților, angajaților și acționarilor. Promovăm o bună colaborare, bazată pe moralitate și etică, cu responsabilitate față de societate și mediu.'); ?></p>
	<h3><?php np_e('Un parteneriat construit prin comunicare'); ?></h3>
	<p><?php np_e('Comunicarea constantă cu clientul, logistica și controlul calității susțin producțiile de volum mediu și mare. Expedierea mostrelor și monitorizarea producției se desfășoară într-un flux continuu. Clienții pot vizita atelierele noastre din Sibiu pentru a verifica direct stadiul producției.'); ?></p>
	<h3><?php np_e('Tradiție și tehnologie'); ?></h3>
	<p><?php np_e('Valorificăm expertiza în prelucrarea manuală a pielii și integrăm tehnologii de ultimă oră. Îmbinăm designul realizat de experți, materialele premium, eficiența costurilor și controlul riguros al calității în fiecare proiect.'); ?></p>
</section>

<?php get_template_part('parts/cta'); ?>
<?php get_footer(); ?>
