<?php 

    if(isset($_SESSION['user']) && $_SESSION['isAdmin'] == 1)
        {
            //require_once 'server2LocalMachine.php';
            require_once 'server.php';

            $stmt = $db->prepare("SELECT * FROM homemessages ORDER BY datecreated DESC");
            $stmt->execute();
                            
            $numRows = $stmt->rowCount();
            
            if($numRows >= 1)
                {
                    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($row as $r)
                    {
                        $id = $r['post_id'];
                        $user = $r['username'];
                        $fullName = $r['full_name'];
                        $uEmail = $r['userEmail'];
                        $uPhone = $r['userPhone'];
                        $uDesc = $r['userDescription'];
                        $referredBy = $r['referredBy'];
                        $date = $r['datecreated'];
                        $date = strtotime($date);
                        $date = date('M d Y', $date);

                        $_SESSION['userDescript'] = $uDesc;

                        if($_SESSION['isAdmin'] == 1)
                            {

                                $_SESSION['postID'] = $id;
                            ?>
                                <tr>
                                    <td> <?php _e($user)?> </td>
                                    <td> <?php _e($fullName)?> </td>
                                    <td> <?php _e($uEmail)?> </td>
                                    <td> <?php _e($uPhone)?> </td>
                                    <td class="desc"> <?php _e($uDesc)?></td>
                                    <td><?php if($referredBy)
                                    {
                                        _e($referredBy);
                                    } 
                                    else
                                    {
                                        _e(" ");   
                                    }?> </td>   
                                    <td> <?php _e($date)?> </td>
                                </tr>
                            <?php
                            }
                    }
                }
            }
?>
            