<script type="application/javascript"
        src="<?php echo base_url()?>scripts/admin/franchiseeRegistration/update.js"></script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">EDIT FRANCHISEE</h1>
            </div>
        </div>
        <!-- /. ROW  -->
		<?php foreach ($data['smf'] as $row){?>
        <label style="color:Green;font-size:28px;"></label>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div id="margin-top" class="panel-body">
                        <form id="franchiseeRegistration"
                              action="<?php echo base_url()?>FranchiseeManagement/updateFranchisee" name="form2"
                              class="form-horizontal" method="POST" ng-app="app" ng-controller="Ctrl"
                              enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align: left">Franchisee
                                            Name *</label>
                                        <div class="col-lg-6">
										    <input type="hidden" name="id" value="<?php echo $row['user_id'];?>">
                                            <input type="text" class="form-control" name="franchiseeName" value="<?php echo $row['username'];?>"/>
											</div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Email
                                            Address *</label>
                                        <div class="col-lg-6">
                                            <input id="email" type="text" class="form-control" name="email"
                                                   value="<?php echo $row['email'];?>"/>
                                            <script>
                                                $('#email').blur(function(){
                                                    var em=$('#email').val();
                                                    $.ajax({
                                                        type:'post',
                                                        url:'<?php echo base_url()?>/FranchiseeManagement/checkEmail',
                                                        data:{email:em},
                                                        success:function(res){
                                                            if(res==1)
                                                            {
                                                                alert("This email id already taken");
                                                                $('#email').val('').focus();
                                                            }
                                                        }
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                   <div class="form-group">
                                       <!-- <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align: left">Password
                                            *</label>-->
                                        <div class="col-lg-6">
                                            <!--<input type="password" class="form-control" name="password"
                                                   placeholder="Password"/>-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align: left">First
                                            Name *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="first_name"
                                                   value="<?php echo $row['first_name'];?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align: left">Middle
                                            Name</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="middle_name"
                                                   value="<?php echo $row['middle_name'];?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Last
                                            Name *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="last_name"
                                                   value="<?php echo $row['last_name'];?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Date
                                            Of Birth *</label>
                                        <div class="col-lg-6">
                                            <div class="input-group input-append date" id="datePicker">
                                                <input type="text" class="form-control" name="date_of_birth"
                                                       id="datepicker-my" placeholder="DD/MM/YYYY" value="<?php echo $row['date_of_birth'];?>"/>
                                        <span class="input-group-addon add-on" id="btn" style="cursor: pointer;">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                            </div>
                                            <input type="hidden" id="hiddenFieldID" name="DateOfBirth" value="<?php echo $row['date_of_birth'];?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Gender
                                            *</label>
                                        <div class="col-lg-6">
										<?php $gen=$row['gender'];?>
											<select class="form-control" name="gender" id="gender">
											    <option value="" <?php if($gen=='') echo 'selected="selected"';?>>select</option>
                                                <option value="Male" <?php if($gen=="MALE") echo "selected";?>>Male</option>
                                                <option value="Female"<?php if($gen=="FEMALE") echo "selected";?>>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align: left">Landline
                                            Number</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="LandlineNumber"
                                                  placeholder="LandlnieNumber" value="<?php echo $row['landno'];?>"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align: left">Mobile
                                            Number *</label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" name="MobileNumber"
                                                   placeholder="Mobile Number" value="<?php echo $row['mobileno'];?>"/>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align: left">Place
                                            Of Birth *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="PlaceOfBirth"
                                                   placeholder="Place of birth" value="<?php echo $row['birthplace'];?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!--<label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Marital
                                            Status *</label>-->
                                        <div class="col-lg-6">
										<!--    <select class="form-control" name="MaritalStatus">
                                                <option value="">Select</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                            </select>-->
                                        </div>
                                    </div>
									<div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Course
                                            Applied for *</label>
                                        <div class="col-lg-6">
                                            <div class="course-section">
                                                <label>
                                                    <input type="checkbox" name="ACMAS" value="ACMAS" <?php if($row['course_acmas']==1)echo "checked";?>/>
                                                    ACMAS
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="WRITEASY" value="WRITEASY" <?php if($row['course_writeasy']==1)echo "checked";?>/>
                                                    WRITEASY
                                                </label>
                                                <br/>
                                                <label>
                                                    <input type="checkbox" name="IAA" value="IAA" <?php if($row['course_iaa']==1)echo "checked";?>/>
                                                    IAA
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="FUNMATHS" value="FUNMATHS" <?php if($row['course_funmaths']==1)echo "checked";?>/>
                                                    FUNMATHS
                                                </label>
                                                <input type="hidden" id="CourseApplied" name="CourseApplied" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-lg-5  control-label " style="text-align:left">Upload
                                            Image</label>
                                        <div class="col-lg-6">
                                            <a id="pic" class="btn btn-block btn-success btn-sm drops"><span
                                                    class="glyphicon glyphicon-plus"></span> Select Image to Upload </a>
                                            <input type="hidden" id="himg" name="img" value="">
                                            <input type="file" class="form-control" id="FranchiseeImage"
                                                   name="FranchiseeImage"/>
                                            <script>
                                                $('#pic').click(function () {
                                                    $('#FranchiseeImage').click();
                                                    $('#FranchiseeImage').change(function (e) {
                                                        //$('#signup').click(function(){
                                                        var file_data = $('#FranchiseeImage')[0].files[0];
                                                        var form_data = new FormData();
                                                        form_data.append('hi', file_data);
                                                        //var res;
                                                        $.ajax({
                                                            url: '<?php echo base_url()?>upload',
                                                            dataType: 'text',
                                                            cache: false,
                                                            contentType: false,
                                                            processData: false,
                                                            data: form_data,
                                                            type: 'POST',
                                                            success: function (result) {
                                                                alert(result);
                                                                $('#himg').val(result);
                                                                $('#FranchiseeImage').val('');
                                                            }
                                                        });
                                                        e.unwrap();
                                                        e.stopPropagation();
                                                        e.preventDefault();
                                                    });

                                                });

                                            </script>
                                            <i id="franchiseecoursename">File size should not be grater than 2MB</i>
                                        </div>
                                    </div>
                                    <center><h4>EDUCATIONAL BACKGROUND</h4></center>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align: left">College/University
                                            *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="University"
                                                   placeholder="College/University" value="<?php echo $row['college_university'];?>"/>
                                        </div>
                                    </div>


                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align: left">Qualification
                                            *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="Qualification"
                                                   placeholder="Qualification" value="<?php echo $row['qualification'];?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Completed in
                                            Year *</label>
                                        <div class="col-lg-6">

                                            <input type="number" class="form-control" name="CompletedYear"
                                                   placeholder="Completed in Year"  value="<?php echo $row['completed_in_year'];?>" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <center style="font-size:20px;">BUSINESS ADDRESS</center>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Flat/Door
                                            Number *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="FlatNo"
                                                   placeholder="flate/door Number" value="<?php echo $row['doorno'];?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 control-label " style="text-align: left">Street Name
                                            *</label>
                                        <div class="col-lg-6"><input type="text" class="form-control" name="StreetName"
                                                                     placeholder="Street Name" value="<?php echo $row['streetname'];?>"/>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 control-label " style="text-align: left">Area *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="Area" placeholder="Area" value="<?php echo $row['area'];?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Town/City
                                            *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="City"
                                                   placeholder="Town/City" value="<?php echo $row['city'];?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Pincode
                                            *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="PinCode"
                                                   placeholder="Pincode" value="<?php echo $row['pincode'];?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
									<?php $st=$row['state'];?>
                                        <label class="col-lg-5 control-label " style="text-align:left">State *</label>
                                        <div class="col-lg-6">
                                            <select class="form-control" name="State">
                                                <option value="">Select</option>
                                                <option value="Andhra Pradesh"<?php if($st=="Andhra Pradesh") echo "selected";?>>Andhra Pradesh</option>
                                                <option value="Arunachal Pradesh"<?php if($st=="Arunachal Pradesh") echo "selected";?>>Arunachal Pradesh</option>
                                                <option value="Assam"<?php if($st=="Assam") echo "selected";?>>Assam</option>
                                                <option value="Bihar"<?php if($st=="Bihar") echo "selected";?>>Bihar</option>
                                                <option value="Chhattisgarh"<?php if($st=="Chhattisgarh") echo "selected";?>>Chhattisgarh</option>
                                                <option value="Goa"<?php if($st=="Goa") echo "selected";?>>Goa</option>
                                                <option value="Gujarat"<?php if($st=="Gujarat") echo "selected";?>>Gujarat</option>
                                                <option value="Haryana"<?php if($st=="Haryana") echo "selected";?>>Haryana</option>
                                                <option value="Himachal Pradesh"<?php if($st=="Himachal Pradesh") echo "selected";?>>Himachal Pradesh</option>
                                                <option value="Jammu and Kashmir"<?php if($st=="Jammu and Kashmir") echo "selected";?>>Jammu and Kashmir</option>
                                                <option value="Jharkhand"<?php if($st=="Jharkhand") echo "selected";?>>Jharkhand</option>
                                                <option value="Karnataka"<?php if($st=="Karnataka") echo "selected";?>>Karnataka</option>
                                                <option value="Kerala"<?php if($st=="Kerala") echo "selected";?>>Kerala</option>
                                                <option value="Madhya Pradesh"<?php if($st=="Madhya Pradesh") echo "selected";?>>Madhya Pradesh</option>
                                                <option value="Maharashtra"<?php if($st=="Maharashtra") echo "selected";?>>Maharashtra</option>
                                                <option value="Manipur"<?php if($st=="Manipur") echo "selected";?>>Manipur</option>
                                                <option value="Meghalaya"<?php if($st=="Meghalaya") echo "selected";?>>LevMeghalayael7</option>
                                                <option value="Mizoram"<?php if($st=="Mizoram") echo "selected";?>>Mizoram</option>
                                                <option value="Nagaland"<?php if($st=="Nagaland") echo "selected";?>>LevNagalandel9</option>
                                                <option value="Orissa"<?php if($st=="Orissa") echo "selected";?>>Orissa</option>
                                                <option value="Punjab"<?php if($st=="Punjab") echo "selected";?>>Punjab</option>
                                                <option value="Rajasthan"<?php if($st=="Rajasthan") echo "selected";?>>Rajasthan</option>
                                                <option value="Sikkim"<?php if($st=="Sikkim") echo "selected";?>>Sikkim</option>
                                                <option value="Tamil Nadu"<?php if($st=="Tamil Nadu") echo "selected";?>>Tamil Nadu</option>
                                                <option value="Telangana"<?php if($st=="Telangana") echo "selected";?>>Telangana</option>
                                                <option value="Tripura"<?php if($st=="Tripura") echo "selected";?>>Tripura</option>
                                                <option value="Uttar Pradesh"<?php if($st=="Uttar Pradesh") echo "selected";?>>Uttar Pradesh</option>
                                                <option value="Uttarakhand"<?php if($st=="Uttarakhand") echo "selected";?>>Uttarakhand</option>
                                                <option value="West Bengal"<?php if($st=="West Bengal") echo "selected";?>>West Bengal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Nationality
                                            *</label>
                                        <div class="col-lg-6">
										 <?php $na=$row['nationality'];?>
                                            <select class="form-control" name="Nationality">
                                                <option value="">Select</option>
                                                <option value="Indian" <?php if($na=="Indian") echo "selected"?>>Indian</option>
                                                <option value="Others"<?php if($na=="Others") echo "selected"?>>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <center style="font-size:20px;">RESIDENTIAL ADDRESS</center>
                                    </div>
                                    <div class="form-group">
                                        <label><!--<input type="checkbox" id="checkbox" name="checkbox" onclick="copy()">Click
                                            here if same as Business Address!--></label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Flat/Door
                                            Number *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="RflatNo"
                                                   placeholder="flate/door Number" value="<?php echo $row['r_doorno'];?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 control-label " style="text-align: left">Street Name
                                            *</label>
                                        <div class="col-lg-6"><input type="text" class="form-control" name="RstreetName"
                                                                     placeholder="Street Name" value="<?php echo $row['r_streetname'];?>"/>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 control-label " style="text-align: left">Area *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="Rarea" placeholder="Area" value="<?php echo $row['r_area'];?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Town/City
                                            *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="Rcity"
                                                   placeholder="Town/City" value="<?php echo $row['r_city'];?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Pincode
                                            *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="RpinCode"
                                                   placeholder="Pincode" value="<?php echo $row['r_pincode'];?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 control-label " style="text-align:left">State *</label>
										<?php $rst=$row['r_state'];?>
										<div class="col-lg-6">
                                            <select class="form-control" name="Rstate">
                                                <option value="">Select</option>
                                                <option value="Andhra Pradesh"<?php if($rst=="Andhra Pradesh") echo "selected";?>>Andhra Pradesh</option>
                                                <option value="Arunachal Pradesh"<?php if($rst=="Arunachal Pradesh") echo "selected";?>>Arunachal Pradesh</option>
                                                <option value="Assam"<?php if($rst=="Assam") echo "selected";?>>Assam</option>
                                                <option value="Bihar"<?php if($rst=="Bihar") echo "selected";?>>Bihar</option>
                                                <option value="Chhattisgarh"<?php if($rst=="Chhattisgarh") echo "selected";?>>Chhattisgarh</option>
                                                <option value="Goa"<?php if($rst=="Goa") echo "selected";?>>Goa</option>
                                                <option value="Gujarat"<?php if($rst=="Gujarat") echo "selected";?>>Gujarat</option>
                                                <option value="Haryana"<?php if($rst=="Haryana") echo "selected";?>>Haryana</option>
                                                <option value="Himachal Pradesh"<?php if($rst=="Himachal Pradesh") echo "selected";?>>Himachal Pradesh</option>
                                                <option value="Jammu and Kashmir"<?php if($rst=="Jammu and Kashmir") echo "selected";?>>Jammu and Kashmir</option>
                                                <option value="Jharkhand"<?php if($rst=="Jharkhand") echo "selected";?>>Jharkhand</option>
                                                <option value="Karnataka"<?php if($rst=="Karnataka") echo "selected";?>>Karnataka</option>
                                                <option value="Kerala"<?php if($rst=="Kerala") echo "selected";?>>Kerala</option>
                                                <option value="Madhya Pradesh"<?php if($rst=="Madhya Pradesh") echo "selected";?>>Madhya Pradesh</option>
                                                <option value="Maharashtra"<?php if($rst=="Maharashtra") echo "selected";?>>Maharashtra</option>
                                                <option value="Manipur"<?php if($rst=="Manipur") echo "selected";?>>Manipur</option>
                                                <option value="Meghalaya"<?php if($rst=="Meghalaya") echo "selected";?>>LevMeghalayael7</option>
                                                <option value="Mizoram"<?php if($rst=="Mizoram") echo "selected";?>>Mizoram</option>
                                                <option value="Nagaland"<?php if($rst=="Nagaland") echo "selected";?>>LevNagalandel9</option>
                                                <option value="Orissa"<?php if($rst=="Orissa") echo "selected";?>>Orissa</option>
                                                <option value="Punjab"<?php if($rst=="Punjab") echo "selected";?>>Punjab</option>
                                                <option value="Rajasthan"<?php if($rst=="Rajasthan") echo "selected";?>>Rajasthan</option>
                                                <option value="Sikkim"<?php if($rst=="Sikkim") echo "selected";?>>Sikkim</option>
                                                <option value="Tamil Nadu"<?php if($rst=="Tamil Nadu") echo "selected";?>>Tamil Nadu</option>
                                                <option value="Telangana"<?php if($rst=="Telangana") echo "selected";?>>Telangana</option>
                                                <option value="Tripura"<?php if($rst=="Tripura") echo "selected";?>>Tripura</option>
                                                <option value="Uttar Pradesh"<?php if($rst=="Uttar Pradesh") echo "selected";?>>Uttar Pradesh</option>
                                                <option value="Uttarakhand"<?php if($rst=="Uttarakhand") echo "selected";?>>Uttarakhand</option>
                                                <option value="West Bengal"<?php if($rst=="West Bengal") echo "selected";?>>West Bengal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Nationality
                                            *</label>
                                        <div class="col-lg-6">
										<?php $rna=$row['r_nationality'];?>
                                            <select class="form-control" name="Rnationality">
                                                <option value="">Select</option>
                                                <option value="Indian"<?php if($rna=="Indian")echo "selected"?>>Indian</option>
                                                <option value="Others"<?php if($rna=="Others")echo "selected"?>>Others</option>
                                            </select>
                                        </div>
                                    </div>

                                    <center><h4>OTHER TRAINING(S) ATTENDED</h4></center>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Type of
                                            course(s)</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="OfCourse"
                                                   placeholder="Type of course" value="<?php echo $row['course_type'];?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Course
                                            Name</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="CourseName"
                                                   placeholder="Course Name" value="<?php echo $row['course_name'];?>"/>
                                            <i id="franchiseecoursename">You can use ',' for multiple courses</i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label "
                                               style="text-align: left">Institution</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="Instiution"
                                                   placeholder="Institution" value="<?php echo $row['institution'];?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Completed in
                                            year</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="OtherCompletedYear"
                                                   placeholder="Completed in year" value="<?php echo $row['course_compl_year'];?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Present
                                            Occupation(If any)</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="PresentOcupation"
                                                   placeholder="Present Occupation" value="<?php echo $row['occupation'];?>"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">What is your
                                            purpose for learning this Program</label>
                                        <div class="col-lg-6">
                                            <textarea type="text" class="form-control" rowa="16" name="Goal"
                                                      placeholder="purpose/goal"><?php echo $row['purpose'];?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!--<label class="col-lg-5   control-label " style="text-align: left">Franchisee Kit
                                            Fee *</label>-->
                                        <div class="col-lg-6">
                                            <!--<input type="text" id="franchiseKitFee" class="form-control"
                                                   name="FranchiseKitFee" placeholder="Franchisee Kit Fee" value="0"/>-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                       <!-- <label class="col-lg-5   control-label " style="text-align: left">Franchisee
                                            License Fee *</label>-->
                                        <div class="col-lg-6">
                                          <!--<input type="text" id="franchiseFee" class="form-control"
                                                   name="FranchiseLicenseFee" placeholder="Franchisee Fee" value="0"/>-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                       <!-- <label class="col-lg-5   control-label " style="text-align: left">Tax( ST/GST )
                                            *</label>-->
                                        <div class="col-lg-6">
                                           <!--<input type="text" id="tax" class="form-control" name="FranchiseTax"
                                                   placeholder="Franchisee Tax" value="0" readonly/>-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <!--<label class="col-lg-5   control-label " style="text-align: left">Total
                                            Amount</label>-->
                                        <div class="col-lg-6">
                                            <!--<input type="text" id="total_amt" class="form-control" name="TotalAmount"
                                                   placeholder="Total Amount" value="0" readonly/>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <center>
                                        <div>
                                            <button type="submit" id="signup" role="button" class="btn btn-primary"
                                                    name="signup" value="Sign up" style="margin:10px;"><span
                                                    class="glyphicon glyphicon-save" style="margin:3px;"></span>UPDATE
                                            </button>
                                            <button type="reset" class="btn btn-primary" name="cancel"
                                                    style="margin:10px;"><span class="glyphicon glyphicon-remove"
                                                                               style="margin:3px;"></span>CANCEL
                                            </button>
                                        </div>
                                    </center>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <p id="message_from_server" class="text-success"></p>
                                </div>
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

                                $(document).ready(function () {
                                    $('#myModal2').on('shown.bs.modal', function () {
                                        $(this).find('.modal-dialog').css({
                                            width: '50%',
                                            height: 'auto',
                                            'max-height': '100%'
                                        });
                                    });
                                    $('#franchiseFee,#franchiseKitFee').change(function () {
                                        if (parseFloat($(this).val()) > 0) {
                                            $('#tax').val((parseFloat($('#franchiseFee').val()) + parseFloat($('#franchiseKitFee').val())) * 15 / 100)
                                            $('#total_amt').val(parseFloat($('#franchiseFee').val()) + parseFloat($('#franchiseKitFee').val()) + parseFloat($('#tax').val()))
                                        } else {
                                            $(this).val('');
                                        }
                                        return false;
                                        //$('#tax').val($('#franchiseKitFee').val()+$('#franchiseFee').val())*15)/100;
                                    })
                                    $('.course-section').find('input:checkbox').change(function () {
                                        $('#CourseApplied').val('');
                                        var arr = $('.course-section').find('input:checkbox').each(function (i, el) {
                                            if ($(this).prop("checked")) {
                                                $('#CourseApplied').val($('#CourseApplied').val() + $(this).val() + ',');
                                            }
                                            if (i == 3) {
                                                $('#CourseApplied').val($('#CourseApplied').val().substring(0, $('#CourseApplied').val().length - 1));
                                            }
                                        });
                                     
                                    });
									
									 $('#CourseApplied').val('');
                                        var arr = $('.course-section').find('input:checkbox').each(function (i, el) {
                                            if ($(this).prop("checked")) {
                                                $('#CourseApplied').val($('#CourseApplied').val() + $(this).val() + ',');
                                            }
                                            if (i == 3) {
                                                $('#CourseApplied').val($('#CourseApplied').val().substring(0, $('#CourseApplied').val().length - 1));
                                            }
										});
                                });
                            </script>
                            <script>
                                $('#btn').click(function () {
                                    //alert('clcikec');
                                    $(document).ready(function () {
                                        $("#datepicker-my").datepicker({
                                            //dateFormat: "dd-mm-yy".replace('T00:00:00', ''),
                                            changeMonth: true,
                                            altField: '#hiddenFieldID',
                                            altFormat: "mm/dd/yy",
                                            changeYear: true,
                                            yearRange: '1950:2017'
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
        <link href="Content/css/tjquery-ui.css" rel="stylesheet"/>
        <script src="Scripts/admin/validations/jquery-teacher.js"></script>
        <script src="Scripts/admin/jquery-ui.js"></script>
												<?php }?>
    </div>
    <footer><p>All right reserved by: <a href="#">LemonBridge</a></p></footer>
</div>