# 🚀 Primeros Pasos con CodeIgniter 4 (Edición Modernizada)

Este repositorio es el acompañamiento oficial del libro y curso **"Primeros pasos con CodeIgniter 4"** de Andrés Cruz Yoris (DesarrolloLibre). Ha sido actualizado y modernizado para aprovechar las últimas características de PHP 8 y las versiones más recientes del framework.

[![CodeIgniter Version](https://img.shields.io/badge/CodeIgniter-v4.7.2-blue.svg)](https://codeigniter.com)
[![PHP Version](https://img.shields.io/badge/PHP-v8.2+-777bb4.svg)](https://www.php.net/)

---

## 📚 Acerca del Proyecto

Este proyecto está diseñado para enseñarte a construir aplicaciones robustas con CodeIgniter 4 desde cero. Cubre desde los conceptos básicos de MVC hasta integraciones avanzadas como APIs REST y pagos con PayPal.

### ✨ Características Modernizadas
Recientemente, el proyecto ha sido actualizado con patrones de desarrollo modernos:
- **Framework v4.7.2**: Uso de las últimas mejoras en seguridad y rendimiento.
- **PHP 8.2+**: Implementación de tipos de retorno, propiedades tipadas y sintaxis moderna.
- **Entities**: Uso de clases de Entidad (`App\Entities`) para una manipulación de datos más limpia y lógica.
- **Modelos Avanzados**: Validación integrada y gestión automática de timestamps.
- **Controladores Tipados**: Mejora en la legibilidad y mantenimiento mediante el uso de tipos estrictos.

---

## 🛠️ Requisitos del Sistema

Para ejecutar este proyecto de manera óptima, asegúrate de cumplir con:
- **PHP 8.2** o superior.
- **Composer** (v2 o superior).
- Base de Datos compatible (MySQL/MariaDB recomendado).
- Extensiones PHP: `intl`, `mbstring`, `json`, `curl`, `xml`.

---

## 🚀 Instalación y Configuración

Sigue estos pasos para poner el proyecto en marcha en tu entorno local:

1. **Clonar el repositorio:**
   ```bash
   git clone https://github.com/libredesarrollo/curso-libro-codeigniter4.git
   cd curso-libro-codeigniter4
   ```

2. **Instalar dependencias:**
   ```bash
   composer install
   ```

3. **Configurar el entorno:**
   Copia el archivo de ejemplo y ajusta tus credenciales de base de datos:
   ```bash
   cp env .env
   ```

4. **Generar clave de cifrado:**
   ```bash
   php spark key:generate
   ```

5. **Ejecutar Migraciones y Seeders:**
   ```bash
   php spark migrate
   php spark db:seed
   ```

6. **Iniciar el servidor:**
   ```bash
   php spark serve
   ```

---

## 📂 Estructura del Proyecto

- `app/Controllers`: Lógica de la aplicación organizada por módulos (Dashboard, Api, Web).
- `app/Models`: Definición de acceso a datos con validación y tipos.
- `app/Entities`: Objetos de datos con lógica de negocio (Modernizado).
- `app/Config/Routes.php`: Definición de rutas limpias y agrupadas.
- `public/`: Directorio raíz del servidor web.

---

## 📖 Recursos Adicionales

- **Curso Completo:** [desarrollolibre.net/blog/codeigniter/curso-codeigniter-4](https://www.desarrollolibre.net/blog/codeigniter/curso-codeigniter-4)
- **Libro en Español:** [Primeros pasos con CodeIgniter 4](https://www.desarrollolibre.net/libros/primeros-pasos-codeigniter-4)
- **Libro en Inglés:** [First Steps with CodeIgniter 4](https://www.desarrollolibre.net/libros/first-steps-with-codeigniter-4)

---

## 📄 Licencia

Este proyecto es de código abierto bajo la licencia [MIT](LICENSE).

---
Desarrollado con ❤️ por [Andrés Cruz Yoris](https://www.desarrollolibre.net).
