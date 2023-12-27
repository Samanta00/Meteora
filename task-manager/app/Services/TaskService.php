<?php
namespace App\Services;
use App\Models\Models\Task;


class TaskService{
private $repo;
public function __construct(Task $model){
    return $this->repo=$model;
}

public function store(array $data)
{
    
    return $this->repo->create($data);
}


public function getList(){
    return $this->repo->all(); // ou Task::all();
}

public function get($id) {
    return $this->repo->findOrFail($id);
}

public function update(array $data, $id){
    return $this->repo->update($data, $id);
}
public function destroy($id){
    return $this->repo->destroy($id);
}

}

?>