instalar herd  (https://herd.laravel.com/docs/windows/getting-started/installation)

instalar git(opcional) o descargar el rar de mi repositorio


---instalar git  (https://git-scm.com/downloads)

--marcar las opciones

.use vim(the ubiquitous text editor) as git`s default editor 

.let git decide 

.git from the command line and also from 3rd-party software

.use bundled openssh

.use the native windows secure channel library

.checkout windows-style,commit unix-style line endings 

.use mintty (the default terminal of msys2)

.fast-forward or merge 

.git credential manager

.eneabe file system caching  

Paso para dar permisos a herd
1. Abre el archivo hosts como administrador (muy importante para poder guardar cambios)
   Busca Bloc de notas en el menú inicio.

   Haz clic derecho y selecciona Ejecutar como administrador.

   Luego en Bloc de notas abre el archivo:

   C:\Windows\System32\drivers\etc\hosts

2. Agrega esta línea al final (nueva línea):

   127.0.0.1 sistema-de-gesti-n-de-maquinaria-vial.test

Pasos clave que debes seguir ahora (en orden):

una ves echo eso se busca la carpeta raiz
cd C:\Users\users\Herd
git clone https://github.com/amai-yami/Sistema-de-Gesti-n-de-Maquinaria-Vial.git

luego cd nombre de la carpeta clonada ya sea en visual studio code o cmd 
preferiblemente visual studio code abriendo una terminal ahi 
visual studio se instala de microsoft store en windows 10 o 11
o por la url (https://code.visualstudio.com/download)



1. Instalar dependencias con Composer
   Abre la terminal en la carpeta raíz del proyecto (donde está composer.json) y ejecuta:

   composer install

   Esto descarga todas las librerías necesarias.

2. Copiar archivo .env
   Si no tienes un archivo .env, créalo copiando el ejemplo:

   cp .env.example .env
   (en Windows CMD, puedes usar: copy .env.example .env)

3. Generar la clave de aplicación Laravel
   Esto es fundamental para la seguridad:

   php artisan key:generate

4. Configurar la base de datos en .env
   Edita .env con tus datos de conexión (host, usuario, contraseña, nombre de BD).

   Ejemplo básico:

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nombre_de_tu_bd
   DB_USERNAME=tu_usuario
   DB_PASSWORD=tu_contraseña

   con otro gestor de base de datos mysql(como mysql workbench)
   la instalacion depende del gestor que desee usar

   o

   DB_CONNECTION=sqlite
   DB_DATABASE=database/database.sqlite

   --Ve a la raíz de tu proyecto:
cd C:\Users\users\Herd\carpeta proyecto

Luego, crea la carpeta database (si no existe):
mkdir database

Y dentro de ella, crea el archivo vacío .sqlite:
type nul > database\database.sqlite

O si usas PowerShell:
New-Item -ItemType File -Path .\database\database.sqlite



6. Ejecutar migraciones para crear tablas en la base de datos

   php artisan migrate --seed

7. (Opcional) Ejecutar seeders si el proyecto tiene datos de prueba

   php artisan db:seed

8. Finalmente, levanta el servidor

   php artisan serve

   y visita en tu navegador:

   http://localhost:8000

Nota
Si quieres usar Herd con el dominio .test, primero asegúrate que todo esto funcione en localhost, y luego configuras Herd y el archivo hosts.

y por ultimo en el archivo indexview.blade.php  esta comentado el crud de provincias por si quiere probar agregar ver el boton de provincias con sus crud (opcional)




