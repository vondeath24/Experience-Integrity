<?php 
ini_set('display_errors', 1);

        //require_once 'server2LocalMachine.php';
        require_once 'server.php';

        if(isset($_POST['deleteProject']))
        {
            if(isset($_SESSION['postID']))
            {
            $postID = $_SESSION['postID'];

            $stmt = $db->prepare("DELETE FROM homemessages Where post_id = :post_id LIMIT 1");
            $stmt->bindParam(':post_id', $postID);
            $stmt->execute();
            echo "<meta http-equiv='refresh' content='0'>";
            }
            else
            {
                echo "There was an error";
            }

        }
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="modal fade" id="postDeleteModal">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1>Delete project?</h1>
                        </div>
                        <div class="modal-body">
                            <p> Only delete the project once it is complete and you have received your invoice</p>
                        <div class= "container modalForm">
                            <form form class="form-horizontal" method="POST" action="">
                                <div class = row>
                                    <div class="col-sm-5">
                                    <label class="control-label" for="projectDelete">Delete project?</label>
                                        <input type="submit" class="btn btn-danger" name ="deleteProject"> 
                                    </div>
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

