<?php 
session_start();
$user_name='';

if (isset($_SESSION['uname']) == FALSE) 
{
  echo "<script> location.href='login.php' </script>";
}

else 
{
    $json = exec("python3 tweet_tracker.py");
    $arr = json_decode($json, TRUE);

    if(isset($_SESSION['static_user']))
    {
      if($_SESSION['static_user'] === true)
      {
        $user_name=$_SESSION['uname'];
        // echo($_SESSION['user_id']);
      }
    }

    else
    {
      require_once("db-connection.php");
      $stmt=$conn->prepare("SELECT full_name FROM register_user WHERE user_id=".$_SESSION['user_id']);
      $stmt->execute();
      $row=$stmt->fetch(PDO::FETCH_ASSOC);
      $user_name=$row['full_name'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CyanoKhoj - Home</title>
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyD6o1aJi4G89tuJzF9JFa1eV_dAwt7hsmU" type="text/javascript"></script>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="images/icons/gee.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
 

  <!-- =======================================================
  * Template Name: Gp - v2.0.0
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <script type="text/javascript">
    function initMap() {

      document.getElementById('loc_map').style.display = "block";
      var locations = [
      <?php foreach ($arr as $key => $value) {
                echo '["'.$value[0].'", '.$value[1].', '.$value[2].'],';
        }
      ?>
      // ['Bondi Beach', -33.890542, 151.274856, 4],
    ];

    var map = new google.maps.Map(document.getElementById('mapCanvas'), {
      zoom: 3,
      center: new google.maps.LatLng(locations[0][1], locations[0][2]),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
    document.getElementById('loc_list').style.display = "block";
    document.getElementById('tweet_link_list').style.display = "block";
    document.getElementById('3-br').style.display = "none";
  }

  </script>
  <script src="https://kit.fontawesome.com/7801b51bee.js" crossorigin="anonymous"></script>
</head>

<body>

  <!-- ======= Header ======= -->
<div id="header" class="fixed-top navbar">
    <div class="logo">
      <a href="index.php">CyanoKhoj<span>.</span></a></h1>
    </div>
    <!-- MENU -->
    <div class="nav-username">
      <h2> Welcome <?php echo(htmlentities($user_name))?>!</h2>
    </div>
    <div class="Menu-Button">
      <i class="fa fa-bars text-white" id="toggle-menu-btn" aria-hidden="true"></i>
    </div>
      
    <!-- Dropdown Menu -->
    <div class="Dropdown-Menu">
        <!-- Menu Heading -->
        <div class="menu-heading">
            <h2 class="date"> 
              <?php echo date("l jS \of F")?> 
            </h2>  
            <span class="menu-close-btn"> 
              <i class="fa fa-times" aria-hidden="true"></i>
            </span>
        </div>
        <!-- Menu Heading -->

        <!-- Menu Body -->
        <div class="menu-body">
            <div class="menu-username">
              <h2>Welcome <?php echo(htmlentities($user_name))?>!</h2>
            </div>
            <ul class="list-unstyled">
              <li>
                <a href="#footer">About</a>
              </li>
              <li>
               <a data-toggle="modal" id="my-profile" data-target="#myModal" style=" color:#ffc451;cursor: pointer;">My Profile</a>
              </li>
              <li>
                <a href="#cta">Get Tweet Locations</a>
              </li>
              <li id="logout-btn">
                <a href="logout.php" class="get-started-btn scrollto"><i class="fa fa-sign-out mr-3" aria-hidden="true"></i>Logout</a>
              </li>
            </ul>
        </div>
        <!-- Menu Body-->

        <div class="menu-footer">
          <button type="button" class="btn menu-close-btn" data-toggle="button" aria-pressed="false" autocomplete="off">Close</button>
        </div>
    </div>
    <!-- DropDown Menu-->  
</div>
<!-- Navbar end -->

<!-- MY PROFILE MODAL -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="font-size: 2.5rem;color:whitesmoke">
          <h4 class="modal-title" style="font-size: inherit;color:inherit"><?php echo(htmlentities($user_name)."'s Profile");?></h4>
          <button type="button" class="close" data-dismiss="modal" style="font-size:2.8rem;color:inherit">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Full Name</span>
              </div>
              <input type="text" class="form-control" id="full-name" value="Name">
              <i class="fa fa-pencil-square-o edit-btn" aria-hidden="true"></i>
            </div>  

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Email</span>
              </div>
              <input type="email" class="form-control" id="email" title="Contact Administrator to update Email Id." value="abc@gmail.com">
              <i class="fa fa-exclamation-circle text-white" aria-hidden="true"  data-toggle="tooltip" title="Contact Administrator to update Email Id."></i>
            </div> 

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Organisation</span>
              </div>
              <input type="text" class="form-control"  id="organisation" value="Organisation Name">
              <i class="fa fa-pencil-square-o edit-btn" aria-hidden="true"></i>
            </div> 

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">State</span>
              </div>
              <input type="text" class="form-control"  id="state" value="State Name">
              <i class="fa fa-pencil-square-o edit-btn" aria-hidden="true"></i>
            </div> 
          </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="button" class="btn" value="Save Changes" id="apply-changes-btn" style="background: #05d3ff;color: white;">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
</div>
  
  

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-12 col-lg-8">
          <h1>CyanoHAB monitoring using Twitter Data<span>.</span></h1>
          <h2 style="text-align: justify;" >This is a geo-spatial web platform for automated real time detection of toxic aquatic 
          microbe - Cyanobacterial Harmful Algal blooms (CyanoHABs). The data collection for this platform employs citizen science 
          using Twitter Platform. Remote Sensing data analysis can be performed on the Google Earth Engine (GEE) dashboard for 
          Sentinel-3. This strengthens the retrospective research valley by constant bio-volume intensity monitoring of remote 
          sensing data and ultimately serve as a long term eye to track and arrest CyanoHAB, a biological threat causing environmental 
          imbalance. 
          <a href="https://docs.google.com/presentation/d/e/2PACX-1vQ9rbuXLe4Ga_1BsF5sj_-rRUBOJvv5pcW5d0HjJfu5JBLIXkWefIR7O75EfQw_PyBVa5lEw2LfH-7O/pub?start=false&loop=false&delayms=3000" target="_blank">Project Poster</a> </h2>
        </div>
      </div>

      <div class="row mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
        <div class="col-xl-2 col-md-4 col-6">
          <div class="icon-box">
            <i class="fab fa-twitter"></i>
            <h3 style="color:#ffc451;">Twitter</h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 ">
          <div class="icon-box">
            <i class="fas fa-satellite"></i>
            <h3 style="color:#ffc451;">Remote Sensing</h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 ">
          <div class="icon-box">
            <i class="fab fa-google"></i>
            <h3 style="color:#ffc451;">GEE</h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="fab fa-python"></i>
            <h3 style="color:#ffc451;">Python</h3>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 mt-4 mt-xl-0">
          <div class="icon-box">
            <i class="fab fa-php"></i>
            <h3 style="color:#ffc451;">PHP</h3>
          </div>
        </div>
      </div>
    </div>

    
  </section><!-- End Hero -->

  <!-- Welcome Tooltip -->
  <div id="welcome-tooltip">
      Welcome <?php echo(htmlentities($user_name))?>! <!--Username goes here -->
  </div>
  <!-- End of ToolTip -->

  <main id="main">

    <!-- ======= Location Fetcher Section ======= -->
    <br><br><br>
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Get Tweet Locations</h3>
          <p> Citizens who are a part of the citizen science program, whenever go to any water bodies, tweet their locations if they suspect a CyanoHAB in that particular water body. The locations of these tweets can be fetched and these locations can then be analyzed on GEE dashboard to check for CyanoHABs. To view the locations of such tweets published between today and a week ago, press the button below.</p>
          
          <button class="cta cta-btn" onclick="initMap();">Fetch Tweet Locations</button>

        </div>

      </div>
    </section>
    <!-- End Location Fetcher Section -->
    

    <!-- ======= Tweet Location Map Section ======= -->
    <div id="loc_map" style="display: none;">
    <section id="contact" class="contact" >
      <div class="container-fluid" data-aos="fade-up" >

        <div class="section-title">
          <h2>World Map</h2>
          <p>Tweet Locations : Past Week</p>
        </div>

        <div id="mapCanvas" style="border: 0; width: 100%; height: 500px;">

        </div>
      </div>
    </section>
    </div>
    <!-- End Tweet Location Map -->

    <!-- ======= Tweet Location List Section ======= -->
    <div id="loc_list" style="display: none">
    <section id="about" class="about">
      <div class="container px-3" data-aos="fade-up" >

        <div class="row" >
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/tweet_location.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
            <h3>Suspected Locations as tweeted by Citizens:</h3>
            <p class="font-italic" style="font-size:2.2rem">
              This shows city/province/state of the tweet.
            </p>
            <div id="location-list-inner">
              <?php
              $loc = []; 
              foreach ($arr as $key => $value) {
                # code..
                array_push($loc, $value[0]);
              }
              foreach (array_unique($loc) as $key => $value) {
                # code...
                echo '<div style="font-size:1.9rem;margin:.5rem 0;"><i class="fas fa-map-marker-alt"></i>' . $value . '</div>';
              }
              ?>
            </div>
            <p style="font-size:2rem">
              These locations have been interpolated to the nearest round coordinates available, hence they are accurate till province. Please check for water bodies around the same areas when analyzing in GEE.
            </p>
          </div>
        </div>

      </div>
    </section>
    </div>
    <!-- End Tweet Location List Section -->

    <!-- ======= Tweet Link Section ======= -->
    <div id="tweet_link_list" style="display: none">
    <section id="about" class="about">
      <div class="container" data-aos="fade-up" >

        <div class="row" >
          <div class="col-lg-6 order-2 order-lg-1" data-aos="fade-right" data-aos-delay="100">
            <img src="assets/img/twitter_logo.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-1 order-lg-2 content" data-aos="fade-left" data-aos-delay="100">
            <h3>Link to all tweets pertaining to CyanoHABs dating till a week back</h3>
            <br>
            <div id="tweet-list-inner">
              <?php
              $i = 1;
              foreach ($arr as $key => $value) {
                # code...
                echo '<div><a style="color: #007bff; font-size:2rem" href="' . $value[3] . '" target="_blank"><i class="fab fa-twitter-square" style="color: #007bff;"></i> Tweet ' . $i . '</a></div>';
                $i++;
              }
              ?>
            </div>
          </div>
        </div>

      </div>
    </section>
    </div>
    <!-- End Tweet Link Section -->
    
    <!-- ======= GEE Section ======= -->
    <div id="3-br"><br><br><br></div>
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Analyze on Google Earth Engine</h3>
          <p> These tweet locations show CyanoHAB suspected areas as recorded by the citizens. These can further be verified by analyzing the same locations on the GEE dashboard, using the Sentinel-3 OLCI data.</p>
          <a class="cta-btn" href="https://chintanmaniyar.users.earthengine.app/view/cyanokhoj" target="_blank">Launch GEE Dashboard</a>
        </div>

      </div>
    </section>
    <br><br><br>
    <!-- End GEE Section -->
    

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Group No: 5</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-info">
                <h4>Chhaya Sharma</h4>
                <span>GID</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-info">
                <h4>Chintan Maniyar</h4>
                <span>PRSD</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="member-info">
                <h4>Dyvavani Krishna</h4>
                <span>FED</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="400">
              <div class="member-info">
                <h4>Tejaswari Banda</h4>
                <span>URSD</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>CyanoKhoj</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#header" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->

  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
 <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   -->
  

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <script>
      
$(document).ready( function () {  

        const userId=<?php echo($_SESSION['user_id']); ?>;
        
        //Lock Input Field By Default as Modal is Opened    
        $("#my-profile").click(function () {
          $("input").prop('disabled', true);
          $("input").css('background-color','antiquewhite');
          $("#apply-changes-btn").css({'background-color':'#6c757d','font-weight':'500','cursor': 'not-allowed'});
          
          //Fetch from Database using ajax
          
        /*   $.ajax({
                  url: "fetch-user.php",
                  method:"POST",
                  data:{userId:userId},
                  success:function(response)
                  {
                    //Encode response into array
                    arr=JSON.parse(response);
                    
                    //Insert the fetched data into modal input fields
                    $("#full-name").val(arr[0]["name"]);
                    $("#email").val(arr[0]["email"]);
                    $("#organisation").val(arr[0]["organisation"]);
                    $("#state").val(arr[0]["state"]);
                  }
                });
 */
           
          });

        //Unlock respective input field as edit btn is clicked  
        $(".edit-btn").on('click', function(){
          $(this).prev().prop("disabled",false);
          $(this).prev().css("background-color","aliceblue");
          $(this).prev().focus();
        });

        $(".modal .modal-body input").change( function(){
            $("#apply-changes-btn").prop("disabled",false);
            $("#apply-changes-btn").css({'background-color':'#28a745','font-weight':'600','cursor': 'pointer'});
        });

        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })

      $("#apply-changes-btn").click( function(){
        let  name=$("#full-name").val();
        let  organisation=$("#organisation").val();
        let  state=$("#state").val();
         
        /* $.ajax({
                url: "edit-user.php",
                method:"POST",
                data:{userId:userId,name:name,organisation:organisation,state:state},
                success:function(response)
                {
                  alert(response);
                  $("input").prop('disabled', true);
                  $("input").css('background-color','antiquewhite');
                  $("#apply-changes-btn").prop("disabled",false);
                  $("#apply-changes-btn").css({'background-color':'#6c757d','font-weight':'500','cursor': 'not-allowed'});
                  $(".nav-username h2,.menu-username h2").html('Welcome '+name+'!');
                  $(".modal-title").html(name+"'s Profile");
                }
              }); */


      });

   
          
});

  </script>

</body>

</html>
