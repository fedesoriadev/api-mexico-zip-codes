# RESTful API - Mexico Zip Codes
Data taken from Mexico Postal Service (SEPOMEX)[https://www.correosdemexico.gob.mx/SSLServicios/ConsultaCP/CodigoPostal_Exportar.aspx]

## Instalation

#### TL;DR

```bash
git clone https://github.com/fedesoriadev/api-mexico-zip-codes.git && cd api-mexico-zip-codes
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
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
5. Run the database migrations and seed with dummy data
```bash
php artisan migrate --seed
```
6. Install node dependencies and generate front-end assets
```bash
npm install && npm run dev
```
7. Start the local development server
```bash
php artisan serve
```

## Testing

```bash
./vendor/bin/phpunit
```
or
```bash
php artisan test
```

