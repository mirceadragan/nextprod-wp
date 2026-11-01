# Next Prod Servicii — temă WordPress

Temă personalizată pentru site-ul Next Prod Servicii (marochinărie de lux, Sibiu).

## Previzualizare live (WordPress Playground)

[**Deschide previzualizarea**](https://playground.wordpress.net/?blueprint-url=https://raw.githubusercontent.com/mirceadragan/nextprod-wp/main/blueprint.json)

Pornește un WordPress complet în browser, instalează tema din `dist/nextprod.zip`, creează paginile și setează pagina de pornire. Nimic nu se salvează pe server; la reîncărcare se pornește de la zero. wp-admin: `/wp-admin/` (deja autentificat).

## Structură

| Cale | Rol |
|---|---|
| `nextprod/` | sursa temei (PHP, CSS, JS, `assets/` cu imaginile .webp) |
| `dist/nextprod.zip` | tema instalabilă — se generează cu `./build.sh` |
| `blueprint.json` | configurația pentru Playground |

## Flux de lucru

1. Modificări în `nextprod/` → `./build.sh` → commit + push.
2. Verificare în linkul de previzualizare (GitHub poate servi versiunea veche ~5 min).
3. Pe hosting: **Aspect › Teme › Adaugă › Încarcă temă** → `dist/nextprod.zip` → **Înlocuiește tema curentă**.

La prima activare tema creează singură paginile Acasă, Despre noi, Servicii, Produse, Contact (dacă lipsesc), setează Acasă ca pagină de pornire și legăturile permanente „Nume articol”.
