$(document).ready(function () {

    $("#classDay").change(function () {
        var day = $(this).val();
        $.ajax({
            type: "GET",
            url: "schedule_time.php?day=" + day,
            dataType: "json",
            success: function (data) {
                $('#classTime').empty();
                $.each(data, function (i, obj)
                {
                    var div_data = "<option value=" + obj.id + ">" + obj.name + "</option>";
                    $(div_data).appendTo('#classTime');
                });
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });
//On edit info page
    $("#userType").change(function () {
        var type = $(this).val();
        if (type == 1) {
            $('#userGrade').empty();
            var div_data = "<option value='0'>Kindergarten</option>";
            $(div_data).appendTo('#userGrade');
            var div_data = "<option value='1'>1</option>";
            $(div_data).appendTo('#userGrade');
            var div_data = "<option value='2'>2</option>";
            $(div_data).appendTo('#userGrade');
            var div_data = "<option value='3'>3</option>";
            $(div_data).appendTo('#userGrade');
            var div_data = "<option value='4'>4</option>";
            $(div_data).appendTo('#userGrade');
            var div_data = "<option value='5'>5</option>";
            $(div_data).appendTo('#userGrade');
            var div_data = "<option value='6'>6</option>";
            $(div_data).appendTo('#userGrade');
            var div_data = "<option value='7'>7</option>";
            $(div_data).appendTo('#userGrade');
            var div_data = "<option value='8'>8</option>";
            $(div_data).appendTo('#userGrade');

            $('#userParent').show();
        } else if (type == 2) {
            $('#userGrade').empty();
            var div_data = "<option value='9'>9</option>";
            $(div_data).appendTo('#userGrade');
            var div_data = "<option value='10'>10</option>";
            $(div_data).appendTo('#userGrade');
            var div_data = "<option value='11'>11</option>";
            $(div_data).appendTo('#userGrade');
            var div_data = "<option value='12'>12</option>";
            $(div_data).appendTo('#userGrade');

            $('#userParent').hide();
        }
    });
});
