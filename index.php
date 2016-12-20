<?php
use Todo\Models\Task;
require("vendor/autoload.php");

try{
  $db = new PDO("mysql:host=localhost;dbname=test", "root", "");
} catch (Exception $e) {
  die("Couldn't connect to the database". $e->getMessage());
}

$task = $db->prepare("SELECT * FROM tasks");
$task->setFetchMode(PDO::FETCH_CLASS, Task::class);
$task->execute();
$results = $task->fetchAll();
