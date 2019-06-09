<?php include('includes/db_config.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">
</head>
<body>
<div class="header">
    <h2>Register</h2>
</div>

<form method="post" action="register.php" id="registration-form">
    <div class="form-control input-group">
        <label for="username">Username</label>
        <input id="username" type="text" name="username">
        <small class="text-danger" id="username-message"></small>
    </div>
    <div class="input-group">
        <label for="email">Email</label>
        <input id="email" type="text" name="email">
        <small class="text-danger" id="email-message"></small>
    </div>
    <div class="input-group">
        <label for="password1">Password</label>
        <input id="password1" type="password" name="password1">
        <small class="text-danger" id="password1-message"></small>
    </div>
    <div class="input-group">
        <label for="password2">Confirm password</label>
        <input id="password2" type="password" name="password2">
        <small class="text-danger" id="password2-message"></small>
    </div>
    <div class="input-group">
        <button type="submit" class="btn btn-block" name="reg_user" value="button">Register</button>
    </div>
    <div class="alert" id="ajax-message"></div>
    <p class="text-center">
        Already a member? <a href="login.php">Sign in</a>
    </p>
</form>
<script src="js/jquery.js"></script>
<script>

    $('form').on('submit',function (e) {
        e.preventDefault();
        if(validateForm()){
            sendAjax(e.currentTarget);
        }
    })

    function validateForm() {

        var $inputs = $('input');
        var $messages = $('small');
        var isValid = true;

        for(var i=0; i<$inputs.length; i++){

            console.log($inputs[i]);
            if($inputs[i].value.trim() === '') {
                $inputs[i].classList.add('error');
                $messages[i].innerHTML = 'This field is required';
                isValid = false;
            } else {
                $inputs[i].classList.remove('error');
                $inputs[i].classList.add('success');
                $messages[i].innerHTML = '';
            }
        }

        var regex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(!regex.test($inputs[1].value)) {
            $inputs[1].classList.remove('success');
            $inputs[1].classList.add('error');
            $messages[1].innerHTML = 'Please enter a valid email address';
            isValid = false;
        } else {
            $inputs[1].classList.remove('error');
            $inputs[1].classList.add('success');
            $messages[1].innerHTML = '';
        }

        if($inputs[2].value !== $inputs[3].value){
            $inputs[2].classList.remove('success');
            $inputs[2].classList.add('error');
            $inputs[3].classList.remove('success');
            $inputs[3].classList.add('error');
            $messages[2].innerHTML = 'Passwords do not match';
            isValid = false;
        }

        return isValid;
    }
    function sendAjax(data) {

        var username = data[0].value;
        var email = data[1].value;
        var password = data[2].value;
        var ajaxMessage = document.querySelector('#ajax-message');
        var form  = document.getElementById('registration-form');

        $.ajax({
            url: 'includes/register.inc.php',
            type: 'POST',
            data: 'username='+username+'&email='+email+'&password='+password+'&js='+1,
            success: function (response) {

                if(response.error) {
                    ajaxMessage.classList.remove('alert-success');
                    ajaxMessage.classList.add('alert-danger');
                    ajaxMessage.innerHTML = response.error;

                } else {
                    ajaxMessage.classList.remove('alert-danger');
                    ajaxMessage.classList.add('alert-success');
                    ajaxMessage.innerHTML = response.success;
                    form.reset();
                }
            }
        })
    }
</script>
</body>
</html>