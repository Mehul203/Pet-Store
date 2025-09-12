<style>
   /* Social Icons Container with Floating Animation */
   .social-icons {
        display: flex;
        gap: 15px;
        margin: 30px 0;
        justify-content: center;
        animation: containerFloat 3s ease-in-out infinite;
    }

    @keyframes containerFloat {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    /* Base Icon Styling */
    .social-icons a {
        width: 35px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        color: #fff;
        text-decoration: none;
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    /* Gradient Backgrounds */
    .social-facebook {
        background: linear-gradient(45deg, #1877f2, #3b5998);
    }

    .social-twitter {
        background: linear-gradient(45deg, #1da1f2, #0084b4);
    }

    .social-instagram {
        background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);
    }

    .social-linkedin {
        background: linear-gradient(45deg, #0077b5, #00a0dc);
    }

    /* Glow Effect */
    .social-icons a::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: inherit;
        filter: blur(10px);
        opacity: 0;
        transition: all 0.4s;
        z-index: -1;
    }

    /* Hover Animations */
    .social-icons a:hover {
        transform: translateY(-8px) scale(1.1);
    }

    .social-icons a:hover::before {
        opacity: 0.7;
        transform: scale(1.2);
    }

    /* Icon Spin Animation */
    @keyframes spinIcon {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Bounce Animation */
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }

    /* Pulse Animation */
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.2); }
        100% { transform: scale(1); }
    }

    /* Shake Animation */
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }

    /* Apply Different Animations to Each Icon */
    .social-facebook:hover i {
        animation: spinIcon 0.8s ease-in-out;
    }

    .social-twitter:hover i {
        animation: bounce 0.8s ease-in-out;
    }

    .social-instagram:hover i {
        animation: pulse 0.8s ease-in-out;
    }

    .social-linkedin:hover i {
        animation: shake 0.8s ease-in-out;
    }

    /* Tooltip Styling */
    .social-icons a::after {
        content: attr(data-tooltip);
        position: absolute;
        top: -45px;
        left: 50%;
        transform: translateX(-50%);
        padding: 6px 12px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 500;
        font-family: 'Poppins', sans-serif;
        color: white;
        background: rgba(0, 0, 0, 0.8);
        opacity: 0;
        visibility: hidden;
        transition: all 0.4s;
        white-space: nowrap;
    }

    /* Tooltip Arrow */
    .social-icons a::before {
        content: '';
        position: absolute;
        top: -15px;
        left: 50%;
        transform: translateX(-50%);
        border: 8px solid transparent;
        border-top-color: rgba(0, 0, 0, 0.8);
        opacity: 0;
        visibility: hidden;
        transition: all 0.4s;
    }

    /* Show Tooltip on Hover */
    .social-icons a:hover::after,
    .social-icons a:hover::before {
        opacity: 1;
        visibility: visible;
        top: -55px;
    }

    /* Pop-up Animation */
    @keyframes popUp {
        0% { transform: scale(0); }
        80% { transform: scale(1.2); }
        100% { transform: scale(1); }
    }

    /* Apply Pop-up Animation on Page Load */
    .social-icons a {
        animation: popUp 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards;
    }

    /* Stagger the Pop-up Animation */
    .social-icons a:nth-child(1) { animation-delay: 0.1s; }
    .social-icons a:nth-child(2) { animation-delay: 0.2s; }
    .social-icons a:nth-child(3) { animation-delay: 0.3s; }
    .social-icons a:nth-child(4) { animation-delay: 0.4s; }









 #footer {
  background: #090909;
  color: #fff;
  font-size: 14px;
  text-align: center;
  padding: 30px 0;
}
#footer p {
  font-size: 15;
  font-style: italic;
  padding: 0;
  margin: 0 0 40px 0;
}
#footer .social-links {
  margin: 0 0 40px 0;
}
#footer .social-links a {
  font-size: 18px;
  display: inline-block;
  background: #5cb874;
  color: #fff;
  line-height: 1;
  padding: 8px 0;
  margin-right: 4px;
  border-radius: 50%;
  text-align: center;
  width: 36px;
  height: 36px;
  transition: none;
}
#footer .social-links a:hover {
  background: #449d5b;
  color: #fff;
  text-decoration: none;
}
#footer .copyright {
  margin: 0 0 5px 0;
}
#footer .credits {
  font-size: 13px;
}







.custom-font {
    font-family: 'Arial', sans-serif; /* Change font */
    font-style: italic; /* Italicize the text */
    font-size: 14px; /* Adjust font size */
}

.custom-font a {
    font-weight: bold; /* Bold for the designer's name */
}

.custom-font a:hover {
    text-decoration: underline; /* Optional: Underline on hover */
}

/* Remove all previously added animations */
.container-fluid {
    font-family: 'Poppins', sans-serif;
}

.btn-outline-light.rounded-circle,
.nav .nav-item .nav-link,
.display-5.text-capitalize,
.text-primary,
.form-control,
.back-to-top {
    transition: none;
    transform: none;
}

.btn-outline-light.rounded-circle:hover,
.nav .nav-item .nav-link:hover,
.display-5.text-capitalize:hover,
.text-primary:hover,
.form-control:focus,
.back-to-top:hover {
    transform: none;
    animation: none;
}

/* Remove any pseudo-elements */
.nav .nav-item .nav-link::after,
.display-5.text-capitalize::after,
.display-5.text-capitalize .text-primary::before {
    display: none;
}

</style>
<script>
  $(document).ready(function(){
    $('#p_use').click(function(){
      uni_modal("Privacy Policy","policy.php","mid-large")
    })
     window.viewer_modal = function($src = ''){
      start_loader()
      var t = $src.split('.')
      t = t[1]
      if(t =='mp4'){
        var view = $("<video src='"+$src+"' controls autoplay></video>")
      }else{
        var view = $("<img src='"+$src+"' />")
      }
      $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
      $('#viewer_modal .modal-content').append(view)
      $('#viewer_modal').modal({
              show:true,
              backdrop:'static',
              keyboard:false,
              focus:true
            })
            end_loader()  

  }
    window.uni_modal = function($title = '' , $url='',$size=""){
        start_loader()
        $.ajax({
            url:$url,
            error:err=>{
                console.log()
                alert("An error occured")
            },
            success:function(resp){
                if(resp){
                    $('#uni_modal .modal-title').html($title)
                    $('#uni_modal .modal-body').html(resp)
                    if($size != ''){
                        $('#uni_modal .modal-dialog').addClass($size+'  modal-dialog-centered')
                    }else{
                        $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md modal-dialog-centered")
                    }
                    $('#uni_modal').modal({
                      show:true,
                      backdrop:'static',
                      keyboard:false,
                      focus:true
                    })
                    end_loader()
                }
            }
        })
    }
    window._conf = function($msg='',$func='',$params = []){
       $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
       $('#confirm_modal .modal-body').html($msg)
       $('#confirm_modal').modal('show')
    }
  })
</script>
<!-- Footer-->


   <!-- Footer-->
<!-- <footer class="py-5 bg-dark">
            <div class="container">   
              <p class="m-0 text-center text-white">Copyright &copy; <?php echo $_settings->info('short_name') ?> 2024</p>
              <p class="m-0 text-center text-white">Developed By: <a href="">lokendra & jau</a></p>
          </div>
        </footer>
  -->

  <!DOCTYPE html>
<html lang="en">

<head>
      <!-- Favicon -->
      <link href="img/favicon.ico" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">  

<!-- Icon Font Stylesheet -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->


</head>

<body>
     <!-- Footer Start -->
     <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-12 mb-5">
                <h1 class="mb-3 display-5 text-capitalize text-white"><span class="text-primary">About</span> us</h1>
                <p class="m-0">"Welcome to Pet Store , where pets are family! Our mission is to provide pet owners with everything they need to ensure their beloved companions live a long, healthy, and happy life. From high-quality pet food and accessories to toys and grooming supplies, we offer a wide variety of products designed to meet the needs of every pet.</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>123  India, Palitana</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+91 9512149013</p>
                        <p><i class="fa fa-envelope mr-2"></i>smehul54321@gmail.com</p>
                         <!-- Updated HTML -->
    <div class="social-icons">
        <a href="https://www.facebook.com/" class="social-facebook" data-tooltip="Follow us on Facebook">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://x.com/" class="social-twitter" data-tooltip="Follow us on Twitter">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="https://www.instagram.com/" class="social-instagram" data-tooltip="Follow us on Instagram">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="https://in.linkedin.com/" class="social-linkedin" data-tooltip="Connect on LinkedIn">
            <i class="fab fa-linkedin-in"></i>
        </a>
    </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Popular Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="http://localhost/pet_shop/"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-white mb-2" href="about1.php"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                            <a class="text-white mb-2" href="http://localhost/pet_shop/Our%20Services.php"><i class="fa fa-angle-right mr-2"></i>Our Services</a>
                            <a class="text-white" href="http://localhost/pet_shop/?p=about"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Feedback</h5>
                        
                        <?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pet_shop_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];

    // Insert data into the database
    $sql = "INSERT INTO feedback (name, email, feedback) VALUES ('$name', '$email', '$feedback')";

    if ($conn->query($sql) === TRUE) {
        echo "New feedback submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


<div class="container">
    <form action="" method="POST">
        <div class="form-group">
            <input type="text" name="name" class="form-control border-0" placeholder="Your Name" required="required" />
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control border-0" placeholder="Your Email" required="required" />
        </div>
        <div class="form-group">
            <textarea name="feedback" class="form-control border-0" placeholder="Your Feedback" required="required"></textarea>
        </div>
        <div>
            <button class="btn btn-lg btn-primary btn-block border-0" type="submit">Submit Now</button>
        </div>
    </form>
</div>




                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white py-4 px-sm-3 px-md-5" style="background: #111111;">
        <div class="row">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
         <a href="#">©  Pet Store      <?php echo date('Y') ?></a>
        <div class="float-right d-none d-sm-inline-block">
       Designed by :- 
       <a href="//www.instagram.com/m_b.solanki203">Solanki Mehul</a> &
       <a href="//www.instagram.com/pathhu___07">Devmurari Parth</a>
       
       </b>  
      </div>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <ul class="nav d-inline-flex">
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="blog.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="help section.php">Help</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-0" href="FAQS.PHP">FAQs</a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </div>
    <!-- Footer End -->
     


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>



    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo base_url ?>plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url ?>plugins/sparklines/sparkline.js"></script>
    <!-- Select2 -->
    <script src="<?php echo base_url ?>plugins/select2/js/select2.full.min.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url ?>plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url ?>plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url ?>plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url ?>plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?php echo base_url ?>plugins/summernote/summernote-bs4.min.js"></script>
    <script src="<?php echo base_url ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- overlayScrollbars -->
    <!-- <script src="<?php echo base_url ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
    <!-- AdminLTE App -->
    <script src="<?php echo base_url ?>dist/js/adminlte.js"></script>
    <div class="daterangepicker ltr show-ranges opensright">
      <div class="ranges">
        <ul>
          <li data-range-key="Today">Today</li>
          <li data-range-key="Yesterday">Yesterday</li>
          <li data-range-key="Last 7 Days">Last 7 Days</li>
          <li data-range-key="Last 30 Days">Last 30 Days</li>
          <li data-range-key="This Month">This Month</li>
          <li data-range-key="Last Month">Last Month</li>
          <li data-range-key="Custom Range">Custom Range</li>
        </ul>
      </div>
      <div class="drp-calendar left">
        <div class="calendar-table"></div>
        <div class="calendar-time" style="display: none;"></div>
      </div>
      <div class="drp-calendar right">
        <div class="calendar-table"></div>
        <div class="calendar-time" style="display: none;"></div>
      </div>
      <div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" disabled="disabled" type="button">Apply</button> </div>
    </div>
    <div class="jqvmap-label" style="display: none; left: 1093.83px; top: 394.361px;">Idaho</div>