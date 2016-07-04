License
-------
GPLv3 or later.
=======
Bienvenido al Repositorio de Entregas de los proyectos a la ASI, denominado GIT.
La definición de como se entrega y que documentos deben entregar se encuentra en la carpeta denominada "Instructivos-Documentos ASI" donde encontrarán un instructivo del GIT que explica el proceso y donde subir cada archivo. 
Adicionalmente se encuentran los templates de guía para completar la documentación del proyecto para avanzar con las tareas y actividades de la ASI como Documento de Arquitectura, Manual de instalación, Documento de Alcance y funcionamiento, etc.

Es obligatorio que contemplen que  el sistema operativo que deben utilizar es **RedHat 6.5**. Puede descargar la versión gratuita del mismo (Centos 6.5) desde el siguiente enlace [Descargar](https://github.com/2creatives/vagrant-centos/releases/download/v6.5.1/centos65-x86_64-20131205.box)

Recuerden que **ninguno** de los ambientes productivos cuentan con acceso a internet. Si para el correcto funcionamiento de la aplicación es necesario comunicarse con servidores externos los mismos debe enumerarse en el manual de instalación indicando dominio/puerto que debe estar habilitado justificando su uso en cada caso. 

NOTA:  La entrega por este medio no reemplaza los compromisos de entrega relacionado con la contratación,es decir, esto es un requerimiento obligatorio adicional a la entrega formal.

------------------------------------------------------------------

Descripción general
===================

Se trata de un simple script PHP que permite generar una API dinámicamente partiendo desde un archivo CSV en la web.

Fue creado originalmente por miembros de la Casa Blanca.

Se le agregó una configuración de whitelist con los dominios permitidos, para evitar usos indebidos.

Requerimientos
------------

* PHP
* APC Cache (es opcional pero muy recomendado)
* Salida a internet a los servidores configurados en config.php al momento de la configuración inicial.

Implementación y Uso
-----

1. Clonar el proyecto en el servidor.
2. Apuntar el web server o subdominio a la carpeta `source`, donde se encuentran los archivos:  `class.csv-to-api.php` y `index.php`.
3. Crear una copia de `config.php.example` y llamarla `config.php` y luego modificar en este último agregando los dominios permitidos.
4. Testear el correcto funcionamiento del script `index.php`, usando los parámetros abajo descriptos. Ejemplo: <URL>?source=https://recursos-data.buenosaires.gob.ar/ckan2/interpretes/interpretes-lse.csv

------------------------------------------------------------------

Readme del proyecto original:


CSV to API
===========


Dynamically generate RESTful APIs from static CSVs. Provides JSON, XML, and HTML.


What Problem This Solves
------------------------

The simplicity with which CSV files can be created has made them the default data format for bulk data. It is comparatively more difficult to create an API to share the same data atomically and transactionally.

How This Solves It
------------------

*CSV to API* acts as a filter, sitting between CSV and the browser, allowing users to interact with that CSV as if it was a native API. The column names (that is, the cells that comprise the first row in the file) function as the key names.

Note that this can be run on any server to create an API for any CSV file on any server. There is no need to install *CSV to API* for each unique CSV file or even each unique server—an organization can link to each and every one of their CSV files via *CSV to API*, or an individual could even use their own installation of *CSV to API* to access arbitrary remote CSV files as if they were APIs.

When Alternative PHP Cache (APC) is installed, parsed data is stored within APC, which accellerates  its functionality substantially. While APC is not required, it is recommended highly.

Requirements
------------

* PHP
* APC Cache

Usage
-----

1. Copy `class.csv-to-api.php` and `index.php` to your web server.
2. Create a copy from `config.php.example` called `config.php` and add the allowed source domains.
3. Load a CSV file via the URL `index.php`, using the arguments below. Example: <URL>?source=https://recursos-data.buenosaires.gob.ar/ckan2/interpretes/interpretes-lse.csv

Arguments
---------

* `source`: source CSV url
* `source_format`: if the url does not end in `.csv`, you should specify 'csv' here (to facilitate future functionality)
* `format`: the requested return format, either `json`, `xml`, or `html` (default `json`)
* `callback`: if JSON, an optional JSONP callback
* `sort`: field to sort by (optional)
* `sort_dir`: direction to sort, either `asc` or `desc` (default `asc`)
* any field(s): may pass any fields as a key/value pair to filter by
* `header_row`: whether the source CSV has a header row; if missing, it will automatically assign field names (`field_1`, `field_2`, etc.); either `n` or `y` (default `y`)

Example Usage
-------------

All examples use [data from REXUS](http://catalog.data.gov/dataset/real-estate-across-the-united-states-rexus-inventory-building), the primary tool used by the Public Building Service to track and manage the government's real property assets and to store inventory data, building data, customer data, and lease information.

### Get CSV as JSONP (default behavior)
http://labs.data.gov/csv-to-api/?source=http://www.gsa.gov/dg/data_gov_bldg_star.csv

### Get results as XML

http://labs.data.gov/csv-to-api/?source=http://www.gsa.gov/dg/data_gov_bldg_star.csv&format=xml

### Get results as JSONP with a specified callback

http://labs.data.gov/csv-to-api/?source=http://www.gsa.gov/dg/data_gov_bldg_star.csv&format=json&callback=parse_results

### Get results as HTML

http://labs.data.gov/csv-to-api/?source=http://www.gsa.gov/dg/data_gov_bldg_star.csv&format=html

### Sort by a field

http://labs.data.gov/csv-to-api/?source=http://www.gsa.gov/dg/data_gov_bldg_star.csv&sort=Bldg+Zip

### Filter by a field

http://labs.data.gov/csv-to-api/?source=http://www.gsa.gov/dg/data_gov_bldg_star.csv&Region+Code=11

