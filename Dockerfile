# Usa imagem oficial PHP 8.2 com Apache
FROM bitnami/laravel:12-debian-12

# Define o diretório de trabalho
WORKDIR /api

# Copia os arquivos da aplicação para o container
COPY . .

# MOSTRANDO A PORTA 8000
EXPOSE 80

