# Documentación para compilar un sistema web

Este documento proporciona instrucciones paso a paso para compilar un sistema web utilizando Laravel, Laragon, Composer y phpMyAdmin. El sistema web se compila a partir de un repositorio clonado y requiere la configuración de una base de datos MySQL.

## Requisitos previos:

1. **Laragon:** Un entorno de desarrollo local que incluye Apache, MySQL, PHP y otros servicios. Asegúrate de tener Laragon instalado en tu sistema.

2. **Composer:** Un administrador de dependencias para PHP. Instala Composer si aún no lo has hecho.

3. **phpMyAdmin:** Una herramienta de administración de bases de datos MySQL. Debe estar disponible a través de Laragon.

## Pasos para compilar el sistema web:

1. **Clonar el repositorio:**
   - Abre Laragon y asegúrate de que los servicios de Apache y MySQL estén iniciados.
   - Navega a la carpeta `laragon/www` en tu sistema de archivos.
   - Clona el repositorio del sistema web dentro de esta carpeta utilizando Git o descargando el archivo ZIP y extrayendo su contenido.

2. **Configurar el archivo .env:**
   - En el directorio del proyecto, renombra el archivo `.env.example` a `.env`.
   - Abre el archivo `.env` en un editor de texto y busca la línea que contiene `DB_PORT`.
   - Cambia el valor de `DB_PORT` al puerto de MySQL que estás utilizando en Laragon (por lo general, es el puerto 3306).

3. **Iniciar Laragon:**
   - Abre Laragon y haz clic en "Iniciar Todo" para iniciar todos los servicios, incluido MySQL.

4. **Crear la base de datos:**
   - Abre phpMyAdmin desde el menú de Laragon.
   - Crea una nueva base de datos llamada `ejemplo5` desde la interfaz de phpMyAdmin.

5. **Ejecutar migraciones:**
   - Abre una terminal dentro de Laragon y navega al directorio del proyecto.
   - Ejecuta el siguiente comando para migrar la estructura de la base de datos:
     ```
     php artisan migrate
     ```

6. **Ejecutar pruebas unitarias:**
   - Para realizar pruebas unitarias, ejecuta el siguiente comando en la terminal:
     ```
     php artisan test
     ```

7. **Verificar la funcionalidad del proyecto:**
   - Abre un navegador web y escribe la URL correspondiente a tu proyecto local. Por ejemplo, si el nombre del proyecto es `nombre_del_proyecto`, escribe `nombre_del_proyecto.test`.
   - Regístrate en el sistema haciendo clic en el botón de registro.
   - Inicia sesión con tus credenciales.
   - En el panel de control (dashboard) del sistema, encontrarás dos opciones: "Registrar" y "Listar".
   - Dentro de la opción "Listar", podrás eliminar y editar cada producto utilizando las opciones proporcionadas en la última columna llamada "Opciones".

¡Ahora tu sistema web debería estar compilado y listo para su uso!

