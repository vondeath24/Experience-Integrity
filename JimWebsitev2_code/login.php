<!DOCTYPE html>

<html lang="en">
<head>
    <?php include 'header.php';?>
    <title>Log In</title>
</head>


<body>
<?php

$error = NULL;
$error2 = NULL;
$error3 = NULL;

if(isset($_POST['submit']))
{
    require_once 'server.php';
    //require_once 'server2LocalMachine.php';
    //Get form data

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['username'];
    //Query 

    $resultSet = $db->prepare("SELECT * FROM useraccounts Where username =:username or email =:email LIMIT 1");
    $resultSet->bindParam(':username', $username);
    $resultSet->bindParam(':email', $email);
    //$resultSet->bindParam(':password', $password);
    $resultSet->execute();

    $numRow2 = $resultSet->rowCount();

    if($numRow2 == 1)
    {
        $row = $resultSet->fetch();

            if(password_verify($password, $row['password']))
            {
                    //Process Login
                
                    $verified = $row['verified'];
                    $email = $row['email'];
                    $date = $row['createdate'];
                    $date = strtotime($date);
                    $date = date('M d Y', $date);
                    $id = $row['user_id'];
                    $admin = $row['admin'];
                    if($verified == 1)
                    {
                        if($admin == 1)
                        {
                            $_SESSION['isAdmin'] = $admin;
                        }

                        //Continue Process
                        $_SESSION['user'] = $username;
                        $_SESSION['user_id'] = $id;
                        
                        //Redirect to member page
                        header('location: index.php');
                    }
                    else
                    {
                        $error = "This account has not yet been verified. An email was sent to $email on $date";
                    }           
            }
            else
            {
                $error = "The username or password you entered is not correct";
            }
        }
    } 
?>
<div class= "rFirstSection movement1">
    <?php require_once 'navbar.php'; ?>
        <div class= "container rForm">
            <h2>Log In!</h2>
                <form class="form-horizontal" method="POST" action="login.php">
                        <div class="form-group">
                            <label class="control-label col-lg-6 col-sm-6" for="username">Username or Email: <p><?php echo $error?></p></label>
                            <div class="col-sm-10">
                                <input type= "TEXT" class="form-control" placeholder="enter username or email" name="username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-6 col-sm-6" for="password">Password: </p></label>
                            <div class="col-sm-10">
                                <input type= "password" class="form-control"  placeholder="enter password" name="password" required>
                            </div>
                        </div>
                        <div class="form-group rButton haveAnAccount">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type= "SUBMIT" class="rButton" name="submit" required>
                                <p> Don't have an account? Sign Up <a href="registration.php">here!</a></p>
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