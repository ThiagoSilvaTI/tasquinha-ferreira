<?php
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método não permitido.']);
    exit;
}

$nome = trim($_POST['nome'] ?? '');
$telefone = trim($_POST['telefone'] ?? '');
$data = trim($_POST['data'] ?? '');
$hora = trim($_POST['hora'] ?? '');
$pessoas = trim($_POST['pessoas'] ?? '');

if ($nome === '' || $telefone === '' || $data === '' || $hora === '') {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => 'Preencha todos os campos obrigatórios.']);
    exit;
}

$registro = [
    'nome' => $nome,
    'telefone' => $telefone,
    'data' => $data,
    'hora' => $hora,
    'pessoas' => $pessoas,
    'criado_em' => date('Y-m-d H:i:s'),
];

$diretorio = __DIR__ . '/data';
if (!is_dir($diretorio)) mkdir($diretorio, 0775, true);

$arquivo = $diretorio . '/reservas.json';
$reservas = [];
if (is_file($arquivo)) {
    $conteudo = json_decode(file_get_contents($arquivo), true);
    if (is_array($conteudo)) $reservas = $conteudo;
}
$reservas[] = $registro;

if (file_put_contents($arquivo, json_encode($reservas, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT), LOCK_EX) === false) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Não foi possível registrar a solicitação.']);
    exit;
}

echo json_encode([
    'success' => true,
    'message' => 'Solicitação enviada! Em breve a equipe confirmará sua reserva.',
], JSON_UNESCAPED_UNICODE);
