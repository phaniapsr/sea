<div id="page-wrapper">
<div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    Student/Parent Feedback Form
                </h1>
            </div>
        </div>
<?php foreach ($data['smf'] as $row) { ?>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div id="margin-top" class="panel-body">
<form id="studentFeedbackForm" action="<?php echo base_url()?>StudentManagement/parentFeedback" name="form1" class="form-horizontal fv-form fv-form-bootstrap" method="post" ng-app="app" ng-controller="Ctrl"  enctype="multipart/form-data" >
<div class="form-group">
<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">Unit Feedback</label>
<div class="col-lg-6 has-feedback">
<?php echo $row['unit_feedback'];?>
</div>
</div>
<div class="form-group">
<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">Student Name</label>
<div class="col-lg-6 has-feedback">
<?php echo $row['first_name'].' '.$row['last_name'];?>
<input type="hidden" name="course_level_id" value="<?php echo $row['course_level_id']?>">
</div>
</div>
<div class="form-group">
<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">Student Program</label>
<div class="col-lg-6 has-feedback">
<?php echo $row['program_name']; ?>
</div>
</div>
<div class="form-group">
<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">Student Category</label>
<div class="col-lg-6 has-feedback">
<?php echo $row['stu_category']; ?>
</div>
</div>
<div class="form-group">
<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">Student Level</label>
<div class="col-lg-6 has-feedback">
<?php echo $row['level_name']; ?>
</div>
</div>
<div class="form-group">
<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">Parent Name</label>
<div class="col-lg-6 has-feedback">
<?php echo $row['fath_name'];?>
</div>
</div>
<div class="form-group">
<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">Mobile No</label>
<div class="col-lg-6 has-feedback">
<?php echo $row['fath_mobno']; ?>
</div>
</div>
<div class="form-group">
<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">Was your child’s attendance to your satisfaction?</label>
<div class="col-lg-6 has-feedback">
<textarea class="form-control" id="attendance" name="attendance"></textarea>
</div>
</div>
<div class="form-group">
<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">Was your child regular in doing practice of the given exercises?</label>
<div class="col-lg-6 has-feedback">
<textarea class="form-control" id="excercise" name="excercise"></textarea>
</div>
</div>
<div class="form-group">
<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">Was your child interested in doing the practice or was it out of force & constant
reminders?</label>
<div class="col-lg-6 has-feedback">
<textarea class="form-control" id="practice" name="practice"></textarea>
</div>
</div>
<div class="form-group">
<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">Were you involved in motivating your child and encouraging him to do Mental
Arithmetic?</label>
<div class="col-lg-6 has-feedback">
<textarea class="form-control" id="motivating" name="motivating"></textarea>
</div>
</div>
<div class="form-group">
<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">Your observation regarding developmental changes in the child
Arithmetic?</label>
<div class="col-lg-6 has-feedback">
<textarea class="form-control" id="development" name="development"></textarea>
</div>
</div>
<div class="form-group">
<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">How do you feel about the Franchisee Center’s Infrastructure & Ambience?</label>
<div class="col-lg-6 has-feedback">
<textarea class="form-control" id="development" name="infra"></textarea>
</div>
</div>
<div class="form-group">
<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:right">How do you feel about the trainer / instructor?</label>
<div class="col-lg-6 has-feedback">
<textarea class="form-control" id="development" name="trainer"></textarea>
</div>
</div>
<div class="row">
   <div class="form-group">
 <center>
 <div>
         <button type="submit" id="signup" role="button" class="btn btn-primary" name="signup" value="Sign up" style="margin:10px;"></span>SUBMIT</button>
 </div>
 </center>
     </div>
 </div>
</form>.
<?php } ?>
</div>
</div>
</div>
</div>