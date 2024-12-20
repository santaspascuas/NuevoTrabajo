<?php

//Hago una llamada estatica a mi consulta para obtener todos los datos y poder gestionarlos. 
$consulta = Controlador::ctrUsuario();
//print_r ($consulta);



/*iMPORTANTE

ESTABA OBTENIENDO UNA CONSULTA UNICA AL HACER FETCH SIN EL ALL. ESO HACE QUE TUVIERA UN ARRAY SENCILLO EN EL CUAL 
NO PUEDES IUTILIZAR UN BUCLE FOR EACH PENSADO PARA VARIOS VALORES. 
UTILIZAS UN BUCLE FOR EACH PARA UN SOLO VALOR. 

AHORA BIEN AL OBTENER CON FECTH ALL TODO. SI QUE PUEDES IBTENER LOS VALORES ENTERIOS.

<?php foreach ($consulta as $usuario): ?>
<tr>  HTML
<td><?= htmlspecialchars($usuario['id']) ?></td> 
<?php endforeach; ?>
*/










echo "<pre>";
//print_r($consulta);
echo "</pre>";




/// Vamos a proceder a gestionar la iteracion







//Crear usuario

// Eliminar usuario

// modificar usuario modify 




//Mostrare usuario




?>
<!DOCTYPE html>
<html lang="es">
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
    <h1>Panel de Administración</h1>
    <p>Solo accesible para cuentas con perfil de administrador.</p>
    <div class="controls">

    <!----- Aqui ira una especi de registro para dar de alta al usuario en la base de datos--->
    <div class="login-container">
        <h2><i class="fas fa-sign-in-alt"></i>Administrador</h2>
        <form id="AdminUsers" method="post" action="../Controller/controlador.php">
             <!-- Nick -->
             <div class="mb-3">
                <label for="firstName" class="form-label">Nick</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" id="firstName" name="nick" class="form-control" placeholder="Nick"
                        required>
                </div>
            </div>

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

            <div class="d-grid">
                <button type="submit" class="submitBtn" name="tmp_admin_crear_usuario" value="login" >Añadir Usuario</button>
            </div>
            <div class="d-grid">
                <button type="submit" class="submitBtn" name="tmp_login_btn_login" value="login" >Iniciar Sesión</button>
            </div>
        </form>



        <!-- Formulario para añadir usuarios -->
        <form method="POST" action="../Controller/controlador.php">
            <input type="hidden" name="accion" value="anadir_usuario">
            <button type="submit" class="btn-icon btn-add" name="tmp_admin_anadir_usuario">+</button>
        </form>
        <!-- Formulario para eliminar todos los usuarios -->
        <form method="POST" action="controlador.php">
            <input type="hidden" name="accion" value="eliminar_todos_usuarios">
            <button type="submit" class="btn-icon btn-remove">🗑</button>
        </form>
    </div>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Nick</th>
                <th>Email</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Password</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody id="usuarios">
            <!-- Los datos de usuarios se generarán dinámicamente desde el backend -->

            <?php foreach ($consulta as $usuario): ?>
            <tr>
            <td><?= htmlspecialchars($usuario['id']) ?></td>
            <td><?= htmlspecialchars($usuario['nick']) ?></td>
            <td><?= htmlspecialchars($usuario['email']) ?></td>
            <td><?= htmlspecialchars($usuario['nombre']) ?></td>
            <td><?= htmlspecialchars($usuario['apellidos']) ?></td>
            <td><?= htmlspecialchars($usuario['password']) ?></td>
            <td><?= htmlspecialchars($usuario['ROL']) ?></td>    
            </tr>
            <?php endforeach; ?>    
        </tbody>
    </table>

    <h2>Gestión de Juegos</h2>
    <div class="controls">
        <!-- Formulario para añadir juegos -->
        <form method="POST" action="controlador.php">
            <input type="hidden" name="accion" value="anadir_juego">
            <button type="submit" class="btn-icon btn-add">+</button>
        </form>
        <!-- Formulario para eliminar todos los juegos -->
        <form method="POST" action="controlador.php">
            <input type="hidden" name="accion" value="eliminar_todos_juegos">
            <button type="submit" class="btn-icon btn-remove">🗑</button>
        </form>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Género</th>
                <th>Plataforma</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="juegos">
            <!-- Los datos de juegos se generarán dinámicamente desde el backend -->
        </tbody>
    </table>
</body>
</html>
