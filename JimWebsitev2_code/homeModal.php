<?php 
ini_set('display_errors', 1);

    if(isset($_POST["submit"]) && !isset($_SESSION['user_id']))
    {
        if(empty($_POST["fullName"]) || empty($_POST["userEmail"]) || empty($_POST["userPhone"]) || empty($_POST["userDescription"]))
            {
                $message = '<label>All fields are required</label>';
            }
        else
            {

                $fullName = $_POST['fullName'];
                $userEmail = $_POST['userEmail'];
                $userPhone = $_POST['userPhone'];
                $userDesc = $_POST['userDescription'];
                $referredBy = $_POST['referredBy'];

                $name = $fullName;
                $email = $userEmail;
                $to = 'jim@experienceintegrity.com';
                $subject = 'New Project From: ' . $name;
                $body = '<html>
                            <body>
                                <h2>Project Details</h2>
                                <hr>
                                <p>Name of Client:<br>' .$name.'</p>
                                <p>Email:<br>'. $email.'</p>
                                <p>Phone Number:<br>'.$userPhone.'</p>
                                <p>Project Description:<br>'.$userDesc.'</p>
                                <p>Referred By:<br>'.$referredBy.'</p>
                            </body>
                        </html>';

                //headers
                $headers = "From: ".$name." <".$email.">\r\n";
                $headers .= "Reply-To: ".$email."\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=utf-8";
                $headers .= "X-Priority: 3\r\n";
                
                //send
                $send = mail($to, $subject, $body, $headers);
                if($send)
                {
                    header("Location: thankyou.php");
                }
                else
                {
                    echo 'error';
                }
            
            }       
    }
    elseif(isset($_POST["submit"]) && isset($_SESSION['user_id']))
    {
             if(empty($_POST["fullName"]) || empty($_POST["userEmail"]) || empty($_POST["userPhone"]) || empty($_POST["userDescription"]))
             {
                $message = '<label>All fields are required</label>';
             }
             else
             {

                $fullName = $_POST['fullName'];
                $userEmail = $_POST['userEmail'];
                $userPhone = $_POST['userPhone'];
                $userDesc = $_POST['userDescription'];
                $userName = $_SESSION['user'];
                $referredBy = $_POST['referredBy'];

                $stmt = $db->prepare("INSERT INTO homemessages (username, full_name, userEmail, userPhone, userDescription, referredBy)
                VALUES (:username, :fullName, :userEmail, :userPhone, :userDescription, :referredBy)");
    
                $stmt->bindParam(':username', $userName);
                $stmt->bindParam(':fullName', $fullName);
                $stmt->bindParam(':userEmail', $userEmail);
                $stmt->bindParam(':userPhone', $userPhone);
                $stmt->bindParam(':userDescription', $userDesc);
                $stmt->bindParam(':referredBy', $referredBy);
                $stmt->execute();

                $name = $fullName;
                $email = $userEmail;
                $to = 'jim@experienceintegrity.com';
                $subject = 'New Project From: ' . $name;
                $body = '<html>
                            <body>
                                <h2>Project Details</h2>
                                <hr>
                                <p>Name of Client:<br>' .$name.'</p>
                                <p>Email:<br>'. $email.'</p>
                                <p>Phone Number:<br>'.$userPhone.'</p>
                                <p>Project Description:<br>'.$userDesc.'</p>
                                <p>Referred By:<br>'.$referredBy.'</p>
                            </body>
                        </html>';

                //headers
                $headers = "From: ".$name." <".$email.">\r\n";
                $headers .= "Reply-To: ".$email."\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=utf-8";
                $headers .= "X-Priority: 3\r\n";
                
                //send
                $send = mail($to, $subject, $body, $headers);
                if($send)
                {
                    header("Location: thankyou.php");
                }
                else
                {
                    echo 'error';
                }
            
            } 
    }      
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1>Submit A Project!</h1>
                        </div>
                        <div class="modal-body">
                        <div class= "container modalForm">
                            <form class="form-horizontal" method="POST" action="">
                                <div class="form-group">
                                    <label class="control-label col" for="firstName">Full Name:</label>
                                    <div class="col-sm-10">
                                        <input type= "TEXT" class="form-control inputText"  placeholder="Enter Full Name" name="fullName" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col" for="email">Email:</label>
                                    <div class="col-sm-10">
                                        <input type= "EMAIL" class="form-control inputText"  placeholder="Enter Email" name="userEmail" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col" for="pNumber">Phone Number:</label>
                                    <div class="col-sm-10">
                                        <input type= "TEXT" class="form-control inputText"  placeholder="Enter Phone Number" name="userPhone" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col" for="email">Description of the Project:</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control inputText"  placeholder="Describe Your Project" name="userDescription" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col" for="email">Referred By:</label>
                                    <div class="col-sm-10">
                                        <input type="TEXT" class="form-control inputText"  placeholder="Enter Referral" name="referredBy">
                                    </div>
                                </div>
                                <div class="form-group rButton">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type= "SUBMIT" class="rButton" name="submit" required>
                                        <p class="terms">By submitting your project you agree to our <a href="">terms</a> and our <a href="">Privacy Policy</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                        <div class="modal-footer">
                            <input class="btn btn-primary" data-dismiss="modal" value="close">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>