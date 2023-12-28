<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Task;
use App\Services\TaskService;

// aqui se faz as lógicas para as requisições

class TaskController {
    private $taskService;

    public function __construct(TaskService $taskService) {
        $this->taskService = $taskService;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        return $this->taskService->store($data);
    }

    public function getList() {
        
        return $this->taskService->getList();
    }

    public function get($id) {
        return $this->taskService->get($id);
    }

    public function update(Request $request, $id) {
        $data = $request->all();
        return $this->taskService->update($data, $id);
    }

    public function destroy($id) {
      
        return $this->taskService->destroy($id);
 
     }

     public function filterByLembrete(Request $request)
     {
         $status = $request->input('status');
         $tasks = $this->taskService->filterByLembrete($status);

     
         return response()->json($tasks);
     }

     public function filterBySituacao(Request $request){
        $situacao= $request->input('completed');
        $tasks=$this->taskService->filterBySituacao($situacao);

        return response()->json($tasks);
     }
     
     
     
}