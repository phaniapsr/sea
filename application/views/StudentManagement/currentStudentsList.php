<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">Students List</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form id="searchStudentByName"
                      action="<?php echo base_url() ?>StudentManagement/currentStudentsList" name="form1"
                      class="form-horizontal" method="POST" ng-app="app" ng-controller="Ctrl"
                      enctype="multipart/form-data">
                    <input type="text" name="search" id="search" placeholder="searchByName"/>
                    <input type="text" name="email" id="email" placeholder="searchByEmail"/>
                    <input type="submit" class="btn btn-primary btn-xs f-rev-config" name="find" id="find"
                           value="SEARCH">
                </form>
            </div>
        </div>

        <!-- /. ROW  -->
        <label style="color:Green;font-size:28px;"></label>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped table-bordered table-hover no-footer dataTable"
                       id="dt-state-franchisee" style="font-size:14px;" aria-describedby="dt-state-franchisee_info">
                    <thead>
                    <tr role="row">
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Middle Name</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    foreach ($data['smf'] as $row) { ?>
                        <tr class="odd">
                            <td><?php echo $row['id']; ?></td>
                            <td><a href="sdetailView/<?php echo $row['id'] ?>"><?php echo $row['first_name']; ?></a>
                            </td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['middle_name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><input type="button" class="btn btn-primary btn-xs f-rev-config" value="Courses Info"
                                       onclick="window.location.href='sdetailView/<?php echo $row['id'] ?>'"/></td>
                            <?php if ($row['user_status'] == 0) { ?>
                                <td class="text-center"><a userid="<?php echo $row['user_id']; ?>">
                                        <button type="button" id="dact_<?php echo $row['user_id']; ?>"
                                                class="btn btn-primary btn-xs f-rev-config">Deactivate
                                        </button>
                                    </a></td>
                            <?php } ?>
                            <?php if ($row['user_status'] == 1) { ?>
                                <td class="text-center"><a userid="<?php echo $row['user_id']; ?>">
                                        <button type="button" id="dact_<?php echo $row['user_id']; ?>"
                                                class="btn btn-primary btn-xs f-rev-config">Activate
                                        </button>
                                    </a></td>
                            <?php } ?>
                            <script>
                                $('#dact_<?php echo $row['user_id'];?>').click(function () {
                                    var id = "<?php echo $row['id']?>";
                                    $.ajax({
                                        type: 'post',
                                        url: '<?php echo base_url()?>/FranchiseeManagement/checkStatus',
                                        data: {id: id},
                                        success: function (res) {
                                            if (res == 0) {
                                                alert("deactivated sucessfully");
                                                $('#dact_' + id).text('Activate');

                                            }
                                            if (res == 1) {
                                                alert("activated successfully");
                                                $('#dact_' + id).text('Deactivate');
                                            }

                                        }
                                    });
                                });
                            </script>
                            <td class=" text-center"><a href="editstuList/<?php echo $row['id'] ?>"
                                                        class="popup-with-zoom-anim-mec btn-activate"
                                                        userid="8" status="0" href="#small-dialog3">
                                    <button type="button" class="btn btn-primary btn-xs f-rev-config">Edit</button>
                                </a></td>
                        </tr>
                    <?php } ?>
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
        <link href="<?php echo base_url() ?>Content/css/tjquery-ui.css" rel="stylesheet"/>
        <script src="<?php echo base_url() ?>Scripts/admin/validations/jquery-teacher.js"></script>
        <script src="<?php echo base_url() ?>Scripts/admin/jquery-ui.js"></script>

    </div>
    <footer><p>All right reserved by: <a href="http://friendsfocus.in/">FriendsFocus</a></p></footer>
</div>