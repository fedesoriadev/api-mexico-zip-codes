# RESTful API - Mexico Zip Codes
[![Laravel](https://img.shields.io/badge/laravel-9-blue.svg?style=for-the-badge)](https://laravel.com)
[![Conventional Commits](https://img.shields.io/badge/Conventional%20Commits-1.0.0-blue.svg?style=for-the-badge)](https://conventionalcommits.org)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=for-the-badge)](/LICENSE)

> Data taken from Mexico Postal Service [SEPOMEX][download]

## API Reference
| **endpoint**                                      | **method** | **description**                                      | **example**                                    |
|---------------------------------------------------|------------|------------------------------------------------------|------------------------------------------------|
| /api/zip-codes                                    | GET        | Get all zip codes paged                              | /api/zip-codes                                 |
| /api/zip-codes/{zip_code}                         | GET        | Get information of a single zip code                 | /api/zip-codes/56400                           |
| /api/federal-entities                             | GET        | Get all federal entities                             | /api/federal-entities                          |
| /api/federal-entities/{federal_entity}/zip-codes  | GET        | Get all zip codes filtered by federal entity paged   | /api/federal-entities/aguascalientes/zip-codes |
| /api/municipalities                               | GET        | Get all municipalities paged                         | /api/municipalities                            |
| /api/municipalities/{municipality}/zip-codes      | GET        | Get all zip codes filtered by municipality paged     | /api/municipalities/AZCAPOTZALCO/zip-codes     |
| /api/settlement-types                             | GET        | Get all settlement types paged                       | /api/settlement-types                          |
| /api/settlement-types/{settlement_type}/zip-codes | GET        | Get all zip codes filtered by settlement type paged  | /api/settlement-types/aeropuerto/zip-codes     |

## Features
+ RESTful API (JSON output)
+ CSV/TXT to database importer
+ API Resources, collections and controllers
+ Pagination
+ Tests

## Instalation
All the zip codes has been imported to `database/demo.db`. 
_Feel free to follow [these instructions](#import-zip-codes-from-a-CSV/TXT) to swap database and/or use the CSV/TXT importer to load new zip codes._

#### TL;DR

```bash
git clone https://github.com/fedesoriadev/api-mexico-zip-codes.git && cd api-mexico-zip-codes
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

#### Steps

1. Clone the repository and cd into
```bash
git clone https://github.com/fedesoriadev/api-mexico-zip-codes.git && cd api-mexico-zip-codes
```
2. Install dependencies using composer
```bash
composer install
```
3. Copy the example env file and make the required configuration changes in the .env file
```bash
cp .env.example .env
```
4. Generate a new application key
```bash
php artisan key:generate
```
5. Start the local development server
```bash
php artisan serve
```

## Import zip codes from a CSV/TXT
1. Fresh database
```bash
php artisan migrate:fresh
```
2. Download a TXT file from [SEPOMEX][download]
3. Run the importer command
```bash
php artisan zipcodes:import
```


## Testing

```bash
./vendor/bin/phpunit
```
or
```bash
php artisan test
```

[download]: https://www.correosdemexico.gob.mx/SSLServicios/ConsultaCP/CodigoPostal_Exportar.aspx 
