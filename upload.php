<?php

if (isset($_FILES["upload_file"]["name"]) && $_FILES["upload_file"]["name"][0] !== '') {
    $result = true;
    $files = $_FILES["upload_file"];
    $folder_name = $_POST["hidden_folder_name"];
    foreach ($files["name"] as $key => $name) {
        $path = $folder_name . '/' . basename($name);
        if (!move_uploaded_file($files["tmp_name"][$key], $path)) {
            $result = false;
        }
    }

    if ($result) {
        echo "Successful!";
    } else {
        echo 'There is some error';
    }

} else {
    echo 'Please Select a File';
}