<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require_once __DIR__ . '/../modelos/Usuario.php';

$usuario = new Usuario();
$op = $_GET['op'] ?? '';

switch ($op) {

    case 'listar':
        echo json_encode($usuario->listar());
        break;

    case 'obtener':
        $id     = intval($_GET['id'] ?? 0);
        $result = $usuario->obtener($id);
        if ($result) unset($result['clave']);
        echo json_encode($result ?: ["error" => "No encontrado"]);
        break;

    case 'guardar':
        $nombre = trim($_POST['nombre'] ?? '');
        $clave  = trim($_POST['clave']  ?? '');
        $estado = intval($_POST['estado'] ?? 1);

        if ($nombre === '' || $clave === '') {
            echo json_encode(["status" => false, "message" => "Datos inválidos"]);
            break;
        }
        $result = $usuario->insertar($nombre, $clave, $estado);
        echo json_encode([
            "status"  => $result,
            "message" => $result ? "Usuario guardado" : "Error al guardar"
        ]);
        break;

    case 'actualizar':
        $id     = intval($_POST['id'] ?? 0);
        $nombre = trim($_POST['nombre'] ?? '');
        $clave  = trim($_POST['clave']  ?? '');
        $estado = intval($_POST['estado'] ?? 1);

        if ($id <= 0 || $nombre === '') {
            echo json_encode(["status" => false, "message" => "Datos inválidos"]);
            break;
        }
        $result = $usuario->actualizar($id, $nombre, $clave, $estado);
        echo json_encode([
            "status"  => $result,
            "message" => $result ? "Usuario actualizado" : "Error al actualizar"
        ]);
        break;

    case 'eliminar':
        $id = intval($_POST['id'] ?? 0);
        if ($id <= 0) {
            echo json_encode(["status" => false, "message" => "ID inválido"]);
            break;
        }
        $result = $usuario->eliminar($id);
        echo json_encode([
            "status"  => $result,
            "message" => $result ? "Usuario eliminado" : "Error al eliminar"
        ]);
        break;

    default:
        echo json_encode(["error" => "Operación no válida"]);
        break;
}
