$(document).ready(function() {
    $('#edit_information').on('submit',function(e){
        e.preventDefault();
        let form = $("#edit_information");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'post',
            url:'/update_info',
            data:form.serialize(),
            success:function(response){
                if(response.success === true){
                    Swal.fire(
                        "Great",
                        "Profile Successfully Updated",
                        "success",
                    );
                    document.getElementById('fname').value = '';
                    document.getElementById('lname').value = '';
                    document.getElementById('username').value = '';
                    document.getElementById('email').value = '';
                    document.getElementById('number').value = '';
                    document.getElementById('position').value = '';
                    document.getElementById('bio').value = '';
                }else{
                    Swal.fire(
                        "Sorry",
                        "Profile not updated",
                        "error",
                    );
                }
            }
        })
    });


    $('#create_activity').on('submit', function (e){
        e.preventDefault();
        let activity_details= $("#create_activity");


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'post',
            url:'/add_activity',
            data:activity_details.serialize(),
            success:function(response){
                if(response.success === true){
                    Swal.fire(
                        'Great',
                        'New Activity added!',
                        'success',
                    );
                    document.getElementById('title').value ='';
                    document.getElementById('description').value ='';
                }else{
                    Swal.fire(
                        'Sorry',
                        'New Activity not added!',
                        'error',
                    );
                }
            }
        })
    })

    $('#search_details').on('submit',function (e){
        e.preventDefault();
        let activity_id = $('#activity_selected').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'get',
            url:'/search_details',
            data:{activity_id:activity_id},
            success:function (response){
                document.getElementById('search_activity').innerHTML = response;

                
            }
        })

    });


    $('#query').on('submit',function (e){
        e.preventDefault();
        let beg_date = $('#beg_date').val();
        let end_date = $('#end_date').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'get',
            url:'/query',
            data:{
                beg_date:beg_date,
                end_date:end_date
            },
            success:function(response){
                document.getElementById('activity_information').innerHTML = response;
            }
        })


    })
});

function complete(activity_id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:'post',
        url:'/complete',
        data:{activity_id:activity_id},
        success:function (response){
           if(response.success === true){
               Swal.fire(
                   'Great',
                   'Activity Status has been changed',
                   'success'
               );
           }else{
               Swal.fire(
                   'Sorry',
                   'Activity Status was not changed',
                   'error'
               );
           }
        }
    })
}

function pending(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:'post',
        url:'/pending',
        data:{id:id},
        success:function (response) {
            if (response.success === true) {
                Swal.fire(
                    'Great',
                    'Activity Status has been changed',
                    'success'
                );
            } else {
                Swal.fire(
                    'Sorry',
                    'Activity Status was not changed',
                    'error'
                );
            }
        }
    });
}

function delete_activtiy(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:'post',
        url:'/delete',
        data:{id:id},
        success:function (response) {
            if (response.success === true) {
                Swal.fire(
                    'Great',
                    'Activity deleted',
                    'success'
                );
            } else {
                Swal.fire(
                    'Sorry',
                    'Activity not deleted',
                    'error'
                );
            }
        }
    });
}





