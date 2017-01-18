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
                $('.attendance_table').find("tr:gt(1)").remove();
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
                var replace_id=0;
                $('#hid_course_level_id').val(res[0].attendance[0].course_level_id)
                $.each(res[0].attendance, function (key, value) {
                    replace_id++
                    var cloned=$('.attendance_tr:first').clone(true).insertAfter(".attendance_tr:last");
                    cloned.find('input.schedule_date').removeClass('hasDatepicker').removeData('datepicker').unbind().datepicker().val(value.actual_class_conducted_date);
                    cloned.find('input.punctual').attr('name',cloned.find('input.punctual').attr("name").replace(/\d+/, replace_id))
                    cloned.find('input.homework').attr('name',cloned.find('input.homework').attr("name").replace(/\d+/, replace_id))
                    value.punctual==0?cloned.find('input[type=radio][value=0].punctual').attr('checked', 'checked'):value.punctual==1?cloned.find('input[type=radio][value=1].punctual').attr('checked', 'checked'):cloned.find('input[type=radio][value=1].punctual');
                    value.homework==0?cloned.find('input[type=radio][value=0].homework').attr('checked', 'checked'):value.homework==1?cloned.find('input[type=radio][value=1].homework').attr('checked', 'checked'):cloned.find('input[type=radio][value=1].homework');
                    cloned.find('td:first').append().text(value.scheduled_class_date);
                    cloned.find('input.hid_attendance_cls').val(value.attendance_id);
                });
                $('.attendance_tr:first').remove();
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
    
    $('#attendance_button_save').click(function (e) {
        $('#AttendanceForm').submit();
    })
    $('#AttendanceForm').submit(function(e){
        e.preventDefault();
        var data=$(this).serialize();
        $.ajax({
            url:$(this).attr('action'),
            data:data,
            method:'post',
            success:function(){
                alert('Data saved successfully');
            },
            error:function(){
                alert('technical issue')
            }
        })
        e.preventDefault();
    })
})