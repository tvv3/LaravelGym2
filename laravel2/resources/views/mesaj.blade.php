<head>

<style>
.membershipContainer{margin-left:0px!important;margin-right:0px!important;}
.membership ul{list-style-type:square;}
.membership{padding:20px 10px;color:yellow;flex-basis:33.33%;}
.membership1{flex-basis:33.34%;}
a{font-weight:bold;}
@media only screen and (max-width: 550px)
{.membership,.membership1{color:white;flex-basis:100%;} 
 .membershipContainer{flex-wrap:wrap;}
}
</style>
</head>

@extends('layouts.masterpage')
 @section('pagetitle')
<div id="begindiv">
 LaravelGym2 - Message Page <br>
 </div>
 @endsection

 @section('links')
 @if (Route::has('login'))
                <?php
                    $user1 = Auth::user(); //functia user aduce tot obiectul !!!
                    // nu trebuie pus $this->$user1 ci $this->user1 !!!
                     if (isset($user1))
                     if ($user1->role2=='admin') 
                     {
                     echo ' <a href="administrare">Administrare</a>';
                     echo ' <a href="../administrareangajati">Adm_Angajati</a>';
                     echo '<a href="../register2">Register_Angajati</a>'; 
                    }
                ?>
                @endif
                    <a href="antrenori">Antrenori</a>
                    <a href="clientpage">Client_Page</a>
                    
                
 @endsection
        
@section('content')
   <div id="userinfo" style="font-weight:bold;">   
    @if ($user1)      
      <p>Info: Sunteti logat cu userul: email = {{$user1->email ?? ''}} !</p>   
    @else
      <p>Info:  Nu sunteti logat!</p>
    @endif
   </div> 
   <div id="message" style="font-weight:bold;">   
    @if ($mesaj)      
      <p>Info:  {{$mesaj ?? ''}} </p>   
    @endif
   </div>

 @endsection

           
           