<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Tools\Session;

class HomeController extends Controller
{
  public function __construct($index = null)
  {
    $this->index = $index;
    $this->content['connect'] = Session::isConnect();
  }

  public function start()
  {

    $tasks = (new TaskModel(date("d F Y")))->getAll();
    $this->content = array_merge($this->content, ['isopen' => false, 'tasks' => $tasks]);

    $this->render('task', $this->content);
  }

  public function taskModal()
  {
    $tasks = (new TaskModel(date("d F Y")))->getAll();
    $this->content = array_merge($this->content, ['isopen' => true, 'tasks' => $tasks]);

    $this->render('task', $this->content);
  }

  public function addTask()
  {
    $tasks = (new TaskModel(date("d F Y")))->getAll();
    $task = $_POST['task'];
    $regex = "#^[\wÜ-ü\s'_-]{5,255}$#";

    $this->content['isopen'] = true;
    $this->content['tasks'] = $tasks;

    if (!preg_match($regex, $task)) :
      $this->content['error'] = 'The task must be bigger 5 and be lower 255 chars !';
      return  $this->render('task', $this->content);
    endif;

    $datas = (object)['task' => $task, 'id_user' => 1, 'date' => date("d F Y")];
    (new TaskModel())->addOne($datas);

    header('Location:add-again');
  }

  public function addAgain()
  {
    $tasks = (new TaskModel(date("d F Y")))->getAll();

    $this->content['title'] = 'The task has been add succesfully !';
    $this->content = array_merge($this->content, ['isopen' => true, 'tasks' => $tasks]);

    $this->render('task', $this->content);
  }
}
