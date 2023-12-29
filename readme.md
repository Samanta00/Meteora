# Meteora

**Descrição:** O projeto "Meteora" é um gerenciador de tarefas simples projetado para lembrar ações do dia a dia. Ele permite aos usuários organizar e acompanhar suas tarefas, facilitando o gerenciamento das atividades diárias.



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


###### DB_CONNECTION=pgsql
###### DB_HOST=snuffleupagus.db.elephantsql.com
###### DB_PORT=5432
###### DB_DATABASE=dllpzhjv
###### DB_USERNAME=dllpzhjv
###### DB_PASSWORD=gAiRTM_M_R_svn4kUOHesFkSLkIm1Izu

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

#### Filtro por Pendência
- **/api/task/pendency/{pendency}  [POST]**

## Nenhuma rota é privada então nenhuma solicita algum token


## Como acessar as rotas:
- **Para acessar a rota de visualizar todas as tasks você faz o seguinte pelo seu Postman ou Insomnia**
![image](https://github.com/Samanta00/Meteora/assets/80990432/4d4efdf8-ef69-4d7f-bff9-15c096d599e8)

- **Para acessar a rota Adicionar uma nova task você faz o seguinte pelo seu Postman ou Insomnia**
 ![image](https://github.com/Samanta00/Meteora/assets/80990432/5f02498c-4ffe-4acf-abd8-27d5104be622)

- **Para acessar a rota de visualizar uma tasks em específico você faz o seguinte pelo seu Postman ou Insomnia**
 ![image](https://github.com/Samanta00/Meteora/assets/80990432/a5d5e566-d0ca-4413-98dc-77d45199ebec)

- **Para acessar a rota de editar uma tasks em específico você faz o seguinte pelo seu Postman ou Insomnia**
 ![image](https://github.com/Samanta00/Meteora/assets/80990432/03849474-0cbc-48b7-b9cf-86994cb6db1e)

- **Para acessar a rota de Deletar uma tasks em específico você faz o seguinte pelo seu Postman ou Insomnia**
 ![image](https://github.com/Samanta00/Meteora/assets/80990432/ff4b08aa-f505-44cf-b5ce-01f89179aa20)

- **Para acessar a rota de Filtro por Lembrete uma tasks em específico você faz o seguinte pelo seu Postman ou Insomnia**
- #### Minha rota só tem uma task marcada como importante por isso ele está me retornando apenas 1 mas caos você adicione mais tarefas marcadas com esse status ele será exibido aqui
 ![image](https://github.com/Samanta00/Meteora/assets/80990432/4c2f2fef-f7f3-4a51-8ea6-5a003cf2b511)

- #### O mesmo ocorre para filtrar tasks por pendência, ele me retorna apenas as que foram concluídas
 ![image](https://github.com/Samanta00/Meteora/assets/80990432/dc8ec978-d80e-4719-bfbf-4a938e74f3f1)


## Você pode utilizar uma interface para fazer todas essas ações
### Após executar php artisan serve no terminal do seu projeto basta você abrir um navegador e passar na rota essa url: http://127.0.0.1:8000/

### Irá abrir uma interface da seguinte maneira: 
![image](https://github.com/Samanta00/Meteora/assets/80990432/634ee9a3-2e87-4f17-8e90-d766f78ede29)


### Aqui você pode executar todas as ações na interface informadas anteriormente nas rotas

![image](https://github.com/Samanta00/Meteora/assets/80990432/a3721002-9653-4d01-9600-2e25e79fa916)

### Para editar apenas clique em editar e logo em seguida vai surgir um formulário para que edite a informação
![image](https://github.com/Samanta00/Meteora/assets/80990432/1ec10cee-cef1-4304-9bbc-b778efb19d0c)

### Para excluir basta clicar no botão Remover

### Atenção
#### Todas as Rotas foram testadas utilizando testes unitários

##### Para Verificar no terminal digite: php artisan test
##### Você pode encontrar esse teste por esse local do projeto
![image](https://github.com/Samanta00/Meteora/assets/80990432/55d07857-5e13-44b6-9a31-1e8313003c23)















