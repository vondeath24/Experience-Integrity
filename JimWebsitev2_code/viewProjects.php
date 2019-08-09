<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once 'header.php'?>
    <title>My Projects</title>
</head>
<body>
    <div class="thankYouSection">

    <?php require_once 'myProjectsModal.php'?>
    <?php require_once 'navbar.php'?>

        <div class="container">
            <div class="row">
                <div class="col-lg-12 projectRow m-auto table-responsive">
                <h1>Project view</h2>
                    <div class="projectInput">
                        <table id="table-1" class="table table-striped table-dark table-border table-responsive-sm table-responsive-md table-responsive-lg tableSpacing">
                            <thead>
                            <tr>
                                <th scope="col">Username <hr></th>
                                <th scope="col">Name<hr></th>
                                <th scope="col">Email<hr></th>
                                <th scope="col">Phone Number<hr></th>
                                <th scope="col">Project Description<hr></th>
                                <th scope="col">Referred By<hr></th>
                                <th scope="col">Date Created<hr></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php require_once 'viewProjectsBackend.php';?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'footer.php'?>
<?php require_once 'scripts.php'?>
<style>
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
  background: none;
  color: black!important;
  /*change the hover text color*/
}
.dataTables_wrapper .dataTables_paginate .paginate_button {
  background: none;
  color: white!important;
  /*change the hover text color*/
}
/*below block of css for change style when active*/

.dataTables_wrapper .dataTables_paginate .paginate_button:active {
  background: none;
  color: transparent!important;
}
</style>
</body>
</html>