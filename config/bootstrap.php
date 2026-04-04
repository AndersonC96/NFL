<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!defined('BASE_URL')) {
    $baseUrl = getenv('APP_BASE_URL');

    if (!$baseUrl) {
        $projectDir = basename(dirname(__DIR__));
        $projectMarker = '/' . trim($projectDir, '/');
        $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
        $position = strpos($scriptName, $projectMarker);

        if ($position !== false) {
            $basePath = substr($scriptName, 0, $position + strlen($projectMarker));
        } else {
            $basePath = $projectMarker;
        }

        if ($basePath === '.' || $basePath === '') {
            $basePath = $projectMarker;
        }

        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        $baseUrl = $scheme . '://' . $host . $basePath;
    }

    define('BASE_URL', rtrim($baseUrl, '/') . '/');
}

function redirect_to(string $path): void
{
    header('Location: ' . BASE_URL . ltrim($path, '/'));
    exit;
}

function require_auth(): void
{
    if (empty($_SESSION['logado']) || !is_array($_SESSION['logado'])) {
        redirect_to('login.php');
    }
}

function get_action(array $allowedActions, string $default = 'listar'): string
{
    $acao = $_GET['acao'] ?? $default;
    return in_array($acao, $allowedActions, true) ? $acao : $default;
}

function get_id_param(string $key = 'id'): ?int
{
    $value = filter_input(INPUT_GET, $key, FILTER_VALIDATE_INT);
    return ($value !== false && $value !== null && $value > 0) ? $value : null;
}

function post_value(string $key, $default = '')
{
    $value = filter_input(INPUT_POST, $key, FILTER_UNSAFE_RAW);
    return $value !== null ? $value : $default;
}

function set_flash(string $type, string $message): void
{
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function get_flash(): ?array
{
    if (!isset($_SESSION['flash'])) {
        return null;
    }

    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    return $flash;
}

function h(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
