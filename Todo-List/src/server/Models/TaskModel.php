<?php

namespace App\Models;

use App\Database\MyDB;

class TaskModel extends Model
{
  public function __construct($id = null)
  {
    $this->id = $id;
    $this->db = new MyDB();
  }

  public function addOne(object $datas)
  {
    $req = $this->db->prepare("INSERT INTO tasks (name, date, id_user) VALUES (:name,:date,:id_user)");
    $req->bindParam(':name', $datas->task);
    $req->bindParam(':date', $datas->date);
    $req->bindParam(':id_user', $datas->id_user);
    $req->execute();
  }

  public function getAll()
  {
  }
}
