<?php 
require_once "../config.php";
require_once BLINC."dbConn.inc.php";
$titlePage = "Forgotten password - ";
require_once BLINC."functions.inc.php";
require_once BLINC."password-recovery.inc.php";
?>

<?php if(!isset($_SESSION["userid"])){ ?>
<?php require_once BLINC."header.inc.php"; ?>
<div class="container pwdRecovery">
    <div class="titlePage">
        <h1>Find your PICNIC account</h1>
    </div>

    <div class="form">

        <div class="error_message_pwd">
            <?php echo $errorForgetPwd["errorMessage"] ?>
        </div>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="input">
                <div class="boxInput">
                    <input type="text" autocomplete="off" placeholder=" " value="<?php echo $textPasswordRecovery ?>"
                        name="textPasswordRecovery" />
                    <label for="">Type here your username or email</label>
                </div>
                <div class="errorMessage" id="passwordRecoveryError">
                    <?php echo $errorForgetPwd["textPasswordRecovery"]; ?>
                </div>
            </div>

            <button class="btnPwdRecovery button" name="btnPwdRecovery" type="submit">
                search
            </button>
        </form>
    </div>
</div>
<?php require_once BLINC."footer.inc.php"; ?>
<?php }else{
    header("Location: " . BURL);
    exit();
} ?>