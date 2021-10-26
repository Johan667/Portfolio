<?php

require_once 'header.php';
require_once '../config/framework.php';
require_once '../config/connect.php';


if (!isset($_SESSION['user'])) {
    redirectToRoute();
}

if (isset($_SESSION['user'])) {
    $roles = json_decode($_SESSION['user']['roles']);
    if (!in_array('ROLE_ADMIN', $roles)) {
        redirectToRoute();
    }
}

?>


</nav>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <h2>ADMIN DASHBOARD</h2>
            </div>
        </div>

        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-lg-12 ">
                <div class="alert alert-info">
                    <strong>Welcome <?= $_SESSION['user']['pseudo']; ?> ! </strong> Travail bien aujourd'hui !
                </div>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row text-center pad-top">

            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="mail.php">
                        <i class="fa fa-envelope-o fa-5x"></i>
                        <h4>Mail</h4>
                    </a>
                </div>


            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="users.php">
                        <i class="fa fa-users fa-5x"></i>
                        <h4>Users</h4>
                    </a>
                </div>


            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="admin.php">
                        <i class="fa fa-key fa-5x"></i>
                        <h4>Admin </h4>
                    </a>
                </div>


            </div>
        </div>

        <div class="row text-center pad-top">

            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="projets.php">
                        <i class="fa fa-clipboard fa-5x"></i>
                        <h4>Projets</h4>
                    </a>
                </div>

            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="support.php">
                        <i class="fa fa-comments-o fa-5x"></i>
                        <h4>Support</h4>
                    </a>
                </div>


            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="settings.php">
                        <i class="fa fa-gear fa-5x"></i>
                        <h4>Settings</h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<div class="footer">


    <div class="row">
        <div class="col-lg-12">
            &copy; 2021 Johan Kasri| Administrator
        </div>
    </div>
</div>


<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>


</body>

</html>

re