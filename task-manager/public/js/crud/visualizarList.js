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
                title.textContent = `Título: ${task.title}`;
        
                const description = document.createElement('p');
                description.textContent = `Descrição: ${task.description}`;
        
                const status = document.createElement('div');
                status.classList.add('status');
                status.innerHTML = `Status:${task.status}`; // Altere para a propriedade correta que contém o status da tarefa
        
                const completion = document.createElement('div');
                completion.classList.add('completion');
                completion.innerHTML = `<span>${task.completed ? 'Concluída' : 'Pendente'}</span>`;
        
                taskElement.appendChild(title);
                taskElement.appendChild(description);
                taskElement.appendChild(status);
                taskElement.appendChild(completion);
        
                cartItem.appendChild(itemActions);
                cartItem.appendChild(taskElement);
        
                taskList.appendChild(cartItem);
            });
        }
        