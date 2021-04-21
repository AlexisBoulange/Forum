<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= CSS_PATH ?>style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Forum</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-md navbar-dark static-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="<?= IMG_PATH ?>logo.png" class="d-inline-block align-top logo" alt="Trollface">
    Forum Mêmes </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="?ctrl=category&method=categorieslist"> CATEGORIES </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?ctrl=topic&method=topicslist"> TOPICS </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?ctrl=message&method=messageslist"> MESSAGES </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?ctrl=user&method=userslist"> USERS </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?ctrl=user&method"> LOGIN </a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    </header>
    <div class="container">
        <main>
            <div id="page">
                <?= $page ?>
            </div>
        </main>
    </div>
    <footer class="footer mt-auto py-3 bg-dark fixed-bottom text-center">
        <div class="container">
            <span class="text-muted">&copy;2021 - Alexis BOULANGÉ - DL COLMAR</span>
        </div>
    </footer>
</body>
</html>