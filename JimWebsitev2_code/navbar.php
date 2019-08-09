<?php function _e($string)
{
    echo htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
?>
<nav class="navbar navbar-dark navbar-expand-md">

        <a href="index.php"><img class= "navbar-brand" src="Images/JimFinalLogo.png" height="119px" width="174px" alt="Integrity LLC Logo"></a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
            <span class="navbar-toggler-icon"></span>
        </button>

    <div class="collapse navbar-collapse" id="collapse_target">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class= "nav-link" href="index.php#whyChoose">Why Choose Integrity</a>
            </li>
            <li class="nav-item">
                <a class= "nav-link" href="index.php#whatWeDo">What We Do</a>
            </li>
            <li class="nav-item">
                <a class= "nav-link" href="index.php#whatToExpect">What To Expect</a>
            </li>
            <?php 
            if(!isset($_SESSION['user']))
            {
            ?>    
            <li class="nav-item">
                <a class= "nav-link" href="login.php">Log In</a>
            </li>
            <?php 
            }
            else if(isset($_SESSION['user']) && isset($_SESSION['isAdmin']))
            {
            ?>
                <div class="dropdown nav-item">
                <button type="button" class= "btn btn-default nav-item dropdown-toggle" data-toggle="dropdown">
                    Hello: <?php _e($_SESSION['user'])?><div class="caret"></div>
                </button>
                <ul class="dropdown-menu nav-item adminPanel">
                    <li><u>Admin Panel</u></li>
                    <li><a href="myProfile.php">My Profile</a></li>
                    <li><a href="viewProjects.php">View Projects</a></li>
                    <li><a href="logout.php?logout">Log Out</a></li>
                </ul>                
            </div>
            <?php
            }
            else
            {    
            ?>
            <div class="dropdown nav-item">
                <button type="button" class= "btn btn-default nav-item dropdown-toggle" data-toggle="dropdown">
                    Hello: <?php _e($_SESSION['user'])?><div class="caret"></div>
                </button>
                <ul class="dropdown-menu nav-item">
                    <li><a href="myProfile.php">My Profile</a></li>
                    <li><a href="myProjects.php">My Projects</a></li>
                    <li><a href="#">My Invoices</a></li>
                    <li><a href="logout.php?logout">Log Out</a></li>
                </ul>                
            </div>
            <?php 
            }
            ?>
        </ul>
    </div>
</nav>