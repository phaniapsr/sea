<!--<script type="application/javascript" src="<?php /*echo base_url()*/?>scripts/admin/franchiseeRegistration/franchiseeRegistration.js"></script>-->
<div id="page-wrapper">
    <div id="page-inner">
	<link href="Content/css/tjquery-ui.css" rel="stylesheet" />
        <script src="Scripts/admin/validations/jquery-teacher.js"></script>
        <script src="Scripts/admin/jquery-ui.js"></script>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">CONSULTANTS DETAIL VIEW</h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <label style="color:Green;font-size:28px;"></label>
        <div class="row">
            <div class="col-lg-12">
               
				   
				   <?php
                    $i=1;
					foreach ($data['smf'] as $row){ ?>
					<H2>FRANCHISE DETAILS</H2>
					 <table class="table table-striped table-bordered table-hover no-footer dataTable" id="dt-state-franchisee" style="font-size:14px;" aria-describedby="dt-state-franchisee_info">
                     <tbody>
                         <tr><td>FRANCHISE NAME</td><td><?php echo $row['username'];?></td></tr>
						 <tr><td>EMAIL</td><td><?php echo $row['email'];?></td></tr>
						 <tr><td>FIRST NAME</td><td><?php echo $row['first_name'];?></td></tr>
						 <tr><td>LAST NAME</td><td><?php echo $row['last_name'];?></td></tr>
						 <tr><td>MIDDLE NAME</td><td><?php echo $row['middle_name'];?></td></tr>
						 <tr><td>DATE OF BIRTH</td><td><?php echo $row['date_of_birth'];?></td></tr>
						 <tr><td>GENDER</td><td><?php echo $row['gender'];?></td></tr>
						 <tr><td>AGE</td><td><?php echo $row['age'];?></td></tr>
						 <tr><td>MOBILE NO</td><td><?php echo $row['mobileno'];?></td></tr>
						 <tr><td>IMAGE</td><td><image href=<?php echo base_url()?>uploads/<?php echo $row['image_path'];?>><?php echo $row['image_path'];?></image></td></tr>
					 </tbody>
                    </table>
				</br></br>
					<H2> EDUCATIONAL BACK GROUND</H2>
					 <table class="table table-striped table-bordered table-hover no-footer dataTable" id="dt-state-franchisee" style="font-size:14px;" aria-describedby="dt-state-franchisee_info">
                     <tbody>
                         <tr><td>COLLEGE</td><td><?php echo $row['college_university'];?></td></tr>
						 <tr><td>QULIFICATION</td><td><?php echo $row['qualification'];?></td></tr>
						 <tr><td>YEAR OF COMPLETION</td><td><?php echo $row['completed_in_year'];?></td></tr>
						  </tr>
					 </tbody>
                    </table>
				</br></br>
				<H2> FRANCHISE RESIDENTIAL ADDRESS</H2>
					 <table class="table table-striped table-bordered table-hover no-footer dataTable" id="dt-state-franchisee" style="font-size:14px;" aria-describedby="dt-state-franchisee_info">
                     <tbody>
                         <tr><td>DOOR NO</td><td><?php echo $row['doorno'];?></td></tr>
						 <tr><td>STREET NAME</td><td><?php echo $row['streetname'];?></td></tr>
						 <tr><td>AREA</td><td><?php echo $row['area'];?></td></tr>
						 <tr><td>CITY</td><td><?php echo $row['city'];?></td></tr>
						 <tr><td>PINCODE</td><td><?php echo $row['pincode'];?></td></tr>
						 <tr><td>STATE</td><td><?php echo $row['state'];?></td></tr>
						 <tr><td>NATIONALITY</td><td><?php echo $row['nationality'];?></td></tr>
						  </tr>
					 </tbody>
                    </table>
				</br></br>
               	<H2> FRANCHISE OTHER TRAINING(S) ATTENDED</H2>
					 <table class="table table-striped table-bordered table-hover no-footer dataTable" id="dt-state-franchisee" style="font-size:14px;" aria-describedby="dt-state-franchisee_info">
                     <tbody>
                         <tr><td>COURSE TYPE</td><td><?php echo $row['course_type'];?></td></tr>
						 <tr><td>COURSE NAME</td><td><?php echo $row['course_name'];?></td></tr>
						 <tr><td>INSTITUTION</td><td><?php echo $row['institution'];?></td></tr>
						 <tr><td>COURSE COMPLETION YEAR</td><td><?php echo $row['course_compl_year'];?></td></tr>
						 <tr><td>OCCUPATION</td><td><?php echo $row['occupation'];?></td></tr>
						 <tr><td>PURPOSE</td><td><?php echo $row['purpose'];?></td></tr>
						 <tr><td>FEES</td><td><?php echo $row['fees'];?></td></tr>
						  </tr>
					 </tbody>			
					</table>
				</br></br>	 												
<?php }?>
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