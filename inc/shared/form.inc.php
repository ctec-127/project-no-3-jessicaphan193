<?php // Filename: form.inc.php ?>

<!-- Note the use of sticky fields below -->
<!-- Note the use of the PHP Ternary operator
Scroll down the page
http://php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary
-->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
    <label class="col-form-label" for="first">First Name </label>
    <input class="form-control" type="text" id="first" name="first" value="<?php echo (isset($first) ? $first: '');?>">
    <br>
    <label class="col-form-label" for="last">Last Name </label>
    <input class="form-control" type="text" id="last" name="last" value="<?php echo (isset($last) ? $last: '');?>">
    <br>
    <label class="col-form-label" for="sid">Student ID </label>
    <input class="form-control" type="text" id="sid" name="sid" value="<?php echo (isset($sid) ? $sid: '');?>">
    <br>
    <label class="col-form-label" for="email">Email </label>
    <input class="form-control" type="text" id="email" name="email" value="<?php echo (isset($email) ? $email: '');?>">
    <br>
    <label class="col-form-label" for="phone">Phone </label>
    <input class="form-control" type="text" id="phone" name="phone" value="<?php echo (isset($phone) ? $phone: '');?>">
    <br>
    <label class="col-form-label" for="gpa">GPA</label>
    <input class="form-control" type="number" min="0" max="4.0" step="0.01" id="gpa" name="gpa" value="<?php echo (isset($gpa) ? $gpa: '');?>">
    <br>
    <label class="col-form-label" for="grad_date">Graduation Date</label>
    <input class="form-control" type="date" min="2017-01-01" max="2020-12-31" id="grad_date" name="grad_date" value="<?php echo (isset($grad_date) ? $grad_date: '');?>">
    <br>
    <label class="col-form-label" for="financial_aid">Financial Aid: </label>
    <br>

    <input type="radio" name="financial_aid" value="1"<?php if (isset($_POST['financial_aid']) and $_POST['financial_aid'] == 'yes') echo ' checked'; ?>>Yes
    <input type="radio" name="financial_aid" value="no"<?php if (isset($_POST['financial_aid']) and $_POST['financial_aid'] == 'no') echo ' checked'; ?>>No
    
    <br>
    <label class="col-form-label" for="degree_program">Degree Program</label>
        <select class="form-control" id="degree_program" name="degree_program">
            <option value=""<?php if (isset($degree_program) && $degree_program == "") echo ' selected="selected"'; ?>>**Pick a Program**</option>
            <option value="accounting"<?php if (isset($degree_program) && $degree_program == "accounting") echo ' selected="selected"'; ?>>Accounting</option>
            <option value="bas"<?php if (isset($degree_program) && $degree_program == "bas") echo ' selected="selected"'; ?>>BAS-Human Service</option>
            <option value="nursing"<?php if (isset($degree_program) && $degree_program == "nursing") echo ' selected="selected"'; ?>>Nursing</option>
            <option value="other"<?php if (isset($degree_program) && $degree_program == "other") echo ' selected="selected"'; ?>>Other</option>
        </select>
    <br>
    <a href="display-records.php">Cancel</a>&nbsp;&nbsp;
    <button class="btn btn-primary" type="submit">Save Record</button>
    <input type="hidden" name="id" value="<?php echo (isset($id) ? $id : '');?>">
</form>