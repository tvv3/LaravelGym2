
@extends('layouts.masterpage')
 @section('pagetitle')
 LaravelGym2 - Antrenori Page <br>
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

 @if($user1)               
<center>

<div class="card text-white bg-dark mb-3" style="width: 18rem;">
<div class="card-header bg-danger">
User logat - {{$user1->name ?? ''}}
</div>
<ul class="list-group list-group-flush" style="color:black;">
  <li class="list-group-item"> Id - {{$user1->id ?? ''}}</li>
  <li class="list-group-item"> Email - {{$user1->email ?? ''}}</li>
</ul>
</div>
</center>
@endif
                  <br>
                  
                </div>
 <div class="container">
 <div class="row">
 @forelse($antrenori as $antrenor)
 
 <div class="col-sm-4 mb-4">
 <div class="card text-white bg-dark h-100" >
 
 <img src="imagini/antrenori/{{$antrenor->id}}.jpeg"
   class="card-img-top h-50" alt="antrenor{{$antrenor->id}}">

      <br>

      <div class="card-body h-100">
      <h5 class="card-title bg-danger"> Antrenor: {{$antrenor->name}}</h5>
      </div>
    <div class="card-footer text-white h-100"> {{$antrenor->descriere}}
      </div>
  </div>
  </div>
 @empty
    Nu exista antrenori salvati in sistem.
 @endforelse
 </div> <!--row-->
 </div> <!--container cu antrenori-->          
 @endsection
