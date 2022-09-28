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
        <!--
		<header class="mb-1">
			<div class="p-1 text-center bg-light">
				<h1 class="mb-3"></h1>
				<h4 class="mb-3">-</h4>
			</div>
		</header>
-->
        <header>
            <div class="header">
                <div class="logo">
                <?=$controller->page_title?>
                </div>
                <div class="menu">
                    <a href="#" class="link">
                        <div class="title">Cómo se hace?</div>
                        <div class="bar"></div>
                    </a>
                    <a href="#" class="link">
                        <div class="title">Sobre mi</div>
                        <div class="bar"></div>
                    </a>
                    <a href="#" class="link">
                        <div class="title">Contacto</div>
                        <div class="bar"></div>
                    </a>
                </div>
            </div>
        </header>