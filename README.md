# Next Prod Servicii — temă WordPress

Temă personalizată pentru site-ul Next Prod Servicii (marochinărie de lux, Sibiu).

## Previzualizare live (WordPress Playground)

[**Deschide previzualizarea**](https://playground.wordpress.net/?blueprint-url=https://raw.githubusercontent.com/mirceadragan/nextprod-wp/main/blueprint.json)

Pornește un WordPress complet în browser, instalează tema din `dist/nextprod.zip`, creează paginile și setează pagina de pornire. Nimic nu se salvează pe server; la reîncărcare se pornește de la zero. wp-admin: `/wp-admin/` (deja autentificat).

## Structură

| Cale | Rol |
|---|---|
| `nextprod/` | sursa temei (PHP, CSS, JS, `assets/` cu imaginile .webp) |
| `dist/nextprod.zip`, `dist/nextprod-vX.Y.zip` | tema instalabilă (versiunea din `style.css`) — se generează cu `./build.sh` |
| `blueprint.json` | configurația pentru Playground |

## Flux de lucru

1. Modificări în `nextprod/` → `./build.sh` → commit + push.
2. Verificare în linkul de previzualizare (GitHub poate servi versiunea veche ~5 min).
3. Pe hosting: **Aspect › Teme › Adaugă › Încarcă temă** → `dist/nextprod.zip` → **Înlocuiește tema curentă**.

La prima activare tema creează singură paginile Acasă, Despre noi, Servicii, Produse, Contact (dacă lipsesc), setează Acasă ca pagină de pornire și legăturile permanente „Nume articol”.

## Limbi (EN / RO / IT)

Fără plugin. Engleza e implicită (fără prefix), româna și italiana au prefix:

| EN (implicit) | RO | IT |
|---|---|---|
| `/` | `/ro/` | `/it/` |
| `/about-us/` | `/ro/despre-noi/` | `/it/chi-siamo/` |
| `/services/` | `/ro/servicii/` | `/it/servizi/` |
| `/products/` | `/ro/produse/` | `/it/prodotti/` |
| `/projects/` | `/ro/proiecte/` | `/it/progetti/` |
| `/contact/` | `/ro/contact/` | `/it/contatti/` |

- Adresele vechi românești (`/despre-noi/`, `/servicii/`, `/produse/`) fac redirect 301 către `/ro/...`.
- Limba implicită: constanta `NP_DEFAULT` din `nextprod/inc/i18n.php` (adresele se recalculează singure).
- Textele din șabloane sunt în română, trecute prin `np_e('…')` / `np_a('…')`.
- Traducerile: `nextprod/lang/en.php`, `nextprod/lang/it.php` — cheia este textul românesc **exact**. Dacă schimbi un text românesc, schimbă și cheia în ambele fișiere; altfel pagina EN/IT afișează textul în română.
- Slug-urile traduse: `NP_SLUGS` în același fișier.
- Tema generează `<html lang>`, `rel="canonical"`, `hreflang` (`x-default` = engleza) și selectorul EN | RO | IT din meniu.
