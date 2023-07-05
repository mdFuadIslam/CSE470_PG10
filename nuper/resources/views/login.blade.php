<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Login</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
      <!-- style css -->
      <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('css/responsive.css')}}" type="text/css">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}" type="text/css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      
      <!--LOGIN -->
      <link rel="stylesheet" href="{{asset('css/loginstyle.css')}}" type="text/css" />
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="header_top d_none1">
               <div class="container">
                  <div class="row">
                     <div class="col-md-4">
                        <ul class="conta_icon ">
                           <li><img src="images/call.png" alt="#"/>Call us: 0153 - 304 - 8711</li>
                        </ul>
                     </div>
                     <div class="col-md-4">
                        <ul class="social_icon"><!--can be added later-->
                           <li> <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i>
                              </a>
                           </li>
                           <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                           <li> <a href="#"> <i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                           <li> <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i>
                              </a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="header_midil">
               <div class="container">
                  <div class="row d_flex">
                     <div class="col-md-4">
                        <ul class="conta_icon d_none1">
                           <li><img src="images/email.png" alt="#"/> nuper@gmail.com</li>
                        </ul>
                     </div>
                     <div class="col-md-4"><!--problem 1.1-->
                        <a class="logo" href="/"><img src="images/logo.png" alt="#"/></a>
                     </div>
                  </div>
               </div>
            </div>
            
         </div>
         <div class="header_bottom">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarsExample04">
                              <ul class="navbar-nav mr-auto">
                                 <li class="nav-item active">
                                    <a class="nav-link" href="/">Home</a> <!--problem 1.1-->
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#myFooter">About</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="product">Products</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="auction">Auction</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="thread">Thread</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#myFooter">Contact Us</a>
                                 </li>
                              </ul>
                           </div>
                        </nav>
                     </div>
                     <div class="col-md-4">
                        <div class="search">
                           <form action="/action_page.php">
                              <input class="form_sea" type="text" placeholder="Search" name="search">
                              <button type="submit" class="seach_icon"><i class="fa fa-search"></i></button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- project section -->
      <div id="project" class="project">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                  <div class="loginBox"><h2>Login to Nuper</h2></div>
                  </div>
               </div>
            </div>
         </div>
       
      <div class="loginContainer">
            <form action="login" method="post">
                @csrf
                <div class="loginBox"><p><input type="text" name="username" placeholder="username" id="username"></p></div>
                <div class="loginBox"><p><input type="password" name="password" placeholder="password" id="password"></p></div>
                <div class="loginBox"><p><input type="submit" class="read_more" value="Sign In"></p></div>
            </form>
            <div class="loginBox"><p>Not a member? <a href="signup">Sign up now</a></p></div>
      </div>
      </div>
      <!-- end project section -->
      <footer>
         <div class="footer" id ="myFooter">
            <div class="container">
               <div class="row">
                  <div class="col-md-3">
                     <div class="inror_box">
                        <h3>INFORMATION </h3>
                        <figure><img src="images/qr.png"></figure>
                    </div>
                  </div>
                  <div class="col-md-3">
                     <div class="inror_box">
                        <h3>ABOUT  </h3>
                        <p>A company that is dedicated to server inspiring gamers, programmers, miners. To met their desire and fullfill their dream. We offer goods for cheap but we are not scammer!</p>
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="inror_box">
                        <h3>CONTACTS  </h3>
                        <p>Phone:01533048711<br>
                            Landline:999-999-9999<br>
                            Office:Mirpur,Dhaka,Bangladesh<br>
                            E-maill:nuper@gmail.com</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="copyright">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <p>© 2019 All Rights Reserved. Design by<a href="https://html.design/"> Free Html Templates</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>

