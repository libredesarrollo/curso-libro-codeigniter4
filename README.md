#  Curso y Libro: Primeros Pasos con CodeIgniter 4

Este repositorio acompaña al libro **"Primeros pasos con CodeIgniter 4"** de Andrés Cruz Yoris (DesarrolloLibre), ideal para quienes desean aprender el framework desde cero y con un enfoque práctico.

https://www.desarrollolibre.net/blog/codeigniter/curso-codeigniter-4

https://www.desarrollolibre.net/libros/primeros-pasos-codeigniter-4
https://www.desarrollolibre.net/libros/first-steps-with-codeigniter-4

---

##  Acerca del Libro

Este libro/curso está diseñado para cualquier desarrollador que desee construir sus primeras aplicaciones con CodeIgniter 4 mediante una introducción paso a paso y centrada en la práctica :contentReference[oaicite:0]{index=0}.


Está dirigido a personas con conocimientos previos en PHP y tecnologías asociadas como HTML, CSS y JavaScript, y que busquen profundizar en un framework con documentación limitada en español :contentReference[oaicite:2]{index=2}.

---

##  Contenido y Estructura del Libro (21 Capítulos)

1. Entorno necesario para desarrollar en CodeIgniter 4 (instalación, configuración).
2. Primeros pasos con el framework: sitio oficial, formas de instalación, configuración de la base de datos, migraciones, MVC, rutas y CRUD básico :contentReference[oaicite:3]{index=3}.
3. Práctica: crea otro CRUD.
4. Rutas: uso, agrupadas, opciones avanzadas.
5. Sesiones y mensajes flash.
6. Vistas reutilizables.
7. Controladores modulares.
8. Formularios y validaciones del lado del servidor.
9. Modelos: propiedades, funciones comunes.
10. Filtros y módulo de autenticación (login/dashboard protegido).
11. CRUD tipo REST API (JSON/XML).
12. Seeders para generar datos de prueba.
13. Relaciones en base de datos: uno a muchos, muchos a muchos.
14. Carga de archivos (por ejemplo, imágenes).
15. Librerías y funciones helper.
16. Adaptación de componentes Bootstrap 5.
17. Módulo con listado y detalle para usuario final.
18. Extensión de API REST con paginación, uploads, métodos adicionales.
19. Aplicación con Vue (en preparación).
20. Integración con PayPal para pagos.
21. Uso de CodeIgniter Shield para autenticación/autoriza­ción, gestión de grupos y permisos :contentReference[oaicite:4]{index=4}.

Al finalizar, estarás preparado para construir aplicaciones básicas y entender en profundidad cómo funciona CodeIgniter 4 :contentReference[oaicite:5]{index=5}.

---

##  Requisitos

- Conocimientos previos de PHP, HTML, CSS y JavaScript.
- Entorno compatible con CodeIgniter 4 (PHP ≥ 7.2, idealmente PHP 8+).
- Composer para la gestión de dependencias.

---

##  Instalación del Proyecto

Sigue estos pasos para poner en marcha el proyecto localmente (similar a Laravel):

```bash
git clone https://github.com/libredesarrollo/curso-libro-codeigniter4.git
cd curso-libro-codeigniter4
composer install
cp env .env
# Ajusta las variables de entorno (.env): base de datos, etc.
php spark key:generate
php spark migrate
php spark db:seed
php spark serve

Tambien puedes emplear herramientas como Laragon o Laravel Herd
