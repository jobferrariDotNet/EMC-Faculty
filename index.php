<?php
session_start();
define('SERVER', 'localhost/~jobferrera/emc'); //replace localhost/~jobferrera/emc to the server IP address
include('config/helpers.php');
$helper = new Helpers(SERVER);
$dirs = glob('modules/*', GLOB_ONLYDIR);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EMC Faculty</title>
    <link rel="stylesheet" href="<?= $helper->asset('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= $helper->asset('css/app.css') ?>">
    <link rel="icon"
          type="image/png"
          href="<?= $helper->asset('images/logo.png') ?>">
</head>
<body style="background-color:gray">
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand text-center flex-fill text-light" href="#">EMC Faculty</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03"
            aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php
            if ($_SESSION['message'] != NULL) {
                ?>
                <div class="alert alert-dismissible alert-<?= $_SESSION['message_status'] ?> mt-5 ">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?= strtoupper($_SESSION['message_status']) ?>: </strong> <?= $_SESSION['message'] ?>
                </div>
                <?php
                session_destroy();
            }
            ?>
            <div class="card mt-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <img style="width:72px;margin-bottom:15px; float:left;"
                                 src="<?= $helper->asset('images/logo.jpg') ?>" alt="">
                            <h2 class="logo-head">EASTER MINDORO COLLEGE</h2>
                        </div>
                    </div>
                    <form class="" method="POST" action="<?= $helper->baseUrl('upload.php') ?>"
                          enctype="multipart/form-data">
                        <fieldset>
                            <div class="alert alert-dismissible alert-secondary">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                Image, zip, docx, ppt, xls, pdf and mp4 file types are allowed to upload
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">* Browse File</label>
                                <input required type="file" class="form-control-file" name="uploadedFile"
                                       aria-describedby="fileHelp">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>* Uploader's Name</label>
                                        <input required type="text" class="form-control" name="uploader"
                                               placeholder="Enter uploader's name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Preferred filename (Optional)</label>
                                        <input type="text" class="form-control" name="filename"
                                               placeholder="Filename (Optional)">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect1">* Folder Location</label>
                                <select class="form-control" required name="folder">
                                    <option hidden value="" selected>- select -</option>
                                    <?php
                                    foreach ($dirs as $val) {
                                        echo '<option value="' . $val . '">' . str_replace('modules/', NULL, $val) . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea">Note (Optional)</label>
                                <textarea class="form-control" name="note" rows="3"></textarea>
                            </div>
                            <button type="submit" name="uploadBtn" class="btn btn-primary">Upload and Send</button>
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Reset</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= $helper->asset('js/jquery.min.js') ?>"></script>
<script src="<?= $helper->asset('js/popper.min.js') ?>"></script>
<script src="<?= $helper->asset('js/bootstrap.min.js') ?>"></script>
<script src="<?= $helper->asset('js/validate.min.js') ?>"></script>
</body>
</html>