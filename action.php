<?php
require_once './FileManager.php';

if (isset($_POST["action"])) {
    $fileManager = new FileManager();

    switch ($_POST["action"]) {
        case "fetch":
            $fileManager->fetch_dir();
            break;

        case "create":
            $fileManager->create_dir();
            break;

        case "change":
            $fileManager->change_dir();
            break;

        case "delete":
            $fileManager->delete_dir();
            break;

        case "fetch_files":
            $fileManager->fetch_files();
            break;

        case "remove_file":
            $fileManager->remove_file();
            break;

        case "change_file_name":
            $fileManager->change_file_name();
            break;

        default:
            echo "Invalid action";
    }
}