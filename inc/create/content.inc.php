<?php // Filename: connect.inc.php

//creating a row of information

require __DIR__ . "/../db/mysqli_connect.inc.php";

require __DIR__ . "/../app/config.inc.php";

$error_bucket = [];

// http://php.net/manual/en/mysqli.real-escape-string.php

if($_SERVER['REQUEST_METHOD']=="POST"){
    // First insure that all required fields are filled in
    if (empty($_POST['first'])) {
        array_push($error_bucket,"<p>A first name is required.</p>");
    } else {
        # Old way
        #$first = $_POST['first'];
        # New way
        $first = $db->real_escape_string($_POST['first']);
    }
    if (empty($_POST['last'])) {
        array_push($error_bucket,"<p>A last name is required.</p>");
    } else {
        #$last = $_POST['last'];
        $last = $db->real_escape_string($_POST['last']);
    }
    if (empty($_POST['sid'])) {
        array_push($error_bucket,"<p>A student ID is required.</p>");
    } else {
        #$id = $_POST['id'];
        $sid = $db->real_escape_string($_POST['sid']);
    }
    if (empty($_POST['email'])) {
        array_push($error_bucket,"<p>An email address is required.</p>");
    } else {
        #$email = $_POST['email'];
        $email = $db->real_escape_string($_POST['email']);
    }
    if (empty($_POST['phone'])) {
        array_push($error_bucket,"<p>A phone number is required.</p>");
    } else {
        #$phone = $_POST['phone'];
        $phone = $db->real_escape_string($_POST['phone']);
    }
    if (empty($_POST['gpa'])){
        array_push($error_bucket,"<p>GPA is required<p>");
    } else {
        #$gpa = $_POST['gpa'];
       $gpa = $db->real_escape_string($_POST['gpa']);
    }
    if (empty($_POST['grad_date'])) {
        array_push($error_bucket,"<p>Graduation date is required.</p>");
    } else {
        #$grad_date = $_POST['grad_date'];
        $grad_date = $db->real_escape_string($_POST['grad_date']);
    }
    if (empty($_POST['financial_aid'])) {
        array_push($error_bucket,"<p>Financial Aid is required.</p>");
    } else {
        #$financial_aid = $_POST['financial_aid'];
        $financial_aid = $db->real_escape_string($_POST['financial_aid']);
    }
    if (empty($_POST['degree_program'])) {
        array_push($error_bucket,"<p>Degree Program is required.</p>");
    } else {
        #$degree_program = $_POST['degree_program'];
        $degree_program = $db->real_escape_string($_POST['degree_program']);
    }

    // If we have no errors than we can try and insert the data
    if (count($error_bucket) == 0) {
        // Time for some SQL
        $sql = "INSERT INTO $db_table (first_name,last_name,student_id,email,phone,gpa,grad_date,financial_aid,degree_program) ";
        $sql .= "VALUES ('$first','$last',$sid,'$email','$phone','$gpa','$grad_date','$financial_aid','$degree_program')";

        // comment in for debug of SQL
        // echo $sql;

        $result = $db->query($sql);
        if (!$result) {
            echo '<div class="alert alert-danger" role="alert">
            I am sorry, but I could not save that record for you. ' .  
            $db->error . '.</div>';
        } else {
            echo '<div class="alert alert-success" role="alert">
            I saved that new record for you!
          </div>';

          //unsetting to have it empty after successful record
            unset($first);
            unset($last);
            unset($sid);
            unset($email);
            unset($phone);
            unset($gpa);
            unset($grad_date);
            unset($financial_aid);
            unset($degree_program);
        }
    } else {
        display_error_bucket($error_bucket);
    }
}

?>



