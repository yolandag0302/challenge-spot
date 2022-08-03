# challenge-spot

## Project setup
```
# clone the project

    git clone git@github.com:yolandag0302/challenge-spot.git
    
    cd challenge-spot
    
    mv .env.example .env
    
    composer install

# Configuring a bash alias

    alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'

# Start the Docker containers

    sail start
    
    sail artisan migrate
    
    sail artisan db:seed
```

### available endpoints
```
# Obtener el precio agregado

GET /price-m2/zip-codes/{zip_code}/aggregate/{max|min|avg}?construction_type={1-7}
```
