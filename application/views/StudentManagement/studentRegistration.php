<script type="application/javascript" src="<?php echo base_url()?>scripts/admin/studentRegistration/studentRegistration.js"></script>
<div id="page-wrapper">
    <div id="page-inner">
        <script src="Skills%20Education%20Academy_files/Franchisees.js"></script>
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">
                    Student Registration Form
                </h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <center>
            <label style="color:Green;font-size:28px;"></label>
        </center>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div id="margin-top" class="panel-body">
                        <div class="form-group">
                                <label><span class="col-lg-12"><input type="radio" id="exe_rd_user" name="userType" value="0">Existing User</span></label>
                                <label><span class="col-lg-12"><input type="radio" id="new_rd_user" name="userType" value="1">New User</span></label>
                        </div>
                        <form id="studentRegistration" action="<?php echo base_url()?>StudentManagement/registerStudent" name="form1" class="form-horizontal fv-form fv-form-bootstrap" method="post" ng-app="app" ng-controller="Ctrl"  enctype="multipart/form-data" >
                            <div class="row">
                                <div class="col-lg-6">
                                    <center><h4>STUDENT DETAILS</h4></center>
                                    <div id="studentdetailsborder">
                                        <div class="form-group">
                                            <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:left">E-mail*</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="EmailId" class="form-control" name="email" placeholder="E-mail" type="email"/><i data-fv-icon-for="EmailId" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="EmailId" data-fv-validator="regexp" class="help-block" style="display: none;">The value is not a valid email address</small></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align: left">Password *</label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" name="password" placeholder="Password" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align:left;">First Name *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="FirstName" class="form-control" name="first_name" placeholder="First name" type="text"/><i data-fv-icon-for="FirstName" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="FirstName" data-fv-validator="notEmpty" class="help-block" style="display: none;">First Name is required</small><small data-fv-result="NOT_VALIDATED" data-fv-for="FirstName" data-fv-validator="regexp" class="help-block" style="display: none;">Numbers are not allowed</small></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align:left">Middle Name </label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="MiddleName" class="form-control" name="middle_name" placeholder="Middle Name" type="text"><i data-fv-icon-for="MiddleName" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="MiddleName" data-fv-validator="regexp" class="help-block" style="display: none;">Numbers are not allowed</small></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:left">Last Name *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="LastName" class="form-control" name="last_name" placeholder="Last name" type="text"/><i data-fv-icon-for="LastName" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="LastName" data-fv-validator="notEmpty" class="help-block" style="display: none;">Last Name is required</small><small data-fv-result="NOT_VALIDATED" data-fv-for="LastName" data-fv-validator="regexp" class="help-block" style="display: none;">Numbers are not allowed</small></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Date Of Birth *</label>
                                            <div class="col-lg-6">
                                                <div class="input-group input-append date" id="datePicker">
                                                    <input type="text" class="form-control" name="date_of_birth" id="datepicker-my1" placeholder="DD/MM/YYYY" value="01/01/0001" />
                                        <span class="input-group-addon add-on" id="btn1" style="cursor: pointer;">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                                </div>
                                                <input type="hidden" id="hiddenFieldID1" name="DateOfBirth"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:left">Gender *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <select data-fv-field="Gender" class="form-control" name="gender"/>
                                                <option selected="selected" value="">Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                </select><i data-fv-icon-for="Gender" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="Gender" data-fv-validator="notEmpty" class="help-block" style="display: none;">Gender is required</small></div>
                                        </div>
                                        <!--<div class="form-group">
                                            <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:left">Age *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="Age" class="form-control" name="Age" placeholder="Age" type="text"/><i data-fv-icon-for="Age" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="Age" data-fv-validator="notEmpty" class="help-block" style="display: none;">Age is required</small></div>
                                        </div>-->
                                        <div class="form-group">
                                            <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align:left">Mother Tongue *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="MotherTounge" class="form-control" name="MotherTounge" placeholder="Mother tongue" type="text"/><i data-fv-icon-for="MotherTounge" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="MotherTounge" data-fv-validator="notEmpty" class="help-block" style="display: none;">Mother Tongue  is required</small><small data-fv-result="NOT_VALIDATED" data-fv-for="MotherTounge" data-fv-validator="regexp" class="help-block" style="display: none;">Numbers are not allowed</small></div>
                                        </div>
                                    </div>
                                    <center><h4>PARENTS DETAILS</h4></center>
                                    <div id="parentdetailsborder">
                                        <div class="form-group">
                                            <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align:left">Father's Name *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="FatherName" class="form-control" name="FatherName" placeholder="Father's Name" type="text"/><i data-fv-icon-for="FatherName" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="FatherName" data-fv-validator="notEmpty" class="help-block" style="display: none;">Father Name is required</small><small data-fv-result="NOT_VALIDATED" data-fv-for="FatherName" data-fv-validator="regexp" class="help-block" style="display: none;">Numbers are not allowed</small></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align:left">Father's Mobile Number *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="FatherMobileNumber" class="form-control" name="FatherMobileNumber" placeholder="Father's Mobile Number" type="text"/><i data-fv-icon-for="FatherMobileNumber" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="FatherMobileNumber" data-fv-validator="notEmpty" class="help-block" style="display: none;">Father Mobile Number is required</small><small data-fv-result="NOT_VALIDATED" data-fv-for="FatherMobileNumber" data-fv-validator="integer" class="help-block" style="display: none;">Value is not an integer</small><small data-fv-result="NOT_VALIDATED" data-fv-for="FatherMobileNumber" data-fv-validator="between" class="help-block" style="display: none;">The MobileNumber should be 10 digits only</small></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align:left">Mother's Name *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="MotherName" class="form-control" name="MotherName" placeholder="Mother's Name" type="text"/><i data-fv-icon-for="MotherName" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="MotherName" data-fv-validator="notEmpty" class="help-block" style="display: none;">Mother Name is required</small><small data-fv-result="NOT_VALIDATED" data-fv-for="MotherName" data-fv-validator="regexp" class="help-block" style="display: none;">Numbers are not allowed</small></div>
                                        </div>
                                        <div class=" form-group">
                                            <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align:left">Mother's Mobile Number *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="MotherMobileNumber" class="form-control" name="MotherMobileNumber" placeholder="Mother's Mobile Number" type="text"/><i data-fv-icon-for="MotherMobileNumber" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="MotherMobileNumber" data-fv-validator="notEmpty" class="help-block" style="display: none;">Mother Mobile Number is required</small><small data-fv-result="NOT_VALIDATED" data-fv-for="MotherMobileNumber" data-fv-validator="integer" class="help-block" style="display: none;">Value is not an integer</small><small data-fv-result="NOT_VALIDATED" data-fv-for="MotherMobileNumber" data-fv-validator="between" class="help-block" style="display: none;">The MobileNumber should be 10 digits only</small></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:left">E-mail *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="ParentEmailId" class="form-control" name="ParentEmailId" placeholder="E-mail" type="email"/><i data-fv-icon-for="ParentEmailId" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="ParentEmailId" data-fv-validator="notEmpty" class="help-block" style="display: none;">Email address is required</small><small data-fv-result="NOT_VALIDATED" data-fv-for="ParentEmailId" data-fv-validator="regexp" class="help-block" style="display: none;">The value is not a valid email address</small></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align:left">Father Qualification</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="FatherQualicfation" class="form-control" name="FatherQualicfation" placeholder="Father Qualification" type="text"><i data-fv-icon-for="FatherQualicfation" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align:left">Father Occupation *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="FatherOccupation" class="form-control" name="FatherOccupation" placeholder="Father Occupation" type="text"/><i data-fv-icon-for="FatherOccupation" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="FatherOccupation" data-fv-validator="notEmpty" class="help-block" style="display: none;">Father Occupation is required</small><small data-fv-result="NOT_VALIDATED" data-fv-for="FatherOccupation" data-fv-validator="regexp" class="help-block" style="display: none;">Numbers are not allowed</small></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align:left">Mother Qualification</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="MotherQualicfation" class="form-control" name="MotherQualicfation" placeholder="Mother Qualification" type="text"><i data-fv-icon-for="MotherQualicfation" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align:left">Mother Occupation *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="MotherOccupation" class="form-control" name="MotherOccupation" placeholder="Mother Occupation" type="text"/><i data-fv-icon-for="MotherOccupation" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="MotherOccupation" data-fv-validator="notEmpty" class="help-block" style="display: none;">Mother Occupation is required</small><small data-fv-result="NOT_VALIDATED" data-fv-for="MotherOccupation" data-fv-validator="regexp" class="help-block" style="display: none;">Numbers are not allowed</small></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align:left">Landline Number</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="LandlineNumber" class="form-control" name="LandlineNumber" placeholder="Phone Number" type="text"><i data-fv-icon-for="LandlineNumber" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="LandlineNumber" data-fv-validator="regexp" class="help-block" style="display: none;">You should enter numbers only</small></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <center><h4>SCHOOL DETAILS</h4></center>
                                    <div id="schooldetailsborder">
                                        <div class="form-group">
                                            <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align:left">School Name *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="SchoolName" class="form-control" name="SchoolName" placeholder="School Name" type="text"/><i data-fv-icon-for="SchoolName" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="SchoolName" data-fv-validator="notEmpty" class="help-block" style="display: none;">School Name is required</small><small data-fv-result="NOT_VALIDATED" data-fv-for="SchoolName" data-fv-validator="regexp" class="help-block" style="display: none;">Numbers are not allowed</small></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align:left">School Address *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="SchoolAddress" class="form-control" name="SchoolAddress" placeholder="School Address" type="text"/><i data-fv-icon-for="SchoolAddress" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="SchoolAddress" data-fv-validator="notEmpty" class="help-block" style="display: none;">School Address is required</small></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align:left">School Mobile/PhoneNumber *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="SchoolNumber" class="form-control" name="SchoolNumber" placeholder="School PhoneNumber" value="0" type="text"/><i data-fv-icon-for="SchoolNumber" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="SchoolNumber" data-fv-validator="regexp" class="help-block" style="display: none;">You should enter numbers only</small></div>
                                        </div>

                                    </div>
                                    <center><h4>COURSE DETAILS</h4></center>
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
                                    </div>
                                    <center><h4>SIBLING DETAILS</h4></center>
                                    <div id="siblingdetails">
                                        <div class="form-group">
                                            <label class="col-lg-5  control-label " style="text-align:left">Sibling1 Name</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="Sibling1Name" class="form-control" name="Sibling1Name" placeholder="Sibling1 Name" type="text"><i data-fv-icon-for="Sibling1Name" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="Sibling1Name" data-fv-validator="regexp" class="help-block" style="display: none;">Numbers are not allowed</small></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5  control-label " style="text-align:left">Sibling2 Name</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="Sibling2Name" class="form-control" name="Sibling2Name" placeholder="Sibling2 Name" type="text"><i data-fv-icon-for="Sibling2Name" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="Sibling2Name" data-fv-validator="regexp" class="help-block" style="display: none;">Numbers are not allowed</small></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 control-label" style="text-align:left">Sibling1 School Name</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="Sibling1SchoolName" class="form-control" name="Sibling1SchoolName" placeholder="Sibling1 School Name" type="text"><i data-fv-icon-for="Sibling1SchoolName" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="Sibling1SchoolName" data-fv-validator="regexp" class="help-block" style="display: none;">Numbers are not allowed</small></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 control-label" style="text-align:left">Sibling1 Age</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="Sibling1Age" class="form-control" name="Sibling1Age" placeholder="Sibling1 Age" value="0" type="text"><i data-fv-icon-for="Sibling1Age" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 control-label" style="text-align:left"> Sibling1 Gender</label>
                                            <div class="col-lg-6 has-feedback">
                                                <select data-fv-field="Sibling1Gender" class="form-control" name="Sibling1Gender">
                                                    <option selected="selected" value="">Select</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select><i data-fv-icon-for="Sibling1Gender" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 control-label" style="text-align:left">Sibling1 Standard</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="Sibling1Standard" class="form-control" name="Sibling1Standard" placeholder="Sibling1 Standard" type="text"><i data-fv-icon-for="Sibling1Standard" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="Sibling1Standard" data-fv-validator="regexp" class="help-block" style="display: none;">Please enter valid Input</small></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 control-label" style="text-align:left">Sibling2 School Name</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="Sibling2SchoolName" class="form-control" name="Sibling2SchoolName" placeholder="Sibling2 School Name" type="text"><i data-fv-icon-for="Sibling2SchoolName" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="Sibling2SchoolName" data-fv-validator="regexp" class="help-block" style="display: none;">Numbers are not allowed</small></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 control-label" style="text-align:left">Sibling2 Age</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="Sibling2Age" class="form-control" name="Sibling2Age" placeholder="Sibling2 Age" value="0" type="text"><i data-fv-icon-for="Sibling2Age" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 control-label" style="text-align:left"> Sibling2 Gender</label>
                                            <div class="col-lg-6 has-feedback">
                                                <select data-fv-field="Sibling2Gender" class="form-control" name="Sibling2Gender">
                                                    <option selected="selected" value="">Select</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select><i data-fv-icon-for="Sibling2Gender" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 control-label" style="text-align:left">Sibling2 Standard</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="Sibling2Standard" class="form-control" name="Sibling2Standard" placeholder="Sibling2 Standard" type="text"><i data-fv-icon-for="Sibling2Standard" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="Sibling2Standard" data-fv-validator="regexp" class="help-block" style="display: none;">Please enter valid Input</small></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <center><h4>RESIDENTIAL ADDRESS</h4></center>
                            <div id="residentialaddressborder">
                                <div class="row">

                                    <div class="col-lg-6">


                                        <div class="form-group">
                                            <label class="col-lg-5 control-label " style="text-align:left">Flat/Door Number *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="FlatNo" class="form-control" name="FlatNo" placeholder="Flat/DoorNumber" type="text"/><i data-fv-icon-for="FlatNo" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>

                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="FlatNo" data-fv-validator="notEmpty" class="help-block" style="display: none;">Flate/Door Number is required</small></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 control-label " style="text-align:left">Street Name *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="StreetName" class="form-control" name="StreetName" placeholder="Street Name" type="text"/><i data-fv-icon-for="StreetName" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>

                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="StreetName" data-fv-validator="notEmpty" class="help-block" style="display: none;">Street Name is required</small></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 control-label " style="text-align:left">Area *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="Area" class="form-control" name="Area" placeholder="Area" type="text"/><i data-fv-icon-for="Area" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>

                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="Area" data-fv-validator="notEmpty" class="help-block" style="display: none;">Area is required</small></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="col-lg-5 control-label " style="text-align:left">Town/City *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="City" class="form-control" name="City" placeholder="Town/City" type="text"/><i data-fv-icon-for="City" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="City" data-fv-validator="notEmpty" class="help-block" style="display: none;">City is required</small></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 control-label " style="text-align:left">Pincode *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <input data-fv-field="PinCode" class="form-control" name="PinCode" placeholder="Pincode" type="text"/><i data-fv-icon-for="PinCode" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="PinCode" data-fv-validator="notEmpty" class="help-block" style="display: none;">Pincode is required</small><small data-fv-result="NOT_VALIDATED" data-fv-for="PinCode" data-fv-validator="regexp" class="help-block" style="display: none;">You should enter numbers only</small></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-5 control-label " style="text-align:left">State *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <select data-fv-field="State" class="form-control" name="State">
                                                    <option selected="selected" value="">Select</option>
                                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                    <option value="Assam">Assam</option>
                                                    <option value="Bihar">Bihar</option>
                                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                                    <option value="Goa">Goa</option>
                                                    <option value="Gujarat">Gujarat</option>
                                                    <option value="Haryana">Haryana</option>
                                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                    <option value="Jharkhand">Jharkhand</option>
                                                    <option value="Karnataka">Karnataka</option>
                                                    <option value="Kerala">Kerala</option>
                                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                    <option value="Maharashtra">Maharashtra</option>
                                                    <option value="Manipur">Manipur</option>
                                                    <option value="Meghalaya">LevMeghalayael7</option>
                                                    <option value="Mizoram">Mizoram</option>
                                                    <option value="Nagaland">LevNagalandel9</option>
                                                    <option value="Orissa">Orissa</option>
                                                    <option value="Punjab">Punjab</option>
                                                    <option value="Rajasthan">Rajasthan</option>
                                                    <option value="Sikkim">Sikkim</option>
                                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                                    <option value="Telangana">Telangana</option>
                                                    <option value="Tripura">Tripura</option>
                                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                    <option value="Uttarakhand">Uttarakhand</option>
                                                    <option value="West Bengal">West Bengal</option>
                                                </select><i data-fv-icon-for="State" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="State" data-fv-validator="notEmpty" class="help-block" style="display: none;">State is required</small></div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <center><h2>TO BE FILLED BY FRANCHISEE</h2></center>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Class Start Date *</label>
                                        <div class="col-lg-6">
                                             <div class="input-group input-append date" id="datePicker">
                                                    <input type="text" class="form-control" name="class_start_date" id="datepicker-my2" placeholder="DD/MM/YYYY" value="01/01/0001" />
                                        <span class="input-group-addon add-on" id="btn2" style="cursor: pointer;">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                                </div>
                                            <input type="hidden" id="hiddenFieldID2" name="ClassStartDate"/>
                                        </div>
                                        </div>
									<div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Level End Date *</label>
                                        <div class="col-lg-6">
                                            <div class="input-group input-append date" id="datePicker">
                                                <input type="text" class="form-control" name="level_end_date" id="datepicker-my3" placeholder="DD/MM/YYYY" value="01/01/0001" />
                                        <span class="input-group-addon add-on" id="btn3" style="cursor: pointer;">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                            </div>
                                            <input type="hidden" id="hiddenFieldID3" name="LevelEndDate"/>
                                        </div>
                                        </div>
                                   <div class="form-group">
                                            <label class="col-lg-5 control-label " style="text-align:left">Class Time *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <select data-fv-field="State" class="form-control" name="ClassTime">
                                                    <option selected="selected" value="">Select</option>
                                                    <option value="05:00">05:00am</option>
													<option value="05:30">05:30am</option>
													<option value="06:00">06:00am</option>
													<option value="06:30">06:30am</option>
													<option value="07:00">07:00am</option>
													<option value="07:30">07:30am</option>
													<option value="08:00">08:00am</option>
													<option value="08:30">08:30am</option>
													<option value="09:00">09:00am</option>
													<option value="09:30">09:30am</option>
													<option value="10:00">10:00am</option>
													<option value="10:30">10:30am</option>
													<option value="11:00">11:00am</option>
													<option value="11:30">11:30am</option>
													<option value="12:00">12:00pm</option>
													<option value="12:30">12:30pm</option>
													<option value="13:00">01:00pm</option>
													<option value="13:30">01:30pm</option>
													<option value="14:00">02:00pm</option>
													<option value="14:30">02:30pm</option>
													<option value="15:00">03:00pm</option>
													<option value="15:30">03:30pm</option>
													<option value="16:00">04:00pm</option>
													<option value="16:30">04:30pm</option>
													<option value="17:00">05:00pm</option>
													<option value="17:30">05:30pm</option>
													<option value="18:00">06:00pm</option>
													<option value="18:30">06:30pm</option>
													<option value="19:00">07:00pm</option>
													<option value="19:30">07:30pm</option>
													<option value="20:00">08:00pm</option>
													<option value="20:30">08:30pm</option>
													<option value="21:00">09:00pm</option>
													<option value="21:30">09:30pm</option>
													<option value="22:00">10:00pm</option>
													<option value="22:30">10:30pm</option>
													</select><i data-fv-icon-for="State" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="State" data-fv-validator="notEmpty" class="help-block" style="display: none;">State is required</small></div>
                                        </div>
									<div class="form-group">
                                            <label class="col-lg-5 control-label " style="text-align:left">Class Day *</label>
                                            <div class="col-lg-6 has-feedback">
                                                <select data-fv-field="State" class="form-control" name="ClassDay">
                                                    <option selected="selected" value="">Select</option>
                                                    <option value="0">Sunday</option>
													<option value="1">Monday</option>
													<option value="2">Tueseday</option>    
													<option value="3">Wednesday</option>
													<option value="4">Thurseday</option>
													<option value="5">Friday</option>
													<option value="6">Saturday</option>
													
                                                </select><i data-fv-icon-for="State" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                                <small data-fv-result="NOT_VALIDATED" data-fv-for="State" data-fv-validator="notEmpty" class="help-block" style="display: none;">State is required</small></div>
                                        </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align:left">Upload Image</label>
                                        <div class="col-lg-6 has-feedback">

                                            <a id="pic" class="btn btn-block btn-success btn-sm drops"><span class="glyphicon glyphicon-plus"></span> Select Image to Upload </a>
                                            <input data-fv-field="StudentImage" class="form-control" id="StudentImage" name="StudentImage" type="file"><i data-fv-icon-for="StudentImage" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                            <script>
                                                $('#pic').click(function () {
                                                    $('#StudentImage').click();
                                                });
                                            </script>
                                            <i id="franchiseecoursename">File size should not be grater than 2MB</i>
                                            <small data-fv-result="NOT_VALIDATED" data-fv-for="StudentImage" data-fv-validator="notEmpty" class="help-block" style="display: none;">Please Select Image</small><small data-fv-result="NOT_VALIDATED" data-fv-for="StudentImage" data-fv-validator="file" class="help-block" style="display: none;">The selected file is not valid</small></div>
                                    </div>
									<div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align:left">Course Instructor Name *</label>
                                        <div class="col-lg-6 has-feedback">
                                            <input data-fv-field="ReceiptNo" class="form-control" name="CName" placeholder="Course Instructor Name" type="text" /><i data-fv-icon-for="ReceiptNo" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                            <small data-fv-result="NOT_VALIDATED" data-fv-for="ReceiptNo" data-fv-validator="notEmpty" class="help-block" style="display: none;">Phone Number is required</small><small data-fv-result="NOT_VALIDATED" data-fv-for="ReceiptNo" data-fv-validator="integer" class="help-block" style="display: none;">Value is not an integer</small></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
								
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align:left">Registration Fee *</label>
                                        <div class="col-lg-6 has-feedback">
                                            <input data-fv-field="RegistrationFee" class="form-control" id="RegistrationFee" name="RegistrationFee" placeholder="Registration Fee" value="0" type="text" required/><i data-fv-icon-for="RegistrationFee" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                            <small data-fv-result="NOT_VALIDATED" data-fv-for="RegistrationFee" data-fv-validator="notEmpty" class="help-block" style="display: none;">Registration Fee required</small><small data-fv-result="NOT_VALIDATED" data-fv-for="RegistrationFee" data-fv-validator="regexp" class="help-block" style="display: none;">Charecters are not allowed</small></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align:left">Level Fee *</label>
                                        <div class="col-lg-6 has-feedback">
                                            <input data-fv-field="CourseFee" class="form-control" id="CourseFee" name="CourseFee" placeholder="Course Fee" value="0" type="text" required/><i data-fv-icon-for="CourseFee" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                            <small data-fv-result="NOT_VALIDATED" data-fv-for="CourseFee" data-fv-validator="notEmpty" class="help-block" style="display: none;">Coursefee is required</small><small data-fv-result="NOT_VALIDATED" data-fv-for="CourseFee" data-fv-validator="regexp" class="help-block" style="display: none;">Charecters are not allowed</small></div>
                                    </div>
									<div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align:left">Kit Fee *</label>
                                        <div class="col-lg-6 has-feedback">
                                            <input data-fv-field="KitFee" class="form-control" id="KitFee" name="KitFee" placeholder="Kitorder Fee" value="0" type="text" required/><i data-fv-icon-for="KitFee" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                            <small data-fv-result="NOT_VALIDATED" data-fv-for="KitFee" data-fv-validator="notEmpty" class="help-block" style="display: none;">Kitfee is required</small><small data-fv-result="NOT_VALIDATED" data-fv-for="KitFee" data-fv-validator="regexp" class="help-block" style="display: none;">Charecters are not allowed</small></div>
                                    </div>
									<div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align:left">Annual Competition Fee *</label>
                                        <div class="col-lg-6 has-feedback">
                                            <input data-fv-field="KitFee" class="form-control" id="AcFee" name="AcFee" placeholder="Kitorder Fee" value="0" type="text" required/><i data-fv-icon-for="KitFee" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                            <small data-fv-result="NOT_VALIDATED" data-fv-for="KitFee" data-fv-validator="notEmpty" class="help-block" style="display: none;">Kitfee is required</small><small data-fv-result="NOT_VALIDATED" data-fv-for="KitFee" data-fv-validator="regexp" class="help-block" style="display: none;">Charecters are not allowed</small></div>
                                    </div>
									<div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align:left">Tax( ST/GST ) *</label>
                                        <div class="col-lg-6 has-feedback">
                                            <input data-fv-field="KitFee" class="form-control" id="tax" name="Tax" placeholder="Kitorder Fee" value="0" type="text" required readonly/><i data-fv-icon-for="KitFee" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                            <small data-fv-result="NOT_VALIDATED" data-fv-for="KitFee" data-fv-validator="notEmpty" class="help-block" style="display: none;">Kitfee is required</small><small data-fv-result="NOT_VALIDATED" data-fv-for="KitFee" data-fv-validator="regexp" class="help-block" style="display: none;">Charecters are not allowed</small></div>
                                    </div>
									<div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align:left">Total Amount *</label>
                                        <div class="col-lg-6 has-feedback">
                                            <input data-fv-field="TotalAmount" class="form-control" id="total_amt" name="Total" placeholder="Total Amount" value="0" type="text" required readonly/><i data-fv-icon-for="KitFee" class="form-control-feedback fv-icon-no-label" style="display: none;"></i>
                                            <small data-fv-result="NOT_VALIDATED" data-fv-for="TotalAmount" data-fv-validator="notEmpty" class="help-block" style="display: none;">Kitfee is required</small><small data-fv-result="NOT_VALIDATED" data-fv-for="KitFee" data-fv-validator="regexp" class="help-block" style="display: none;">Charecters are not allowed</small></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <center>
                                        <div>
                                            <button type="submit" id="signup" role="button" class="btn btn-primary" name="signup" value="Sign up" style="margin:10px;"><span class="glyphicon glyphicon-save" style="margin:3px;"></span>SUBMIT</button>
                                            <button type="reset" class="btn btn-primary" name="cancel" style="margin:10px;"><span class="glyphicon glyphicon-remove" style="margin:3px;"></span>CANCEL</button>
                                        </div>

                                    </center>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <p id="message_from_server" class="text-success"></p>
                                </div>
                            </div>
                            <script>
							    $("#RegistrationFee").change(function () {
                                       if (parseFloat($(this).val()) > 0) {
                                          $('#tax').val((parseFloat($('#RegistrationFee').val())+parseFloat($('#CourseFee').val())+parseFloat($('#KitFee').val())+parseFloat($('#AcFee').val()))*15/100);
										  $('#total_amt').val(parseFloat($('#RegistrationFee').val())+parseFloat($('#CourseFee').val())+parseFloat($('#KitFee').val())+parseFloat($('#AcFee').val())+parseFloat($('#tax').val()));
                                        } else {
                                            $(this).val('');
                                        }
                                        return false;
                                    });	
								$("#CourseFee").change(function(){
									if (parseFloat($(this).val()) > 0) {
										$('#tax').val((parseFloat($('#RegistrationFee').val())+parseFloat($('#CourseFee').val())+parseFloat($('#KitFee').val())+parseFloat($('#AcFee').val()))*15/100);
										$('#total_amt').val(parseFloat($('#RegistrationFee').val())+parseFloat($('#CourseFee').val())+parseFloat($('#KitFee').val())+parseFloat($('#AcFee').val())+parseFloat($('#tax').val()));
									}
									else {
                                            $(this).val('');
                                        }
								});	
								$("#KitFee").change(function(){
									if (parseFloat($(this).val()) > 0) {
										$('#tax').val((parseFloat($('#RegistrationFee').val())+parseFloat($('#CourseFee').val())+parseFloat($('#KitFee').val())+parseFloat($('#AcFee').val()))*15/100);
										$('#total_amt').val(parseFloat($('#RegistrationFee').val())+parseFloat($('#CourseFee').val())+parseFloat($('#KitFee').val())+parseFloat($('#AcFee').val())+parseFloat($('#tax').val()));
									}
									else {
                                            $(this).val('');
                                        }
								});	
								$("#AcFee").change(function(){
									if (parseFloat($(this).val()) > 0) {
										$('#tax').val((parseFloat($('#RegistrationFee').val())+parseFloat($('#CourseFee').val())+parseFloat($('#KitFee').val())+parseFloat($('#AcFee').val()))*15/100);
										$('#total_amt').val(parseFloat($('#RegistrationFee').val())+parseFloat($('#CourseFee').val())+parseFloat($('#KitFee').val())+parseFloat($('#AcFee').val())+parseFloat($('#tax').val()));
									}
									else {
                                            $(this).val('');
                                        }
								});	
								
                                var lookupManager = new Lookup();
                                var studentManager = new Students();
								$(document).ready(function () {
									
                                    $('#btn').click(function () {
                                        $("#datepicker-my").datepicker({
                                            changeMonth: true, changeYear: true,
                                            altFormat: "mm/dd/yy"
                                        }).focus();
                                    });
                                    $('#btn3').click(function () {
                                        $("#datepicker-my3").datepicker({
                                            changeMonth: true, changeYear: true,
                                            altFormat: "mm/dd/yy"
                                        }).focus();
                                    });
                                    lookupManager.GetPrograms(function (progs) {
                                        for (i = 0; i < progs.length; i++) {
                                            var prog = progs[i];
                                            $("#program").append('<option value="' + prog.Id + '">' + prog.Name + '</option>');
                                        }
                                    });

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
                            <script>
                                $('#btn1').click(function () {
                                    //alert('clcikec');
                                    $(document).ready(function () {
                                        $("#datepicker-my1").datepicker({
                                            //dateFormat: "dd-mm-yy".replace('T00:00:00', ''),
                                            changeMonth: true,
                                            altField: '#hiddenFieldID1',
                                            altFormat: "mm/dd/yy",
                                            changeYear: true
                                        }).focus();
                                    });
                                });
								$('#btn2').click(function () {
                                    //alert('clcikec');
                                    $(document).ready(function () {
                                        $("#datepicker-my2").datepicker({
                                            //dateFormat: "dd-mm-yy".replace('T00:00:00', ''),
                                            changeMonth: true,x
                                            altField: '#hiddenFieldID2',
                                            altFormat: "mm/dd/yy",
                                            changeYear: true
                                        }).focus();
                                    });
                                });
								$('#btn3').click(function () {
                                    //alert('clcikec');
                                    $(document).ready(function () {
                                        $("#datepicker-my3").datepicker({
                                            //dateFormat: "dd-mm-yy".replace('T00:00:00', ''),
                                            changeMonth: true,
                                            altField: '#hiddenFieldID3',
                                            altFormat: "mm/dd/yy",
                                            //changeYear: true
                                        }).focus();
                                    });
                                });
                            </script>

                        </form>



                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->

        <link href="<?php echo base_url()?>content/css/tjquery-ui.css" rel="stylesheet"/>
        <script src="<?php echo base_url()?>scripts/admin/validations/jquery-teacher.js"></script>
        <script src="<?php echo base_url()?>scripts/admin/jquery-ui.js"></script>

    </div>
    <footer><p>All right reserved by: <a href="http://friendsfocus.in/">FriendsFocus</a></p></footer>
</div>