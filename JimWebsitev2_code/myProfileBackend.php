<?php

    if(isset($_SESSION['user']))
    {
        require_once 'server.php';

        $stmt = $db->prepare("SELECT * From useraccounts");

        $stmt->execute();

        if($stmt->rowCount() >= 1)
        {
            $row = $stmt->fetchALL(PDO::FETCH_ASSOC);

            foreach($row as $r)
            {
                $id = $r['user_id'];
                $username = $r['username'];
                $email = $r['email'];

                if($_SESSION['user'] == $username)
                {
                ?>
                <p>Username: <?php _e($username);?></p>
                <p>Email: <?php _e($email);?></p>
                <?php
                }
            }
        }
    }

?>