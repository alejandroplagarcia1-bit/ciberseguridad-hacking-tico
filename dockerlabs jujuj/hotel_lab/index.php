<?php
// Datos de los huéspedes en el Wi-Fi
$huespedes = [
    '101' => ['nombre' => 'CEO - Constructora Cimientos', 'habitacion' => 'Suite 505', 'token' => 'ADMIN_TOKEN_998877'],
    '105' => ['nombre' => 'Invitado Estándar', 'habitacion' => '204', 'token' => 'USER_TOKEN_12345']
];

// Si no hay ID, por defecto eres el invitado estándar
$id = isset($_GET['id']) ? $_GET['id'] : '105';
$usuario = isset($huespedes[$id]) ? $huespedes[$id] : null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hotel Luxury - Portal Wi-Fi</title>
    <style>
        body { font-family: Arial; background: #2c3e50; color: white; text-align: center; }
        .hotel-box { background: #34495e; width: 450px; margin: 80px auto; padding: 30px; border-radius: 15px; border: 2px solid #f1c40f; }
        h1 { color: #f1c40f; }
        .info { background: #ecf0f1; color: #333; padding: 15px; border-radius: 5px; text-align: left; }
        .warning { color: #e74c3c; font-size: 0.8em; }
    </style>
</head>
<body>
    <div class="hotel-box">
        <h1>🌟 Hotel Luxury Wi-Fi</h1>
        <p>Bienvenido al portal de alta velocidad.</p>
        
        <?php if ($usuario): ?>
            <div class="info">
                <p><strong>Huésped:</strong> <?php echo $usuario['nombre']; ?></p>
                <p><strong>Habitación:</strong> <?php echo $usuario['habitacion']; ?></p>
                <p><strong>Tu Token de Sesión:</strong> <code><?php echo $usuario['token']; ?></code></p>
            </div>
            <p class="warning">No compartas tu token de sesión con nadie.</p>
        <?php else: ?>
            <p>Error: Sesión no encontrada.</p>
        <?php endif; ?>

        <hr>
        <p><small>Estás viendo el perfil ID: <?php echo $id; ?></small></p>
    </div>
</body>
</html>