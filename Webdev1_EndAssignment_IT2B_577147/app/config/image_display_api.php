<?php
if (isset($_GET['image'])) {
    $imageName = sanitizeFileName($_GET['image']);
    $filePath = '../views/home/media/' . $imageName;

    if (file_exists($filePath)) {
        // Determine the content type of the image
        $fileMime = mime_content_type($filePath);
        header("Content-Type: " . $fileMime);

        readfile($filePath);
    } else {
        header("HTTP/1.1 404 Not Found");
        Router::getInstance()->respond(404, 'Image not found or access denied.');
    }
} else {
    header("HTTP/1.1 400 Bad Request");
    Router::getInstance()->respond(400, 'No image specified');
}

function sanitizeFileName($fileName) {
    return basename($fileName);
}