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
