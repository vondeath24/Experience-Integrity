<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'header.php'?>
    <title>My Profile</title>
</head>
<body>
    <div class="thankYouSection">
    <?php require_once 'navbar.php'?>
        <div class="container profileSection">
            <div class="row">
                <div class="col">
                <h2>Profile Information<hr></h2>
                </div>
            </div>
            <div class="row">
            <div class= "col">
            <?php require_once 'myProfileBackend.php'?>
            </div>
            </div>
        </div>
    </div>

<?php require_once 'footer.php'?>
<?php require_once 'scripts.php'?>
</body>
</html>
