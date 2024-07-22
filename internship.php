
<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
   include "db_config.php";
    // Get other form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $duration = $_POST['duration'];

    // Check if file is uploaded successfully
    if(isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
        $resume_tmp_name = $_FILES['resume']['tmp_name'];
        $resume_name = $_FILES['resume']['name'];
        $resume_type = $_FILES['resume']['type'];
              
        // Read resume file content
        $resume_content = file_get_contents($resume_tmp_name);

        // Prepare the SQL insert statement
        $sql = "INSERT INTO `internship`(`int_name`, `int_email`, `int_gender`, `int_resume`, `int_resume_type`, `int_duration`) 
                VALUES ('$name','$email','$gender', ?, '$resume_type', '$duration')";
        
        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $resume_content);
        
        // Execute the insert query
        if ($stmt->execute() === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error uploading file";
    }

    // Close connection
    $conn->close();
    
    // Redirect to the same page
    header("location:".$_SERVER['PHP_SELF']);
    exit;
}

?>



<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>RORIRI SOFTWARE SOLUTIONS</title>
    <meta name="author" content="Roriri">
    <meta name="description" content="RORIRI SOFTWARE SOLUTIONS">
    <meta name="keywords" content="RORIRI SOFTWARE SOLUTIONS">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.png">
    

    <!--==============================
	  Google Fonts
	============================== -->
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,700&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <!-- Swiper Slider -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <div class="cursor"></div>
    <div class="cursor2"></div>


    



    <!--********************************
   		Code Start From Here 
	******************************** -->




    <div class="color-scheme-wrap active">
        <button class="switchIcon"><i class="fa-solid fa-palette"></i></button> 
        <h4 class="color-scheme-wrap-title"><i class="far fa-palette me-2"></i>Style Swicher</h4>
        <div class="color-switch-btns">
            <button data-color="#3E66F3"><i class="fa-solid fa-droplet"></i></button>
            <button data-color="#684DF4"><i class="fa-solid fa-droplet"></i></button>
            <button data-color="#008080"><i class="fa-solid fa-droplet"></i></button>
            <button data-color="#323F7C"><i class="fa-solid fa-droplet"></i></button>
            <button data-color="#FC3737"><i class="fa-solid fa-droplet"></i></button>
            <button data-color="#8a2be2"><i class="fa-solid fa-droplet"></i></button>
        </div>
        
    </div> <!--==============================
     Preloader
  ==============================-->
    <div id="preloader" class="preloader ">
     
        <div id="loader" class="th-preloader">
            <div class="animation-preloader">
                <div class="txt-loading">
                    <span preloader-text="R" class="characters">R</span>

                    <span preloader-text="O" class="characters">O</span>

                    <span preloader-text="R" class="characters">R</span>

                    <span preloader-text="I" class="characters">I</span>

                    <span preloader-text="R" class="characters">R</span>

                    <span preloader-text="I" class="characters">I</span>

                </div>
            </div>
        </div>
    </div> <!--==============================
    Sidemenu
============================== -->
    
    <div class="popup-search-box d-none d-lg-block">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#">
            <input type="text" placeholder="What are you looking for?">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div><!--==============================
    Mobile Menu
  ============================== -->
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="index.html"><img src="assets/img/logo.svg" alt="Roriri"></a>
            </div>
            <div class="th-mobile-menu">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About Us</a></li>      
                    <li><a href="service.html">Services</a></li>
                    <li><a href="careers.html">Careers</a></li>
                    <li><a href="project.html">PROJECTS </a></li>
                    <li><a href="internship.html">INTERNSHIP</a></li>
                    <li><a href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div><!--==============================
	Header Area
==============================-->
    <header class="th-header header-layout2">
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                    <div class="col-auto d-none d-lg-block">
                        <div class="header-links">
                            <ul>
                                <li><i class="fas fa-map-location"></i>RORIRI IT PARK,NALLANATHAPURAM,KALAKAD</li>
                                <li><i class="fas fa-phone"></i><a href="tel:7845593579">7845593579</a></li>
                                <li><i class="fas fa-envelope"></i><a href="mailto:contact@roririsoft.com">contact@roririsoft.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="header-social">
                            <span class="social-title">Follow Us On : </span>
                            <a href="https://www.facebook.com/RoririSoftwareSolutionsPvtLtd/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.linkedin.com/company/roriri-software-solutions-pvt-ltd/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://www.instagram.com/roririsoftwaresolutionspvtltd/" target="_blank"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-wrapper">
            <!-- Main Menu Area -->
            <div class="menu-area">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a class="icon-masking" href="index.html"><span data-mask-src="assets/img/logo.svg" class="mask-icon"></span><img src="assets/img/logo.svg" alt="Roriri"></a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="about.html">About Us</a></li>      
                                    <li><a href="service.html">Services</a></li>
                                    <li><a href="careers.html">Careers</a></li>
                                    <li><a href="project.html">PROJECTS </a></li>
                                    <li><a href="internship.html">INTERNSHIP</a></li>
                                    <li><a href="contact.html">Contact</a>
                                </ul>
                            </nav>
                            <div class="header-button">
                                <button type="button" class="th-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
   

      
    
  

        <div class="container-fluid">
            <div class="row row-height mt-2 mb-4">
                <div class="col-xl-4 col-lg-4 content-left pt-5 " style="background-color: #2179df;">                                                       
         
                    <div class="content-left-wrapper">
                
                        
                        <!-- /social -->
                        <div >
                            <h2 >Nexgen Launch Pad Program Internship Registration Form</h2>
                            <br>
                            <p class="text-white">Join our dynamic Nexgen Launch Pad Program internship for hands-on experience, mentorship. Ideal for students and recent grads passionate about innovation. Apply now for an immersive learning journey with real-world projects and industry guidance. Don’t miss this chance to make an impact and expand your network.</p>
                       </div>
                        <div class="copy text-white">© 2019 RORIRI Software Solutions PVT. LTD.</div>
                    </div>
                    <!-- /content-left-wrapper -->
                </div>
                <!-- /content-left -->
                <div class="col-xl-8 col-lg-8 content-right pt-5" id="start">
                    <div id="wizard_container">
                        <div id="top-wizard">
                            <span id="location"></span>
                            <div id="progressbar"></div>
                        </div>
                        <!-- /top-wizard -->
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                            <div class="mb-4">
                                <h3 class="main_question">Personal info</h3>    
                            </div>
                            <div class="mb-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                            </div>
                            <div class="mb-4 ">
                                <label for="gender" class="form-label">Gender</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                    <label class="form-check-label" for="male">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                                    <label class="form-check-label" for="female">
                                        Female
                                    </label>
                                </div>
                               
                                <div class="mb-4 mt-2">
                                    <label for="duration" class="form-label">Time Duration</label>
                                    <select name="duration" id="duration" class="form-control required">
                                        <option value="15">15 Days</option>
                                        <option value="30">30 Days</option>
                                        <option value="45">60 Days</option>
                                        <option value="60">90 Days</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="file" class="form-label">Upload Resume</label>
                                    <input type="file" class="form-control-file" name="resume" id="file">
                                </div>
                                
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <!-- /Wizard container -->
                </div>
                <!-- /content-right-->
            </div>
            <!-- /row-->
        </div>
        
       

   
<!--------------------------->

    <footer class="footer-wrapper footer-layout3" data-bg-src="assets/img/bg/footer_bg_2.jpg">
        <div class="footer-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        <div class="footer-logo">
                            <a class="icon-masking" href="index.html"><span data-mask-src="assets/img/logo-white.svg" class="mask-icon"></span><img src="assets/img/logo-white.svg" alt="roririsoft"></a>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="newsletter-wrap">
                            <div class="newsletter-content">
                                <h3 class="newsletter-title">News Subscription</h3>
                                <p class="newsletter-text">Get Latest Deals from Waker’s Inbox & Subscribe Now</p>
                            </div>
                            <form class="newsletter-form">
                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="Email Address" required="">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <button type="submit" class="th-btn style3">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-auto">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Quick Links</h3>
                            <div class="menu-all-pages-container">  
                                <ul class="menu">
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="careers.html">Careers</a></li>
                                    <li><a href="project.html">project</a></li>
                                    <li><a href="internship.html">Internship</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <div class="col-md-6 col-xxl-6 col-xl-6">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">About Company</h3>
                            <div class="th-widget-about">
                                <p class="about-text">Our mission is to revolutionize the technology landscape by delivering cutting-edge solutions customized to meet your unique requirements. With expertise in bespoke software development and seamless integration, we are dedicated to empowering your success in the ever-evolving digital realm. Trust us to be your strategic partner in navigating the complexities of modern technology and driving your business forward with confidence.</p>
                                <div class="th-social">
                                    <a href="https://www.facebook.com/RoririSoftwareSolutionsPvtLtd/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.linkedin.com/company/roriri-software-solutions-pvt-ltd/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://www.instagram.com/roririsoftwaresolutionspvtltd/" target="_blank"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6">
                        <p class="copyright-text">Copyright <i class="fal fa-copyright"></i> 2019 <a href="https://roririsoft.com/">RORIRI SOFTWARE SOLUTIONS PVT LTD.</a>. All Rights Reserved.</p>
                    </div>
                    <div class="col-lg-6 text-lg-end text-center">
                        <div class="footer-links">
                            <ul>
                                <li><a href="terms.html">Terms & Condition</a></li>
                                <li><a href="careers.html">Careers</a></li>
                                <li><a href="privacy.html">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--********************************
			Code End  Here 
	******************************** -->

    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>

    <!--==============================
    All Js File
============================== -->
    <!-- Jquery -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js" integrity="sha384-xxxxx" crossorigin="anonymous"></script>

    <script src="assets/js/vendor/jquery-3.7.1.min.js"></script>
    <!-- Swiper Slider -->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Magnific Popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Counter Up -->
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!-- Circle Progress -->
    <script src="assets/js/circle-progress.js"></script>
    <!-- Range Slider -->
    <script src="assets/js/jquery-ui.min.js"></script>
    <!-- Isotope Filter -->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!-- Tilt JS -->
    <script src="assets/js/tilt.jquery.min.js"></script>

    <!-- gsap -->
    <script src="assets/js/gsap.min.js"></script>
    <!-- ScrollTrigger -->
    <script src="assets/js/ScrollTrigger.min.js"></script>
    <script src="assets/js/smooth-scroll.js"></script>

    <!-- Particles JS -->
    <script src="assets/js/particles.min.js"></script>

    <script src="assets/js/particles-config.js"></script>
    <!-- Main Js File -->
    <script src="assets/js/main.js"></script>

</body>

</html>