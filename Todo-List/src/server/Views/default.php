<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/Todo-List/src/client/assets/css/output.css">
  <title>To-do List</title>
</head>

<body class="bg-zinc-900">
  <header class="h-[10vh] flex justify-between p-4">
    <nav>
      <ul>
        <li class="text-slate-50">Home</li>
      </ul>
    </nav>

    <h1 class="text-slate-50"><?= $day ?? date("d F Y"); ?></h1>

    <a href="">
      <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M5 38V14H43V38C43 40.2 41.2 42 39 42H9C6.8 42 5 40.2 5 38Z" fill="#CFD8DC" />
        <path d="M43 10V16H5V10C5 7.8 6.8 6 9 6H39C41.2 6 43 7.8 43 10Z" fill="#F44336" />
        <path d="M33 13C34.6569 13 36 11.6569 36 10C36 8.34315 34.6569 7 33 7C31.3431 7 30 8.34315 30 10C30 11.6569 31.3431 13 33 13Z" fill="#B71C1C" />
        <path d="M15 13C16.6569 13 18 11.6569 18 10C18 8.34315 16.6569 7 15 7C13.3431 7 12 8.34315 12 10C12 11.6569 13.3431 13 15 13Z" fill="#B71C1C" />
        <path d="M33 3C31.9 3 31 3.9 31 5V10C31 11.1 31.9 12 33 12C34.1 12 35 11.1 35 10V5C35 3.9 34.1 3 33 3ZM15 3C13.9 3 13 3.9 13 5V10C13 11.1 13.9 12 15 12C16.1 12 17 11.1 17 10V5C17 3.9 16.1 3 15 3Z" fill="#B0BEC5" />
        <path d="M13 20H17V24H13V20ZM19 20H23V24H19V20ZM25 20H29V24H25V20ZM31 20H35V24H31V20ZM13 26H17V30H13V26ZM19 26H23V30H19V26ZM25 26H29V30H25V26ZM31 26H35V30H31V26ZM13 32H17V36H13V32ZM19 32H23V36H19V32ZM25 32H29V36H25V32ZM31 32H35V36H31V32Z" fill="#90A4AE" />
      </svg>
    </a>
  </header>

  <main class="h-[80vh]">
    <?= $content ?>
  </main>

  <footer class="h-[10vh] flex justify-center">
    <p class="self-end pb-3 text-slate-50">©Propulsed by AnthoL-Code</p>
  </footer>
</body>

</html>