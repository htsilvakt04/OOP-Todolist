<?php
use Todo\Models\Task;
use Todo\Storage\MysqlDatabaseTaskStorage;
use Todo\TaskManager;
require("vendor/autoload.php");

$db = new PDO("mysql:host=localhost;dbname=test", "root", "");
$storage = new MysqlDatabaseTaskStorage($db);
$manager = new TaskManager($storage);

$task = $storage->get(2);

$task->setDescription("I must watch hot movie")->setDue(new DateTime("+ 90 minutes"));

var_dump($manager->updateTask($task));
