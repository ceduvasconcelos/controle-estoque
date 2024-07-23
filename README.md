## Instalação

Este projeto requer PHP 8.0 ou superior instalado e configurado em seu ambiente de desenvolvimento.

Também é necessário ter o MySQL já instalado e em execução. Certifique-se de que o MySQL esteja configurado corretamente e que você tenha criado um banco de dados para este projeto.

### Baixar o projeto

Você pode clona-lo ou baixá-lo através do GitHub.

`git clone https://github.com/ceduvasconcelos/alucom-test.git`

### Conectar ao banco de dados (MySQL) 

Altere as variáveis de ambiente em `config/database.php` de acordo com o seu banco de dados.

Utilize os scripts SQL, disponíveis em `database/`, para criar as tabelas.

### Inicializar o servidor integrado PHP

Inicie o servidor integrado do PHP para testar a aplicação.

Para isso, na pasta raiz do projeto, digite:

`php -S localhost:8000 -t public/`

E seja feliz!!!
