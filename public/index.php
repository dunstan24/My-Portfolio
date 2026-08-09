<?php

error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 1);

$baseDir = dirname(__DIR__);
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Ensure uploaded portrait image is copied to public directory
$brainImage = 'C:/Users/USER/.gemini/antigravity-ide/brain/0a894872-8dd5-4760-9de5-3c422fce3dad/media__1785745772680.png';
if (file_exists($brainImage)) {
    if (!file_exists($baseDir . '/public/portrait.png') || filesize($baseDir . '/public/portrait.png') !== filesize($brainImage)) {
        @copy($brainImage, $baseDir . '/public/portrait.png');
        @copy($brainImage, $baseDir . '/portrait.png');
    }
}

// Copy browser supply preview screenshot
$browserSupplyImg = 'C:/Users/USER/.gemini/antigravity-ide/brain/2e3fd870-1196-4d42-a455-3885c7de3956/templates_section_1_1785938484377.png';
if (file_exists($browserSupplyImg) && !file_exists($baseDir . '/public/browser_supply_preview.png')) {
    @copy($browserSupplyImg, $baseDir . '/public/browser_supply_preview.png');
}

// Copy job scraper dashboard preview screenshot
$jobScraperImg = 'C:/Users/USER/.gemini/antigravity-ide/brain/5a04e9f2-4255-49bd-9d50-2fdd96e2f901/media__1786026951456.png';
if (file_exists($jobScraperImg)) {
    if (!file_exists($baseDir . '/public/job_scraper_dashboard.png') || filesize($baseDir . '/public/job_scraper_dashboard.png') !== filesize($jobScraperImg)) {
        @copy($jobScraperImg, $baseDir . '/public/job_scraper_dashboard.png');
        @copy($jobScraperImg, $baseDir . '/job_scraper_dashboard.png');
    }
}


require_once $baseDir . '/app/Http/Controllers/ProjectController.php';
require_once $baseDir . '/app/Http/Controllers/ContactController.php';

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;

$controller = new ProjectController();
$contactController = new ContactController();

// Global helpers
function route($name, $params = []) {
    if ($name === 'home') return '/';
    if ($name === 'cv') return '/cv';
    if ($name === 'download-cv') return '/cv?download=1';
    if ($name === 'messages' || $name === 'inbox') return '/messages';
    if ($name === 'projects.show') return '/projects/' . (is_array($params) ? reset($params) : $params);
    return '/';
}

function asset($path) {
    return '/' . ltrim($path, '/');
}

// Serve static assets directly
$filePath = $baseDir . '/public' . $uri;
if ($uri !== '/' && file_exists($filePath) && !is_dir($filePath)) {
    $ext = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
    $mimeTypes = [
        'css'   => 'text/css',
        'js'    => 'application/javascript',
        'png'   => 'image/png',
        'jpg'   => 'image/jpeg',
        'jpeg'  => 'image/jpeg',
        'svg'   => 'image/svg+xml',
        'woff2' => 'font/woff2'
    ];
    
    $mime = isset($mimeTypes[$ext]) ? $mimeTypes[$ext] : mime_content_type($filePath);
    header("Content-Type: $mime");
    readfile($filePath);
    exit;
}

// Native PHP View Renderer
function renderView($viewName, $data = []) {
    global $baseDir;
    
    extract($data);
    
    $viewFile = $baseDir . '/resources/views/' . str_replace('.', '/', $viewName) . '.php';
    if (!file_exists($viewFile)) {
        // Fallback to blade check
        $viewFile = $baseDir . '/resources/views/' . str_replace('.', '/', $viewName) . '.blade.php';
    }
    
    if (!file_exists($viewFile)) {
        die("View error: File not found - " . $viewFile);
    }
    
    ob_start();
    include $viewFile;
    return ob_get_clean();
}

// Router Logic
if ($uri === '/' || $uri === '' || $uri === '/index.php') {
    $res = $controller->index();
    echo renderView($res['view'], $res['data']);
} elseif ($uri === '/cv' || $uri === '/download-cv' || $uri === '/cv.php') {
    echo renderView('cv');
} elseif ($uri === '/api/contact' || $uri === '/contact') {
    $contactController->submit();
} elseif (preg_match('#^/projects/([a-zA-Z0-9\-]+)$#', $uri, $matches)) {
    $slug = $matches[1];
    try {
        $res = $controller->show($slug);
        echo renderView($res['view'], $res['data']);
    } catch (Exception $e) {
        http_response_code(404);
        echo "<h1 style='color:white; font-family:sans-serif; text-align:center; margin-top:20%;'>404 - Project Not Found</h1>";
    }
} else {
    http_response_code(404);
    echo "<h1 style='color:white; font-family:sans-serif; text-align:center; margin-top:20%;'>404 Page Not Found</h1>";
}
