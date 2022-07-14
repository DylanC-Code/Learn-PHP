<?php

$datas = $_POST;
$url = $_SERVER['QUERY_STRING'];
$url = isset(explode("=", $url)[1]) ? explode("=", $url)[1] : null;

if ($url == 'login') : ?>

  <form action="login" method="POST" class='flex flex-col items-center w-[80vw] h-[50vh] mx-auto py-4 px-14 bg-white rounded-xl'>
    <p class="my-4"><?= isset($error) ? $error : '' ?></p>
    <h1 class="text-xl underline mb-6">Connection Form</h1>

    <input type="text" name="pseudo" required placeholder="Pseudo" value="<?= isset($datas['pseudo']) ? htmlentities($datas['pseudo']) : '' ?>" class="w-full border-2 border-pink-400 rounded my-4 text-center py-1">
    <input type="password" name="password" required placeholder="Password" maxlength="255" class="w-full border-2 border-pink-400 rounded my-4 text-center py-1">

    <button type="submit" class="block w-1/3 h-[40px] my-4 bg-pink-400 border-2 rounded text-white text-lg">Login</button>
    <a href="register">No register ?</a>
  </form>

<?php else : ?>

  <form action="register" method="POST" class='flex flex-col items-center w-[80vw] h-[50vh] mx-auto py-4 px-14 bg-white rounded-xl'>
    <p class="mb-4"><?= isset($error) ? $error : '' ?></p>
    <h1 class="text-xl underline mb-6">Register Form</h1>

    <input type="text" name="pseudo" required placeholder="Pseudo" value="<?= isset($datas['pseudo']) ? htmlentities($datas['pseudo']) : '' ?>" class="w-full border-2 border-pink-400 rounded my-4 text-center py-1">
    <input type="password" name="password" required placeholder="Password" maxlength="255" class="w-full border-2 border-pink-400 rounded my-4 text-center py-1">
    <input type="password" name="verif" required placeholder="Same password" maxlength="255" class="w-full border-2 border-pink-400 rounded my-4 text-center py-1">

    <button type="submit" class="block w-1/3 h-[40px] my-4 bg-pink-400 border-2 rounded text-white text-lg">Login</button>
    <a href="login">All ready an account ?</a>
  </form>

<?php endif;
