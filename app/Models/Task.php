<?php
// Using this Model to....
namespace Todo\Models;
use DateTime;
class Task
{
  protected $id;
  protected $description;
  protected $due;
  protected $complete = false;
  public function __construct()
  {
    echo "Yolo, you're accessing the Task class";
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setComplete($complete = true)
  {
    $this->complete = $complete;
  }
  public function getComplete()
  {
    return (bool)$this->complete;
  }
  public function setDue(DateTime $due)
  {
    $this->due = $due;
  }
  public function getDue()
  {
    if(!$this->due instanceof DateTime) {
      return new DateTime($this->due);
    }
    return $this->due;
  }
  public function getId()
  {
    return $this->id;
  }
}
