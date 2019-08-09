<!DOCTYPE html>

<html lang="en">
<head>
    <?php require_once 'header.php';?>
    <title>Sign Up</title>
</head>


<body>
<?php
$error = NULL;
$error2 = NULL;
$error3 = NULL;
ini_set('display_errors', 1);

    if(isset($_POST['submit']))
    {
        //Get form data
        $username = $_POST['username'];
        $password = $_POST['password'];
        $options = ['cost' => 12];     
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT,$options);
        $p2 = $_POST['p2'];
        $email = $_POST['email'];
        $email2 = $_POST['email2'];
        
        if(strlen($username) < 8)
        {
            $error = "<p>Your username must be at least 8 characters.</p>";
        }
        elseif($p2 != $password)
        {
            $error2 .= "<p>Your passwords do not match</p>";
        }
        elseif($email2 != $email)
        {
            $error3.="<p>Your emails do not match</p>";
        }
        else if(!isset($error))
        {
            require_once 'server.php';
            
            $uHandler = $db->prepare("SELECT username, email From useraccounts where username= :username
            OR email=:email");
            $uHandler->bindParam(':username', $username);
            $uHandler->bindParam(':email', $email);
            $uHandler->execute();

            if($uHandler->rowCount() > 0)
            {
                $error = "There is already an account with that email or username, please try again";
            }

            else
            {
                //generate Vkey

                $vkey = md5(time().$username);
                
                $stmt = $db->prepare("INSERT INTO useraccounts(username, password, email, vkey)
                VALUES(:username, :password, :email, :vkey)");

                //sanitize data

                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $hashedpassword);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':vkey', $vkey);
                $stmt->execute();

                if($stmt)
                {
                    $to = $email;
                    $subject = "Email Verification";
                    $message = "<a href='http://experienceintegrity.com/verify.php?vkey=$vkey'>Register Account</a>";
                    $headers ="From: jim@experienceintegrity.com" . "\r\n";
                    $headers .="MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";

                    mail($to, $subject,$message,$headers);

                    header('location: thankyou2.php');
                }
                else
                {
                    echo $message;
                }
            }   
        }
    }
?>
<div class= "rFirstSection movement1">
    <?php require_once 'navbar.php'; ?>

        <div class= "container rForm">
            <h2>Sign Up!</h2>
                <form class="form-horizontal" method="POST" action="registration.php">
                        <div class="form-group">
                            <label class="control-label col-lg-6 col-sm-6" for="username">Username: <p><?php echo $error?></p></label>
                            <div class="col-sm-10">
                                <input type= "TEXT" class="form-control" placeholder="username" name="username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-6 col-sm-6" for="password">Password: <p><?php echo $error2?></p></label>
                            <div class="col-sm-10">
                                <input type= "password" class="form-control"  placeholder="enter password" name="password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="p2">Repeat Password:</label>
                            <div class="col-sm-10">
                                <input type= "password" class="form-control"  placeholder="re-enter password" name="p2" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-6 col-sm-2" for="email">Email: <p><?php echo $error3?></p></label>
                            <div class="col-sm-10">
                                <input type= "EMAIL" class="form-control"  placeholder="Enter email" name="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email2">Repeat Email:</label>
                            <div class="col-sm-10">
                                <input type= "EMAIL" class="form-control"  placeholder="re-enter email" name="email2" required>
                            </div>
                        </div>
                        <div class="form-group rButton haveAnAccount">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type= "SUBMIT" class="rButton" name="submit" required>
                                <p> Already have an account? Log in <a href="login.php">here!</a></p>
                                <p> By signing up you agree to our <a href="#">Terms and Conditions</a>, and our <a href="#">Privacy Policy</a>.</p>
                            </div>
                        </div>
                </form>
        </div>
</div>

<div class="rFooter">
   <?php include 'footer.php';?>
</div>
<?php require_once 'scripts.php' ?>
</body>
</html>