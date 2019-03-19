<?php // Filename: advanced-search.php

//Deep in searching, or specific searching

$pageTitle = "Advanced Search";

//connecting to receive data
require_once 'inc/layout/header.inc.php';
require_once 'inc/db/mysqli_connect.inc.php';
require_once 'inc/app/config.inc.php';
require_once 'inc/functions/functions.inc.php';
?>

<div class="jumbotron">
    <h1 class="col-lg text-center bold">Advanced Search</h1>
</div>

<div class="container">
    <div class="col-lg-12 mt-5">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
    <div class="form-group">
        <label class="col-lg-2">First Name</label>
        <div class="col-lg-4">
        <input type="text" class="form-control" name="first_name" placeholder="First name" value="<?php echo (isset($first) ? $first : ''); ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2">Last Name</label>
        <div class="col-lg-4">
        <input type="text" class="form-control" name="last_name" placeholder="Last name" value="<?php echo (isset($last) ? $last : ''); ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2">Phone</label>
        <div class="col-lg-4">
        <input type="text" class="form-control" name="phone" placeholder="Phone number" value="<?php echo (isset($phone) ? $phone : ''); ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2">Email</label>
        <div class="col-lg-4">
        <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($email) ? $email : ''); ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2">GPA</label>
        <div class="col-lg-4">
        <input type="number" min="0" max="4.0" step="0.01" class="form-control" name="gpa" placeholder="gpa" value="<?php echo (isset($gpa) ? $gpa : ''); ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2">Graduation Date</label>
        <div class="col-lg-4">
        <input type="date" min="2017-01-01" max="2020-12-31" class="form-control" name="grad_date>" value="<?php echo (isset($grad_date) ? $grad_date : ''); ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2">Financial Aid</label>
        <div class="col-lg-4">
        <input type="text" class="form-control" name="financial_aid" placeholder="Yes=1 or No=0" value="<?php echo (isset($financial_aid) ? $financial_aid : ''); ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2">Degree Program</label>
        <div class="col-lg-4">
        <select class="form-control" id="degree_program" name="degree_program">
            <option value=""<?php if (isset($degree_program) && $degree_program == "") echo ' selected="selected"'; ?>>**Pick a Program**</option>
            <option value="accounting"<?php if (isset($degree_program) && $degree_program == "accounting") echo ' selected="selected"'; ?>>Accounting</option>
            <option value="bas"<?php if (isset($degree_program) && $degree_program == "bas") echo ' selected="selected"'; ?>>BAS-Human Service</option>
            <option value="nursing"<?php if (isset($degree_program) && $degree_program == "nursing") echo ' selected="selected"'; ?>>Nursing</option>
            <option value="other"<?php if (isset($degree_program) && $degree_program == "other") echo ' selected="selected"'; ?>>Other</option>
        </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-2"></label>
        <div class="col-lg-4">
        <button class="btn btn-primary" type="submit">Search</button>
        <button class="btn btn-primary" a href="advanced-search.php">Clear</a>&nbsp;&nbsp;</button>
        </div>
    </div>
</form>






<?php
//Displaying search result
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    if (!empty($_POST['first_name'])){
        $first_name = $_POST['first_name'];
        $firstSQL = " first_name = " . '"' . $first_name . '"';
    } else {
        $firstSQL = ' first_name != null'; 
    }

    if (!empty($_POST['last_name'])){
        $last_name = $_POST['last_name'];
        $lastSQL = " AND last_name = " . '"' . $last_name . '"';
    } else {
        $lastSQL = '';
    }

    if (!empty($_POST['phone'])){
        $phone = $_POST['phone'];
        $phoneSQL = " AND phone = " . '"' . $phone . '"';
    } else {
        $phoneSQL = '';
    }

    if (!empty($_POST['email'])){
        $email = $_POST['email'];
        $emailSQL = " AND email = " . '"' . $email . '"';
    } else {
        $emailSQL = '';
    }

    if (!empty($_POST['gpa'])){
        $gpa = $_POST['gpa'];
        $gpaSQL = " AND gpa = " . '"' . $gpa . '"';  
    } else {
        $gpaSQL = '';
    }

    if (!empty($_POST['grad_date'])){
        $grad_date = $_POST['grad_date'];
        $grad_dateSQL = " AND grad_date = " . '"' . $grad_date . '"';
    } else {
        $grad_dateSQL = '';
    }

    if (!empty($_POST['financial_aid'])){
        $financial_aid = $_POST['financial_aid'];
        $financial_aidSQL = " AND financial_aid = " . '"' . $financial_aid . '"';
    } else {
        $financial_aidSQL = '';
    }

    if (!empty($_POST['degree_program'])){
        $degree_program = $_POST['degree_program'];
        $degree_programSQL = " AND degree_program = " . '"' . $degree_program . '"';
    } else {
        $degree_programSQL = '';
    }


    $sql = "SELECT * FROM $db_table WHERE" . "$firstSQL";

    
    $result = $db->query($sql);
    echo $sql;

    if ($result->num_rows > 0) {
        echo "<h3 class='alert alert-success mb-4'>$result->num_rows results were found</h3>";
    // echo $sql;
    display_record_table($result);
}
}
?>








</div>

</div> <!--container -->

<?php require 'inc/layout/footer.inc.php'; ?>