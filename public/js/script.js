$(document).ready(function() {
    $('#signup').on('submit',function(e){
        e.preventDefault();
        let first_name = $('#first_name').val();
        let last_name = $('#last_name').val();
        let email = $('#email').val();
        let username = $('#username').val();
        let password = $('#password').val();
        let confirm_password = $('#confirm_password').val();

        if(first_name === ''|| last_name === '' || email === '' || username === '' || password === '' || confirm_password === ''){
            $('#errors').text('No empty fields allowed!');
            return;
        }
        if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email) === false){
            $('#errors').text('Wrong Email Entered!');
            return;
        }
        if(password !== confirm_password){
            $('#errors').text('The passwords entered do not match!');
            return;
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'post',
            url:'/dashboard',
            data:{
                first_name:first_name,
                last_name:last_name,
                email:email,
                username:username,
                password:password,
                confirm_password:confirm_password
            },
            success:function(response){
                alert(response);
            }
        })
    });
});

// function myNavFunction(id) {
//     $("#date-popover").hide();
//     var nav = $("#" + id).data("navigation");
//     var to = $("#" + id).data("to");
//     console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
// }
