<?php

namespace App\Services;

use App\Models\Models\Task;

// aqui se faz a lógica para os valores vindos do banco de dados

class TaskService
{
    private $repo;

    public function __construct(Task $model)
    {
        $this->repo = $model;
    }

    public function store(array $data)
    {
        return $this->repo->create($data);
    }


    public function getList()
    {
        return $this->repo->all(); // ou Task::all();
    }

    public function get($id)
    {
        return $this->repo->findOrFail($id);
    }

    public function update(array $data, $id)
    {
        $this->repo->where('id', $id)->update($data);
        return $this->repo->findOrFail($id);
    }

    public function destroy($id)
    {
        $task = $this->repo->find($id);

        if ($task) {
            $task->delete(); // Usar o método delete() no modelo
            return "Deletado com sucesso";
        }

        return "Item não encontrado para deletar";
    }

    public function filterByLembrete($lembrete)
    {
        return $this->repo->where('status', $lembrete)->get();
    }
    
}
