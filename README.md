# Sitio web para un Cafe

Este repositorio contiene el código fuente para el Sitio web de un cafe. Es una aplicacion web desarrollada con **Laravel** que incluye el menu completo del restaurante, listo para ordenar.

## Características Principales

- **Framework:** Laravel 11 (PHP).
- **Base de Datos:** SQLite (Ligera y portátil, no requiere servidor MySQL externo).
- **Autenticación:** Laravel Breeze (Registro, Login, Reset de password).
- **Frontend:** Blade con Tailwind CSS.
- **Gestión de Usuarios:** Tabla de usuarios personalizada.

## Requisitos Previos

Para correr este proyecto localmente necesitas tener instalado:

- PHP >= 8.2
- Composer
- Node.js & NPM

## 🛠️ Instalación y Configuración

Sigue estos pasos para levantar el proyecto en tu computadora:

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/ErickDuarte00/laravel-proyecto.git
   cd proyecto-final

2. **Instalar dependencias de PHP**
composer install

3. **Instalar dependencias de Frontend**
npm install

4. **Configurar el entorno Duplica el archivo de ejemplo para crear tu configuración local:**
cp .env.example .env

5. **Generar la llave de la aplicación**
php artisan key:generate

6. **Generar la llave de la aplicación**
php artisan migrate

## Ejecutar el Proyecto
- Terminal 1 (Servidor Laravel):
php artisan serve

- Terminal 2 (Compilación de estilos):
npm run build