<?php // Filename: display-records.php

//Holds information for displaying once set
//In this case; displaying student_v2.sql

$pageTitle = "Record Management";
require 'inc/layout/header.inc.php'; 
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
        <?php require "inc/display/content.inc.php"; ?>
        </div>
    </div> <!-- end row -->
</div> <!-- end container -->
<?php require 'inc/layout/footer.inc.php'; ?>