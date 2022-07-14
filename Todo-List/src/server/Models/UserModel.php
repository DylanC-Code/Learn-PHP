<?php

namespace App\Models;

use App\Database\MyDB;

class UserModel
{
  private $db;
  private $id;
  public function __construct(int $id = null)
  {
    $this->db = new MyDB;
    $this->id = $id;
  }

  public function register($datas)
  {
    $user = $this->login($datas);

    if ($user->fetchArray() !== false) return false;

    $req = $this->db->prepare("INSERT INTO users (username,password) VALUES(:pseudo,:password)");
    $req->bindParam(':pseudo', $datas['pseudo']);
    $req->bindParam(':password', $datas['password']);
    $req = $req->execute();

    return true;
  }

  public function login($datas)
  {
    $req = $this->db->prepare("SELECT * FROM users WHERE username=:pseudo");
    $req->bindParam(':pseudo', $datas['pseudo']);
    $datas = $req->execute();

    return $datas;
  }
}
