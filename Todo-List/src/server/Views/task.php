<section class="w-4/5 h-full m-auto p-2 border-2 border-solid border-black rounded-xl">
  <h1 class="text-center">
    <?= empty($tasks) ? 'No task today' : count($tasks) . " tasks left" ?>
  </h1>
</section>