<?php
header("Content-Type: text/html; charset=UTF-8");
if (file_exists(__DIR__ . '/index.html')) {
    include __DIR__ . '/index.html';
} else {
    include dirname(__DIR__) . '/index.html';
}
exit;
