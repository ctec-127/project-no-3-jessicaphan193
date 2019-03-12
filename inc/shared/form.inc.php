<?php // Filename: form.inc.php ?>

<!-- Note the use of sticky fields below -->
<!-- Note the use of the PHP Ternary operator
Scroll down the page
http://php.net/manual/en/language.operators.comparison.php#language.operators.comparison.ternary
-->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
    <label class="col-form-label" for="first">First Name </label>
    <input class="form-control" type="text" id="first" name="first" value="<?php echo (isset($first) ? $first : '');?>">
    <br>
    <label class="col-form-label" for="last">Last Name </label>
    <input class="form-control" type="text" id="last" name="last" value="<?php echo (isset($last) ? $last : '');?>">
    <br>
    <label class="col-form-label" for="sid">Student ID </label>
    <input class="form-control" type="text" id="sid" name="sid" value="<?php echo (isset($sid) ? $sid: '');?>">
    <br>
    <label class="col-form-label" for="email">Email </label>
    <input class="form-control" type="text" id="email" name="email" value="<?php echo (isset($email) ? $email : '');?>">
    <br>
    <label class="col-form-label" for="phone">Phone </label>
    <input class="form-control" type="text" id="phone" name="phone" value="<?php echo (isset($phone) ? $phone : '');?>">
    <br>
    <label class="col-form-label" for="gpa">GPA</label>
    <input class="form-control" type="number" min="0" max="5.0" step="0.01" id="gpa" name="gpa" value="<?php echo (isset($gpa) ? $gpa: '');?>">
    <br>
    <label class="col-form-label" for="yes">Financial Aid: </label>
    <br>
    <label class="radio-inline" for="yes"><input type="radio" name="financial_aid" id="yes" value="YES"> Yes </label>
    <label class="radio-inline" for="no"><input type="radio" name="financial_aid" id="no" value="NO" checked> No </label>
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