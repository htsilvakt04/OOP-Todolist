<?php

namespace Todo;
use Todo\Storage\Contracts\TaskStorageInterface;
use Todo\Models\Task;
class TaskManager
{
    protected $storage;
    public function __construct(TaskStorageInterface $storage)
    {
      $this->storage = $storage;
    }
    public function addTask(Task $task)
    {
      return $this->storage->store($task);
    }
    public function deleteTask(Task $task)
    {

    }
    public function updateTask(Task $task)
    {
      return $this->storage->update($task);
    }
    public function getTask($id)
    {
      return $this->storage->get($id);
    }
    public function getTasks(Task $task)
    {
      return $this->storage->all();
    }
}
