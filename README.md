## uCRM-Assistencia
Software para gerenciamento de ordens de serviço para uma assistência técnica de smartphones.

## Features
- PHP (Laravel)
- MySQL
- Javascript

## Getting started
1. Clonar repositório: https://github.com/alvesrafa/uCRM-Assistencia.git dentro do repositório do servidor Apache 
&nbsp;&nbsp;&nbsp;&nbsp;1.1. Exemplo, caso utilize o XAMPP:  C:\xampp\htdocs\uCRM-Assistencia 
2. Renomear arquivo .env.example para .env 
3. Criar um novo banco de dados chamado 'assistencia' 
4. Abrir o terminal de comandos (de sua escolha) no diretorio da aplicação. 
&nbsp;&nbsp;&nbsp;&nbsp;Executar: <br>
&nbsp;&nbsp;&nbsp;&nbsp;4.1. 'compser update' <br>
&nbsp;&nbsp;&nbsp;&nbsp;4.2. php artisan key:generate <br>
&nbsp;&nbsp;&nbsp;&nbsp;4.3. php artisan migrate --seed <br>
5. Acessar: http://localhost/uCRM-Assistencia/public 
