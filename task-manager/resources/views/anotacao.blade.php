<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link rel="stylesheet" href="styles.css">
    <link href="/css/anotacao/index.css" rel="stylesheet">
    <link href="/css/formEditTasks/style.css" rel="stylesheet">
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
        <div>
            <h3>Tarefas Salvas</h3>
            <div class="filter-container">

                <form class="filter-form" id="filterByStatusForm">
                    <label for="filter-status">Filtrar por Status:</label>
                    <select id="filter-status">
                        <option value="">Selecionar Status</option>
                        <option value="atrasado">Atrasado</option>
                        <option value="lembrete">Lembrete</option>
                        <option value="comemoracao">Comemoração</option>
                        <option value="agendamento">Agendamento</option>
                        <option value="importante">Importante</option>
                    </select>
                    <button type="button" id="filterByStatusBtn" onclick="filtrarPorStatus()">Filtrar</button>
                </form>

                <form class="filter-form" id="filterByPendencyForm">
                    <label for="filter-pendency">Filtrar por Pendência:</label>
                    <select id="filter-pendency">
                        <option value="">Selecionar Pendência</option>
                        <option value="false">Pendente</option>
                        <option value="true">Concluído</option>
                    </select>
                    <button type="button" id="filterByPendencyBtn" onclick="filtrarPorPendencia()">Filtrar</button>
                </form>
            </div>



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
    <script src="/js/crud/visualizarList.js"></script>
    <script src="/js/crud/deletar.js"></script>
    <script src="/js/crud/edicao.js"></script>
    <script src="/js/crud/filtro.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('addTaskBtn').addEventListener('click', adicionarTarefas);
            document.getElementById('filterByStatusBtn').addEventListener('click', filtrarPorStatus);
            document.getElementById('filterByPendencyBtn').addEventListener('click', filtrarPorPendencia);
            fetchTasks();
        });
    </script>
</body>

</html>