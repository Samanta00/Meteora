<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Task;
use App\Services\TaskService;

class TaskController {
    private $taskService;

    public function __construct(TaskService $taskService) {
        $this->taskService = $taskService;
    }

    public function store(array $data) {

        return $this->taskService->store($data);

    }

    public function getList() {
        
        return $this->taskService->getList();
    }

    public function get(array $id) {
    
        return $this->taskService->get($id);
    }

    public function update($request, $id) {
        $data = $request->all();
        return $this->taskService->update($data, $id);

    }
}