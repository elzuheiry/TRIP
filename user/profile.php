<?php
require_once "../config.php";
$titlePage = $_SESSION["username"] . " - ";?>

<?php if(!isset($_SESSION["userid"])){
    header("location: ". BURL);
    exit();
}else{ 
    require_once BLINC."header.inc.php"; ?>

<div class="container profilepage">
    <div class="profileHeader">
        <h1> <?php echo $_SESSION["username"]; ?></h1>
    </div>
    <div class="profileContent">
        <h3>Statistics</h3>
        <div class="profileList">
            <?php if(isset($_SESSION["userid"])){ ?>
            <div class='Line'>
                <h4>Joined:</h4>
                <span><?php echo $_SESSION["userjoined"]; ?></span>
            </div>
            <div class='Line'>
                <h4>Last Seen:</h4>
                <span><?php echo $_SESSION["userlastseen"]; ?></span>
            </div>
            <div class='Line'>
                <h4>Email:</h4>
                <span><?php echo $_SESSION["useremail"]; ?></span>
            </div>
            <div class='Line'>
                <h4>User Class:</h4>
                <span><?php echo $_SESSION["userclass"]; ?></span>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php require_once BLINC."footer.inc.php"; ?>
<?php } ?>