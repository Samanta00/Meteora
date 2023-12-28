<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="styles.css">
    <link href="/css/anotacao/index.css" rel="stylesheet">
</head>
<body>
    <div class="task-manager">
        <h1>Gerenciador de Tarefas</h1>
        
        <!-- Formulário para adicionar tarefa -->
        <form class="task-form">
            <label for="task-title">Título:</label>
            <input type="text" id="task-title" placeholder="Título da Tarefa">
            <label for="task-description">Descrição:</label>
            <textarea id="task-description" placeholder="Descrição da Tarefa"></textarea>
            <label for="task-completed">Tarefa Concluída:</label>
            <input type="checkbox" id="task-completed">
            <button type="submit" id="addTaskBtn">Adicionar Tarefa</button>
        </form>

        <!-- Botão para filtrar por ID -->


        <!-- Lista de tarefas existentes -->
        <div class="task-list" id="taskList">
        <h3>Tarefas Salvas</h3>
        <form class="task-id-form">
            <label for="task-id">Filtrar por ID:</label>
            <input type="text" id="filter-id" placeholder="ID da Tarefa">
            <button type="button" id="filterByIdBtn">Filtrar</button>
        </form>

        <div class="task-list" id="taskList"> 
                <div class="cart-item">
                    <div class="item-actions">
                        <button class="edit-button" >Editar</button>
                        <button class="remove-button">Remover</button>
                    </div>
                    <div class="task">
                        <h3>Título da Tarefa</h3>
                        <p>Descrição da Tarefa</p>
                        <span class="task-status">Pendente</span>
                    </div>
                </div>
          
        </div>

           
        </div>
    </div>

    <script src="../js/crud/adicionar.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('addTaskBtn').addEventListener('click', adicionarTarefas);
            document.getElementById('filterByIdBtn').addEventListener('click', filtrarPorId);
            fetchTasks();
        });

        // Função para adicionar tarefas
        async function adicionarTarefas(event) {
            event.preventDefault();
        
            const title = document.getElementById('task-title').value;
            const description = document.getElementById('task-description').value;
            const completed = document.getElementById('task-completed').checked;

            const data = {
                title: title,
                description: description,
                completed: completed
            };

            try {
                const response = await fetch('http://127.0.0.1:8000/api/task', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                });

                if (response.ok) {
                    console.log('Tarefa criada com sucesso!');
                    // Aqui você pode adicionar lógica para atualizar a interface
                } else {
                    console.error('Erro ao criar a tarefa.');
                }
            } catch (error) {
                console.error('Erro ao enviar a requisição:', error);
            }
        }

        

        // Função para buscar as tarefas da API
async function fetchTasks() {
    try {
        const response = await fetch('http://127.0.0.1:8000/api/task');
        if (response.ok) {
            const tasks = await response.json();
            displayTasks(tasks);
        } else {
            console.error('Erro ao buscar as tarefas:', response.statusText);
        }
    } catch (error) {
        console.error('Erro ao buscar as tarefas:', error);
    }
}

// Função para exibir as tarefas na lista
function displayTasks(tasks) {
    const taskList = document.getElementById('taskList');
    taskList.innerHTML = ''; // Limpa a lista antes de adicionar as tarefas

    tasks.forEach(task => {
        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');

        const itemActions = document.createElement('div');
        itemActions.classList.add('item-actions');

        const editBtn = document.createElement('button');
        editBtn.classList.add('edit-button');
        editBtn.textContent = 'Editar';
        editBtn.addEventListener('click', () => editarTarefa(task.id)); // Chama a função para editar a tarefa

        const removeBtn = document.createElement('button');
        removeBtn.classList.add('remove-button');
        removeBtn.textContent = 'Remover';
        removeBtn.addEventListener('click', () => deletarTarefa(task.id)); // Chama a função para remover a tarefa

        itemActions.appendChild(editBtn);
        itemActions.appendChild(removeBtn);

        const taskElement = document.createElement('div');
        taskElement.classList.add('task');

        const title = document.createElement('h3');
        title.textContent = task.title;

        const description = document.createElement('p');
        description.textContent = task.description;

        const status = document.createElement('span');
        status.classList.add('task-status');
        status.textContent = task.completed ? 'Concluída' : 'Pendente';

        taskElement.appendChild(title);
        taskElement.appendChild(description);
        taskElement.appendChild(status);

        cartItem.appendChild(itemActions);
        cartItem.appendChild(taskElement);

        taskList.appendChild(cartItem);
    });
}

   

        // Função para filtrar por ID
        async function filtrarPorId() {
            const id = document.getElementById('filter-id').value;
            if (id.trim() !== '') {
                try {
                    const response = await fetch(`http://127.0.0.1:8000/api/task/${id}`);
                    if (response.ok) {
                        const task = await response.json();
                        displayTasks([task]);
                    } else {
                        console.error('Erro ao buscar a tarefa por ID:', response.statusText);
                    }
                } catch (error) {
                    console.error('Erro ao buscar a tarefa por ID:', error);
                }
            } else {
                fetchTasks(); // Se o campo estiver vazio, mostra todas as tarefas
            }
        }

        // Função para editar a tarefa pelo ID
        function editarTarefa(id) {
            
            console.log(`Editar tarefa com ID ${id}`);
        }

        // Função para deletar a tarefa pelo ID
        function deletarTarefa(id) {
           
            console.log(`Deletar tarefa com ID ${id}`);
        }

        // Função para visualizar a tarefa pelo ID
        function visualizarPorId(id) {
           
            console.log(`Visualizar tarefa com ID ${id}`);
        }
    </script>
</body>
</html>
