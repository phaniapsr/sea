<!--<script type="application/javascript" src="<?php /*echo base_url()*/?>scripts/admin/franchiseeRegistration/franchiseeRegistration.js"></script>-->
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
                   <tbody>
				   
				   <?php
                    $i=1;
                    foreach ($data['smf'] as $row){ ?>
                         <tr><td>STUDENT ID</td>
                            <td><?php echo $row['stud_id'];?></td></tr>
						 <tr><td>STUDENT MOTHERTOUNG</td>	
                            <td><?php echo $row['stud_mothertong'];?></td></tr>
						 <tr><td>FATHER NAME</td><td><?php echo $row['fath_name'];?></td></tr>
						 <tr><td>FAHTER MOBILE NO</td><td><?php echo $row['fath_mobno'];?></td></tr>							 
						 <tr><td>MOHTER NAME</td><td><?php echo $row['moth_name'];?></td></tr>	
						 <tr><td>MOTHER MOBILE NO</td><td><?php echo $row['moth_mobno'];?></td></tr>	
						 <tr><td>FATHER EMAIL</td><td><?php echo $row['fath_email'];?></td></tr>	
						 <tr><td>FATHER QULIFICATION</td><td><?php echo $row['fath_qualif'];?></td></tr>	
						 <tr><td>FATHER OCCUPATION</td><td><?php echo $row['fath_occup'];?></td></tr>	
						 <tr><td>MOHTER QULIFICATION</td><td><?php echo $row['moth_qualif'];?></td></tr>	
						 <tr><td>MOTHER OCUUPATION</td><td><?php echo $row['moth_occup'];?></td></tr>
						 <tr><td>LAND NO</td><td><?php echo $row['land_no'];?></td></tr>	
						<tr><td>SCHOOL NAME</td><td><?php echo $row['school_name'];?></td></tr>	
						<tr><td>SCHOOL ADDRESS</td><td><?php echo $row['school_add'];?></td></tr>	
						<tr><td>SCHOOL MOBILE NO</td><td><?php echo $row['school_mobno'];?></td></tr>	
						<tr><td>STUDENT PROGRAM NAME</td><td><?php echo $row['program_name'];?></td></tr>		
						<tr><td>STUDENT COURSE NAME</td><td><?php echo $row['course_name'];?></td></tr>
						<tr><td>STUDENT LEVEL NAME</td><td><?php echo $row['level_name'];?></td></tr>
						<tr><td>STUDENT FIRST SIBLING NAME</td><td><?php echo $row['fsib_name'];?></td></tr>
						<tr><td>STUDENT SECOND SIBLING NAME</td><td><?php echo $row['ssib_name'];?></td></tr>
						<tr><td>FIRST SIBLING SCHOOL NAME</td><td><?php echo $row['fsib_sname'];?></td></tr>
						<tr><td>FIRST SIBLING AGE</td><td><?php echo $row['fsib_age'];?></td></tr>
						<tr><td>FIRST SIBLING GENDER</td><td><?php echo $row['fsib_gender'];?></td></tr>
						<tr><td>FIRST SIBLING STANDERD</td><td><?php echo $row['fsib_stand'];?></td></tr>
						<tr><td>SECOND SIBLING SCHOOL NAME</td><td><?php echo $row['ssib_sname'];?></td></tr>
						<tr><td>SECOND SIBLING AGE</td><td><?php echo $row['ssib_age'];?></td></tr>
						<tr><td>SECOND SIBLING GENDER</td><td><?php echo $row['ssib_gender'];?></td></tr>
						<tr><td>SECOND SIBLING STANDERD</td><td><?php echo $row['ssib_stand'];?></td></tr>
												
                    <?php }?>
                        
                    </tr>
                    
                    
                    </tbody>
                </table>
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
        <link href="Content/css/tjquery-ui.css" rel="stylesheet" />
        <script src="Scripts/admin/validations/jquery-teacher.js"></script>
        <script src="Scripts/admin/jquery-ui.js"></script>

    </div>
    <footer><p>All right reserved by: <a href="http://friendsfocus.in/">LemonBridge</a></p></footer>
</div>