<?php

$profileImageMessageError = ["messageError"=>""];

if(isset($_POST["profileImageSubmit"])){
    $profileImage = $_FILES["profileImage"];
    $profileImageName = $_FILES["profileImage"]["name"];
    $profileImageTmpName = $_FILES["profileImage"]["tmp_name"];
    $profileImageSize = $_FILES["profileImage"]["size"];
    $profileImageError = $_FILES["profileImage"]["error"];
    $profileImageType = $_FILES["profileImage"]["type"];


    $profileImageExt =  explode(".", $profileImageName);
    $profileImageActualExt = strtolower(end($profileImageExt));

    $allowed = array("jpg", "jpeg", "png");

    if(in_array($profileImageActualExt, $allowed)){
        if($profileImageError === 0){
            if(!($profileImageSize >= 10000000)){
                $profileImageNameNew = "profile" . $_SESSION["userid"] . "." . $profileImageActualExt;
                $profileImageDestination = "../IMG/uploads/" . $profileImageNameNew;
                if(move_uploaded_file($profileImageTmpName, $profileImageDestination)){
                    $sqlImg = "UPDATE users SET user_pictures = 'true' WHERE userId = {$_SESSION["userid"]} LIMIT 1";
                    $sqlResult = mysqli_query($conn, $sqlImg);
                    if($sqlResult){
                        header("Location: " . BURLU . "edit-profile");
                        exit();
                    }else{
                        $profileImageMessageError["messageError"] = "Something went wrong, please try again!";
                    }
                }else{
                    $profileImageMessageError["messageError"] = "Something went wrong, please try again!";
                }
            }else{
                $profileImageMessageError["messageError"] = "The file you uploaded are too large!";
            }
        }else{
            $profileImageMessageError["messageError"] = "There was an error uploading your file!";
        }
    }else{
        $profileImageMessageError["messageError"] = "You cannot upload files of this type!";
    }
}

// START CODING OF DELETE USER PICTURE PAGE
$deleteErrorMessage = ["deleteMessage"=>""];

if(isset($_POST["deletePicture"])){
    $fileName = "../IMG/uploads/profile" . $_SESSION["userid"] . "*";
    $fileInfo = glob($fileName);
    $fileExt = explode(".", $fileInfo[0]);
    $fileActualExt = $fileExt[3];
    $file = "../IMG/uploads/profile" . $_SESSION["userid"] . "." . $fileActualExt;

    if(!unlink($file)){
        header("Location: " . BURLU . "edit-profile?edit-profile=change-photo&delete-unsuccessfully");
        exit();
    }else{
        $sql = "UPDATE users SET user_pictures = 'false' WHERE userId = {$_SESSION["userid"]} LIMIT 1";
        $sqlResult = mysqli_query($conn, $sql);

        if($sqlResult){
            header("Location: " . BURLU . "edit-profile");
            exit();
        }else{
            header("Location: " . BURLU . "edit-profile?error=stmtworng");
            exit();
        }
    }
}