# Aplicación Laravel 10 con Livewire 3 y Jetstream 4


## Guía para instalar el proyecto
Este es un proyecto de prueba realizado en el curso **Aprende Livewire desde cero**

1. Descarga el repositorio
2. Descromprime la carpeta dentro del directorio de Valet/Laragon
3. Renombra la carpeta (Opcional)
4. Entra a la carpeta desde la terminal `cd directorio/de/la/carpeta`
5. Copia el contenido del archivo `.env.example` a un nuevo archivo llamado `.env`
    * Si estás en Liunx o Mac puedes ejecutar el comando: `cp .env.example .env`
6. Crea una base de datos para el proyecto
7. Modifica las variables de conexión del nuevo archivo `.env`
    * Define los datos de conexión
        * DB_DATABASE=
        * DB_USERNAME=
        * DB_PASSWORD=
    * Define las credenciales de [Mailtrap](https://mailtrap.io/) (Opcional)
8. Ejecuta `composer install`
9. Ejecuta `php artisan key:generate`
10. Ejecuta `php artisan migrate`
11. Ejecuta `npm install`
12. Ejecuta `npm run dev` (para desarrollo) o `npm run prod` (para producción)

## Notas para desarrollo y tests
- Necesitamos crear otra base de datos para las pruebas con el nombre especificado en archivo phpunit.xml
- En caso de no tener el archivo de configuración de Livewire (config/livewire.php) podemos publicarlo desde vendor ejecutando `php artisan livewire:publish --config`
- En caso de no contar con la carpeta public/storage debemos generarla (solo si es necesario) con `php artisan storage:link`
- Si la miniatura de la imagen no se muestra en la tabla es por que no modificamos APP_URL en el archivo .env con la dirección correcta del proyecto ej: http://livewire10.test
