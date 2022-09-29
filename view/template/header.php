<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Hotel</title>
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css">
    <!-- BOOTSTRAP 5: css/js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="assets/css/style.min.css">

    <!-- DELETE THIS IN PRODUCTION AND MAKE A MINIFIED FILE OF ALL OF THEM -->
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/inicio.css">
</head>

<body>
    <div class="page">

        <header>
            <div class="collapse" id="navbarToggleExternalContent">
                <div class="uncollapsed bg-dark p-2">
                    <h5 class="text-light h4">
                        <a href="index.php?controller=inicio&action=" class="link">
                            <div class="title">Inicio</div>
                        </a>
                    </h5>
                    <h5 class="text-dark h4">
                        <a href="index.php?controller=funcionamiento&action=" class="link">
                            <div class="title">Cómo se hace?</div>
                        </a>
                    </h5>
                    <h5 class="text-dark h4">
                        <a href="#" class="link">
                            <div class="title">Sobre mi</div>
                        </a>
                    </h5>
                    <h5 class="text-dark h4">
                        <a href="#" class="link">
                            <div class="title">Contacto</div>
                        </a>
                    </h5>
                    <!-- <span class="text-muted">Toggleable via the navbar brand.</span> -->
                </div>
            </div>
            <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid">
                    <div class="logo text-light me-auto">
                        <strong><?= $controller->page_title ?></strong>
                    </div>
                    <button class="ms-auto navbar-toggler bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
        </header>