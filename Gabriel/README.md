# Gabriel Oliveira - Currículo Online

Site pessoal desenvolvido para apresentar um resumo profissional de Gabriel Oliveira de Paula, incluindo trajetória, habilidades técnicas, experiências, formação e canais de contato.

O projeto funciona como currículo online e portfólio institucional, com suporte a português e inglês por meio da estrutura de internacionalização do Laravel.

## Tecnologias

- PHP 8
- Laravel 9
- Blade
- Bootstrap 5
- CSS customizado
- JavaScript
- Laravel Lang (`lang/pt_BR` e `lang/en`)
- Vite, disponível na estrutura do projeto

## Funcionalidades

- Página inicial com resumo profissional e chamada para experiências e contato.
- Páginas dedicadas para habilidades, experiências, sobre e contatos.
- Alternância de idioma entre português e inglês.
- Formulário de contato com envio por e-mail.
- Ação rápida para contato via WhatsApp.
- Layout responsivo para mobile, tablet e desktop.
- Metatags básicas de SEO e compartilhamento social.

## Instalação

Requisitos básicos:

- PHP 8.0.2 ou superior
- Composer
- Node.js e npm, caso queira usar o pipeline front-end

Passos:

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan storage:link
```

Para rodar localmente:

```bash
php artisan serve
```

Se for alterar assets gerenciados pelo Vite:

```bash
npm run dev
```

## Estrutura Principal

```text
app/
  Http/
    Controllers/ContactController.php
    Middleware/SetLocale.php
lang/
  en/messages.php
  pt_BR/messages.php
public/
  css/styles.css
  js/app.js
resources/
  views/
    includes/
    index.blade.php
    about.blade.php
    skills.blade.php
    experiences.blade.php
    contacts.blade.php
routes/
  web.php
storage/
  app/public/
```

## Internacionalização

Os textos do site ficam em:

- `lang/pt_BR/messages.php`
- `lang/en/messages.php`

As views utilizam `@lang('messages.chave')`, mantendo os textos traduzíveis e evitando conteúdo fixo diretamente no HTML/Blade.

## Imagens

O layout usa uma foto pessoal profissional por meio de `asset('storage/5.jpeg')`. Para que as imagens do diretório `storage/app/public` sejam servidas publicamente, execute:

```bash
php artisan storage:link
```

## Observações

Este projeto é focado em apresentação profissional. Mudanças visuais devem preservar a clareza do conteúdo, a responsividade e a estrutura de idiomas existente.
