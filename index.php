<?php require "func.php";

if (isset($_POST['submit'])) {
    if (empty($_POST['fileName']) || $_FILES['file']['size'] == 0) {
        echo 'Something went wrsssng!';
    } else {
        $fileUpload = new upload();
        $fileUpload->fileInfo();
        if ($fileUpload->uploadFile()) {
            echo 'File hase been uploaded!';
        } else {
            echo 'Something went wrong!';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>EasyUpload - File Uploader PHP</title>
</head>

<body>
    <div class="container mt-5">
        <div class="mb-3">

        </div>
        <div class="mb-3">
            <div class=mb-3>
                <h4>Upload a file EASY!</h4>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="fileName" class="form-label">File name</label>
                    <input type="text" class="form-control" id="fileName" name="fileName">
                    <label for="file" class="form-label">Select File:</label>
                    <input type="file" class="form-control" id="file" name="file">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
</body>

</html>