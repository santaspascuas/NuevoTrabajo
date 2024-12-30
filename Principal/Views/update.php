<?php
// Asegurarse de que $datosUsuario esté disponible
if (!isset($datosUsuario)) {
    echo "Error: No se pasaron datos para actualizar.";
    exit;
}
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
    <h1>Actualizar Usuario y Borrar</h1>
    <div class="login-container">
    <form method="POST" action="../Controller/controlador.php" id="AdminUsers"  >
        <input type="hidden" name="id" value="<?= htmlspecialchars($datosUsuario['id']) ?>">

        <div class="mb-3">
            <label for="nick">Nick:</label>
            <div class="input-group">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
            <input type="text" id="nick" name="nick" value="<?= htmlspecialchars($datosUsuario['nick']) ?>"  class="form-control"  required>
            </div>
    </div>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($datosUsuario['email']) ?>" class="form-control"  required>
        <br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($datosUsuario['nombre']) ?>" class="form-control"  required>
        <br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" value="<?= htmlspecialchars($datosUsuario['apellidos']) ?>"class="form-control"  required>
        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?= htmlspecialchars($datosUsuario['password']) ?>" class="form-control"  required>
        <br>

        <label for="rol">Rol:</label>
        <select id="rol" name="rol" required>
            <option value="Lider" <?= $datosUsuario['ROL'] === "Lider" ? "selected" : "" ?>>Líder</option>
            <option value="Miembro" <?= $datosUsuario['ROL'] === "Miembro" ? "selected" : "" ?>>Miembro</option>
        </select>
        <br>
        <br>
        <br>
        <div class="d-grid">
        <button type="submit" name="tmp_update_actualizar_user" class="submitBtn" >Actualizar</button>
        </div>
        <br>
        <div class="d-grid">
        <button type="submit" name="tmp_update_eliminar_user" class="submitBtn" >Eliminar</button>
        </div>
    </form>
    </div>
</body>
</html>
