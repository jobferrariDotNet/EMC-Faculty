<?php
session_start();
    $currentDirectory = getcwd();
if (isset($_POST['uploadBtn'])) {


        $folder = $_POST['folder'];
        $uploadDirectory = '/' . $folder . '/';
        $errors = []; // Store errors here

        $fileExtensionsAllowed = ['jpeg', 'jpg', 'png', 'ppt', 'pptx', 'xls', 'xlsx', 'mp4', 'doc', 'docx', 'pdf']; // These will be the only file extensions allowed

        $fileName = $_FILES['uploadedFile']['name'];
        $fileSize = $_FILES['uploadedFile']['size'];
        $fileTmpName = $_FILES['uploadedFile']['tmp_name'];
        $fileType = $_FILES['uploadedFile']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);
        if (!in_array($fileExtension, $fileExtensionsAllowed)) {
            $errors[] = "This file extension is not allowed. See allowed file types";
        }
        if ($fileSize > 4000000) {
            $errors[] = "File exceeds maximum size (4MB)";
        }
        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
            if ($didUpload) {
                $_SESSION['message'] = "The file " . basename($fileName) . " has been uploaded";
                $_SESSION['message_status'] = 'success';
            } else {
                $_SESSION['message'] = "An error occurred. Please contact the administrator.";
                $_SESSION['message_status'] = 'danger';
            }
        } else {
            foreach ($errors as $error) {
                $_SESSION['message'][$error] = "These are the errors";
            }
        }
    header('location:index.php');
}