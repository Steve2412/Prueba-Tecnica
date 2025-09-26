<?php
session_start();

// Lista de usuarios (simulada)
$usuarios = [
    ['email' => 'admin@demo.com', 'password' => '1234'],
];

// Verificar si se ha enviado una solicitud POST
if (isset($_POST["action"])) {

    // Verificar si la acción es "login"
    if ($_POST["action"] == "login") {

        // Obtener credenciales del POST
        $email = $_POST["email"] ?? '';
        $password = $_POST["password"] ?? '';

        // Validar campos vacíos
        if ($email === '' || $password === '') {
            echo "Error: Campos vacíos";
            exit;
        }

        try {
            // Buscar usuario en el array
            $encontrado = null;
            foreach ($usuarios as $u) {
                if ($u['email'] === $email && $u['password'] === $password) {
                    $encontrado = $u;
                    break;
                }
            }

            // Verificar si se encontró el usuario

            if (!$encontrado) {
                echo "Error: Credenciales inválidas";
                exit;
            }

            // Crear sesión
            session_regenerate_id(true);
            $_SESSION['usuario'] = [
                'email' => $encontrado['email']
            ];

            echo "Login correcto";
            exit;

            //En caso de error, capturarlo
        } catch (Exception $e) {
            echo "Error en el proceso de login";
        }
    }
}
