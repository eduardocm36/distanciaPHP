# api-example-service

## DOC URL `https://klein.github.io/klein.php/docs/classes/Klein.Klein.html`
## DOC GITHUB `https://github.com/klein/klein.php`

# REQUERIMIENTOS EN PHP >=8
## mariadb v >= 10.5.0
    ```sql
    JSON_ARRAYAGG() -- > requiere version de mariadb mayor o igual a 10.5.0
    ```
## update mariadb ref.
### `https://www.youtube.com/watch?v=-GmyjYEfuzE`

# requiere YARGS
# -npm install yargs

## Development server

### Dependencias Composer
### importar archivos
## Run - `php composer.phar install`

## Run - `composer install`
## Run - `composer dump-autoload`

### Dependencias Node
## 1. Run `npm install`
## 2. Run  `npm run dev` for a dev server. Navigate to `http://localhost:8001`. The application will automatically reload if you change any of the source files.

# VALIDAR GUIONES MEDIOS EN NOMBRE DE CARPETAS Y ARCHIVOS POR CONVENCIÓN PSR-4

# --------------NODEJS----------------------
# npm run make productos
# npm run make productos -- --path=mantenedores
# npm run make productos -- -p mantenedores
# npm run make productos -- --ns=Mnt
# npm run make productos -- --ns=Mnt --path=mantenedores
# node artisan c productos -- --ns=Mnt --path=mantenedores


# --------------COMPOSER----------------------

## _ php artisan c NombreComponente --ns=Mnt --path=Carpeta/Nueva/Componente
## _ php artisan c productos 
## _ php artisan c productos --ns Mnt
## _ php artisan c productos --ns=Mnt
## _ php artisan c productos --path=mantenedores
## _ php artisan c productos --path mantenedores
## _ php artisan c productos -p mantenedores
## _ php artisan c productos --ns Mnt --path mantenedores
## _ php artisan c employees --ns Mnt --path mantenedores
## _ composer make productos -- --ns=Mnt --path=mantenedores


####//NOTE: agregar el valor de `--ns` 'Mnt' a  "autoload":{"psr-4"}

# =====dependencias=====
# -composer require aura/cli

# composer require symfony/console
# composer require symfony/contracts
# composer require symfony/process
# composer require vlucas/phpdotenv
# composer require psr/log


# ===rutas==
## composer require slim/slim:"4.*"
## composer require slim/psr7
## composer require slim/http
## composer require slim/middleware-methodoverride

## `PSR-4` es una `convención` de carga automática de clases en PHP que establece una estructura de directorios y nombres de archivo para las clases. 

## Según la convención PSR-4, cada espacio de nombres (namespace) se corresponde con un prefijo de ruta de archivo (file path prefix). Es decir, si una clase está en el espacio de nombres `MyApp\Controllers`, su archivo debe estar en `src/Controllers` y tener un nombre como `MyController.php`.

## Además, cada espacio de nombres debe estar en su propio archivo y el nombre del archivo debe coincidir con el nombre de la clase (incluyendo el espacio de nombres). Por ejemplo, la clase `MyApp\Controllers\MyController` debería estar en el archivo `src/Controllers/MyController.php`.

## Con la convención PSR-4, los nombres de los espacios de nombres y las clases deben estar en CamelCase (también conocido como PascalCase), lo que significa que la primera letra de cada palabra debe estar en mayúscula, excepto la primera palabra.

## La convención PSR-4 también establece que las clases deben seguir una convención de nomenclatura CamelCase, donde la primera letra de cada palabra se escribe en mayúscula (por ejemplo, `MyClass`, `MyOtherClass`). 

## Estas convenciones facilitan la carga automática de clases en PHP y ayudan a mantener un código claro y organizado.

# ==============V ==============
## composer require guzzlehttp/guzzle
# composer require tectalic/openai
# "openai-php/client": "dev-main",
# tectalic/openai
# composer require nikic/fast-route:^1.3



# //NOTE: requerimientos de php habilitado en php.ini -> extension=gd y extension=zip
##      DEPLOYMENBT DE EJEMPLO KUBS

********************
arquitectura
********************
```
pedido
 ├── pedido.mv.php
 │
 ├── application/
 │   ├── usecase
 │   ├── service
 │
 ├── domain/
 │   ├── dto
 │   ├── entity
 │   └── mapping
 │   └── model
 │   └── repository
 │   └── usecase
 │   └── valueobject
 │
 ├── infrastructure/
 │   ├── delivery
 │       └── http
 │           └── controller
 │           └── routes
 │   ├── persistence
 │       └── mssql_repository

```


```dockerfile
# Usa la imagen oficial de PHP desde Docker Hub
FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip

# Establece el directorio de trabajo en el directorio del proyecto
WORKDIR /app

# Copia el archivo composer.json y composer.lock al directorio de trabajo
COPY composer.json composer.lock ./

# Copia todo el contenido del directorio actual al directorio de trabajo en el contenedor
COPY . .

# Expone el puerto 80 para aplicaciones web si es necesario
 EXPOSE 80

# Comando por defecto al iniciar el contenedor (por ejemplo, para ejecutar una aplicación PHP)
CMD ["php", "index.php"]

# docker build -t api-contactabilidad-service .
# docker container run -d --name nec-admin-service -p 8001:80 --network nec-service-net api-contactabilidad-service
```

# Deploy Production

1. Verificar y configurar git y sus claves

2. Verificar la conexion del mysql de la imagen con la base de datos como `bind-address=0.0.0.0`

3. configurar conexion mysql

4. verificar el almacenamiento asignado a la imagen y contenedor
