<?php

if (!isset($_SESSION['auth'])) {
    header('Location: /login');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="icon" href="/favicon.png">
        <title>COSC 4806</title>
        <meta charset="UTF-8">
        <meta name="viewport" 
        content="width=device-width">
    </head>
    <body class="d-flex flex-column min-vh-100">

      <div style="background-color: #4d2320;" class="text-white py-2 w-100 text-start px-3">
        <p class="mb-0 fs-5">Make &amp; Keep Track of your reminders!</p>
          </div>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #7a3f3b;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link fs-5 px-3 active" aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-5 px-3" href="/reminders">Reminders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-5 px-3" href="/reminders/create">Create Reminders</a>
        </li>

        <?php if (isset($_SESSION['username']) && $_SESSION['username'] === 'admin') :?>
        <li class="nav-item">
          <a class="nav-link fs-5 px-3" href="/reports">Reports</a>
        </li>
        <?php endif; ?>
        </ul>
      <span class="navbar-text ms-auto fs-5 me-2">
        <a href="/logout" class="text-white text-decoration-none">Logout</a>
      </span>
    </div>
  </div>
</nav>