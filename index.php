<?php
use Todo\Models\Task;
use Todo\Storage\MysqlDatabaseTaskStorage;
require("vendor/autoload.php");

$db = new PDO("mysql:host=localhost;dbname=test", "root", "");

$storage = new MysqlDatabaseTaskStorage($db);

$task = $storage->get(2);

$task->setDescription("drink more more coffee")->setDue(new DateTime("+2 years"))->setComplete();

echo $storage->update($task);
