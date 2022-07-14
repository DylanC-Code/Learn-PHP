<section class="relative w-4/5 h-full m-auto p-2 border-2 border-solid border-pink-400 rounded-xl">
  <!-- Header affichant le nombre de taches restante pour le jour -->
  <h1 class="text-center text-slate-50 my-2">
    <?= $tasks->numColumns() == 0 ? 'No task today' : $tasks->numColumns() . " tasks left" ?>
  </h1>

  <!-- Affichage des taches enregistrées -->
  <?php while ($task = $tasks->fetchArray(SQLITE3_ASSOC)) : ?>
    <article class='flex my-4'>
      <input type="checkbox" name="<?= $task['id'] ?>" class='mx-4' id='<?= $task['id'] ?>'>
      <label for='<?= $task['id'] ?>'>
        <h1 class='text-xl text-white'><?= $task['name'] ?></h1>
      </label>
      <figure class='ml-auto cursor-pointer'><img src="./src/client/assets/static/Cross.svg" alt="Cross for delete task"></figure>
    </article>
  <?php endwhile ?>

  <!-- Formulaire d'ajout de tache -->
  <?php if ($isopen) : ?>
    <form action="add-task" method="post" class="absolute top-[20vh] -left-[5vw] w-[90vw] h-[25vh] flex flex-col  justify-around items-center border-2 border-gray-400 bg-white rounded-xl">
      <h1 class="block"><?= isset($title) ? $title : 'Add new task' ?></h1>
      <p class='text-pink-400'><?= isset($error) ? $error : '' ?></p>
      <input type="text" name="task" value="<?= isset($_POST['task']) ? htmlentities($_POST['task']) : '' ?>" placeholder="ex: Manger des graines" class="block w-4/5 h-[35px] text-center border-2 border-black rounded">
      <button type="submit" class="border-2 border-pink-400 bg-pink-400 w-1/2 rounded-md py-2">Add task</button>
    </form>

  <?php else : ?>
    <a href="add-task" class="block bg-white p-1 px-4">Add new task +</a>

  <?php endif ?>
</section>