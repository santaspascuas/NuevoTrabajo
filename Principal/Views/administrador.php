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
        <!-- Botón para añadir usuarios -->
        <button class="btn-icon btn-add" >+</button>
        <!-- Botón para eliminar todos los usuarios -->
        <button class="btn-icon btn-remove" >🗑</button>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="usuarios">
            <!-- Los datos de usuarios se generarán dinámicamente desde el backend -->
        </tbody>
    </table>

    <h2>Gestión de Juegos</h2>
    <div class="controls">
        <!-- Botón para añadir juegos -->
        <button class="btn-icon btn-add" onclick="anadirJuego()">+</button>
        <!-- Botón para eliminar todos los juegos -->
        <button class="btn-icon btn-remove" onclick="eliminarTodosJuegos()">🗑</button>
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
