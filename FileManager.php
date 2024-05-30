<?php

class FileManager
{
    public function format_folder_size($size)
    {
        $units = [' bytes', ' KB', ' MB', ' GB'];
        for ($i = 0; $size >= 1024 && $i < 3; $i++) {
            $size /= 1024;
        }
        return round($size, 2) . $units[$i];
    }

    public function get_folder_size($folderName)
    {
        $totalSize = 0;
        $files = scandir($folderName);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $path = $folderName . DIRECTORY_SEPARATOR . $file;
                $totalSize += filesize($path);
            }
        }
        return $this->format_folder_size($totalSize);
    }

    public function fetch_dir() : void
    {
        $folder = array_filter(glob('*'), 'is_dir');

        $output = '
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Folder Name</th>
                    <th>Total File</th>
                    <th>Size</th>
                    <th>Update</th>
                    <th>Delete</th>
                    <th>Upload File</th>
                    <th>View Uploaded File</th>
                </tr>';

        if (count($folder) > 0) {
            foreach ($folder as $name) {
                $output .= '
                    <tr>
                        <td>' . $name . '</td>
                        <td>' . (count(scandir($name)) - 2) . '</td>
                        <td>' . $this->get_folder_size($name) . '</td>
                        <td><button type="button" name="update" data-name="' . $name . '" class="update btn btn-warning btn-xs">Update</button></td>
                        <td><button type="button" name="delete" data-name="' . $name . '" class="delete btn btn-danger btn-xs">Delete</button></td>
                        <td><button type="button" name="upload" data-name="' . $name . '" class="upload btn btn-info btn-xs">Upload File</button></td>
                        <td><button type="button" name="view_files" data-name="' . $name . '" class="view_files btn btn-default btn-xs">View Files</button></td>
                    </tr>';
            }
        } else {
            $output .= '
                    <tr>
                        <td colspan="6">No Folder Found</td>
                    </tr>';
        }
        $output .= '</table>';
        echo $output;
    }

    public function create_dir() : void
    {
        if (!file_exists($_POST["folder_name"])) {
            mkdir($_POST["folder_name"], 0777, true);
            echo 'Folder Created';
        } else {
            echo 'Folder Already Created';
        }
    }

    public function change_dir() : void
    {
        if (!file_exists($_POST["folder_name"])) {
            rename($_POST["old_name"], $_POST["folder_name"]);
            echo 'Folder Name Change';
        } else {
            echo 'Folder Already Created';
        }
    }

    public function delete_dir() : void
    {
        $files = scandir($_POST["folder_name"]);
        foreach ($files as $file) {
            if ($file === '.' or $file === '..') {
                continue;
            } else {
                unlink($_POST["folder_name"] . DIRECTORY_SEPARATOR . $file);
            }
        }
        if (rmdir($_POST["folder_name"])) {
            echo 'Folder Deleted';
        }
    }

    public function remove_file() : void
    {
        if (file_exists($_POST["path"])) {
            unlink($_POST["path"]);
            echo 'File Deleted';
        }
    }

    public function fetch_files(): void
    {
        $file_data = scandir($_POST["folder_name"]);
        $output = '
          <table class="table table-bordered table-striped">
           <tr>
            <th>Image</th>
            <th>File Name</th>
            <th>Delete</th>
           </tr>
          ';

        foreach ($file_data as $file) {
            if ($file === '.' or $file === '..') {
                continue;
            } else {
                $path = $_POST["folder_name"] . DIRECTORY_SEPARATOR . $file;
                $output .= '
            <tr>
                 <td><img src="' . $path . '" class="img-thumbnail" height="100" width="100" /></td>
                 <td>
                 <a href="' . $path . '" download>' . $file . '</a>
                 </td>
                 <td><button name="remove_file" class="remove_file btn btn-danger btn-xs" id="' . $path . '">Remove</button></td>
            </tr>
            ';
            }
        }
        $output .= '</table>';
        echo $output;
    }
}