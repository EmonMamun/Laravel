<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <!-- Font Awesome -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/login.css">
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css"
rel="stylesheet"
/>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"
></script>
    </head>
  <body>
      <!--Main Navigation-->
  <header>
    <style>
      #intro {
        background-image: url(../image/spices-black-background-space-text.jpg);
        height: 100vh;
      }

      /* Height for devices larger than 576px */
      @media (min-width: 992px) {
        #intro {
          margin-top: -58.59px;
        }
      }

      .navbar .nav-link {
        color: #fff !important;
      }
    </style>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
      <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand nav-link" target="_blank" href="{{route('home')}}">
          <strong>Food Court</strong>
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
          aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="{{route('home')}}">Home</a>
            </li>
            
          </ul>

         
        </div>
      </div>
    </nav>
    <!-- Navbar -->

    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-md-8">
              <form class="bg-white  rounded-5 shadow-5-strong p-5" action="" method="post">
                @csrf
                <h1>Login</h1>
                @if (isset($lerr))
                    <span class="text-danger">{{$lerr}}</span><br>
                 @endif
                 @if (isset($block))
                    <span class="text-danger">{{$block}}</span><br>
                 @endif
                <!-- Email input -->
                Email
                @error('email')
                <br><span class="text-danger">{{$message}}</span><br>
                @enderror
                <div class="form-outline mb-4 textBorder">
                  <input type="email" id="form1Example1" class="form-control"  name="email" value="{{old('email')}}"/>
                </div>

                <!-- Password input -->
                Password
                @error('password')
                <br><span class="text-danger">{{$message}}</span><br>
                @enderror
                <div class="form-outline mb-4 textBorder">
                  <input type="password" id="form1Example2" class="form-control" name="password" />
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block">Login</button><br>
                <p>Need a new Account? <a href="{{route('customerReg')}}">Click here</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Background image -->
  </header>
  <!--Main Navigation-->

  
  </body>
</html>