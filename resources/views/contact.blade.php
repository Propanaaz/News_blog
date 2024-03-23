<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Contact</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Bootstrap Ecommerce Template" name="keywords">
        <meta content="Bootstrap Ecommerce Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

           <!-- Favicon -->
           <link href="{{ url('img/favicon.ico') }}" rel="icon">

           <!-- Google Fonts -->
           <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
   
           <!-- CSS Libraries -->
           <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
           <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
           <link href="{{ url('lib/slick/slick.css') }}" rel="stylesheet">
           <link href="{{ url('lib/slick/slick-theme.css') }}" rel="stylesheet">
   
           <!-- Template Stylesheet -->
           <link href="{{ url('css/style.css') }}" rel="stylesheet">
       </head>
   
       

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top Header Start -->
        <div class="top-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4">
                        <div class="logo">
                            <a href="">
                                <img src="img/new_logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="search">
                            <form action="/search_post" method="GET">
                                @csrf
                                <input type="text" placeholder="Search" name="search">
                                <button><i class="fa fa-search"></i></button>
    
                            </form>
                                                    </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="social">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook"></i></a>
                            <a href=""><i class="fab fa-linkedin"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Header End -->


        <!-- Header Start -->
        <div class="header">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav m-auto">
                            <a href="/" class="nav-item nav-link">Home</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
                                <div class="dropdown-menu">
                                    @foreach($category as $category2)
                                    <a href="../../tag_search/{{$category2['category_name']}}" class="dropdown-item">{{$category2['category_name']}}</a>
                                    @endforeach
                                </div>

                            </div>
                            <a href="/contact" class="nav-item nav-link">Contact us</a>

                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Header End -->
        @if($errors->any())
        @foreach($errors->all() as $errors)
        <ul>
            <li>{{$errors}}</li>
        
        </ul>
        @endforeach
        @endif
        
            @if(session()-> has("message"))
            <h3>{{session()->get("message")}}</h3>
        
        @endif

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        
        <!-- Contact Start -->
        <div class="contact">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="form">
                            <form method="POST" action="send_contact">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" placeholder="Your Name" name="name" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="email" class="form-control" placeholder="Your Email" name="email"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Subject" name="subject" />
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" placeholder="Message" name="message"></textarea>
                                </div>
                                <div><button class="btn" type="submit">Send Message</button></div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Contact End -->
        
        
        <!-- Footer Start -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                  

                   

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Get in Touch</h3>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>Propa Technologies</p>
                                <p><i class="fa fa-envelope"></i>propanaz@gmail.com</p>
                                <p><i class="fa fa-phone"></i>+2349067669557</p>
                                <div class="social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook"></i></a>
                                    <a href=""><i class="fab fa-linkedin"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                    <a href=""><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">Newsletter</h3>
                            <div class="newsletter">
                                <p>
                                    Drop your email to subscribe to our newsletter
                                </p>
                                <form>
                                    <input class="form-control" type="email" placeholder="Your email here">
                                    <button class="btn">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


       

   <!-- Footer Start -->
   <div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded-top p-4">
        <div class="row">
            <div class="col-12 col-sm-6 text-center text-sm-start">
                &copy; <a href="#">Propa News</a>, All Right Reserved. 
            </div>
            <div class="col-12 col-sm-6 text-center text-sm-end">
                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                Designed By Propa Technologies
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="{{ url('js/jquery-3.6.1.js') }}"></script>
        <script src="{{ url('js/bootstrap.min.js') }}"></script>
        <script src="{{ url('js/bootstrap.js') }}"></script>
        <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>


        {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script> --}}
        <script src="{{ url('lib/easing/easing.min.js') }}"></script>
        <script src="{{ url('lib/slick/slick.min.js') }}"></script>


        <!-- Template Javascript -->
        <script src="{{ url('js/main.js') }}"></script>    </body>
</html>
