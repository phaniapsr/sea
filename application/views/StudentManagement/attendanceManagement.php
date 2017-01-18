<script type="application/javascript"
        src="<?php echo base_url() ?>scripts/admin/attendance/attendanceManagement.js"></script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">Students List</h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <label style="color:Green;font-size:28px;"></label>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped table-bordered table-hover no-footer dataTable" id="dt-state-franchisee" style="font-size:14px;" aria-describedby="dt-state-franchisee_info">
                    <thead>
                    <tr role="row">
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Middle Name</th>
                        <th>Email</th>
                        <th>View Attendance</th>
                    </tr></thead>
                    <tbody>
                    <?php
                    $i=1;
                    foreach ($data['smf'] as $row){ ?>
                        <tr class="odd">
                            <td><?php echo $row['id'];?></td>
                            <td><a href="sdetailView/<?php echo $row['id']?>"><?php echo $row['first_name'];?></a></td>
                            <td><?php echo $row['last_name'];?></td>
                            <td><?php echo $row['middle_name'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td class="text-center selected">
                                <button type="button"  userid="<?php echo $row['user_id'];?>" data-toggle="modal"
                                        data-target="#myModalStudentAttendance"
                                        class="btn btn-primary btn-xs f-stu-attendance">Attendance
                                </button>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <div aria-hidden="true" style="display: none;" class="modal fade" id="myModalStudentAttendance" role="dialog">
            <div class="modal-dialog modal-lg" id="sizeofmodel">
                <div class="modal-content" id="contentbackground">
                    <div class="modal-body" id="bodybackground">
                        <div id="border">
                            <div class="">
                                <div id="headerbackground">
                                    <button type="button" class="close" data-dismiss="modal"
                                            style="color:red;font-size:29px;">×
                                    </button>
                                    <center><h2 class="modal-title">Student Attendance Report</h2></center>
                                </div>
                            </div>
                            <br>

                            <form id="AttendanceForm" name="StuAttendanceForm" action="<?php echo base_url()?>StudentManagement/saveAttendance" method="post">
                                <div class="table-responsive">
                                <table class="table" align="center">
                                    <tr>
                                        <td width="20%"><label>Student Name</label></td>
                                        <td width="30%" id="data_st_name">Swathi</td>
                                        <td width="20%"><label>Father Name</label></td>
                                        <td width="30%" id="data_fa_name">Krishna</td>
                                    </tr>
                                    <tr>
                                        <td><label>Mother name</label></td>
                                        <td id="data_mo_name">Kalyani</td>
                                        <td><label>Contact Number</label></td>
                                        <td id="data_pcn">9012345678</td>
                                    </tr>
                                    <tr>
                                        <td><label>Parent e-mail id</label></td>
                                        <td id="data_pemail">phaniapsr@gmail.com</td>
                                        <td><label>Course/program</label></td>
                                        <td id="data_cp">ABACUS</td>
                                    </tr>
                                    <tr>
                                        <td><label>Category</label></td>
                                        <td id="data_cat">Junior or Senior</td>
                                        <td><label>Level</label></td>
                                        <td id="data_level">1-8</td>
                                    </tr>
                                    <tr>
                                        <td><label>Franchisee Name</label></td>
                                        <td id="data_fr_name">Fname</td>
                                        <td><label>Course Instructor</label></td>
                                        <td id="data_crs_int_name">phani</td>
                                    </tr>
                                    <tr>
                                        <td><label>Class day</label></td>
                                        <td id="data_cls_day">Monday</td>
                                        <td><label>Class time</label> </td>
                                        <td id="data_cls_time">2Pm-4Pm</td>
                                    </tr>
                                </table>
                                </div>
                                <section>
                                    <div class="row table-responsive">
                                        <table class="table attendance_table">
                                            <tr>
                                                <th>Scheduled Date</th>
                                                <th>Actual Date</th>
                                                <th>Punctual</th>
                                                <th>Home Work Done</th>
                                            </tr>
                                            <tr class="attendance_tr"><input type="hidden" class="hid_attendance_cls" name="attendance_id[]">
                                                <td></td>
                                                <td><input type="text" size="10" class="schedule_date" name="actual_date[]"></td>
                                                <td><label><input type="radio" class="punctual" name="punctual_0" value="1"/>Yes</label><label><input type="radio" class="punctual" name="punctual_0" value="0"/>No</label></td>
                                                <td><label><input type="radio" class="homework" name="homework_0" value="1"/>Yes</label><label><input type="radio" class="homework" name="homework_0" value="0"/>No</label></td>
                                            </tr>
                                        </table>
                                    </div>
                                </section>
                                <div class="row text-center" id="roww1">
                                    <div class="span12">
                                        <input type="hidden" id="hid_user_id" name="user_id" value="">
                                        <input type="hidden" id="hid_course_level_id" name="course_level" value="">
                                        <label class="danger" id="stu-config-msg"></label>
                                        <button class="btn primaryCta small" type="button" role="button"
                                                id="attendance_button_save"><span>Save</span></button>
                                        <button class="btn primaryCta small" type="button" id="buttonCancel"
                                                data-dismiss="modal"><span>Cancel</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
        <link href="<?php echo base_url() ?>Content/css/tjquery-ui.css" rel="stylesheet" />
        <script src="<?php echo base_url() ?>Scripts/admin/jquery-ui.js"></script>

    </div>
    <footer><p>All right reserved by: <a href="http://friendsfocus.in/">FriendsFocus</a></p></footer>
</div>