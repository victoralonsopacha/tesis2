<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Bootstrap, Landing page, Template, Business, Service">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
    <title>Sistema de Control de Asistencia Escuela Velasco Ibarra</title>


    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="img/2.png" type="image/png">
    <!-- Bootstrap CSS -->
      <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
      <link href="{{ asset('css/LineIcons.css') }}" rel="stylesheet">
      <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
      <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet">
      <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
      <link href="{{ asset('css/nivo-lightbox.css') }}" rel="stylesheet">
      <link href="{{ asset('css/main.css') }}" rel="stylesheet">
      <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
      <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
  </head>

  <body>

    <!-- Header Section Start -->
    <header id="home" class="hero-area">
      <div class="overlay">
        <span></span>
        <span></span>
      </div>
      <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
        <div class="container">
          <a href="index.blade.php" class="navbar-brand"><img src="img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="lni-menu"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto w-100 justify-content-end">
              <li class="nav-item">
                <a class="btn btn-singin" href="{{route('login')}}">Iniciar Sesión</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="row space-100">
          <div class="col-lg-6 col-md-12 col-xs-12">
            <div class="contents">
              <h2 class="head-title">Sistema de Control de Asistencia - U.E José María Velasco Ibarra</h2>
              <p>Sistema Web para la gestión de actividades académicas en la Unidad Educativa José Maria Velasco Ibarra</p>
              <div class="header-button">
             </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12 p-0">
            <div class="intro-img">
              <img src="{{ asset('img/colegio.jpg') }}" alt="">
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Header Section End -->


    <!-- Business Plan Section Start -->
    <section id="business-plan">
      <div class="container">

        <div class="row">
          <!-- Start Col -->
          <div class="col-lg-6 col-md-12 pl-0 pt-70 pr-5">
            <div class="business-item-img">
              <img src="{{ asset('img/finger.jpg') }}" class="img-fluid" alt="">
            </div>
          </div>
          <!-- End Col -->
          <!-- Start Col -->
          <div class="col-lg-6 col-md-12 pl-4">
            <div class="business-item-info">
              <h3>Perfiles del sistema:</h3>
              <p>El sistema web cuenta con un sistema de autenticación y módulos para cada perfil garantizando de 
              esta manera la disponibilidad, confiabilidad y privacidad de los datos. Este proyecto fue desarrollado en el 
              framework Laravel.</p>
              <a class="btn btn-common" href="https://github.com/victoralonsopacha/tesis2.git">download</a>
            </div>
          </div>
          <!-- End Col -->
        </div>
      </div>
    </section>
    <!-- Business Plan Section End -->



    <!-- Cool Fetatures Section Start -->
    <section id="features" class="section">
      <div class="container">
        <!-- Start Row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="features-text section-header text-center">
              <div>
                <h2 class="section-title">Nuestros Servicios</h2>
                <div class="desc-text">
                  <p>A continuación se detallan los principales módulos de este sistema web.</p>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- End Row -->
        <!-- Start Row -->
        <div class="row featured-bg">
         <!-- Start Col -->
          <div class="col-lg-6 col-md-6 col-xs-12 p-0">
             <!-- Start Fetatures -->
            <div class="feature-item featured-border1">
               <div class="feature-icon float-left">
                 <i class="lni lni-users"></i>
               </div>
               <div class="feature-info float-left">
                 <h4>Control de Usuarios por Roles</h4>
                 <p>Producing long lasting organic SEO results for <br> brand of different kinds for more than a decade,<br> we understand that’s your.</p>
               </div>
            </div>
            <!-- End Fetatures -->
          </div>
           <!-- End Col -->

         <!-- Start Col -->
          <div class="col-lg-6 col-md-6 col-xs-12 p-0">
             <!-- Start Fetatures -->
            <div class="feature-item featured-border2">
               <div class="feature-icon float-left">
                 <i class="lni lni-keyword-research"></i>
               </div>
               <div class="feature-info float-left">
                 <h4>Manejo de Permisos</h4>
                 <p>Producing long lasting organic SEO results for <br> brand of different kinds for more than a decade,<br> we understand that’s your.</p>
               </div>
            </div>
            <!-- End Fetatures -->
          </div>
           <!-- End Col -->

         <!-- Start Col -->
          <div class="col-lg-6 col-md-6 col-xs-12 p-0">
             <!-- Start Fetatures -->
            <div class="feature-item featured-border1">
               <div class="feature-icon float-left">
                 <i class="lni lni-alarm-clock"></i>
               </div>
               <div class="feature-info float-left">
                 <h4>Gestión de Atrasos</h4>
                 <p>Producing long lasting organic SEO results for <br> brand of different kinds for more than a decade,<br> we understand that’s your.</p>
               </div>
            </div>
            <!-- End Fetatures -->
          </div>
           <!-- End Col -->

         <!-- Start Col -->
          <div class="col-lg-6 col-md-6 col-xs-12 p-0">
             <!-- Start Fetatures -->
            <div class="feature-item featured-border2">
               <div class="feature-icon float-left">
                 <i class="lni lni-files"></i>
               </div>
               <div class="feature-info float-left">
                 <h4>Generación de Reportes</h4>
                 <p>Producing long lasting organic SEO results for <br> brand of different kinds for more than a decade,<br> we understand that’s your.</p>
               </div>
            </div>
            <!-- End Fetatures -->
          </div>
           <!-- End Col -->

        </div>
        <!-- End Row -->
      </div>
    </section>
    <!-- Cool Fetatures Section End -->


    <!-- Team section Start -->
    <section id="team" class="section">
      <div class="container">
        <!-- Start Row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="team-text section-header text-center">
              <div>
                <h2 class="section-title">Nuestros Miembros</h2>
                <div class="desc-text">
                  <p>El equipo de desarrollo encargado de crear este sistema web es:</p>              
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- End Row -->

        <!-- Start Row -->
        <div class="row">
          <!-- Start Col -->
          <div class="col-lg-3 col-md-6 col-xs-12">
          </div>
          <!-- End Col -->

          <!-- Start Col -->
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="single-team">
              <div class="team-thumb">
                <img src="img/team/fotoJazmin.jpg" class="img-fluid" alt="">
              </div>

              <div class="team-details">
              <div class="team-social-icons">
                  <ul class="social-list">
                    <li><a href="https://www.facebook.com/ellyanb/"><i class="lni-facebook-filled"></i></a></li>
                    <li><a href="#"><i class="lni-twitter-filled"></i></a></li>
                    <li><a href="#"><i class="lni-google-plus"></i></a></li>
                  </ul>
                </div>
                <div class="team-inner text-center">
                  <h5 class="team-title">Jazmín Villamarín</h5>
                  <p>Front-end Developer</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Start Col -->

          <!-- Start Col -->
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="single-team">
              <div class="team-thumb">
                <img src="img/team/03.jpg" class="img-fluid" alt="">
              </div>

              <div class="team-details">
              <div class="team-social-icons">
                  <ul class="social-list">
                    <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                    <li><a href="#"><i class="lni-twitter-filled"></i></a></li>
                    <li><a href="#"><i class="lni-google-plus"></i></a></li>
                  </ul>
                </div>
                <div class="team-inner text-center">
                  <h5 class="team-title">Victor Pacha</h5>
                  <p>Back-end Developer</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Start Col -->

          <!-- Start Col -->
          <div class="col-lg-3 col-md-6 col-xs-12">
          </div>
          <!-- End Col -->

        </div>
        <!-- End Row -->
      </div>
    </section>
    <!-- Team section End -->

    <!-- Footer Area Start -->
      
    <div class="copyright">
          <div class="container">
            <!-- Star Row -->
            <div class="row">
              <div class="col-md-12">
                <div class="site-info text-center">
                    <strong>Copyright &copy; 2020 </strong>
                </div>

              </div>
              <!-- End Col -->
            </div>
            <!-- End Row -->
          </div>
        </div>
      <!-- Copyright End -->
      
      <!-- Footer area End -->

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="lni-chevron-up"></i>
    </a>

    <!-- Preloader -->
    <div id="preloader">
      <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-min.js') }}" defer></script>
    <script src="{{ asset('js/popper-min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap-min.js') }}" defer></script>


    <script src="js/owl.carousel.js"></script>
    <script src="js/jquery.nav.js"></script>
    <script src="js/scrolling-nav.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/nivo-lightbox.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>
