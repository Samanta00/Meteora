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
        
        <!-- Lista de tarefas existentes -->
        <div class="task-list">
            <!-- Tarefa individual -->
            <div class="task">
                <h3>Título da Tarefa</h3>
                <p>Descrição da Tarefa</p>
                <span class="task-status">Pendente</span>
                <div class="task-actions">
                    <button class="edit-btn">Editar</button>
                    <button class="view-btn">Visualizar</button>
                    <button class="delete-btn">Excluir</button>
                </div>
            </div>
            <!-- Outras tarefas aqui -->
        </div>
        
        <!-- Formulário para visualizar/editar por ID -->
        <form class="task-id-form">
            <label for="task-id">ID da Tarefa:</label>
            <input type="text" id="task-id" placeholder="ID da Tarefa">
            <button type="submit">Visualizar/Edita por ID</button>
        </form>
    </div>

    <script src="../js/crud/adicionar.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('addTaskBtn').addEventListener('click', adicionarTarefas);
        });

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
    </script>
</body>
</html>
