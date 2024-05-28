<!DOCTYPE html>
<html lang="en">
<head>
    <title>File Manager</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="./script.js"></script>
</head>
<body>

    <br /><br />
    <div class="container">
        <h2 align="center">File Manager</h2>
        <br />
        <div align="right">
            <button type="button" name="create_folder" id="create_folder" class="btn btn-success">Create</button>
        </div>
        <br />
        <div class="table-responsive" id="folder_table">

        </div>
    </div>

    <div id="folderModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><span id="change_title">Create Folder</span></h4>
                </div>
                <div class="modal-body">
                    <p>Enter Folder Name
                        <input type="text" name="folder_name" id="folder_name" class="form-control" /></p>
                    <br />
                    <input type="hidden" name="action" id="action" />
                    <input type="hidden" name="old_name" id="old_name" />
                    <input type="button" name="folder_button" id="folder_button" class="btn btn-info" value="Create" />

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="uploadModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload Files</h4>
                </div>
                <div class="modal-body">
                    <form method="post" id="upload_form" enctype='multipart/form-data'>
                        <p>Select Files
                            <input type="file" name="upload_file[]" multiple/></p>
                        <br />
                        <input type="hidden" name="hidden_folder_name" id="hidden_folder_name" />
                        <input type="submit" name="upload_button" class="btn btn-info" value="Upload" />
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="filelistModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">File List</h4>
                </div>
                <div class="modal-body" id="file_list">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
