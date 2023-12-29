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


let filteredTasks = []; // Variável para armazenar os resultados filtrados

async function filtrarPorStatus() {
    try {
        const status = document.getElementById('filter-status').value;
        const bodyData = { status };

        const response = await fetch(`http://127.0.0.1:8000/api/task/search/${status}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(bodyData)
        });

        if (response.ok) {
            filteredTasks = await response.json();
            displayFilteredTasks(); // Mostra os resultados filtrados
        } else {
            console.error('Erro ao buscar as tarefas por status:', response.statusText);
        }
    } catch (error) {
        console.error('Erro ao buscar as tarefas por status:', error);
    }
}


async function filtrarPorPendencia(){
    try{
        const pendencia=document.getElementById('filter-pendency').value;
        const bodyData = { pendencia };
        const response = await fetch(`http://127.0.0.1:8000/api/tasks/pendency/${pendencia}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(bodyData)
        });
        if (response.ok) {
            filteredTasks = await response.json();
            displayFilteredTasks(); // Mostra os resultados filtrados
        } else {
            console.error('Erro ao buscar as tarefas por status:', response.statusText);
        }
   
        
    }
    catch (error) {
        console.error(error);
    }



}

function displayFilteredTasks() {
    const taskList = document.getElementById('taskList');
    taskList.innerHTML = ''; // Limpa o conteúdo atual

    filteredTasks.forEach(task => {
        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');

        const itemActions = document.createElement('div');
        itemActions.classList.add('item-actions');

        // ... Criação dos botões editar e remover

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


