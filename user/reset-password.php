<?php 
require_once "../config.php";
$titlePage = "Reset password - ";
require_once BLINC."functions.inc.php";
require_once BLINC."dbConn.inc.php";
require_once BLINC."password-recovery.inc.php";
?>

<?php if(isset($_SESSION["UID"])){ ?>
<?php require_once BLINC."header.inc.php"; ?>
<section class="new-password">
    <div class="container">
        <div class="content-new-password">
            <div class="title-page">
                <h2>Reset new password</h2>
            </div>
            <div class="new-pwd-form">
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                    <div class="input">
                        <div class="boxInput">
                            <input type="password" autocomplete="off" placeholder=" " name="new-password"
                                value="<?php echo $newPwd; ?>" />
                            <label for="">Type here your New password</label>
                            <i class="fas fa-lock iconInput"></i>
                            <i class="fas fa-eye-slash iconInputLockShow" id="iconInputLock"></i>
                        </div>
                        <div class="errorMessage" id="newPwdError">
                            <?php echo $newPwdErrorMessage["newPwdEroor"]; ?>
                        </div>
                    </div>

                    <div class="input">
                        <div class="boxInput">
                            <input type="password" autocomplete="off" placeholder=" " name="confirm-new-password"
                                value="<?php echo $confirmNewPwd; ?>" />
                            <label for="">Type here your confirm password</label>
                            <i class="fas fa-lock iconInput"></i>
                            <i class="fas fa-eye-slash iconInputLockShow" id="iconInputConfirmLock"></i>
                        </div>
                        <div class="errorMessage" id="newPwdError">
                            <?php echo $newPwdErrorMessage["cofirmNewPwdError"]; ?>
                        </div>
                    </div>

                    <button class="btn-new-pwd button" type="submit" name="submitNewPwd">save</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require_once BLINC . "footer.inc.php"; ?>
<?php }else{
    header("Location: " . BURLU . "password-recovery.php");
    exit();
}