@extends('layouts.masterpage')
 @section('pagetitle')
 LaravelGym2 - Client Page <br>
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
<div class="m-b-md">
                 <!--   User logat - {{$userul}} <br>
                    Id - {{$idul}} <br>
                    Email - {{$emailul}} <br>
                    Detalii - 
                    @if (isset($detaliile))
                    {{$detaliile}}
                    @endif -->
                    <center>

  <div class="card text-white bg-dark mb-3" style="width: 18rem;">
  <div class="card-header bg-danger">
  User logat - {{$userul}}
  </div>
  <ul class="list-group list-group-flush" style="color:black;">
    <li class="list-group-item"> Id - {{$idul}}</li>
    <li class="list-group-item"> Email - {{$emailul}}</li>
    <li class="list-group-item">Detalii - 
                    @if (isset($detaliile))
                    {{$detaliile}}
                    @endif</li>
  </ul>
</div>

  </center>
                    <br>
                </div>
            
 @endsection

           
           