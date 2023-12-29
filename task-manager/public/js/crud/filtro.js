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
            const tasks = await response.json();
            displayTasks(tasks);
            console.log(tasks);
        } else {
            console.error('Erro ao buscar as tarefas por status:', response.statusText);
        }
    } catch (error) {
        console.error('Erro ao buscar as tarefas por status:', error);
    }
}


