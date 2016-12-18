<script type = "text/javascript" src ="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<?php //$this->load->view('includes/header'); ?>
<?php //$this->load->view('includes/leftMenu'); ?>


<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">Student Examination Papers</h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <label style="color:Green;font-size:28px;"></label>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div id="margin-top" class="panel-body">

                      
                            
                    
                                <div class="col-lg-12">

                                <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-striped table-bordered table-hover no-footer dataTable" id="dt-state-franchisee" style="font-size:14px;" aria-describedby="dt-state-franchisee_info">
                                        <thead>
                                        <tr role="row">
                                            <th>ID</th>
                                            <th>EXAM PAPER</th>
                                            <th>PROGRAM NAME</th>
                                            <th>COURSE NAME</th>
                                            <th>LEVEL NAME</th>
                                            <th></th>
                                            

                                        </tr></thead>
                                        <tbody>
                                        <?php
                                        $i=1;
                                        if(!empty($files)): foreach($files as $file): ?>

                                       <?php  //print_r($file['exam_status']); ?>
                                            <tr class="odd">
                                                <td><?php echo $i;?></td>
                                                <td>


<a href="<?php echo base_url(); ?>index.php/StudentManagement/upload/"><img src="<?php echo base_url('uploads/exams/'.$file['exam_name']); ?>" alt="" height="42" width="42" ></a>
                                                </td>
                                                <td><?php echo $file['program_name']; ?></td>
                                                <td><?php echo $file['course_name']; ?></td>
                                                <td><?php echo $file['level_name']; ?></td>
                                                <td><input type="radio" name="status[<?php print $i; ?>]" id="status_id_1" value="active" <?php if ($file['exam_status'] == 'active') echo 'checked="checked"'; ?> onclick="changeStatus('<?php echo $file['exam_id']; ?>','active');"> Active
                                                    <input type="radio" name="status[<?php print $i; ?>]" id="status_id_2" value="inactive" <?php if ($file['exam_status'] == 'inactive') echo 'checked="checked"'; ?> onclick="changeStatus('<?php echo $file['exam_id']; ?>','inactive');">Inactive
                                                </td>
                                                
                                               
                                            </tr>

                                        <?php $i++; ?>
                                         <?php endforeach; else: ?>
                                        <tr><td colspan="6">File(s) not found.....</td></tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                    <!-- /.panel-body -->
                                </div>
                                <!-- /.panel -->
                            </div>



                            <div class="modal fade" id="success" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <label style="color:Green;font-size:28px;"></label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            <!-- /Modal -->
                            <script type='text/javascript'>
                                // CalTax is for calicualting 15% tax on Franchisee License Fee
                            $(function () {
                                
                                $(document).ready(function () {
                                    $("#program").change(function () {
                                        
                                        $("#course").html('<option value="">Select</option>');
                                        $("#level").html('<option value="">Select</option>');
                                        lookupManager.GetCourseLevels($(this).val(), function (courses) {
                                            var temp = [];
                                            for (i = 0; i < courses.length; i++) {
                                                var course = courses[i];
                                                if (temp.indexOf(course.CourseId) == -1) {
                                                    $("#course").append('<option value="' + course.CourseId + '" >' + course.CourseName + '</option>');
                                                    temp.push(course.CourseId)
                                                }
                                            }
                                        });
                                    });
                                    $("#course").change(function () {
                                        $("#level").html('<option value="">Select</option>');
                                        lookupManager.GetCourseLevels($("#program").val(), function (courses) {
                                            var temp = [];
                                            for (i = 0; i < courses.length; i++) {
                                                var course = courses[i];
                                                if (course.CourseId == parseInt($("#course").val())) {
                                                    if (temp.indexOf(course.LevelName) == -1) {
                                                        $("#level").append('<option value="' + course.CourseLevelId + '">' + course.LevelName + '</option>');
                                                        temp.push(course.LevelName)
                                                    }
                                                }

                                            }
                                        });
                                    });
                                    $("#level").change(function () {
                                        studentManager.GetStudentFeeByCourse($(this).val(), function (result) {
                                            if (result) {
                                                $("#RegistrationFee").val(result.RegistrationFee);
                                                $("#CourseFee").val(result.CourseFee);
                                                $("#KitFee").val(result.KitFee);
                                            }
                                        });
									
                                });
                            });
                            </script>


                            </div>



                           
                           
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
              

        </div>
       <script type="text/javascript">
                               

                           function changeStatus(id,status){

                                //alert(id);
                                //alert(status);
                                $.ajax({
                                        type: "POST",
                                        url: "<?php echo base_url(); ?>" + "index.php/StudentManagement/saveExamStatus",
                                        dataType: 'json',
                                        data: {id: id, status: status},
                                        success: function(res) {
                                        if (res)
                                        {
                                        // Show Entered Value
                                        alert('save exam status successfull')
                                        
                                        }
                                        }
                                });

                            }


            </script>
        
        <!-- /.col-lg-12 -->
        <link href="Skills%20Education%20Academy_files/tjquery-ui.css" rel="stylesheet">
        <script src="Skills%20Education%20Academy_files/jquery-students.js"></script>
        <script src="Skills%20Education%20Academy_files/jquery-ui.js"></script>
    </div>
    <footer><p>All right reserved by: <a href="#">FriendsFocus</a></p></footer>
</div>
<?php $this->load->view('includes/footer'); ?>
