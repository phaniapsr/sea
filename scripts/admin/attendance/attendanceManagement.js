/**
 * Created by PhaniKumar on 12/5/2016.
 */
$(function(){
    $(".f-stu-attendance").click(function(e){
        $('#hid_user_id').val($(this).attr('userid'));
        var class_day=['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
        $.ajax({
            type: 'post',
            url: $('#AttendanceForm').attr('action').split('StudentManagement/')[0]+'StudentManagement/getAttendance',
            dataType:'json',
            data: {user_id: $('#hid_user_id').val()},
            success: function(res) {
                $('#data_fa_name').text(res[0].fath_name)
                $('#data_mo_name').text(res[0].moth_name)
                $('#data_pcn').text(res[0].fath_mobno)
                $('#data_pemail').text(res[0].fath_email)
                $('#data_cp').text(res[0].stu_program)
                $('#data_cat').text(res[0].stu_category)
                $('#data_level').text(res[0].stu_level)
                //$('#data_fr_name').text(res[0].fath_name)
                $('#data_crs_int_name').text(res[0].course_instructor_name)
                $('#data_cls_day').text(class_day[res[0].class_day])
                $('#data_cls_time').text(res[0].class_time)
                $.each(res[0].attendance, function (key, val) {

                });
            }
        });
    })
    $(".schedule_date").click(function(e){
        $(this).datepicker({
            changeMonth: true,
            altFormat: "mm/dd/yy",
            changeYear: true,
        });
    })
})