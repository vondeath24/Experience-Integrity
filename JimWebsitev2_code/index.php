
<?php 
    require_once 'server.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

<?php require_once 'header.php';?>
<title>Integrity LLC. The most valuable experience in contracting in the Chicago area</title>
<meta name="description" content="Our goal at Integrity is to make working with a contractor a 
        positive experience.  Our strategy ensures our clients the ease 
        and convenience in obtaining quotes, working with trusted sources, 
        and saving money."/>
</head>
<body>

<?php require_once 'homeModal.php';?>

<div class="homeFirstSection movement1">
    <?php require_once 'navbar.php'; ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h2 class="mTitle">
                    Welcome to the Most Valuable Experience in Contracting
                </h2>            
            </div>
        </div>
        <div class="row justify-content-center">
<div class="homeSeventhSection">
    <div class="container">
        <div class="row">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="8000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <p><i>“… quick and efficient quotes; exceeds client expectations; 
                        reliable and always available; meets timelines and budget; end 
                        results are outstanding.” – Saira M.</i></p>
                    </div>
                    <div class="carousel-item">
                        <p><i>“Integrity did everything that they promised and more than 
                        we expected. They will always be my first call when I have any 
                        contracting needs.” – Jason R.</i></p>
                    </div>
                    <div class="carousel-item">
                        <p><i>“It was the easiest process ever to get multiple quotes 
                        for our driveway project. I could not be happier that we trusted 
                        Integrity.” – Sue B.</i></p>
                    </div>
                    <div class="carousel-item">
                        <p><i>“Integrity installed our backyard patio and we could not be
                             happier with the outcome. Aside from the beautiful look and 
                             functionality of the patio itself, we were impressed by their standards 
                             of customer service – truly exceeding our expectations on all fronts. 
                             You would be hard-pressed to find a more honest, invested, or skilled 
                             contractor than Integrity.” – Lauren P.</i></p>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
        </div>
        <div class="row">
            <div class="col justify-content-center align-items-center">
                <div class="text-center">
                    <button id="hButton" type="button" data-toggle ="modal" data-target ="#myModal">Start a Project!</button>      
                </div>

            </div>
        </div>
    </div>   
</div>
<div class="homeSecondSection">
    <div class="container">   
    <div class="row">
        <div class="col-md-6 justify-content-center">
        <div class="aboutHeader">
            <h2 class="headerStyle">About Us</h2>
        </div> 
        <p>Our goal at Integrity is to make working with a contractor a 
        positive experience.  Our strategy ensures our clients the ease 
        and convenience in obtaining quotes, working with trusted sources, 
        and saving money.</p>
        <p>Our business model is simple. Answering a phone call, showing up 
        to an appointment on time, under-promising and over-delivering, and 
        doing what you say you will do are examples of what it means to be a 
        person of integrity. Each person on our team understands that trust, 
        loyalty, and excellence are what drives our continued success and the 
        growth of our company. </p>
        </div>
        <div class="col-md-6 justify-content-center m-auto">
            <img class="aboutImageRight" src="Images/aboutUsRight.png" alt="Value and Success">   
        </div>
        </div>
    </div>
</div>
<div class="homeFourthSection" id="whyChoose">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <img class="whyChooseLeft" src="Images/whyChooseLeft.png" alt="Clipboard with Checkmark"> 
            </div>
            <div class="col-md-6">
            <div class="whyChoose">
            <h2>Why Choose Integrity</h3>
            </div>
            <p>We have designed the best experience 
            in contracting. Our team works with you to understand your 
            needs, customize a solution, provide multiple quotes, and 
            professionally manage your project to its successful conclusion. We promise 
            to exceed your expectations!</p>
            </div>
        </div>
    </div> 
</div>
<div class="homeFourthSection" id="whatWeDo">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <div class="whatWeDo">
             <h2>What We Do</h3>
            </div>
            
            <p>After meeting with you to discuss the scope of your project, 
            Integrity is committed to providing you with multiple quotes. 
            We work to take away the customer frustration of attempting to 
            schedule with multiple contractors, no show appointments, and 
            unanswered calls. Our goal is to save you money, complete projects 
            with as little effort on your part as possible, and finish on time and 
            within your budget. There is no easier experience in all of contracting 
            than with Integrity!</p>
            </div>
            <div class="col-md-6">
                <img class="pig" src="Images/pig.png" alt="Illustrated Piggy Bank"> 
            </div>
        </div>
    </div> 
</div>

<div class="homeFourthSection" id="whatToExpect">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img class="pig" src="Images/network.png" alt="Network of People">
            </div>
            <div class="col-md-6">
            
            <div class="WhatToExpect">
            <h2>What To Expect</h3>
            </div>
            
            <p>Once <a href="" data-toggle="modal" data-target="#myModal">contacted</a>, we go to work for you. You will receive a telephone
                call or email from one of our project managers on the same day as
                contacted to schedule a site visit. After our visit, we request
                multiple bids from our network of contractors and will then present
                you with a proposed agreement for your project. Once a contract is
                signed and the project is scheduled, we will communicate with you
                regularly so that you have everything necessary for a successful
                completion and valuable experience.
            </p>
            </div>
        </div> 
</div>
</div>




<?php require_once 'footer.php'; ?>
<?php require_once 'scripts.php' ?>

</body>
</html>