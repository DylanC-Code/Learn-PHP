<?php

namespace App\Controllers;

use App\Models\TaskModel;

class HomeController extends Controller
{
  public function __construct($index)
  {
    $this->index = $index;
  }

  public function start()
  {
    $tasks = (new TaskModel(date("d F Y")))->getAll();

    $this->render('Task/task', ['isopen' => false, 'tasks' => $tasks]);
  }

  public function taskModal()
  {
    $this->render('Task/task', ['isopen' => true]);
  }

  public function addTask()
  {
    $task = $_POST['task'];
    $regex = "#^[\wÜ-ü\s'_-]{5,255}$#";
    $content = ['isopen' => true];

    if (!preg_match($regex, $task)) :
      $content['error'] = 'The task must be bigger 5 and be lower 255 chars !';
      return  $this->render('Task/task', $content);
    endif;

    $datas = (object)['task' => $task, 'id_user' => 1, 'date' => date("d F Y")];
    (new TaskModel())->addOne($datas);
    header('Location:add-again');
  }

  public function addAgain()
  {
    $this->render('Task/task', ['isopen' => true, 'title' => 'The task has been add succesfully !']);
  }
}
