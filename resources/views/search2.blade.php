<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>News 24 - Free News Website Templates</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Bootstrap Ecommerce Template" name="keywords">
        <meta content="Bootstrap Ecommerce Template Free Download" name="description">
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

    <body>
        <!-- Top Header Start -->
        <div class="top-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4">
                        <div class="logo">
                            <a href="">
                                <img src="{{ url('img/new_logo.png') }}" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="search">
                            <form action="/search_post" method="get">
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
{{-- 
        <!-- Category News Start-->
        <div class="cat-news">
            <div class="container-fluid">
                <div class="row">


          
                    
                    

                    @foreach($category as $category)
                    <div class="col-md-6">
                        <h2><i class="fas fa-align-justify"></i>{{$category["category_name"]}} </h2>
                        
                        
                    
                        <div class="row cn-slider">
                            @foreach($category->catpost as $cat)
                     
                       



                            <div class="col-md-6">
                                <div class="cn-img">
                                    <img src="{{ url('images/'.$cat["image"]) }}" />
                                    <div class="cn-content">
                                        <div class="cn-content-inner">
                                            <a class="cn-date" href=""><i class="far fa-clock"></i>{{$cat["updated_at"]}}</a>
                                            <a class="cn-title" href="">{{$cat["title"]}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            @endforeach


              
                        </div>
                    </div>

                    @endforeach




                </div>
            </div>
        </div>
        <!-- Category News End-->
 --}}


        <!-- Main News Start-->
        <div class="main-news">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <h2><i class="fas fa-align-justify"></i>Search Result for <span style="color: red;">"{{$search}}"</span> </h2>
                                <div class="row">
                                    @foreach($post as $post)

                                    <div class="col-lg-6">
                                        <div class="mn-img">
                                            <img src="{{ url('images/'.$post["image"]) }}"  width="200" height="200"/>
                                        </div>
                                        <div class="mn-content">
                                            <a class="mn-title" href="/read-article/{{$post['id']}}/{{$post['slug']}}">{{$post["title"]}}</a>
                                            <a class="mn-date" href=""><i class="far fa-clock"></i>{{$post["updated_at"]}}</a>
                                            <p>
                                                                                 </p>
                                        </div>
                                    </div>
                                    @endforeach
                                
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h2><i class="fas fa-align-justify"></i></h2>
                                <div class="row">
                               
                                    <div class="col-lg-6">
                                        <div class="mn-list">
                                            <div class="mn-content">
                                                <a class="mn-title" href=""></a>
                                                <a class="mn-date" href=""><i class=""></i></a>
                                            </div>
                                        </div>
                                     
                                     
                                    
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="sidebar">
                            <div class="sidebar-widget">
                                <h2><i class="fas fa-align-justify"></i>Category</h2>
                                <div class="category">
                                    <ul class="fa-ul">
                                        @foreach($category as $category)
                                        <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="tag_search/{{$category["category_name"]}}">{{$category["category_name"]}}</a></li>

                                        @endforeach
                                      
                                    </ul>
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2><i class="fas fa-align-justify"></i>Tags</h2>
                                <div class="tags">
                                    @foreach($alltag as $tag)
                                    <a href="tag_search/{{$tag['tag_name']}}">{{$tag['tag_name']}}</a>
                                    @endforeach
                                    
                                </div>
                            </div>

                            <div class="sidebar-widget">
                                <h2><i class="fas fa-align-justify"></i>Advertisement</h2>

                                @foreach($latestads1 as $ads)
                                <div class="image">

                                    <a href="{{$ads['link']}}"><img src="{{ url('ads/'.$ads['image']) }}" alt="Image"></a>
                                </div>
                                @endforeach
                             
                            </div>

                          
                            <div class="sidebar-widget">
                                <div class="image">
                                    <div class="row">
                                        @foreach($latestads2 as $ads)

                                        <div class="col-sm-6">
                                            <a href="{{$ads['link']}}"><img src="{{ url('ads/'.$ads['image']) }}" alt="Image"></a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main News End-->

        
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





<script src="{{ url('tinymce/tinymce.min.js') }}"></script>


<script>
    (function(){
        
    })();
</script>

