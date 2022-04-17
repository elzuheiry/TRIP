<?php 
require_once "../config.php";
$titlePage = "Send password reset - ";
require_once BLINC."functions.inc.php";
require_once BLINC."dbConn.inc.php";
require_once BLINC."password-recovery.inc.php";
?>

<?php if(isset($_SESSION["verifyuserid"])){ ?>
<?php require_once BLINC."header.inc.php"; ?>
<div class="send-verify-code">
    <div class="container">
        <div class="contentSendPwdReset">
            <div class="titlePage">
                <h2>How do you want to reset your password?</h2>
            </div>
            <div class="contentUser">
                <div class="box-img">
                    <img src="<?php echo IMG . "imgProfile.jpg" ?>" alt="">
                </div>
                <div class="lines">
                    <div class="fullname"><?php echo "Full Name" ?></div>
                    <div class="username">@<?php echo $_SESSION["verifyusername"] ?></div>
                </div>
            </div>
            <div class="info">
                <p>You can use the information associated with your account.</p>
            </div>

            <div class="send-mail">
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
                    <div class="send-verify-code">
                        <div class="verification">
                            <input type="checkbox" name="verifyemail[]" value="verifyEmail" id="">
                            Send verification code an email -
                            <span><?php echo " " . $_SESSION["verifyuseremail"]; ?></span>
                        </div>
                        <div class="error_message-verify">
                            <?php echo $sendverifycodeErrors["sendverifycodeError"]; ?>
                        </div>
                        <button class="btn-verify-code button" name="submit-verify" type="submit">send verify
                            code</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require_once BLINC . "footer.inc.php"; ?>

<?php }else{
    header("Location:" . BURLU . "password-recovery.php");
    exit();
} ?>