<?php
use Todo\Models\Task;
require("vendor/autoload.php");


$task = new Task;
$task->setDescription("Finish this course");
$task->setDue(new DateTime("+2 day",new DateTimeZone('Asia/Ho_Chi_Minh')));

var_dump($task);
