<script>
  $(document).ready(function(){
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
<footer class="main-footer text-sm">
        <strong> © Pet Store  <?php echo date('Y') ?>
        <!-- <a href=""></a> -->
        </strong>
        <div class="float-right d-none d-sm-inline-block">
          <b><?php echo $_settings->info('') ?> Designed by : <a >Solanki Mehul</a></b>
        </div>
      </footer>
    </div>
    <!-- ./wrapper -->
   
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

    <!-- Add Google Fonts import -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
    /* Social Icons Container with Floating Animation */
    .social-icons {
        display: flex;
        gap: 25px;
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
        width: 50px;
        height: 50px;
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
    </style>

    <!-- Updated HTML -->
    <div class="social-icons">
        <a href="#" class="social-facebook" data-tooltip="Follow us on Facebook">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#" class="social-twitter" data-tooltip="Follow us on Twitter">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="social-instagram" data-tooltip="Follow us on Instagram">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="#" class="social-linkedin" data-tooltip="Connect on LinkedIn">
            <i class="fab fa-linkedin-in"></i>
        </a>
    </div>