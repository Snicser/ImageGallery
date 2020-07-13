<?php

    require_once ("../php/config/database.php");

    // If user doesn't submit the upload form the send back to the location and exit php file
    if(!isset($_POST['btn-send'])) {
        header("Location: upload.php?upload=failed");
        exit();
    }

    $name = $_POST['image-name'];
    $description = $_POST['image-description'];

    if (is_uploaded_file($_FILES['user-file']['tmp_name']) && getimagesize($_FILES['user-file']['tmp_name']) != false) {

        // Size of the image
        $imageSize = getimagesize($_FILES['user-file']['tmp_name']);

        // Variable for the image
        $imageType = $_FILES['user-file']['type'];
        $imagePhoto = fopen($_FILES['user-file']['tmp_name'], 'rb');
        $size = $imageSize[3];
        $imageName = $name;

        // Make bool?? Lets return true or fails, so better handling etc todo
        uploadFile($imageType, $imagePhoto, $size, $imageName, $description, 'images');

        // TODO: Send green alert message under send button
    } else {
        header("Location: upload.php?upload=failed");
    }

    function uploadFile($imageType, $imagePhoto, $size, $imageName, $description, $table) {
        $connection = getDatabaseConnection();

        $sql = "INSERT INTO $table(imageType, imageBlob, imageSize, imageName, imageDescription) VALUES (?, ?, ?, ?, ?)";

        $prepareStatement = $connection -> prepare($sql);

        $prepareStatement -> bindParam(1, $imageType);
        $prepareStatement -> bindParam(2, $imagePhoto, PDO::PARAM_LOB);
        $prepareStatement -> bindParam(3, $size);
        $prepareStatement -> bindParam(4, $imageName, PDO::PARAM_STR_CHAR);
        $prepareStatement -> bindParam(5, $description, PDO::PARAM_STR_CHAR);

        $prepareStatement -> execute();

        if ($prepareStatement) {
            // Success, no fail

            //When done send user back to upload.php
            header("Location: upload.php?upload=success");
        } else {
            // Failed, no success
            header("Location: upload.php?upload=failed");
        }

    }

//    if (is_uploaded_file($_FILES['user-file']['tmp_name']) && getimagesize($_FILES['user-file']['tmp_name']) != false) {
//
//        // Size of the image
//        $imageSize = getimagesize($_FILES['user-file']['tmp_name']);
//
//        // Variable for the image
//        $imageType = $_FILES['user-file']['type'];
//        $imagePhoto = fopen($_FILES['user-file']['tmp_name'], 'rb');
//        $size = $imageSize[3];
//
//        uploadFile($imageType, $imagePhoto, $size, $name, $description, 'images');
//
//        // When done send user back to upload.php
//        header("Location: upload.php?upload=success");
//    } else {
//        header("Location: upload.php?upload=failed");
//    }
//
//    function uploadFile($imageType, $imagePhoto, $imageSize, $imageName, $imageDescription , $table) {
//        $connection = getDatabaseConnection();
//
//        $sql = "INSERT INTO $table (imageType, imageBlob, imageSize, imageName, imageDescription) VALUES (?, ?, ?, ?, ?)";
//
//        $prepareStatement = $connection -> prepare($sql);
//
//        $prepareStatement -> bindParam(2, $imageType);
//        $prepareStatement -> bindParam(3, $imagePhoto, PDO::PARAM_LOB);
//        $prepareStatement -> bindParam(4, $imageSize);
//        $prepareStatement -> bindParam(5, $imageName);
//        $prepareStatement -> bindParam(6, $imageDescription);
//
//        $prepareStatement -> execute();
//    }