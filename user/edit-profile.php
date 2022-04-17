<?php require_once "../config.php";
if(isset($_SESSION["userid"])){ 
    $titlePage = "Edit Prfile - ";
    require_once BLINC."dbConn.inc.php";
    require_once BLINC."upload-profile-image.inc.php";
    require_once BLINC."header.inc.php";
?>


<section class="edit-profile">
    <div class="container">
        <div class="cont-edit-profile">
            <div class="account-user">
                <div class="box-img">
                    <?php 
                    $sqlImg = "SELECT * FROM users WHERE userId = {$_SESSION["userid"]}";
                    $sqlResult = mysqli_query($conn, $sqlImg);
                    while($rowImg = mysqli_fetch_assoc($sqlResult)){
                        $_SESSION["imgstatus"] = $rowImg["user_pictures"];
                    }?>
                    <?php
                    if($_SESSION["imgstatus"] === "true"){ 
                        $fileName = "../IMG/uploads/profile" . $_SESSION["userid"] . "*";
                        $fileInfo = glob($fileName);
                        $fileExt = explode(".", $fileInfo[0]);
                        $fileActualExt = $fileExt[3];
                    ?>
                    <img src="<?php echo IMG . "uploads/profile" . $_SESSION["userid"] . "." . $fileActualExt . "?" . mt_rand() ?>"
                        alt="">
                    <?php }else{ ?>
                    <img src="<?php echo IMG . "uploads/image-profile.png" ?>" alt="">
                    <?php }?>
                </div>
                <div class="account-user-links">
                    <div class="username">@<?php echo $_SESSION["username"] ?></div>
                    <?php if(isset($_GET["edit-profile"])){ 
                        if($_GET["edit-profile"] === "change-photo"){ 
                            if($_SESSION["imgstatus"] === "true"){ ?>
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="delete-picture">
                        <button type="submit" name="deletePicture">Delete profile picture</button>
                    </form>
                    <?php }
                        } ?>
                    <?php }else{ ?>
                    <div class="profile-photo"><a href="<?php echo BURLU . "edit-profile/change-photo" ?>"
                            class="">change
                            profile picture</a></div>
                    <?php } ?>
                </div>
            </div>

            <div class="edit-profile-form">
                <?php if(isset($_GET["edit-profile"])){
                    if($_GET["edit-profile"] === "change-photo"){ ?>
                <form class="change-photo-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST"
                    enctype="multipart/form-data">
                    <div class="change-photo-error-message">
                        <?php echo $profileImageMessageError["messageError"]; ?>
                        <?php echo $deleteErrorMessage["deleteMessage"]; ?>
                    </div>

                    <div class="chosse-file-chapter">
                        <div class="chapter-title">
                            <h2>change profile picture</h2>
                        </div>

                        <div class="chosse-file">
                            <input type="file" name="profileImage" id="">
                        </div>
                    </div>

                    <button class="change-photo-btn button" type="submit" name="profileImageSubmit">change
                        picture</button>
                </form>
                <?php }elseif($_GET["edit-profile"] === "change-password"){ ?>
                <form class="change-pwd-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                    <div class="errorMessageNewPwd"></div>

                    <div class="change-pwd-chapter">
                        <div class="chapter-title">
                            <h2>renew your password</h2>
                        </div>

                        <div class="input">
                            <div class="boxInput">
                                <input type="password" autocomplete="off" placeholder=" " name="" value="" />
                                <label for="">Type here your old password</label>
                                <i class="fas fa-lock iconInput"></i>
                                <i class="fas fa-eye-slash iconInputLockShow" id="iconInputLock"></i>
                            </div>
                            <div class="errorMessage" id="">
                            </div>
                        </div>

                        <div class="input">
                            <div class="boxInput">
                                <input type="password" autocomplete="off" placeholder=" " name="" value="" />
                                <label for="">Type here your new password</label>
                                <i class="fas fa-lock iconInput"></i>
                                <i class="fas fa-eye-slash iconInputLockShow" id="iconInputLock"></i>
                            </div>
                            <div class="errorMessage" id="">
                            </div>
                        </div>

                        <div class="input">
                            <div class="boxInput">
                                <input type="password" autocomplete="off" placeholder=" " name="" value="" />
                                <label for="">Type here your confirm password</label>
                                <i class="fas fa-lock iconInput"></i>
                                <i class="fas fa-eye-slash iconInputLockShow" id="iconInputLock"></i>
                            </div>
                            <div class="errorMessage" id="">
                            </div>
                        </div>
                    </div>

                    <button class="edit-profile-btn button" type="submit" name="">change password</button>
                </form>
                <?php }
                }else{ ?>
                <form class="edit-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                    <div class="edit-profile-error-message"></div>

                    <div class="full-name-chapter">
                        <div class="chapter-title">
                            <h2>full name</h2>
                        </div>

                        <div class="input">
                            <div class="boxInput">
                                <input type="text" class="" autocomplete="off" id="" placeholder=" " name="" value="" />
                                <label for="">Type here your full name</label>
                            </div>
                            <div class="errorMessage" id="registerConfirmPasswordError">
                            </div>
                        </div>

                        <div class="description">
                            <p>Help people discover your account by using the name you're known by: either your full
                                name, nickname, or business name.</p>
                        </div>
                    </div>

                    <div class="user-name-chapter">
                        <div class="chapter-title">
                            <h2>username</h2>
                        </div>

                        <div class="input">
                            <div class="boxInput">
                                <input type="text" class="" autocomplete="off" id="" placeholder=" " name=""
                                    value="<?php echo $_SESSION["username"]; ?>" />
                                <label for="">Type here your username</label>
                            </div>
                            <div class="errorMessage" id="registerConfirmPasswordError">
                            </div>
                        </div>
                    </div>

                    <div class="bio-chapter">
                        <div class="chapter-title">
                            <h2>bio</h2>
                        </div>

                        <div class="input">
                            <div class="boxInput">
                                <textarea name="" id="" placeholder=" "></textarea>
                                <label for="">Type here your bio</label>
                            </div>
                            <div class="errorMessage" id="registerConfirmPasswordError">
                            </div>
                        </div>

                        <div class="description">
                            <h5>Personal Information</h5>
                            <p>
                                Provide your personal information, even if the account is used for a business, a pet or
                                something else. This won't be a part of your public profile.
                            </p>
                        </div>
                    </div>

                    <div class="email-chapter">
                        <div class="chapter-title">
                            <h2>email</h2>
                        </div>

                        <div class="input">
                            <div class="boxInput">
                                <input type="text" class="" autocomplete="off" id="" placeholder=" " name=""
                                    value="<?php echo $_SESSION["useremail"] ?>" />
                                <label for="">Type here your email</label>
                            </div>
                            <div class="errorMessage" id="registerConfirmPasswordError">
                            </div>
                        </div>

                        <button class="email-chapter-btn button" type="submit" name="">
                            confirm your e-mail
                        </button>
                    </div>

                    <a href="<?php echo BURLU . "edit-profile/change-password" ?>" class="change-pwd-link">change your
                        password</a>

                    <button class="edit-profile-btn button" type="submit" name="edit-profile-submit">submit</button>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php require_once BLINC."footer.inc.php"; 
}else{ 
    header("location: ". BURL);
    exit();
} ?>