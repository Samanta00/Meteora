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

 
    
}


