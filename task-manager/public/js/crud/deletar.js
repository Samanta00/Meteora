        // Função para deletar uma tarefa
        async function deletarTarefa(taskId) {
            try {
                const response = await fetch(`http://127.0.0.1:8000/api/task/delete/${taskId}`, {
                    method: 'DELETE'
                });

                if (response.ok) {
                    location.reload();
                    console.log(`Tarefa com ID ${taskId} deletada com sucesso.`);
                    fetchTasks(); // Atualiza a lista após a remoção da tarefa
                } else {
                    console.error(`Erro ao deletar a tarefa com ID ${taskId}.`);
                }
            } catch (error) {
                console.error('Erro ao enviar a requisição:', error);
            }
        }