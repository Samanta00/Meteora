function exibirFormularioEdicao(taskDetails) {
    const formEdicao = document.createElement('form');
    formEdicao.classList.add('edit-form');

    const createEl = (type, props = {}) => Object.assign(document.createElement(type), props);

    const appendEls = (parent, elements) => elements.forEach(element => parent.appendChild(element));

    const [titleInput, descriptionTextarea, completedCheckbox, submitBtn] = [
        createEl('input', { type: 'text', value: taskDetails.title }),
        createEl('textarea', { value: taskDetails.description }),
        createEl('input', { type: 'checkbox', checked: taskDetails.completed }),
        createEl('button', { textContent: 'Salvar' })
    ];

    appendEls(formEdicao, [titleInput, descriptionTextarea, completedCheckbox, submitBtn]);

    formEdicao.addEventListener('submit', async (event) => {
        event.preventDefault();
        const editedData = {
            title: titleInput.value,
            description: descriptionTextarea.value,
            completed: completedCheckbox.checked
        };

        try {
            const response = await fetch(`http://127.0.0.1:8000/api/task/update/${taskDetails.id}`, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(editedData)
            });

            if (response.ok) {
                location.reload();
                console.log(`Tarefa com ID ${taskDetails.id} atualizada com sucesso.`);
                fetchTasks();
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

function editarTarefa(id) {
    buscarDetalhesTarefa(id);
}

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
