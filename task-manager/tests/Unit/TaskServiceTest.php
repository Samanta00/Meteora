<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Models\Task;
use App\Services\TaskService;
use Mockery;


class TaskServiceTest extends TestCase
{
    public function test_store_task(): void
    {
        // Criando um mock para a classe TaskService
        $taskServiceMock = $this->getMockBuilder(TaskService::class)
                                ->disableOriginalConstructor()
                                ->getMock();

        // Configurando o mock para retornar uma instância de Task
        $taskServiceMock->method('store')
                        ->willReturn(new Task(['title' => 'Nova Tarefa', 'description' => 'Descrição da nova tarefa']));

        // Chama o método store do TaskService (simulado)
        $storedTask = $taskServiceMock->store(['title' => 'Nova Tarefa', 'description' => 'Descrição da nova tarefa']);

        // Verifica se o método store retornou uma instância de Task
        $this->assertInstanceOf(Task::class, $storedTask);
    }

    public function test_getList_tasks(): void
    {
        // Criando um mock para a classe Task
        $taskMock = Mockery::mock(Task::class);

        // Simulando o retorno do método all
        $taskMock->shouldReceive('all')->andReturn([
            new Task(['title' => 'Tarefa 1', 'description' => 'Descrição da Tarefa 1']),
            new Task(['title' => 'Tarefa 2', 'description' => 'Descrição da Tarefa 2']),
          
        ]);

        $taskService = new TaskService($taskMock);
        $tasks = $taskService->getList();
        $this->assertIsArray($tasks);

        foreach ($tasks as $task) {
            $this->assertInstanceOf(Task::class, $task);
        }
    }

    public function test_get_task_by_id(): void
    {
      
        $taskMock = Mockery::mock(Task::class);
        $taskMock->shouldReceive('findOrFail')
                 ->with(1) 
                 ->andReturn(new Task(['title' => 'Tarefa 1', 'description' => 'Descrição da Tarefa 1']));


        $taskService = new TaskService($taskMock);

        $task = $taskService->get(1); 

        $this->assertInstanceOf(Task::class, $task);
    }

    public function test_update_task(): void
    {
        
        $taskMock = Mockery::mock(Task::class);

        $taskMock->shouldReceive('findOrFail')
                 ->with(1) 
                 ->andReturn(new Task(['title' => 'Tarefa 1', 'description' => 'Descrição da Tarefa 1']));

     
        $taskMock->shouldReceive('where->update')
                 ->with(['title' => 'Título Atualizado']) 
                 ->once(); 

      
        $taskService = new TaskService($taskMock);

        $updatedTask = $taskService->update(['title' => 'Título Atualizado'], 1); 
        $this->assertInstanceOf(Task::class, $updatedTask);
    }

    public function test_destroy_task_exists(): void
{
    // Criando um mock para a classe Task
    $taskMock = Mockery::mock(Task::class);
    
    // Configurando o mock para retornar uma instância de Task (simulando existência)
    $taskMock->shouldReceive('find')
             ->with(1) // Supondo que o ID 1 exista
             ->andReturn(new Task(['title' => 'Tarefa 1', 'description' => 'Descrição da Tarefa 1']));
    
    // Configurando o mock para o método delete
    $taskMock->shouldReceive('delete')
             ->with(1) // Verificando se o método delete é chamado com o ID correto
             ->once()  // Garante que o método delete seja chamado apenas uma vez
             ->andReturn(true); // Simulando o sucesso da exclusão
    
    // Criando uma instância do serviço e passando o mock do repositório
    $taskService = new TaskService($taskMock);
    
    // Chamando o método destroy do serviço com o ID específico
    $result = $taskService->destroy(1); // Supondo o ID 1 para este exemplo
    
    // Verificando se a mensagem de retorno é "Deletado com sucesso"
    $this->assertEquals("Deletado com sucesso", $result);
}


    


    
 
    
}


