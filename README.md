# Kuantaz Beneficios App


### Clonar repositorio
```sh
git clone git@github.com:mariovaldivia/beneficios-kuantaz.git
```

### Configurar archivo .env
Configuración de parametros de base de datos en container en archivo .env

### Configurar archivo .env de proyecto Laravel
Configuración archivo beneficios/.env con datos de conexión a base de datos mysql con parametros incluidos en archivo .env (DB_DATABASE, DB_USERNAME, DB_PASSWORD)


### Build docker containers
```sh
make build
```

### Iniciar docker containers
```sh
make up
```

### Acceder a shell de container
```sh
make shell
```

### Instalar dependencias
```sh
composer install
```

### Migración de base de datos
```sh
cd beneficios/
php artisan migrate
```

### Cargar seeder
```sh
php artisan db:seed --class=FichaSeeder
php artisan db:seed --class=FiltroSeeder
php artisan db:seed --class=BeneficioSeeder
```

### Acceder a aplicacion con la siguiente URL
http://localhost:8080

