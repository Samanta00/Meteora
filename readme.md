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
- **no terminal abra a pasta do frontend e dê um npm install**
- **no terminal abre a pasta do backend e dê um npm install**

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



