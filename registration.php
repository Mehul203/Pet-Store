<?php 
include 'config.php'; // Your database connection 
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    // Sanitize input to prevent SQL injection 
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']); 
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']); 
    $contact = mysqli_real_escape_string($conn, $_POST['contact']); 
    $gender = mysqli_real_escape_string($conn, $_POST['gender']); 
    $email = mysqli_real_escape_string($conn, $_POST['email']); 
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Secure password hash 
    
    // Insert data into the users table (adjust the table name as needed)
    $query = "INSERT INTO users (firstname, lastname, contact, gender, email, password) 
              VALUES ('$firstname', '$lastname', '$contact', '$gender', '$email', '$password')"; 
    
    if ($conn->query($query) === TRUE) { 
        // Increment client count after successful registration
        $updateQuery = "UPDATE total_clients SET count = count + 1 WHERE id = 1"; 
        $conn->query($updateQuery);
        
        // Redirect to the login page or show success message
        header("Location: login.php"); 
        exit(); 
    } else { 
        echo "Error: " . $conn->error; 
    } 
} 
?>  

<style> 
    /* General body styling */
    body { 
        font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
        color: #333; 
        overflow-x: hidden; 
    } 

    /* Styling for the modal content */
    #uni_modal .modal-content > .modal-footer, 
    #uni_modal .modal-content > .modal-header { 
        display: none; 
    }

    /* Register button styling */
    .Registe { 
        background: linear-gradient(145deg, #FF6B6B, #FF8E53);
        color: white; 
        font-size: 16px; 
        font-weight: bold; 
        padding: 10px 20px; 
        border: none; 
        border-radius: 50px; 
        width: auto; 
        cursor: pointer; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        transition: all 0.3s ease; 
        opacity: 0; 
        animation: fadeInButton 1s ease-out forwards, pulseButton 2s infinite; 
    }

    .Registe:hover { 
        background: linear-gradient(145deg, #FF6B6B, #FF8E53); 
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); 
        transform: translateY(-2px); 
    }

    /* Keyframes for button fade-in */
    @keyframes fadeInButton { 
        0% { opacity: 0; transform: translateY(20px); } 
        100% { opacity: 1; transform: translateY(0); } 
    }

    /* Form container styling */
    .form-container { 
        max-width: 450px; 
        margin: 50px auto; 
        background-color: #ffffff; 
        padding: 30px; 
        border-radius: 10px; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        animation: slideInFromLeft 1s ease-out, fadeInScale 0.8s ease-out; 
    }

    /* Keyframe for sliding form in from the left */
    @keyframes slideInFromLeft { 
        0% { opacity: 0; transform: translateX(-100%); } 
        100% { opacity: 1; transform: translateX(0); } 
    }

    .form-container h3 { 
        margin-bottom: 20px; 
        font-size: 24px; 
        text-align: center; 
        color: #333; 
    }

    /* Input styling */
    .form-container .form-group { 
        margin-bottom: 20px; 
    }

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
    }

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

    /* Updated and new animations */
    @keyframes fadeInScale { 
        0% { opacity: 0; transform: scale(0.9); } 
        100% { opacity: 1; transform: scale(1); } 
    }

    /* Enhanced button animation */
    @keyframes pulseButton { 
        0% { transform: scale(1); } 
        50% { transform: scale(1.05); } 
        100% { transform: scale(1); } 
    } 
</style>  

<div class="container-fluid"> 
    <form action="" id="registration"> 
        <div class="row"> 
            <h3 class="text-center">Create New Account 
                <span class="float-right"> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
                        <span aria-hidden="true">&times;</span> 
                    </button> 
                </span> 
            </h3> 
            <hr> 
        </div> 
        <div class="row align-items-center h-100"> 
            <div class="col-lg-5 border-right"> 
                <div class="form-group"> 
                    <label for="" class="control-label">Firstname</label> 
                    <input type="text" class="form-control form-control-sm form" name="firstname" placeholder="First Name"> 
                </div> 
                <div class="form-group"> 
                    <label for="" class="control-label">Lastname</label> 
                    <input type="text" class="form-control form-control-sm form" name="lastname" required placeholder="Last Name"> 
                </div> 
                <div class="form-group"> 
                    <label for="" class="control-label">Contact</label> 
                    <input type="number" class="form-control form-control-sm form" name="contact" maxlength="10" oninput="validateMobileNumber(this)" required placeholder="Enter 10-digit number"> 
                </div> 
                <div class="form-group"> 
                    <label for="" class="control-label">Gender</label> 
                    <select name="gender" class="custom-select select" required> 
                        <option>Male</option> 
                        <option>Female</option> 
                        <option>Other</option> 
                    </select> 
                </div> 
            </div> 
            <div class="col-lg-7"> 
                <div class="form-group"> 
                    <label for="" class="control-label">Email</label> 
                    <input type="text" class="form-control form-control-sm form" name="email" required placeholder="Email"> 
                </div> 
                <div class="form-group"> 
                    <label for="" class="control-label">Password</label> 
                    <input type="password" class="form-control form-control-sm form" name="password" required placeholder="Password"> 
                </div> 
                <div class="form-group d-flex justify-content-between"> 
                    <a href="javascript:void()" id="login-show">Login</a> 
                    <button class="Registe">Register</button> 
                </div> 
            </div> 
        </div> 
    </form> 
</div>

<script> 
    $(function(){ 
        $('#login-show').click(function(){ 
            uni_modal("","login.php") 
        }); 
        $('#registration').submit(function(e){ 
            e.preventDefault(); 
            start_loader(); 
            if($('.err-msg').length > 0) 
                $('.err-msg').remove(); 
            $.ajax({ 
                url: _base_url_ + "classes/Master.php?f=register", 
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
                        alert_toast("Account successfully registered", 'success'); 
                        setTimeout(function(){ 
                            location.reload(); 
                        }, 2000); 
                    } else if (resp.status == 'failed' && !!resp.msg) { 
                        var _err_el = $('<div>') 
                            .addClass("alert alert-danger err-msg") 
                            .text(resp.msg); 
                        $('[name="password"]').after(_err_el); 
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

    // Function to allow only numeric input and limit length to 10 digits 
    function validateMobileNumber(input) { 
        input.value = input.value.replace(/\D/g, ''); // Remove non-numeric characters 
        if (input.value.length > 10) { 
            input.value = input.value.slice(0, 10); 
        } 
    } 
</script>
