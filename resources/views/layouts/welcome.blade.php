<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Word Wise</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/wordwiseCircle.png')}}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css"> -->

    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="C:/xampp/htdocs/BookStoreLaravel/resources/css/app.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> -->

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        .active-nav {
            color: #f07c29 !important;
            background-color: #f07c29 !important;
        }
    </style>
</head>

<body>
    <nav class="row row-cols-2 row-cols-xs-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 py-3 navbar">
        <a href="/" class="row row-cols-2" style="text-decoration:none">
            <img src="{{asset('images/wordwise.png')}}" alt="logo" class="logoImage p-0" style="width:10px; height:40px">
            <h3 class="text-orange p-0 m-0 ">WORD WISE</h3>
        </a>

        <form class="d-flex" action="{{ route('search') }}" method="GET">
            <input type="text" name="query" class="form-control search" placeholder="Search for books, authors, genres, or publishing houses">
            <input type="submit" value="Search" class=" btn btn-orange text-white search btn-sm">
        </form>
    </nav>




    <div class="pagination paginationContainer ">
        <div id='pagination' class='pagination row row-cols-1 row-cols-xs-1 row-cols-sm-1 row-cols-md-5 row-cols-lg-5 text-center'>

            <a href="{{url('/')}}" class="navMenu  py-2 {{ request()->routeIs('welcome') ? 'active-nav' : '' }}">
                <h5>HOME</h5>
            </a>
            <a href="{{url('guest/books/')}}" class="navMenu  py-2 {{ request()->routeIs('ubooks') ? 'active-nav' : '' }}">
                <h5>BOOKS</h5>
            </a>
            <a href="{{url('guest/authors/')}}" class="navMenu  py-2 {{ request()->routeIs('uauthors') || request()->routeIs('authorbooks') ? 'active-nav' : '' }}">
                <h5>AUTHORS</h5>
            </a>

            <a href="{{url('guest/genres/')}}" class="navMenu  py-2 {{ request()->routeIs('ugenres') || request()->routeIs('genrebooks') ? 'active-nav' : '' }}">
                <h5>GENRES</h5>
            </a>
            <a href="{{url('guest/publishinghouses/')}}" class="navMenu  py-2 {{ request()->routeIs('upublishinghouses') || request()->routeIs('pbhbooks') ? 'active-nav' : '' }}">
                <h5>PUBLISHING HOUSES</h5>
            </a>

        </div>
    </div>

    <main class="py-2">
        @yield('guestContent')
    </main>


    <footer>
        <div class="insideFooter">
            <div class="upperFooter row row-cols-1 row-cols-xs-1 row-cols-sm-3 row-cols-md-3 row-cols-lg-4">
                <div class="oneOf4">
                    <h5 class="footerHeading">Word Wise</h5>
                    <p class="linksInsideFooter">Word Wise was started in May 22 with the vision to provide an extensive library of books in digital format for free on the internet.</p>
                </div>
                <div class="twoOf4 row row-cols-1">
                    <h5 class="footerHeading">PAGES</h5>
                    <a href="" class="linksInsideFooter">Home</a>
                    <a href="" class="linksInsideFooter">Contact us</a>
                    <a href="" class="linksInsideFooter">Terms and Conditions</a>
                    <a href="" class="linksInsideFooter">Privacy Policy</a>
                </div>
                <div class="threeOf4 row row-cols-1">
                    <h5 class="footerHeading">PAGES</h5>
                    <a href="" class="linksInsideFooter">About us</a>
                    <a href="" class="linksInsideFooter">Books</a>
                    <a href="" class="linksInsideFooter">Blog</a>
                    <a href="" class="linksInsideFooter">Categories</a>
                </div>
                <div class="fourOf4">
                    <h5 class="footerHeading">STAY CONNECTED</h5>
                    <div class="linksInsideFooter">
                        <a href="https://www.google.com/search?q=Instagram" target="_blank"><i class="fa-brands fa-instagram "></i></a>
                        <a href="https://www.google.com/search?q=Facebook" target="_blank"><i class="fa-brands fa-facebook "></i></a>
                        <a href="https://www.google.com/search?q=Twitter" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                    </div>

                    <h6 class="linksInsideFooter">Email: minthantkyaw79071@gmail.com</h6>
                </div>
            </div>

        </div>
        <div class="lowerFooter ">
            <p class="py-4 copyrightText">&copy; <a href="{{url('/')}}" class="orangeText">Word Wise</a> Created with <span style="color:red;font-size:x-large">&hearts;</span> by <a href="https://portfolio-beta-roan-96.vercel.app" target="_blank" class="orangeText">Min Thant Kyaw</a></p>
        </div>
    </footer>
</body>

</html>