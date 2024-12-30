<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/loginCss.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../js/loginJS.js"></script>
</head>

<body>
    <!-- el login se compone de un div general con su form que esta gestionado por el controller y con los botones  -->
    <div class="login-container">
        <h2><i class="fas fa-sign-in-alt"></i> Login</h2>
        <form id="loginForm" method="post" action="../Controller/controlador.php">
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <!-- intentamos poner ciertas validaciones para el control de los datos que el usuario está intentando poner (required pattern) -->
                    <input type="email" id="email" name="email" class="form-control" placeholder="usuario@gmail.com"
                        required pattern="^[a-zA-Z0-9._%+-]+@gmail\.com$"
                        title="El correo debe ser una dirección válida de Gmail">
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña"
                        required>
                </div>
            </div>
            <div class="d-grid">
                <button type="submit" class="submitBtn" name="tmp_login_btn_login" value="login" >Iniciar Sesión</button>
            </div>
        </form>
        <br>
        <p class="login-register">No tienes cuenta?</p>
        <form method="post" action="../Controller/controlador.php">
        <input type="submit" name="tmp_login_btn_registro" value="Registrar nuevo Usuario">
        </form>

    </div>
    <!-- <div class="login-container">
    <h1 class="formName">Login</h1>
    <form class="loginForm" method="post" action="../Controller/controlador.php">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" /> 
        <label for="password">Password</label>
        <input type="password" id="password" name="password" minlength="6"  />
        <button class="submitBtn" type="submit" name="tmp_login_btn_login">Login</button>
    </form>

    <p class="login-register">No tienes cuenta?</p>
    <form method="post" action="../Controller/controlador.php">
    <input type="submit" name="tmp_login_btn_registro" value="Registrar Nuevo Usuario">
    </form>
</div> -->
</body>

</html>