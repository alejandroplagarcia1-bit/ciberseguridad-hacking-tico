<?php
$salida = "";
if (isset($_POST['ip'])) {
    $ip = $_POST['ip'];
    
    // VULNERABILIDAD: Ejecuta un "ping" directamente en el sistema
    // Si el usuario mete un ";" puede ejecutar otros comandos (RCE)
    if (strpos($ip, ';') !== false) {
        $comando = $ip; // El atacante ha inyectado algo
    } else {
        $comando = "ping -c 2 " . $ip;
    }
    
    $salida = shell_exec($comando);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Panel de Impresión Industrial v4.2</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #ecf0f1; color: #2c3e50; }
        .container { width: 600px; margin: 50px auto; background: white; padding: 30px; border-top: 10px solid #2980b9; box-shadow: 0 0 20px rgba(0,0,0,0.1); }
        h1 { color: #2980b9; }
        pre { background: #000; color: #0f0; padding: 15px; overflow-x: auto; text-align: left; }
        input { padding: 10px; width: 70%; border: 1px solid #bdc3c7; }
        button { padding: 10px 20px; background: #2980b9; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🖨️ Herramientas de Red de la Impresora</h1>
        <p>Introduce una IP para comprobar la conexión con el servidor central:</p>
        
        <form method="POST">
            <input type="text" name="ip" placeholder="Ej: 127.0.0.1">
            <button type="submit">TEST DE PING</button>
        </form>

        <?php if ($salida): ?>
            <h3>Resultado del diagnóstico:</h3>
            <pre><?php echo $salida; ?></pre>
        <?php endif; ?>
    </div>
</body>
</html>