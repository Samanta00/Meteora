function exibirFormularioEdicao(taskDetails) {
        //cria um formulário
        const formEdicao = document.createElement('form');
        formEdicao.classList.add('edit-form');
    
        // Função para criar elementos HTML com propriedades
        const createEl = (type, props = {}) => Object.assign(document.createElement(type), props);
    
        // Função para anexar elementos a um elemento pai
        const appendEls = (parent, elements) => elements.forEach(element => parent.appendChild(element));
    
        // Criação de campos do formulário usando destructuring
        const [titleInput, descriptionTextarea, statusSelect, completedCheckbox, submitBtn] = [
            createEl('input', { type: 'text', value: taskDetails.title }),
            createEl('textarea', { 
                value: taskDetails.description,
                style: 'resize: none' 
            }),
            createEl('select', {}),
            createEl('input', { type: 'checkbox', checked: taskDetails.completed }),
            createEl('button', { textContent: 'Salvar' })
        ];
        
        //lista com todas opções de lembrete do formulário
        const statusOptions = ['Selecione o Status', 'Atrasado', 'Lembrete', 'Comemoração', 'Agendamento', 'Importante'];
     
        //para cada valor percorrido na lista vai ser atribuido um elemento option
        statusOptions.forEach(option => {
            const opt = createEl('option', { value: option.toLowerCase(), textContent: option });
            statusSelect.appendChild(opt);
        });
    
        //lista de todos os titulos para os campos
        const labels = ['Título:', 'Descrição:', 'Status:', 'Tarefa Concluída:'];

        //lista com os objetos referentes aos inputs
        const elementsInput = [titleInput, descriptionTextarea, statusSelect, completedCheckbox];

        //laço para atribuir titulo para cada indice percorrido no objeto
        labels.forEach((tituloLabel, indice)=>{
            const label=createEl('label',{htmlFor:`edit-${elementsInput[indice].id}`, textContent: tituloLabel })
            appendEls(formEdicao, [label, elementsInput[indice]]);
        })

        appendEls(formEdicao, [submitBtn]);


    //adicionando todos os valores em um objeto só
    formEdicao.addEventListener('submit', async (event) => {
        event.preventDefault();
        const editedData = {
            title: titleInput.value,
            description: descriptionTextarea.value,
            status:statusSelect.value,
            completed: completedCheckbox.checked
            
        };

        //enviando todos os resultados para a api
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
