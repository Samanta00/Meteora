# Meteora

**Descrição:** O projeto "Meteora" é um gerenciador de tarefas simples projetado para lembrar ações do dia a dia. Ele permite aos usuários organizar e acompanhar suas tarefas, facilitando o gerenciamento das atividades diárias.


## Link para abrir o projeto apenas com o frontend online pelo vercel: https://bonnars.vercel.app/



## Como foi desenvolvido?

### Frontend
- **PHP**
- **Blade**
- **Javascript**
- **CSS**
- Estrutura **MVC**

### Backend
- **PHP**
- **Laravel**
- **CRUD**
- **PostgreSQL**
- Estutura **MVC**

### Documentação
- **Boas Práticas do Git Bash para entender como o projeto foi desenvolvido(analise os commits)**
- **Comentário nos códigos sobre funcionalidades **

## Para baixar o Projeto clone o repositório
- **no terminal abra a pasta task-manager e dê um npm install**

## Para executar o projeto
- **no terminal abra a pasta task-manager e escreva: php artisan serve**


## Configuração ao banco de dados
- **Seu Projeto vai iniciar sem a execução do banco de dados então dentro da pasta task-manager crie um arquivo chamado .env**
- **Dentro dele configure o banco de dados ao seu gosto, esse projeto foi feito utilizando PostgreSQL então você pode utilizar algo semelhante ao meu exemplo:**


### DB_CONNECTION=pgsql
### DB_HOST=snuffleupagus.db.elephantsql.com
### DB_PORT=5432
### DB_DATABASE=dllpzhjv
### DB_USERNAME=dllpzhjv
### DB_PASSWORD=gAiRTM_M_R_svn4kUOHesFkSLkIm1Izu

- **No exemplo estou utilizando PostgreSQL em um Servidor online**
  

## Rotas de Acessos da API:

### Para acessesar a rota de Tasks
- **Localmente inicie com http://127.0.0.1:8000**
- **Após isso coloque um dos caminhos**
- **/api/task/  [GET]**
- **/api/task/  [POST]**
- **/api/task/update/{id} [PUT]**
- **/api/task/delete/{id}  [DELETE]**
- **/api/task/view/{id}  [GET]**


### Para acessesar a rota de Filtro
- **Localmente inicie com http://127.0.0.1:8000**
- **Após isso coloque um dos caminhos**

#### Filtro por Lembrete
- **/api/task/search/{lembrete}  [POST]**

#### Filtro por Lembrete
- **/api/task/pendency/{pendency}  [POST]**



