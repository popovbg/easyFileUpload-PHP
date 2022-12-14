<?php


class upload
{
    public $upload_dir = 'files/';
    public $fileNameFromUser;
    public $fileName;
    public $fileToUpload;
    public $fileSize;
    public $fileType;
    public $maxFileSize = 1000000;
    public $allowed_Files = ['mp4', 'jpg', 'mov', 'jpeg', 'png', 'pdf'];
    public $error = false;
    public $msg;


    public function fileInfo()
    {
        $this->fileNameFromUser = $_POST['fileName'];
        $this->fileName = $_FILES['file']['name'];
        $this->fileToUpload = $this->upload_dir . basename($this->fileName);
        $this->fileSize = $_FILES['file']['size'];
        $this->fileType = strtolower(pathinfo($this->fileName, PATHINFO_EXTENSION));
    }

    public function uploadFile()
    {
        // check if file extension is allowed
        if (!in_array($this->fileType, $this->allowed_Files)) {
            $this->msg = 'This type of files is not allowed!';
            $this->error = true;
        }
        if ($this->fileSize > $this->maxFileSize) {
            $this->msg = 'File sizes must be MAX 10MB!';
            $this->error = true;
        }

        if (!$this->error) {
            $upload =  move_uploaded_file($_FILES['file']['tmp_name'], $this->fileToUpload);
            if ($upload) {
                return true;
            } else {
                return false;
            }
        }
    }
}
