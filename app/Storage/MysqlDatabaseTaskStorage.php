<?php

namespace Todo\Storage;
use Todo\Storage\Contracts\TaskStorageInterface;
use Todo\Models\Task;
use PDO;
class MysqlDatabaseTaskStorage implements TaskStorageInterface
{
  protected $db;
  public function __construct(PDO $db)
  {
    $this->db = $db;
  }
  public function store(Task $task)
  {
    $statement= $this->db->prepare("
      INSERT INTO tasks (description, due, complete) VALUES (:description, :due, :complete);
    ");

    $statement->execute([
      "description" => $task->getDescription(),
      "due" => $task->getDue()->format("Y-m-d H:i:s"),
      "complete" => $task->getComplete()
    ]);
    return $this->db->LastInsertId();

  }
  public function update(Task $task)
  {
    $statement = $this->db->prepare("
      UPDATE tasks
      SET description = :description, due = :due, complete = :complete
      WHERE id = :id;
    ");
    $statement->execute([
      "description" => $task->getDescription(),
      "due" => $task->getDue()->format("Y-m-d H:i:s"),
      "complete" => $task->getComplete(),
      "id" => $task->getId()
    ]);
    return "Task was updated!";
  }
  public function get($id)
  {
    $statement = $this->db->prepare("
      SELECT id, description, due, complete
      FROM tasks
      WHERE id = :id
    ");
    $statement->setFetchMode(PDO::FETCH_CLASS, Task::class);
    $statement->execute([
      "id" => $id
    ]);
    return $statement->fetch();
  }
  public function all()
  {
      $statement = $this->db->prepare("
        SELECT id, description, due, complete
        FROM tasks
      ");
      $statement->setFetchMode(PDO::FETCH_CLASS, Task::class);
      $statement->execute();
      return $statement->fetchAll();
  }
}
