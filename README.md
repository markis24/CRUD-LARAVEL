# CRUD LARAVEL

Este repositorio contiene el código fuente para un backend desarrollado con Laravel, un popular framework de PHP.

## Instalación

Para ejecutar este proyecto localmente, sigue estos pasos:

1. **Ejecutar Docker Compose:**

   Antes de comenzar, asegúrate de tener Docker y Docker Compose instalados en tu sistema. Luego, ejecuta el siguiente comando en la raíz del proyecto para iniciar los contenedores Docker necesarios:

   ```
   docker-compose up -d
   ```

2. **Instalar dependencias de Laravel:**

   Una vez que los contenedores estén en funcionamiento, instala las dependencias de Laravel utilizando Composer. Ejecuta el siguiente comando:

   ```
   composer require laravel/jetstream
   ```

3. **Instalar Jetstream:**

   Si deseas habilitar el modo claro, que esta por defecto utiliza este comando en su lugar:

   ```
   php artisan jetstream:install livewire
   ```

   Si deseas habilitar el modo oscuro, utiliza este comando en su lugar:

   ```
   php artisan jetstream:install livewire --dark
   ```

4. **Finalizar instalación con npm:**

   Para completar la instalación, instala las dependencias de JavaScript y ejecuta el script de compilación. Ejecuta los siguientes comandos:

   ```
   npm install
   npm run build
   ```

5. **Ejecutar migraciones de la base de datos:**

   Finalmente, ejecuta las migraciones de la base de datos para crear las tablas necesarias. Ejecuta el siguiente comando:

   ```
   docker exec myapp-ub-grics php artisan migrate
   ```

Una vez completados estos pasos, el backend estará listo para ser utilizado.

## Comandos Principales para crear migraciones, modelos y controladores

1. **Crear migraciones:**

   ```
   docker exec myapp-ub-grics php artisan make:migration CreateMembresTable
   ```

2. **Ejecutar las migraciones que no se han ejecutado previamente:**

   ```
   docker exec myapp-ub-grics php artisan migrate
   ```

3. **Crear modelo:**

   ```
   docker exec myapp-ub-grics php artisan make:model Membres
   ```

4. **Crear controlador:**

   ```
   docker exec myapp-ub-grics php artisan make:controller MembresController --resource
   ```

