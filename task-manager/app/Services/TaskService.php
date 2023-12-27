<?php
namespace App\Services;
use App\Models\Models\Task;


class TaskService{
private $repo;
public function __construct(Task $model){
    return $this->repo=$model;
}

public function store(array $data){
    return $this->repo->store($data);
}

public function getList(){
    return $this->repo->all(); // ou Task::all();
}
public function get(array $id){
    return $this->repo->get($id);
}
public function update(array $data, $id){
    return $this->repo->update($data, $id);
}
public function destroy($id){
    return $this->repo->destroy($id);
}

}

?>