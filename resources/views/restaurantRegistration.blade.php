<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
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
    <div class="trans">
        <br><br>
    <div class="container">
        <div class="row justify-content-center ">
          <div class="col-xl-5 col-md-8">
            
            <form class="bg-white  rounded-5 shadow-5-strong p-5" action="" method="post" enctype="multipart/form-data">
              @csrf
              <h1>Restaurant Registration</h1><br>
              @if (isset($success))
                  <h5>{{$success}}, <a href="{{route('login')}}">Login now</a></h5>
              @endif
              
              <!-- Email input -->
              
              Restaurant Name
              @error('name')
              <br><span class="text-danger">{{$message}}</span><br>
              @enderror
              <div class="form-outline mb-4 textBorder">
                <input type="text" id="form1Example1" class="form-control" name="name" value="{{old('name')}}"/>
                
              </div>
             
             

             
              Email
              @error('email')
              <br><span class="text-danger">{{$message}}</span><br>
              @enderror
              @if (isset($emailEx))
              <br><span class="text-danger">{{$emailEx}}</span><br>    
              @endif
              <div class="form-outline mb-4 textBorder">
                <input type="text" id="form1Example2" class="form-control" name="email" value="{{old('email')}}"/>
              </div>
              
              Address
              @error('address')
              <br><span class="text-danger">{{$message}}</span><br>
              @enderror
              <div class="form-outline mb-4 textBorder">
                  <input type="text" id="form1Example2" class="form-control" name="address" value="{{old('address')}}"/>
              </div>
              
              Contuct Number
              @error('contact_number')
              <br><span class="text-danger">{{$message}}</span><br>
              @enderror
              <div class="form-outline mb-4 textBorder">
                  <input type="text" id="form1Example2" class="form-control" name="contact_number" value="{{old('contact_number')}}"/>
              </div>
              
              
              Password
              @error('password')
              <br><span class="text-danger">{{$message}}</span><br>
              @enderror
              <div class="form-outline mb-4 textBorder">
                  <input type="password" id="form1Example2" class="form-control" name="password" value="{{old('password')}}"/>
              </div>
              
              Confirm Password
              @error('con_password')
              <br><span class="text-danger">{{$message}}</span><br>
              @enderror
              <div class="form-outline mb-4 textBorder">
                  <input type="password" id="form1Example2" class="form-control" name="con_password" value="{{old('con_password')}}"/>
              </div>
              Image
              @error('logo')
              <br><span class="text-danger">{{$message}}</span><br>
              @enderror
              <div class="form-outline mb-4 textBorder">
                  <input type="file" id="form1Example2" class="form-control" name="logo" value="{{old('logo')}}" accept="image/*"/>
              </div>

              <!-- Submit button -->
              <input type="submit" class="btn btn-primary btn-block" value="Register"/><br>
              <a class="btn btn-primary btn-block" href="{{route('home')}}">Back to Home</a>
            </form>
           
          </div>
        </div>
      </div>
  <br><br>
    </div>
    
  </body>
</html>