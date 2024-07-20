#!/bin/sh

# Verificar se as dependências do Composer estão instaladas
if [ ! -d "vendor" ]; then
    composer install
fi

# Verificar se as dependências do npm estão instaladas
if [ ! -d "node_modules" ]; then
    npm install
fi

# Compilar assets de produção
if [ ! -d "public/build" ]; then
    npm run build
fi

# Gerar chave da aplicação, caso ainda não exista
if [ ! -f ".env" ]; then
    cp .env.example .env
    php artisan key:generate
fi

# Iniciar PHP-FPM
exec "$@"
