<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LaravelGym2</title>

        <!-- Styles links -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Styles links-->
       
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
       
        <!-- Styles -->
        <link rel="stylesheet" href="style2.css">
      
    </head>
    <body>
       
        <div class="flex-center position-ref"> <!-- am scos clasa full-height-->
            @if (Route::has('login'))
                <div class="top-right links m-b-md">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                                             
                        
                    @else
                    <!--div class="top-right links m-b-md"-->
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    <!--/div-->
                    @endauth
                </div>
            @endif
            
            </div>
            <br><br><br>
            <div class="container content">
                <img src="../imagini/gym1.jpeg" style="width:18rem; height=auto;" alt="image1">
                <br><br>
                <div class="title m-b-md">
                   @yield('pagetitle')
                </div>

                <div class="links">
                 @yield('links')
                    
                </div>
                <br><br>
                @yield('content')
            </div>
        
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
function alertYesNo(f){
    if (confirm('Are you sure you want to do this?')) {
  // Save it!
      //alert('confirm');
      document.getElementById(f).submit();
} else {
  // Do nothing!
      //alert('nu confirm');
}
}
function alert2YesNo(f,z,x){
    if (confirm('Sigur doriti sa stergeti detaliile pentru '+z+' cu numele: '+x+'?')) {
  // Save it!
      //alert('confirm');
      document.getElementById(f).submit();
} else {
  // Do nothing!
      //alert('nu confirm');
}
}
</script>
    </body>
</html>
