<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Tools\Session;

class TaskController extends Controller
{
  private $date;
  public function __construct($index = null, $date = null)
  {
    $this->index = $index;
    $this->content['connect'] = Session::isConnect();
    $this->date = $date;

    if (!$this->date) $this->date = date("d F Y");
  }

  public function display()
  {
    $tasks = (new TaskModel($this->date))->getAll();
    $this->content = array_merge($this->content, ['isopen' => false, 'tasks' => $tasks]);

    $this->render('task', $this->content);
  }

  public function addModal()
  {
    $tasks = (new TaskModel($this->date))->getAll();
    $this->content = array_merge($this->content, ['isopen' => true, 'tasks' => $tasks]);

    $this->render('task', $this->content);
  }

  public function add()
  {
    $tasks = (new TaskModel($this->date))->getAll();
    $task = $_POST['task'];
    $regex = "#^[\wÜ-ü\s'_-]{5,255}$#";

    $this->content['isopen'] = true;
    $this->content['tasks'] = $tasks;

    if (!preg_match($regex, $task)) :
      $this->content['error'] = 'The task must be bigger 5 and be lower 255 chars !';
      return  $this->render('task', $this->content);
    endif;

    var_dump("okkkka");
    $datas = (object)['task' => $task, 'id_user' => 1, 'date' => $this->date];
    (new TaskModel())->addOne($datas);

    header('Location:add-again');
  }

  public function addAgain()
  {
    $tasks = (new TaskModel($this->date))->getAll();

    $this->content['title'] = 'The task has been add succesfully !';
    $this->content = array_merge($this->content, ['isopen' => true, 'tasks' => $tasks]);

    $this->render('task', $this->content);
  }

  public function deleteModal()
  {
  }
}
