<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #333;
        overflow-x: hidden; /* Prevent horizontal scroll on body */
    }
    /* Styling for the modal content */
    #uni_modal .modal-content > .modal-footer,
    #uni_modal .modal-content > .modal-header {
        display: none;
    }
    /* Slide-in animation for the form */
    .form-container {
        max-width: 450px;
        margin: 50px auto;
        background-color: rgba(0, 0, 0, 0.1);
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        animation: slideInFromLeft 1s ease-out;
    }

    /* Keyframe for sliding form in from the left */
    @keyframes slideInFromLeft {
        0% {
            opacity: 0;
            transform: translateX(-100%);
        }
        100% {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Input fade-in animation */
    .form-container .form-group {
        opacity: 0;
        animation: fadeIn 1s ease-out forwards;
    }

    /* Add delay to inputs */
    .form-container .form-group:nth-child(1) {
        animation-delay: 0.3s;
    }
    .form-container .form-group:nth-child(2) {
        animation-delay: 0.5s;
    }

    /* Animation for the form fields */
    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    .form-container h3 {
        margin-bottom: 20px;
        font-size: 24px;
        text-align: center;
        color: #333;
    }

    /* Input styling */
    .form-container .form-group label {
        font-weight: bold;
        color: #333;
        margin-bottom: 5px;
    }

    .form-container .form-group input.form-control {
        border-radius: 25px;
        padding: 15px;
        font-size: 16px;
        margin-bottom: 20px;
        height: 45px;
        transition: all 0.3s ease;
    }

    /* Input focus animation */
    .form-container .form-group input.form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    /* Login button styling */
    .login {
        background: linear-gradient(145deg, #FF6B6B, #FF8E53);  /* Warm, friendly gradient */
        color: #fff;
        border: none;
        font-weight: 600;
        padding: 10px 30px;
        border-radius: 30px;
        font-size: 16px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
    }

    .login:hover {
        background: linear-gradient(145deg, #FF8E53, #FF6B6B);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(255, 107, 107, 0.4);
    }

    .login:active {
        transform: translateY(1px);
        box-shadow: 0 2px 10px rgba(255, 107, 107, 0.3);
    }

    /* Optional: Add loading state */
    .login:disabled {
        background: #ffcccb;
        cursor: not-allowed;
        transform: none;
    }

    /* Link styling */
    .form-container a {
        color: #007bff;
        text-decoration: none;
        font-size: 16px;
    }

    .form-container a:hover {
        text-decoration: underline;
    }

    /* Mobile responsiveness */
    @media (max-width: 768px) {
        .form-container {
            width: 90%;
            padding: 20px;
        }
    }
</style>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="form-container">
                <h3>Login</h3>
                <hr>
                <form action="#" id="login-form">
                    <!-- Email input -->
                    <div class="form-group">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" class="form-control" name="email" required placeholder="Enter Email">
                    </div>
                    
                    <!-- Password input -->
                    <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" class="form-control" name="password" required placeholder="Enter Password">
                    </div>
                    
                    <div class="form-group d-flex justify-content-between">
                        <a href="javascript:void(0)" id="create_account">Create New Account</a>
                        <button type="submit" class="login">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    
    $(function(){
        // Trigger modal for registration
        $('#create_account').click(function(){
            uni_modal("","registration.php","mid-large");
        });

        // Handle form submission for login
        $('#login-form').submit(function(e){
            e.preventDefault();
            start_loader();

            if($('.err-msg').length > 0)
                $('.err-msg').remove();

            $.ajax({
                url: _base_url_ + "classes/Login.php?f=login_user",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                error: err => {
                    console.log(err);
                    alert_toast("An error occurred", 'error');
                    end_loader();
                },
                success: function(resp){
                    if (typeof resp == 'object' && resp.status == 'success') {
                        alert_toast("Login Successfully", 'success');
                        setTimeout(function(){
                            location.reload();
                        }, 2000);
                    } else if (resp.status == 'incorrect') {
                        var _err_el = $('<div>')
                            .addClass("alert alert-danger err-msg")
                            .text("Incorrect Credentials.");
                        $('#login-form').prepend(_err_el);
                        end_loader();
                    } else {
                        console.log(resp);
                        alert_toast("An error occurred", 'error');
                        end_loader();
                    }
                }
            });
        });
    });
</script>
