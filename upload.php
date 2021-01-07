<?php

require_once("config.php");

if (isset($_POST["secret"]) && $_POST["secret"] == SECURE_KEY) {
    $folderPath = SHAREX_DIR . format(FOLDER_NAME_FORMAT);
    $fileName = format(FILE_NAME_FORMAT);
    $fileType = pathinfo($_FILES["sharex"]["name"], PATHINFO_EXTENSION);
    $filePath = $folderPath . "/" . $fileName . "." . $fileType;

    if (!file_exists($folderPath)) {
        $success = mkdir($folderPath, 0755);

        if (!$success) {
            die("Error creating folder: " . $folderPath);
        }
    }

    if (move_uploaded_file($_FILES["sharex"]["tmp_name"], $filePath)) {
        exit(DOMAIN . $filePath);
    } else {
        exit("File upload has failed");
    }
} else {
    exit("No post data was received or secret key was invalid");
}

function format($str) {
    $replace = [
        "{day}"    => date("d"),
        "{month}"  => date("m"),
        "{year}"   => date("Y"),
        "{hour}"   => date("H"),
        "{minute}" => date("i"),
        "{second}" => date("s"),
        "{uniqid}" => substr(bin2hex(openssl_random_pseudo_bytes(16)), 0, FILENAME_LENGTH)
    ];

    return str_ireplace(array_keys($replace), array_values($replace), $str);
}
