<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/registerCss.css">
    <script src="../../js/registerJS.js"></script>

</head>

<body>
    <div class="register-container">
        <h2><i class="fas fa-user-plus"></i> Register</h2>
        <form id="registerForm" method="post" action="../Controller/controlador.php">
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" id="email" name="email" class="form-control" placeholder="usuario@gmail.com"
                        required pattern="^[a-zA-Z0-9._%+-]+@gmail\.com$"
                        title="El correo debe ser una dirección válida de Gmail">
                </div>
            </div>

            <!-- Nombre -->
            <div class="mb-3">
                <label for="firstName" class="form-label">Nombre</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" id="firstName" name="firstName" class="form-control" placeholder="Nombre"
                        required>
                </div>
            </div>

            <!-- Nick -->
            <div class="mb-3">
                <label for="firstName" class="form-label">Nick</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" id="firstName" name="nick" class="form-control" placeholder="Nick"
                        required>
                </div>
            </div>

            <!-- Apellidos -->
            <div class="mb-3">
                <label for="lastName" class="form-label">Apellidos</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Apellidos"
                        required>
                </div>
            </div>

            <!-- Contraseña -->
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" minlength="6" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                </div>
            </div>

            <!-- Dirección -->
            <h4 class="mt-4">Dirección</h4>

            <!-- Tipo de vía -->
            <div class="mb-3">
                <label for="tipoVia" class="form-label">Tipo de Vía</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-road"></i></span>
                    <select id="tipoVia" name="tipoVia" class="form-control" required>
                        <option value="">Seleccione...</option>
                        <option value="calle">Calle</option>
                        <option value="avenida">Avenida</option>
                        <option value="carretera">Carretera</option>
                    </select>
                </div>
            </div>

            <!-- Nombre de la vía -->
            <div class="mb-3">
                <label for="nombreVia" class="form-label">Nombre de la Vía</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    <input type="text" id="nombreVia" name="nombreVia" class="form-control"
                        placeholder="Nombre de la Vía" required>
                </div>
            </div>

            <!-- Número -->
            <div class="mb-3">
                <label for="numero" class="form-label">Número</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                    <input type="text" id="numero" name="numero" class="form-control" placeholder="Número" required>
                </div>
            </div>

            <!-- Teléfono -->
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    <input type="tel" id="telefono" name="telefono" class="form-control" placeholder="Teléfono" required
                        pattern="[0-9]{9}" title="Debe contener 9 dígitos">
                </div>
            </div>

            <!-- Botón de registro -->
            <div class="d-grid">
                <button type="submit" class="submitBtn" name="tmp_registro_btn_registro">Registrar</button>
            </div>
        </form>
    </div>
</body>

</html>

<!-- 
<div class="box">
        <h1 class="formName">Registro</h1>

        <form method="post" action="../Controller/controlador.php">
             Username 
            <label for="username">Username</label>
            <input type="text" id="username" formControlName="username" minlength="3" required name="username" />

             Email 
            <label for="email">Email</label>
            <input type="email" id="email" formControlName="email" required name="email" />

             Password 
            <label for="password">Password</label>
            <input type="password" id="password" formControlName="password" minlength="6" required name="password" />

             Nombre 
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" formControlName="nombre" minlength="3" required name="nombre" />

             Primer Apellido 
            <label for="primer_apellido">Primer Apellido</label>
            <input type="text" id="primer_apellido" formControlName="primerApellido" minlength="3" required
                name="primer_apellido" name="primer_apellido" />

             Segundo Apellido (opcional) 
            <label for="segundo_apellido">Segundo Apellido (opcional)</label>
            <input type="text" id="segundo_apellido" formControlName="segundoApellido" minlength="3"
                name="segundo_apellido" />

             Dirección Completa 

             Tipo de Vía 
            <label for="tipo_via">Tipo de Vía</label>
            <select id="tipo_via" formControlName="tipoVia" required name="tipo_via">
                <option value="">Selecciona...</option>
                <option value="Calle">Calle</option>
                <option value="Avenida">Avenida</option>
                <option value="Plaza">Plaza</option>
                <option value="Camino">Camino</option>
            </select>

             Nombre de la Vía 
            <label for="nombre_via">Nombre de la Vía</label>
            <input type="text" id="nombre_via" formControlName="nombreVia" minlength="3" required name="nombre_via" />

            Número 
            <label for="numero">Número</label>
            <input type="number" id="numero" formControlName="numero" required name="numero" />

             Otros 
            <label for="otros">Otros (opcional)</label>
            <input type="text" id="otros" formControlName="otros" name="otros" />


             Teléfono 
            <label for="telefono">Teléfono</label>
            <input type="tel" id="telefono" formControlName="telefono" pattern="[0-9]{9}" required name="telefono" />


             Pondremos el objeto con el cual vamos a invocar el metodo de la clase que controla los formularios 
             Me ha saltado un error porque no he realizado el rquqerimiento del conrolador en el index.php. saltan fatal errors 
            En el index hace el llamamiento necesario para que se ejecute el controlador.



            Botón de registro 
            <button class="submitBtn" type="submit" name="tmp_registro_btn_registro">Register</button>
        </form>

        <p class="login-register">
            Already have an account? <a href="login.">Login here</a>
        </p>

    </div> -->