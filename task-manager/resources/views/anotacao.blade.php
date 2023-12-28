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
            <label for="task-status">Status da Tarefa:</label>
            <select id="task-status">
                <option value="atrasado">Atrasado</option>
                <option value="lembrete">Lembrete</option>
                <option value="comemoracao">Comemoração</option>
                <option value="agendamento">Agendamento</option>
                <option value="importante">Importante</option>
            </select>

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
                        <button class="edit-button">Editar</button>
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

    @yield('constent')
    <script src="/js/crud/adicionar.js"></script>
    @yield('constent')
    <script src="/js/crud/visualizarList.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('addTaskBtn').addEventListener('click', adicionarTarefas);
            document.getElementById('filterByIdBtn').addEventListener('click', filtrarPorId);
            fetchTasks();
        });




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

        // Função para deletar uma tarefa
        async function deletarTarefa(taskId) {
            try {
                const response = await fetch(`http://127.0.0.1:8000/api/task/delete/${taskId}`, {
                    method: 'DELETE'
                });

                if (response.ok) {
                    console.log(`Tarefa com ID ${taskId} deletada com sucesso.`);
                    fetchTasks(); // Atualiza a lista após a remoção da tarefa
                } else {
                    console.error(`Erro ao deletar a tarefa com ID ${taskId}.`);
                }
            } catch (error) {
                console.error('Erro ao enviar a requisição:', error);
            }
        }

        // Função para buscar os detalhes de uma tarefa por ID
        async function buscarDetalhesTarefa(taskId) {
            try {
                const response = await fetch(`http://127.0.0.1:8000/api/task/view/${taskId}`);
                if (response.ok) {
                    const taskDetails = await response.json();
                    exibirFormularioEdicao(taskDetails);
                } else {
                    console.error(`Erro ao buscar os detalhes da tarefa com ID ${taskId}.`);
                }
            } catch (error) {
                console.error('Erro ao buscar os detalhes da tarefa:', error);
            }
        }

        // Função para exibir um formulário com os detalhes da tarefa para edição
        function exibirFormularioEdicao(taskDetails) {
            const formEdicao = document.createElement('form');
            formEdicao.classList.add('edit-form');

            const titleInput = document.createElement('input');
            titleInput.setAttribute('type', 'text');
            titleInput.setAttribute('value', taskDetails.title);

            const descriptionTextarea = document.createElement('textarea');
            descriptionTextarea.textContent = taskDetails.description;

            const completedCheckbox = document.createElement('input');
            completedCheckbox.setAttribute('type', 'checkbox');
            completedCheckbox.checked = taskDetails.completed;

            const submitBtn = document.createElement('button');
            submitBtn.textContent = 'Salvar';

            formEdicao.append(titleInput, descriptionTextarea, completedCheckbox, submitBtn);

            // Adicionar lógica para submeter os dados atualizados para a API
            formEdicao.addEventListener('submit', async (event) => {
                event.preventDefault();

                // Obter os novos valores do formulário de edição
                const editedData = {
                    title: titleInput.value,
                    description: descriptionTextarea.value,
                    completed: completedCheckbox.checked
                };

                try {
                    const response = await fetch(`http://127.0.0.1:8000/api/task/update/${taskDetails.id}`, {
                        method: 'PUT',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(editedData)
                    });

                    if (response.ok) {
                        console.log(`Tarefa com ID ${taskDetails.id} atualizada com sucesso.`);
                        fetchTasks(); // Atualiza a lista após a edição da tarefa
                    } else {
                        console.error(`Erro ao atualizar a tarefa com ID ${taskDetails.id}.`);
                    }
                } catch (error) {
                    console.error('Erro ao enviar a requisição:', error);
                }
            });

            const taskListContainer = document.getElementById('taskList');
            taskListContainer.innerHTML = '';
            taskListContainer.appendChild(formEdicao);
        }

        // ... (restante do código)

        // Função para editar a tarefa pelo ID
        function editarTarefa(id) {
            buscarDetalhesTarefa(id);
        }
    </script>
</body>

</html>