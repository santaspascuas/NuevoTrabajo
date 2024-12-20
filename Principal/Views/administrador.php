<?php

//Hago una llamada estatica a mi consulta para obtener todos los datos y poder gestionarlos. 
$consulta = Controlador::ctrUsuario();
print_r ($consulta);



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
print_r($consulta);
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
    <title>Administración de Usuarios y Juegos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 4px;
        }

        .btn-confirm {
            background-color: #4CAF50;
            color: white;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
        }

        .btn-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            margin: 0 5px;
            font-size: 1.5em;
        }

        .btn-add {
            background-color: #4CAF50;
            color: white;
        }

        .btn-remove {
            background-color: #f44336;
            color: white;
        }

        .controls {
            margin: 10px 0;
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <h1>Panel de Administración</h1>
    <p>Solo accesible para cuentas con perfil de administrador.</p>

    <h2>Gestión de Usuarios</h2>
    <div class="controls">
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
