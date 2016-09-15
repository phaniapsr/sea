<script type="application/javascript" src="<?php echo base_url()?>scripts/admin/franchiseeRegistration/franchiseeRegistration.js"></script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">Franchisee Registration Form</h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <label style="color:Green;font-size:28px;"></label>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div id="margin-top" class="panel-body">
                        <form id="franchiseeRegistration" action="<?php echo base_url()?>FranchiseeManagement/registerFranchisee" name="form2" class="form-horizontal" method="POST" ng-app="app" ng-controller="Ctrl" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Select Franchisee *</label>
                                        <div class="col-lg-6">
                                            <select class="form-control" name="franchiseetypeId">
                                                <option value="">Select</option>
                                                <option value="2">State Master Franchisee</option>
                                                <option value="3">District Master Franchisee</option>
                                                <option value="4">Unit Franchisee</option>
                                                <option value="5">Consultant</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align: left">Franchisee Name *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="franchiseeName" placeholder="Franchisee name"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Email Address *</label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" name="email" placeholder="Email address"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align: left">Password *</label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" name="password" placeholder="Password"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align: left">First Name *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="first_name" placeholder="First name"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align: left">Middle Name</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Last Name *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="last_name" placeholder="Last name"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Date Of Birth *</label>
                                        <div class="col-lg-6">
                                            <div class="input-group input-append date" id="datePicker">
                                                <input type="text" class="form-control" name="date_of_birth" id="datepicker-my" placeholder="DD/MM/YYYY" value="01/01/0001" />
                                        <span class="input-group-addon add-on" id="btn" style="cursor: pointer;">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                            </div>
                                            <input type="hidden" id="hiddenFieldID" name="DateOfBirth"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Gender *</label>
                                        <div class="col-lg-6">
                                            <select class="form-control" name="gender">
                                                <option value="">Select</option>
                                                <option value="Male" >Male</option>
                                                <option value="Female" >Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align: left">Landline Number</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="LandlineNumber" placeholder="Landline Number" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align: left">Mobile Number *</label>
                                        <div class="col-lg-6">
                                            <input type="number" class="form-control" name="MobileNumber" placeholder="Mobile Number"/>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align: left">Place Of Birth *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="PlaceOfBirth" placeholder="Place of birth"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Marital Status *</label>
                                        <div class="col-lg-6">
                                            <select class="form-control" name="MaritalStatus">
                                                <option value="">Select</option>
                                                <option value="Single" >Single</option>
                                                <option value="Married" >Married</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Course Applied for *</label>
                                        <div class="col-lg-6">
                                            <div class="course-section">
                                                <label>

                                                    <input type="checkbox" name="ACMAS"  value="ACMAS" />
                                                    ACMAS
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="WRITEASY"  value="WRITEASY" />
                                                    WRITEASY
                                                </label>
                                                <br />
                                                <label>
                                                    <input type="checkbox" name="IAA" value="IAA" />
                                                    IAA
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="FUNMATHS"  value="FUNMATHS"/>
                                                    FUNMATHS
                                                </label>
                                                <input type="hidden" id="CourseApplied" name="CourseApplied" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="col-lg-5  control-label " style="text-align:left">Upload Image</label>
                                        <div class="col-lg-6">
                                            <a id="pic" class="btn btn-block btn-success btn-sm drops"><span class="glyphicon glyphicon-plus"></span> Select Image to Upload </a>
                                            <input type="file" class="form-control" id="FranchiseeImage" name="FranchiseeImage" />
                                            <script>
                                                $('#pic').click(function () {
                                                    $('#FranchiseeImage').click();
                                                });
                                            </script>
                                            <i id="franchiseecoursename">File size should not be grater than 2MB</i>
                                        </div>
                                    </div>
                                    <center><h4>EDUCATIONAL BACKGROUND</h4></center>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align: left">College/University *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="University" placeholder="College/University"/>
                                        </div>
                                    </div>


                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label " style="text-align: left">Qualification *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="Qualification" placeholder="Qualification"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Completed in Year *</label>
                                        <div class="col-lg-6">

                                            <input type="number" class="form-control" name="CompletedYear" placeholder="Completed in Year" value="0" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <center style="font-size:20px;">BUSINESS ADDRESS</center>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Flat/Door Number *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="FlatNo" placeholder="flate/door Number"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 control-label " style="text-align: left">Street Name *</label>
                                        <div class="col-lg-6"><input type="text" class="form-control" name="StreetName" placeholder="Street Name"/>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 control-label " style="text-align: left">Area *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="Area" placeholder="Area"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Town/City *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="City" placeholder="Town/City"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Pincode *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="PinCode" placeholder="Pincode"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 control-label " style="text-align:left">State *</label>
                                        <div class="col-lg-6">
                                            <select class="form-control" name="State">
                                                <option value="">Select</option>
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
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Nationality *</label>
                                        <div class="col-lg-6">
                                            <select class="form-control" name="Nationality">
                                                <option value="">Select</option>
                                                <option value="Indian" >Indian</option>
                                                <option value="Others" >Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <center style="font-size:20px;">RESIDENTIAL ADDRESS</center>
                                    </div>
                                    <div class="form-group">
                                        <label><input type="checkbox" id="checkbox" name="checkbox" onclick="copy()">Click here if same as Business Address!</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Flat/Door Number *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="RflatNo" placeholder="flate/door Number"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 control-label " style="text-align: left">Street Name *</label>
                                        <div class="col-lg-6"><input type="text" class="form-control" name="RstreetName" placeholder="Street Name"/>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 control-label " style="text-align: left">Area *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="Rarea" placeholder="Area"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Town/City *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="Rcity" placeholder="Town/City"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Pincode *</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="RpinCode" placeholder="Pincode"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 control-label " style="text-align:left">State *</label>
                                        <div class="col-lg-6">
                                            <select class="form-control" name="Rstate">
                                                <option value="">Select</option>
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
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5 col-lg-offset-1 control-label" style="text-align: left">Nationality *</label>
                                        <div class="col-lg-6">
                                            <select class="form-control" name="Rnationality">
                                                <option value="">Select</option>
                                                <option value="Indian" >Indian</option>
                                                <option value="Others" >Others</option>
                                            </select>
                                        </div>
                                    </div>

                                    <center><h4>OTHER TRAINING(S) ATTENDED</h4></center>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Type of course(s)</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="OfCourse" placeholder="Type of course" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Course Name</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="CourseName" placeholder="Course Name" />
                                            <i id="franchiseecoursename">You can use ',' for multiple courses</i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Institution</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="Instiution" placeholder="Institution" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Completed in year</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="OtherCompletedYear" placeholder="Completed in year" value="0" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">Present Occupation(If any)</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="PresentOcupation" placeholder="Present Occupation" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5  control-label " style="text-align: left">What is your purpose for learning this Program</label>
                                        <div class="col-lg-6">
                                            <textarea type="text" class="form-control" rowa="16" name="Goal" placeholder="purpose/goal"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5   control-label " style="text-align: left">Franchisee Kit Fee *</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="franchiseKitFee" class="form-control" name="FranchiseKitFee" placeholder="Franchisee Kit Fee" value="0" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5   control-label " style="text-align: left">Franchisee License Fee *</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="franchiseFee" class="form-control" name="FranchiseFee" placeholder="Franchisee Fee" value="0" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5   control-label " style="text-align: left">Tax( ST/GST ) *</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="tax" class="form-control" name="FranchiseTax" placeholder="Franchisee Tax" value="0" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-5   control-label " style="text-align: left">Total Amount</label>
                                        <div class="col-lg-6">
                                            <input type="text" id="total_amt" class="form-control" name="TotalAmount" placeholder="Total Amount" value="0" readonly />
                                        </div>
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


                            <div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <label style="color:Green;font-size:28px;"></label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                                    $('#franchiseFee,#franchiseKitFee').change(function(){
                                        if (parseFloat($(this).val()) > 0 ) {
                                            $('#tax').val((parseFloat($('#franchiseFee').val())+parseFloat($('#franchiseKitFee').val()))*15/100)
                                            $('#total_amt').val(parseFloat($('#franchiseFee').val())+parseFloat($('#franchiseKitFee').val())+parseFloat($('#tax').val()))
                                        } else {
                                            $(this).val('');
                                        }
                                        return false;
                                        //$('#tax').val($('#franchiseKitFee').val()+$('#franchiseFee').val())*15)/100;
                                    })
                                    $('.course-section').find('input:checkbox').change(function () {
                                        $('#CourseApplied').val('');
                                        var arr = $('.course-section').find('input:checkbox').each(function (i,el) {
                                            if ($(this).prop("checked")) {
                                                $('#CourseApplied').val($('#CourseApplied').val() + $(this).val() + ',');
                                            }
                                            if (i == 3) {
                                                $('#CourseApplied').val($('#CourseApplied').val().substring(0, $('#CourseApplied').val().length - 1));
                                            }
                                        });


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
        <link href="Content/css/tjquery-ui.css" rel="stylesheet" />
        <script src="Scripts/admin/validations/jquery-teacher.js"></script>
        <script src="Scripts/admin/jquery-ui.js"></script>

    </div>
    <footer><p>All right reserved by: <a href="#">LemonBridge</a></p></footer>
</div>