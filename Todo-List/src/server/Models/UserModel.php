<?php

namespace App\Models;

use App\Database\MyDB;

class UserModel
{
  private $db;
  public function __construct()
  {
    $this->db = new MyDB();
  }

  /**
   * Control if the user already exist in database, if isn't create it
   *
   * @param  array $datas
   * @return bool
   */
  public function register(array $datas): bool
  {
    $user = $this->login($datas);

    if ($user) return false;

    $req = $this->db->prepare("INSERT INTO users (username,password) VALUES(:pseudo,:password)");
    $req->bindParam(':pseudo', $datas['pseudo']);
    $req->bindParam(':password', $datas['password']);
    $req = $req->execute();

    return true;
  }

  /**
   * Play single request fot get user if exist
   *
   * @param  array $datas
   * @return mixed
   */
  public function login(array $datas)
  {
    $req = "SELECT * FROM users WHERE username='$datas[pseudo]'";
    $req = $this->db->querySingle($req, true);

    if (!$req) return false;
    if ($datas['password'] == $req['password']) return $req['id'];
  }
}
