<?php
// Base de datos simulada de la Constructora
$planos = [
    ['id' => 1, 'nombre' => 'Puente de Hierro', 'archivo' => 'puente_v1.pdf'],
    ['id' => 2, 'nombre' => 'Presa Hidráulica', 'archivo' => 'presa_v4.pdf'],
    ['id' => 99, 'nombre' => 'SECRET: Informe Blanqueo', 'archivo' => 'cuentas_B.xlsx'],
    ['id' => 100, 'nombre' => 'SECRET: Planos Barro', 'archivo' => 'ERRORES_ESTRUCTURA.pdf']
];

$resultado = null;
if (isset($_GET['id'])) {
    $id_buscado = $_GET['id'];
    
    // AQUÍ ESTÁ EL FALLO DE BARRO (SQL INJECTION SIMULADO)
    if ($id_buscado === "1' OR '1'='1") {
        $resultado = $planos;
    } else {
        foreach ($planos as $p) {
            if ($p['id'] == $id_buscado) $resultado[] = $p;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>CONSTRUCTORA CIMIENTOS - ACCESO INTERNO</title>
    <style>
        body { font-family: 'Courier New', Courier, monospace; background-color: #f0f0f0; color: #333; }
        .box { background: white; width: 500px; margin: 100px auto; padding: 20px; border: 5px solid #d9534f; border-radius: 10px; }
        h1 { color: #d9534f; }
        input { padding: 10px; width: 70%; }
        button { padding: 10px; background: #d9534f; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="box">
        <h1>🏗️ Gestor de Planos v1.0</h1>
        <p><strong>Estado:</strong> <span style="color:red">SISTEMA OBSOLETO - PARCHEAR</span></p>
        <form method="GET">
            <input type="text" name="id" placeholder="Introduce ID de plano...">
            <button type="submit">BUSCAR</button>
        </form>

        <?php if ($resultado): ?>
            <hr>
            <table border="1" style="width:100%; text-align:left;">
                <tr><th>ID</th><th>NOMBRE</th><th>ARCHIVO</th></tr>
                <?php foreach ($resultado as $r): ?>
                <tr>
                    <td><?php echo $r['id']; ?></td>
                    <td><?php echo $r['nombre']; ?></td>
                    <td><a href="#"><?php echo $r['archivo']; ?></a></td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>