# Adoptable – Plataforma de Adoção de Animais

Este é um projeto desenvolvido em Laravel que tem como objetivo facilitar o processo de adoção de animais, permitindo que qualquer pessoa ou associação possa registar animais e que utilizadores interessados possam pesquisar, guardar em wishlist e candidatar-se à adoção.

## 🔧 Tecnologias Utilizadas

- Laravel 10
- PHP 8.x
- MySQL / phpMyAdmin
- Laravel Breeze (autenticação)
- Bootstrap 5
- GitHub
- SMTP (Gmail)

## ⚙️ Como correr o projeto localmente

1. Clonar o repositório:
   ```bash
   git clone https://github.com/utilizador/adoptable.git
   cd adoptable
2. Instalar dependências:
  composer install
  npm install && npm run dev

3. Criar e configurar o .env
   cp .env.example .env

4. Gerar Chave
   php artisan key:generate

5. Executar migrations
   php artisan migrate

6. Iniciar servidor
   php artisan serve
   
7. Aceder ao projeto
   http://localhost:8000
