<?php
if (isset($_GET['i'])&&isset($_GET['p'])) {
    $imageName = sanitizeFileName($_GET['i']);
    $pageDirectory = sanitizeFileName($_GET['p']);

    if($pageDirectory === 'connect/u'){ $composedFilepath = '/app/views/connect/media/users/'.$imageName; }
        else if($pageDirectory === 'connect/p'){ $composedFilepath = '/app/views/connect/media/posts/'.$imageName; }
        else { $composedFilepath = '/app/views/'.$pageDirectory.'/media/'.$imageName; }

    //$filePath = '../views/home/media/' . $imageName;

    if (file_exists($composedFilepath)) {
        $allowedMimeTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/svg+xml', 'image/svg', 'image/webp'];

        $fileMime = mime_content_type($composedFilepath);

        if (in_array($fileMime, $allowedMimeTypes)) {
            header("Content-Type: " . $fileMime);
            readfile($composedFilepath);
        } else {
            header("HTTP/1.1 403 Forbidden");
            Router::getInstance()->respond(403, 'Forbidden: File type not allowed.');
        }
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