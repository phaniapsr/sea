<script type = "text/javascript" src ="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="application/javascript" src="<?php echo base_url()?>scripts/admin/studentRegistration/studentRegistration.js"></script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">Student Examination Form</h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <label style="color:Green;font-size:28px;"></label>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div id="margin-top" class="panel-body">

                        <form id="creatExams"
                              action="<?php echo base_url() ?>StudentManagement/creatExams" name="form1"
                              class="form-horizontal" method="POST" 
                              enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-lg-6">
								<div class="form-group">
                                        <center style="font-size:20px;">Create Exams</center>
                                    </div>
									
                                    <div id="coursedetailsborder">
                                    <div class="form-group">
                                            <label class="col-lg-5 control-label" style="text-align:left"> Program *</label>
                                            <div class="col-lg-6">
                                                <select id="program" class="form-control" name="ProgramId">
                                                    <option selected="selected" value="">Select</option>
                                                    <option value="ACMAS">ACMAS</option>
                                                    <option value="WRITEASY">WRITEASY</option>
                                                    <option value="IAA">IAA</option>
                                                    <option value="FUNMATHS">FUNMATHS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 control-label" style="text-align:left"> Course *</label>
                                            <div class="col-lg-6">
                                                <div>
                                                    <select id="course" class="form-control" name="CourseId">
                                                        <option selected="selected" value="">Select</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-5  control-label " style="text-align:left">Level *</label>
                                            <div class="col-lg-6">
                                                <select id="level" class="form-control" name="ProgramCourseLevelId">
                                                    <option selected="selected" value="">Select</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Upload
                                            </label>
                                        <div class="col-lg-6">
                                           <input type="file" class="form-control" name="userFiles[]" multiple/>
                                        </div>
                                    </div>
                                   
                                    </div>


                                    
                                </div>

                                <div class="col-lg-6">
                                    
							   
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <center>
                                        <div>
                                            <button type="submit" id="signup" role="button" class="btn btn-primary"
                                                    name="fileSubmit" value="Save" style="margin:10px;"><span
                                                    class="glyphicon glyphicon-save" style="margin:3px;"></span>SUBMIT
                                            </button>
                                            <button type="reset" class="btn btn-primary" name="cancel"
                                                    style="margin:10px;"><span class="glyphicon glyphicon-remove"
                                                                               style="margin:3px;"></span>CANCEL
                                            </button>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <p id="message_from_server" class="text-success"></p>
                                </div>
                            </div>


                            
                           

                        </form>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <div class="modal fade" id="success" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="color:green"></h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <footer><p>All right reserved by: <a href="#">FriendsFocus</a></p></footer>
</div>