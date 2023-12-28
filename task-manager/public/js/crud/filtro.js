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


async function filtrarPorTitulo(){
    
}