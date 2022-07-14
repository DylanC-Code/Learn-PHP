<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends Controller
{
  protected $datas;
  public function __construct()
  {
    $this->datas = $_POST;
  }

  public function loginForm()
  {
    $this->render('user');
  }

  public function login()
  {
    $inputs = $this->checkInput();

    if (!$inputs) return;

    $this->render('user', $this->content);
  }

  public function registerForm()
  {

    $this->render('user');
  }

  public function register()
  {
    $inputs = $this->checkInput();

    if (!$inputs) return;

    $user = (new UserModel())->register($this->datas);

    if (!$user) {
      $this->content['error'] = 'This username already exist';
      return $this->render('user', $this->content);
    };

    header('Location:succes');
  }

  private function checkInput(): bool
  {
    if (!preg_match("#^[\w_-]{5,50}$#", $this->datas['pseudo'])) :
      $this->content['error'] = 'The pseudo can\'t contain special characs and will be bigger 5 characs!';
      $this->render('user', $this->content);
    elseif (!preg_match("#^.{0,255}$#", $this->datas['password'])) :
      $this->content['error'] = 'The password can be bigger than 8 and lower than 255!';
      $this->render('user', $this->content);
    elseif (!isset($this->datas['verif']) || $this->datas['verif'] !== $this->datas['password']) :
      $this->content['error'] = 'Passwords isn\'t same!';
      $this->render('user', $this->content);
    else : return true;
    endif;
  }

  public function succes()
  {
    $succes = $_SERVER["HTTP_REFERER"];
    $succes = explode('/', $succes);
    $succes = end($succes);

    if ($succes == 'register') $this->content['succes'] = 'You are succesfully registered';

    $this->render('succes', $this->content);
  }
}
