$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('change', '#group_students', function(e) {
        e.preventDefault();

        var group_id = $(this).attr("data-id")
        var route = $(this).attr("data-route")


        $.ajax({
            type: 'POST',
            url: route,
            data: { 'group_id': group_id, 'student_id': $(this).val() },
            dataType: 'json',
            success: function(data) {
                window.location.reload();
                console.log(data);

                // $('#employee_name').val(data);
            },
            error: function(jqXhr, json, errorThrown) {
                var errors = jqXhr.responseJSON;
                console.log(jqXhr);
            }
        });
    });
});