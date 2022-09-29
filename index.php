<?php 
include('db.php');

$errors = array();
$success = array();
$email = "";
$username= "";
$subjects = "";


if(isset($_POST['submit'])){
  $email = $_POST['email'];
  if(empty($email) || !preg_match("/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $email)){
  array_push($errors,"email required or invalid email format");}

$count_error = count($errors);
if($count_error  == 0){
  $query = "INSERT INTO newsletter (email) values ('$email')";
  $results = mysqli_query($conn, $query);
  if($results){
    echo('<div class="alert alert-success" role="alert" style="text-align:center;">
    successfully subscribed.
    </div>
    ');

  }

}else{
  echo('<div class="alert alert-danger" role="alert" style="text-align:center;">
  error
  </div>
  ');
}


  }

 
if(isset($_POST['messages-submit'])){
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $subjects = mysqli_real_escape_string($conn, $_POST['subjects']);
  $messages = mysqli_real_escape_string($conn, $_POST['messages']);
  if(empty($username))
          {array_push($errors,"username required or invalid username length");}
          if(empty($subjects))
          {array_push($errors,"subjects required ");}
          if(empty($messages))
          {array_push($errors,"messages required");}

          if(empty($email) || !preg_match("/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $email))
          {array_push($errors,"email required or invalid email format");}

          if (count($errors) == 0) {
            $query = "INSERT INTO msg (username,email,subjects,messages) VALUES ('$username', '$email','$subjects', '$messages')";
          $res =  mysqli_query($conn, $query);
          if($res){
          echo('<div class="alert alert-success" role="alert" style="text-align:center; margin-top: 50px; ">
          message sent successfully.
          </div>
          ');
          }else{
            echo('<div class="alert alert-danger" role="alert" style="text-align:center; margin-top: 50px;">
           error connectiion to database
            </div>
            ');
          }

          }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>MARS BRACELET</title>
    <meta content="" name="description" />

    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link
      href="assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    

    <link
      href="assets/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
  </head>

  <body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
      <div
        class="container-fluid container-xl d-flex align-items-center justify-content-between"
      >
        <a href="index.php" class="logo d-flex align-items-center">
          <img src="assets/img/logo.png" alt="" />
          <span>MARS BRACELET</span>
        </a>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">About</a></li>
            
            <li>
              <a class="nasv-link scrollto" href="#portfolio">Portfolio</a>
            </li>
            <li><a class="nav-link scrollto" href="#team">Team</a></li>
          
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            <li><a class="nav-link scrollto" href="admin/">ADMIN</a></li>
            <li><a class="nav-link scrollto" href="system/pages/sign-in.php">Our Web APP</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
      </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">
              We offer modern solutions to cab malaria in our homes.  
            </h1>
            <P data-aos="fade-up"><EM>  "A product of Anya wrists Company"</EM>
            
            </P>
            <h2 data-aos="fade-up" data-aos-delay="400">
              A malaria free home is one with a Mars Bracelet
            </h2>
          
            <div data-aos="fade-up" data-aos-delay="600">
              <div class="text-center text-lg-start">
                <a
                  href="#about"
                  class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center"
                >
                  <span>Explore More</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>
          <div
            class="col-lg-6 hero-img"
            data-aos="zoom-out"
            data-aos-delay="200"
          >
            <img src="assets/img/hero-img.png" class="img-fluid" alt="" />
          </div>
        </div>
      </div>
    </section>
    <!-- End Hero -->

    <main id="main">
      <!-- ======= About Section ======= -->
      <section id="about" class="about">
        <div class="container" data-aos="fade-up">
          <div class="row gx-0">
            <div
              class="col-lg-6 d-flex flex-column justify-content-center"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <div class="content">
                <h3>Who We Are</h3>
                <h2>
                  Anya Wrists Company is a Ugandan handicraft bracelet company that was inspired to
                   produce the Mars Mosquito Repellent bracelets after realizing an increase in the number
                   of infants dying of malaria at the age of five in the period of the pandemic. 
                </h2>
                <p>
                  Covid 19 caught everyone's attention and resulted in resource diversion, 
                  putting a lot of load on health institutions. In the midst of the coronavirus crisis,
                   hospitals have run out of quick diagnostic tests for malaria and have limited supply
                    of anti-malarial medications. 
                  Malaria has the greatest impact on small children and pregnant women. 
                </p>
                <div class="text-center text-lg-start">
                  <a
                    href="#features"
                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center"
                  >
                    <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>

            <div
              class="col-lg-6 d-flex align-items-center"
              data-aos="zoom-out"
              data-aos-delay="200"
            >
              <img src="assets/img/about.jpg" class="img-fluid" alt="" />
            </div>
          </div>
        </div>
      </section>
      <!-- End About Section -->

      <!-- ======= Values Section ======= -->
      <!-- 
      <section id="values" class="values">
        <div class="container" data-aos="fade-up">
          <header class="section-header">
            <h2>Our Values</h2>
            <p>Odit est perspiciatis laborum et dicta</p>
          </header>

          <div class="row">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
              <div class="box">
                <img src="assets/img/values-1.png" class="img-fluid" alt="" />
                <h3>Ad cupiditate sed est odio</h3>
                <p>
                  Eum ad dolor et. Autem aut fugiat debitis voluptatem
                  consequuntur sit. Et veritatis id.
                </p>
              </div>
            </div>

            <div
              class="col-lg-4 mt-4 mt-lg-0"
              data-aos="fade-up"
              data-aos-delay="400"
            >
              <div class="box">
                <img src="assets/img/values-2.png" class="img-fluid" alt="" />
                <h3>Voluptatem voluptatum alias</h3>
                <p>
                  Repudiandae amet nihil natus in distinctio suscipit id.
                  Doloremque ducimus ea sit non.
                </p>
              </div>
            </div>

            <div
              class="col-lg-4 mt-4 mt-lg-0"
              data-aos="fade-up"
              data-aos-delay="600"
            >
              <div class="box">
                <img src="assets/img/values-3.png" class="img-fluid" alt="" />
                <h3>Fugit cupiditate alias nobis.</h3>
                <p>
                  Quam rem vitae est autem molestias explicabo debitis sint.
                  Vero aliquid quidem commodi.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>  -->
      <!-- End Values Section -->

      <!-- End Counts Section -->

      <!-- ======= Features Section ======= -->
      <section id="features" class="features">
        <div class="container" data-aos="fade-up">
          <header class="section-header">
            <h2>The Mars Bracelet</h2>
            <p>lets get the insights of the mars Bracelet</p>
          </header>

          <div class="row">
            <div class="col-lg-6">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/LLthMBAYCdA" title="mars bracelet" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
              <div class="row align-self-center gy-4">
                <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                  <div class="feature-box d-flex align-items-center">
                    <i class="bi bi-check"></i>
                    <h3>its an accesory - Bracelet</h3>
                  </div>
                </div>

                <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                  <div class="feature-box d-flex align-items-center">
                    <i class="bi bi-check"></i>
                    <h3>has ability to repel mosquitoes</h3>
                  </div>
                </div>

                <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                  <div class="feature-box d-flex align-items-center">
                    <i class="bi bi-check"></i>
                    <h3>Has an inbuilt smart system</h3>
                  </div>
                </div>

                <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                  <div class="feature-box d-flex align-items-center">
                    <i class="bi bi-check"></i>
                    <h3>Portable</h3>
                  </div>
                </div>

                <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
                  <div class="feature-box d-flex align-items-center">
                    <i class="bi bi-check"></i>
                    <h3>client freindly</h3>
                  </div>
                </div>

                <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                  <div class="feature-box d-flex align-items-center">
                    <i class="bi bi-check"></i>
                    <h3>Multipurpose</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- / row -->

          <!-- Feature Tabs -->
          <div class="row feture-tabs" data-aos="fade-up">
            <div class="col-lg-6">
              <h3>THE SMART SYSTEM (❁´◡`❁)</h3>

              <!-- Tabs -->
              <ul class="nav nav-pills mb-3">
                <li>
                  <a class="nav-link active" data-bs-toggle="pill" href="#tab1"
                    >AUTOMATION</a
                  >
                </li>
                <li>
                  <a class="nav-link" data-bs-toggle="pill" href="#tab2"
                    >FUNCTIONING</a
                  >
                </li>
                <li>
                  <a class="nav-link" data-bs-toggle="pill" href="#tab3"
                    >MALARIA STATS</a
                  >
                </li>
              </ul>
              <!-- End Tabs -->

              <!-- Tab Content -->
              <div class="tab-content">
                <div class="tab-pane fade show active" id="tab1">
                  <p>
                
                  </p>
                  <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-check2"></i>
                    <h4>
                      This bracelet is both an accessory and a mosquito repellent bracelet.        
                    </h4>
                  </div>
                  <p>
                    The bracelet automatically switches on the mosquito repellent mode once it clocks dusk which is estimated to be around 7:30pm, the time when mosquitoes are active. 

                                      
                  </p>
                  <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-check2"></i>
                    <h4>After 15minutes, the mosquito repellent mode automatically goes off to let the repellent do its work. </h4>
                  </div>
                  <p>
                    	The mode will then be switched on again for another 15minutes and then
                     automatically switched off. At this time, the air concentration around the Human 
                    body contains the Transfluthrin organic chemical that kills these mosquitoes.
                  </p>
                  <a class="nav-link scrollto" href="system/pages/sign-in.php">our APP</a>
                </div>
                <!-- End Tab 1 Content -->

                <div class="tab-pane fade show" id="tab2">
                  <p>
                    •	The user is also free to control the mosquito repellent mode button by switching it on when they feel the need to repel
                     the mosquitoes or switching it off when they don’t. 
                  </p>
                  <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-check2"></i>
                    <h4>
                      how to use during sleeping hours
                    </h4>
                  </div>
                  <p>
                      When the user is asleep, the bracelet can be hung at the bed pole or anywhere close to where they are sleeping and the repellent mode switched on which
                     automatically remains working in intervals throughout the night.
                  </p>
                  <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-check2"></i>
                    <h4>THE APP</h4>
                  </div>
                  <p>
                    the mars bracelet app is for those with smart phones. it helps you control
                    the bracelt with alot of ease.you can access all statistics of the bracelet 
                    like the percentage of Transfluthrin remaining
                    get remainders on battery percentage
                    reminders on switching it on and off at stupulated time
                  </p>
                </div>
                <!-- End Tab 2 Content -->

                <div class="tab-pane fade show" id="tab3">
                  <p>
                    Statistics of malaria
                  </p>
                  <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-check2"></i>
                    <h4>
                      Every year, over 450,000 individuals die as a result of malaria.
                    </h4>
                  </div>
                  <p>
                    In 2020, there were an estimated 241 million cases of  <a href="https://www.who.int/news-room/fact-sheets/detail/malaria" >malaria</a> worldwide.
                     The estimated number of malaria deaths stood at 627 000 in 2020.
                  </p>
                  <div class="d-flex align-items-center mb-2">
                    <i class="bi bi-check2"></i>
                    <h4>In addition</h4>
                  </div>
                  <p>
                    Uganda is ranked the 3rd highest global burden of malaria cases and has 
                    the 8th highest levels of deaths mostly among the infants.
                   
              
                  </p>
                </div>
                <!-- End Tab 3 Content -->
              </div>
            </div>

            <div class="col-lg-6">
              <img src="assets/img/9.png" class="img-fluid" alt="" />
            </div>
          </div>
          <!-- End Feature Tabs -->
          <!-- ======= Services Section ======= -->
          <section id="services" class="services">
            <div class="container" data-aos="fade-up">
              <header class="section-header">
                <h2>In Depth About mars Bracelet</h2>
                <p>All you need to know about the mars Bracelet</p>
              </header>

              <div class="row gy-4">
                <div
                  class="col-lg-4 col-md-6"
                  data-aos="fade-up"
                  data-aos-delay="200"
                >
                  <div class="service-box blue">
                    <i class="ri-list-settings-fill icon"></i>
                    <h3>USAGE</h3>
                    <p>
                      Provident nihil minus qui consequatur non omnis maiores.
                      Eos accusantium minus dolores iure perferendis tempore et
                      consequatur.
                    </p>
                    <a href="detailed.php" class="read-more"
                      ><span>Read More</span> <i class="bi bi-arrow-right"></i
                    ></a>
                  </div>
                </div>

                <div
                  class="col-lg-4 col-md-6"
                  data-aos="fade-up"
                  data-aos-delay="300"
                >
                  <div class="service-box orange">
                   
                    <i class="ri-hand-heart-fill icon"></i>
                    <h3>BENEFITS</h3>
                    <p>
                      Ut autem aut autem non a. Sint sint sit facilis nam iusto
                      sint. Libero corrupti neque eum hic non ut nesciunt
                      dolorem.
                    </p>
                    <a href="detailed.php" class="read-more"
                      ><span>Read More</span> <i class="bi bi-arrow-right"></i
                    ></a>
                  </div>
                </div>

                <div
                  class="col-lg-4 col-md-6"
                  data-aos="fade-up"
                  data-aos-delay="400"
                >
                  <div class="service-box green">
                    <i class="ri-sun-foggy-fill icon"></i>
                    <h3>COMPONENTS</h3>
                    <p>
                      Ut excepturi voluptatem nisi sed. Quidem fuga consequatur.
                      Minus ea aut. Vel qui id voluptas adipisci eos earum
                      corrupti.
                    </p>
                    <a href="detailed.php" class="read-more"
                      ><span>Read More</span> <i class="bi bi-arrow-right"></i
                    ></a>
                  </div>
                </div>

                <div
                  class="col-lg-4 col-md-6"
                  data-aos="fade-up"
                  data-aos-delay="500"
                >
                  <div class="service-box red">
                    <i class="ri-settings-2-fill icon"></i>
                    <h3>SMART SYSTEM</h3>
                    <p>
                      Non et temporibus minus omnis sed dolor esse consequatur.
                      Cupiditate sed error ea fuga sit provident adipisci neque.
                    </p>
                    <a href="detailed.php" class="read-more"
                      ><span>Read More</span> <i class="bi bi-arrow-right"></i
                    ></a>
                  </div>
                </div>

                <div
                  class="col-lg-4 col-md-6"
                  data-aos="fade-up"
                  data-aos-delay="600"
                >
                  <div class="service-box purple">
                    <i class="ri-bubble-chart-line icon"></i>
                    <h3>OTHER BRACELET TYPES</h3>
                    <p>
                      Cumque et suscipit saepe. Est maiores autem enim facilis
                      ut aut ipsam corporis aut. Sed animi at autem alias eius
                      labore.
                    </p>
                    <a href="inner-page.php" class="read-more"
                      ><span>Read More</span> <i class="bi bi-arrow-right"></i
                    ></a>
                  </div>
                </div>

                <div
                  class="col-lg-4 col-md-6"
                  data-aos="fade-up"
                  data-aos-delay="700"
                >
                  <div class="service-box pink">
                    <i class="ri-discuss-line icon"></i>
                    <h3>PURCHASE</h3>
                    <p>
                      Hic molestias ea quibusdam eos. Fugiat enim doloremque aut
                      neque non et debitis iure. Corrupti recusandae ducimus
                      enim.
                    </p>
                    <a href="inner-page.php" class="read-more"
                      ><span>Read More</span> <i class="bi bi-arrow-right"></i
                    ></a>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- End Services Section -->
          <!-- ======= Portfolio Section ======= -->
          <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">
              <header class="section-header">
                <h2>BRACELET GALLERY</h2>
                <p>
                  Check out the different brands and types of Bracelet on the
                  market
                </p>
              </header>

              <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 d-flex justify-content-center">
                  <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">UNISEX</li>
                    <li data-filter=".filter-card">MALE</li>
                    <li data-filter=".filter-web">FEMALE</li>
                  </ul>
                </div>
              </div>

              <div
                class="row gy-4 portfolio-container"
                data-aos="fade-up"
                data-aos-delay="200"
              >
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                  <div class="portfolio-wrap">
                    <img
                      src="assets/img/1.jpg"
                      class="img-fluid"
                      alt=""
                    />
                    <div class="portfolio-info">
                      <h4>couple</h4>
                      <p>couple</p>
                      <div class="portfolio-links">
                        <a
                          href="assets/img/1.jpg"
                          data-gallery="portfolioGallery"
                          class="portfokio-lightbox"
                          title="App 1"
                          ><i class="bi bi-plus"></i
                        ></a>
                        <a href="portfolio-details.php" title="More Details"
                          ><i class="bi bi-link"></i
                        ></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                  <div class="portfolio-wrap">
                    <img
                      src="assets/img/5.jpeg"
                      class="img-fluid"
                      alt=""
                    />
                    <div class="portfolio-info">
                      <h4>all</h4>
                      <p>all</p>
                      <div class="portfolio-links">
                        <a
                          href="assets/img/5.jpeg"
                          data-gallery="portfolioGallery"
                          class="portfokio-lightbox"
                          title="Web 3"
                          ><i class="bi bi-plus"></i
                        ></a>
                        <a href="portfolio-details.php" title="More Details"
                          ><i class="bi bi-link"></i
                        ></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                  <div class="portfolio-wrap">
                    <img
                      src="assets/img/13.jpg"
                      class="img-fluid"
                      alt=""
                    />
                    <div class="portfolio-info">
                      <h4>couple</h4>
                      <p>couple</p>
                      <div class="portfolio-links">
                        <a
                          href="assets/img/13.jpg"
                          data-gallery="portfolioGallery"
                          class="portfokio-lightbox"
                          title="App 2"
                          ><i class="bi bi-plus"></i
                        ></a>
                        <a href="portfolio-details.php" title="More Details"
                          ><i class="bi bi-link"></i
                        ></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                  <div class="portfolio-wrap">
                    <img
                      src="assets/img/6.jpeg"
                      class="img-fluid"
                      alt=""
                    />
                    <div class="portfolio-info">
                      <h4>all</h4>
                      <p>all</p>
                      <div class="portfolio-links">
                        <a
                          href="assets/img/6.jpeg"
                          data-gallery="portfolioGallery"
                          class="portfokio-lightbox"
                          title="Card 2"
                          ><i class="bi bi-plus"></i
                        ></a>
                        <a href="portfolio-details.php" title="More Details"
                          ><i class="bi bi-link"></i
                        ></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                  <div class="portfolio-wrap">
                    <img
                      src="assets/img/7.jpeg"
                      class="img-fluid"
                      alt=""
                    />
                    <div class="portfolio-info">
                      <h4>all</h4>
                      <p>all</p>
                      <div class="portfolio-links">
                        <a
                          href="assets/img/7.jpeg"
                          data-gallery="portfolioGallery"
                          class="portfokio-lightbox"
                          title="Web 2"
                          ><i class="bi bi-plus"></i
                        ></a>
                        <a href="portfolio-details.php" title="More Details"
                          ><i class="bi bi-link"></i
                        ></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                  <div class="portfolio-wrap">
                    <img
                      src="assets/img/14.jpg"
                      class="img-fluid"
                      alt=""
                    />
                    <div class="portfolio-info">
                      <h4>couple</h4>
                      <p>couple</p>
                      <div class="portfolio-links">
                        <a
                          href="assets/img/14.jpg"
                          data-gallery="portfolioGallery"
                          class="portfokio-lightbox"
                          title="App 3"
                          ><i class="bi bi-plus"></i
                        ></a>
                        <a href="portfolio-details.php" title="More Details"
                          ><i class="bi bi-link"></i
                        ></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                  <div class="portfolio-wrap">
                    <img
                      src="assets/img/8.jpeg"
                      class="img-fluid"
                      alt=""
                    />
                    <div class="portfolio-info">
                      <h4>all</h4>
                      <p>all</p>
                      <div class="portfolio-links">
                        <a
                          href="assets/img/8.jpeg"
                          data-gallery="portfolioGallery"
                          class="portfokio-lightbox"
                          title="Card 1"
                          ><i class="bi bi-plus"></i
                        ></a>
                        <a href="portfolio-details.php" title="More Details"
                          ><i class="bi bi-link"></i
                        ></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                  <div class="portfolio-wrap">
                    <img
                      src="assets/img/2.jpg"
                      class="img-fluid"
                      alt=""
                    />
                    <div class="portfolio-info">
                      <h4>all</h4>
                      <p>all</p>
                      <div class="portfolio-links">
                        <a
                          href="assets/img/2.jpg"
                          data-gallery="portfolioGallery"
                          class="portfokio-lightbox"
                          title="Card 3"
                          ><i class="bi bi-plus"></i
                        ></a>
                        <a href="portfolio-details.php" title="More Details"
                          ><i class="bi bi-link"></i
                        ></a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                  <div class="portfolio-wrap">
                    <img
                      src="assets/img/3.jpg"
                      class="img-fluid"
                      alt=""
                    />
                    <div class="portfolio-info">
                      <h4>all</h4>
                      <p>all</p>
                      <div class="portfolio-links">
                        <a
                          href="assets/img/3.jpg"
                          data-gallery="portfolioGallery"
                          class="portfokio-lightbox"
                          title="Web 3"
                          ><i class="bi bi-plus"></i
                        ></a>
                        <a href="portfolio-details.php" title="More Details"
                          ><i class="bi bi-link"></i
                        ></a>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                      <div class="portfolio-wrap">
                        <img
                          src="assets/img/5.jpeg"
                          class="img-fluid"
                          alt=""
                        />
                    <div class="portfolio-info">
                      <h4>all</h4>
                      <p>all</p>
                      <div class="portfolio-links">
                        <a
                          href="assets/img/5.jpeg"
                          data-gallery="portfolioGallery"
                          class="portfokio-lightbox"
                          title="Web 3"
                          ><i class="bi bi-plus"></i
                        ></a>
                        <a href="portfolio-details.php" title="More Details"
                          ><i class="bi bi-link"></i
                        ></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- End Portfolio Section -->
          <!-- Feature Icons -->
          <!-- 
          <div class="row feature-icons" data-aos="fade-up">
            <h3>Ratione mollitia eos ab laudantium rerum beatae quo</h3>

            <div class="row">
              <div
                class="col-xl-4 text-center"
                data-aos="fade-right"
                data-aos-delay="100"
              >
                <img
                  src="assets/img/features-3.png"
                  class="img-fluid p-4"
                  alt=""
                />
              </div>

              <div class="col-xl-8 d-flex content">
                <div class="row align-self-center gy-4">
                  <div class="col-md-6 icon-box" data-aos="fade-up">
                    <i class="ri-line-chart-line"></i>
                    <div>
                      <h4>Corporis voluptates sit</h4>
                      <p>
                        Consequuntur sunt aut quasi enim aliquam quae harum
                        pariatur laboris nisi ut aliquip
                      </p>
                    </div>
                  </div>

                  <div
                    class="col-md-6 icon-box"
                    data-aos="fade-up"
                    data-aos-delay="100"
                  >
                    <i class="ri-stack-line"></i>
                    <div>
                      <h4>Ullamco laboris nisi</h4>
                      <p>
                        Excepteur sint occaecat cupidatat non proident, sunt in
                        culpa qui officia deserunt
                      </p>
                    </div>
                  </div>

                  <div
                    class="col-md-6 icon-box"
                    data-aos="fade-up"
                    data-aos-delay="200"
                  >
                    <i class="ri-brush-4-line"></i>
                    <div>
                      <h4>Labore consequatur</h4>
                      <p>
                        Aut suscipit aut cum nemo deleniti aut omnis. Doloribus
                        ut maiores omnis facere
                      </p>
                    </div>
                  </div>

                  <div
                    class="col-md-6 icon-box"
                    data-aos="fade-up"
                    data-aos-delay="300"
                  >
                    <i class="ri-magic-line"></i>
                    <div>
                      <h4>Beatae veritatis</h4>
                      <p>
                        Expedita veritatis consequuntur nihil tempore laudantium
                        vitae denat pacta
                      </p>
                    </div>
                  </div>

                  <div
                    class="col-md-6 icon-box"
                    data-aos="fade-up"
                    data-aos-delay="400"
                  >
                    <i class="ri-command-line"></i>
                    <div>
                      <h4>Molestiae dolor</h4>
                      <p>
                        Et fuga et deserunt et enim. Dolorem architecto ratione
                        tensa raptor marte
                      </p>
                    </div>
                  </div>

                  <div
                    class="col-md-6 icon-box"
                    data-aos="fade-up"
                    data-aos-delay="500"
                  >
                    <i class="ri-radar-line"></i>
                    <div>
                      <h4>Explicabo consectetur</h4>
                      <p>
                        Est autem dicta beatae suscipit. Sint veritatis et sit
                        quasi ab aut inventore
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <!-- End Feature Icons -->
        </div>
      </section>
      <!-- End Features Section -->
      <!-- ======= Counts Section ======= -->
      <section id="counts" class="counts">
        <div class="container" data-aos="fade-up">
          <div class="row gy-4">
            <div class="col-lg-3 col-md-6">
              <div class="count-box">
                <i class="bi bi-emoji-smile"></i>
                <div>
                  <span
                    data-purecounter-start="0"
                    data-purecounter-end="480"
                    data-purecounter-duration="1"
                    class="purecounter"
                  ></span>
                  <p>Happy Clients</p>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="count-box">
                <i class="bi bi-journal-richtext" style="color: #ee6c20"></i>
                <div>
                  <span
                    data-purecounter-start="0"
                    data-purecounter-end="2"
                    data-purecounter-duration="1"
                    class="purecounter"
                  ></span>
                  <p>Projects</p>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="count-box">
                <i class="bi bi-headset" style="color: #15be56"></i>
                <div>
                  <span
                    data-purecounter-start="0"
                    data-purecounter-end="247"
                    data-purecounter-duration="1"
                    class="purecounter"
                  ></span>
                  <p>Hours Of Support</p>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="count-box">
                <i class="bi bi-people" style="color: #bb0852"></i>
                <div>
                  <span
                    data-purecounter-start="0"
                    data-purecounter-end="500"
                    data-purecounter-duration="1"
                    class="purecounter"
                  ></span>
                  <p>PIECES SOLD</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- ======= Pricing Section ======= -->
      <section id="pricing" class="pricing">
        <div class="container" data-aos="fade-up">
          <header class="section-header">
            <h2>Pricing</h2>
            <p>Check our Pricing</p>
          </header>

          <div class="row gy-4" data-aos="fade-left">
            <div
              class="col-lg-3 col-md-6"
              data-aos="zoom-in"
              data-aos-delay="100"
            >
              <div class="box">
                <h3 style="color: #07d5c0">Basic Bracelets</h3>
                <div class="price"><sup>shs</sup>5000</div>
                <img
                  src="assets/img/pricing-free.png"
                  class="img-fluid"
                  alt=""
                />
                <em><i>Marble is believed to provide clarity, self-control and
                    stability both physically and emotionally. It is used as a
                    symbol of purity and immortality.</i></em>
                <a href="inner-page.php" class="btn-buy">Buy Now</a>
              </div>
            </div>

            <div
              class="col-lg-3 col-md-6"
              data-aos="zoom-in"
              data-aos-delay="200"
            >
              <div class="box">
                <h3 style="color: #65c600">marble Bracelet</h3>
                <div class="price"><sup>shs</sup>15000</div>
                <img
                  src="assets/img/12.png"
                  class="img-fluid"
                  alt=""
                  style="border-radius: 20px;"
                />
                <em><i>Marble is believed to provide clarity, self-control and
                    stability both physically and emotionally. It is used as a
                    symbol of purity and immortality.</i></em>
                <a href="inner-page.php" class="btn-buy">Buy Now</a>
              </div>
            </div>

            <div
              class="col-lg-3 col-md-6"
              data-aos="zoom-in"
              data-aos-delay="300"
            >
              <div class="box">
                <h3 style="color: #ff901c">mars Bracelet</h3>
                <div class="price"><sup>shs</sup>50000</div>
                <img
                  src="assets/img/hero-img.png"
                  style="border-radius: 20px;"
                  class="img-fluid"
                  alt=""
                />
              <em><i>"A product of Anya wrists Company"
                "with an African design,  forms of design from of Africa and the African diaspora including urban design, architectural design,
                 interior design, product design, art, and fashion design"
              </i></em>
                <a href="inner-page.php" class="btn-buy">Buy Now</a>
              </div>
            </div>

            <div
              class="col-lg-3 col-md-6"
              data-aos="zoom-in"
              data-aos-delay="400"
            >
              <div class="box">
                <h3 style="color: #ff0071">othes</h3>
                <div class="price"><sup>shs</sup>......</span></div>
                <img
                  src="assets/img/2.jpg"
                  style="border-radius: 20px;"
                  class="img-fluid"
                  alt=""
                />
                <em><i>Marble is believed to provide clarity, self-control and
                    stability both physically and emotionally. It is used as a
                    symbol of purity and immortality.</i></em>
                <a href="inner-page.php" class="btn-buy">Buy Now</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Pricing Section -->

   

      <!-- ======= Testimonials Section ======= -->
      <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">
          <header class="section-header">
            <h2>Testimonials</h2>
            <p>What they are saying about us</p>
          </header>

          <div
            class="testimonials-slider swiper"
            data-aos="fade-up"
            data-aos-delay="200"
          >
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="stars">
                    <i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                   waiting for the latest release of the mars bracelt. cant wait 😍😍
                  </p>
                  <div class="profile mt-auto">
                    <img
                      src="assets/img/testimonials/testimonials-1.jpg"
                      class="testimonial-img"
                      alt=""
                    />
                    <h3>Saul Goodman</h3>
                    <h4>Ceo &amp; Founder</h4>
                  </div>
                </div>
              </div>
              <!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="stars">
                    <i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                   smooth and smooth designs.these bracelets are worth the money
                  </p>
                  <div class="profile mt-auto">
                    <img
                      src="assets/img/testimonials/testimonials-2.jpg"
                      class="testimonial-img"
                      alt=""
                    />
                    <h3>Sara Wilsson</h3>
                    <h4>Designer</h4>
                  </div>
                </div>
              </div>
              <!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="stars">
                    <i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
               very fine bracelets 
                  </p>
                  <div class="profile mt-auto">
                    <img
                      src="assets/img/testimonials/testimonials-3.jpg"
                      class="testimonial-img"
                      alt=""
                    />
                    <h3>Jena Karlis</h3>
                    <h4>Store Owner</h4>
                  </div>
                </div>
              </div>
              <!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="stars">
                    <i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                   qick delivery, the best part.
                   good  packaging though
                  </p>
                  <div class="profile mt-auto">
                    <img
                      src="assets/img/testimonials/testimonials-4.jpg"
                      class="testimonial-img"
                      alt=""
                    />
                    <h3>Matt Brandon</h3>
                    <h4>Freelancer</h4>
                  </div>
                </div>
              </div>
              <!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <div class="stars">
                    <i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i
                    ><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                  splendid work  team.
                  will definately buy again
                  </p>
                  <div class="profile mt-auto">
                    <img
                      src="assets/img/testimonials/testimonials-5.jpg"
                      class="testimonial-img"
                      alt=""
                    />
                    <h3>John Larson</h3>
                    <h4>Entrepreneur</h4>
                  </div>
                </div>
              </div>
              <!-- End testimonial item -->
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </section>
      <!-- End Testimonials Section -->

      <!-- ======= Team Section ======= -->
      <section id="team" class="team">
        <div class="container" data-aos="fade-up">
          <header class="section-header">
            <h2>Team</h2>
            <p>Our hard working team</p>
          </header>

          <div class="row gy-4">
            <div
              class="col-lg-3 col-md-6 d-flex align-items-stretch"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <div class="member">
                <div class="member-img">
                  <img
                    src="assets/img/team/anya.PNG"
                    class="img-fluid"
                    alt=""
                  />
                  <div class="social">
                    <a href=""> <i class="bi bi-whatsapp" title="+256 707 447631"></i></a>
                 
                    <a href="">
                      <i class="bi bi-telephone" title="+256 707 447631"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Anya Marion</h4>
                  <span>Chief Executive Officer
                    
                    <strong>(MARS BRACELET) </strong>, TEAM LEAD</span>
                  <p>
                   Doing A bachelors degree in Accounting and Finance
                  </p>
                </div>
              </div>
            </div>

            <div
              class="col-lg-3 col-md-6 d-flex align-items-stretch"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <div class="member">
                <div class="member-img">
                  <img
                    src="assets/img/team/maria.jpg"
                    class="img-fluid"
                    alt=""
                  />
                  <div class="social">
                 <a href="">   <i class="bi bi-whatsapp" title="+256 702 754436"></i></a>
                 
             <a href="">      <i class="bi bi-telephone" title="+256 702 754436"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Maria Triscilla </h4>
                  <span>Technical lead</span>
                  <p>
                    Doing A bachelors degree in Computer science
                  </p>
                </div>
              </div>
            </div>

            <div
              class="col-lg-3 col-md-6 d-flex align-items-stretch"
              data-aos="fade-up"
              data-aos-delay="300"
            >
              <div class="member">
                <div class="member-img">
                  <img
                    src="assets/img/team/marvin.jpeg"
                    class="img-fluid"
                    alt=""
                  />
                  <div class="social">
                   <a href=""> <i class="bi bi-whatsapp" title="+256 773 603206"></i></a>
                 <a href=""> <i class="bi bi-telephone" title="+256 773 603206"></i></a>
                  
                  </div>
                </div>
                <div class="member-info">
                  <h4>Kauta Marvin</h4>
                  <span>Technical lead</span>
                  <p>
                  Doing A bachelors degree in Computer science
                  </p>
                </div>
              </div>
            </div>

            <div
              class="col-lg-3 col-md-6 d-flex align-items-stretch"
              data-aos="fade-up"
              data-aos-delay="400"
            >
              <div class="member">
                <div class="member-img">
                  <img
                    src="assets/img/team/team-4.jpg"
                    class="img-fluid"
                    alt=""
                  />
                  <div class="social">
               <a href="">     <i class="bi bi-whatsapp" title="+256 704 354725"></i></a>
                 
              <a href="">     <i class="bi bi-telephone" title="+256 704 354725"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4>Okitoi Edgar</h4>
                  <span>Team Lawyer</span>
                  <p>
                    Doing A bachelors degree in LAW
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Team Section -->

      <!-- ======= Clients Section ======= -->
      <!--
      <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">
          <header class="section-header">
            <h2>Our partners</h2>
          
          </header>

          <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-1.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-2.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-3.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-4.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-5.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-6.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-7.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="assets/img/clients/client-8.png"
                  class="img-fluid"
                  alt=""
                />
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </section> -->
      <!-- End Clients Section -->


      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
          <header class="section-header">
            <h2>Contact</h2>
            <p>Contact Us</p>
          </header>

          <div class="row gy-4">
            <div class="col-lg-6">
              <div class="row gy-4">
                <div class="col-md-6">
                  <div class="info-box">
                    <i class="bi bi-geo-alt"></i>
                    <h3>Address</h3>
                    <p>Bishop Tucker ROAD,<br />mukono,uganda christian university</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box">
                    <i class="bi bi-telephone"></i>
                    <h3>Call Us</h3>
                    <p>+256 773603206<br />+256 707 447631<br />+256 702 754436</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box">
                    <i class="bi bi-envelope"></i>
                    <h3>Email Us</h3>
                    <p>marsbracelets@gmail.com<br />0773603206</p>
                    
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box">
                    <i class="bi bi-clock"></i>
                    <h3>Open Hours</h3>
                    <p>Monday - Friday<br />9:00AM - 05:00PM</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <form
                action=""
                method="post"
                class="php-email-form"
              >
                <div class="row gy-4">
                  <div class="col-md-6">
                    <input
                      type="text"
                      name="username"
                      class="form-control"
                      placeholder="Your Name"
                      required
                    />
                  </div>

                  <div class="col-md-6">
                    <input
                      type="email"
                      class="form-control"
                      name="email"
                      placeholder="Your Email"
                      required
                    />
                  </div>

                  <div class="col-md-12">
                    <input
                      type="text"
                      class="form-control"
                      name="subjects"
                      placeholder="subjects"
                      required
                    />
                  </div>

                  <div class="col-md-12">
                    <textarea
                      class="form-control"
                      name="messages"
                      rows="6"
                      placeholder="Message"
                      required
                    ></textarea>
                  </div>

                  <div class="col-md-12 text-center">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">
                      Your message has been sent. Thank you!
                    </div>

                    <button type="submit" name="messages-submit">Send Message</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- End Contact Section -->
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="footer-newsletter">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
         
              <h4>Our Newsletter</h4>
              <p>
              <?    include('errors.php');
                include('success.php');
                ?>
              </p>
            </div>
            <div class="col-lg-6"> 
              
                    
              <form action="" method="POST">
                <input type="email" name="email">
               

                <input
                  type="submit"                
                  name="submit"
                  value="Subscribe"
                >
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="footer-top">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-info">
              <a href="index.php" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="" />
                <span>MARS BRACELET</span>
              </a>
              <p>
              Anya Wrists Company is a Ugandan handicraft bracelet company that was inspired to
                   produce the Mars Mosquito Repellent bracelets after realizing an increase in the number
                   of infants dying of malaria at the age of five in the period of the pandemic. 
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"
                  ><i class="bi bi-instagram"></i
                ></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>

            <div class="col-lg-2 col-6 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li>
                  <i class="bi bi-chevron-right"></i> <a href="#">Home</a>
                </li>
                <li>
                  <i class="bi bi-chevron-right"></i> <a href="#">About us</a>
                </li>
              
                
              </ul>
            </div>


            <div
              class="col-lg-3 col-md-12 footer-contact text-center text-md-start"
            >
              <h4>Contact Us</h4>
              <p>
               bishop Tucker Road<br />
                uganda christian university<br />
                mukono <br /><br />
                <strong>Phone:</strong> 0773603206<br />
                <strong>Email:</strong> marsbracelets@gmail.com<br />
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>MARS BRACELET</span></strong
          >. All Rights Reserved
        </div>
    
      </div>
    </footer>
    <!-- End Footer -->

    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script type="text/javascript">

$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 5000);
 
});
</script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>
</html>
1