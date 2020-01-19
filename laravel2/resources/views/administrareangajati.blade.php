@extends('layouts.masterpage')
 @section('pagetitle')
    LaravelGym2 - Administrare Angajati Page <br>
 @endsection

 @section('links')
 @if (Route::has('login'))
                <?php
                    $user1 = Auth::user(); //functia user aduce tot obiectul                     // nu trebuie pus $this->$user1 ci $this->user1 !!!
                     if (isset($user1))
                     if ($user1->role2=='admin') 
                     {echo ' <a href="../administrare">Administrare</a>';
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
                   <!-- User logat - {{$userul}} <br>
                    Id - {{$idul}} <br>
                    Email - {{$emailul}}-->
                    <center>
  <div class="card text-white bg-dark mb-3" style="max-width:18rem;">
  <div class="card-header bg-danger">User logat - {{$userul}}</div>
  <div class="card-body">
    <h5 class="card-title"> Id - {{$idul}}</h5>
    <p class="card-text"> Email - {{$emailul}}</p>
  </div>
  </div>
</center>
                    <br>
                    @if (session('status')) <!--mesaj de la delete detalii cu succes -->
                       <div class="alert alert-success">
                           {{ session('status') }}
                      </div>
                       @endif
                    <br>
                    @if (session('statuserr')) <!--mesaj de la delete detalii daca nu exista detalii -->
                       <div class="alert alert-danger">
                           {{ session('statuserr') }}
                      </div>
                       @endif
                <!-- end div ? -->
   <?php $nr=1+($angajati->currentPage()-1)*3; /* 3 ca in paginate din administrareangajati controller */
   //$clients1=[];  
   ?>         
  <table class="table table-hover table-dark">
  <thead>
    <tr class="bg-danger">
      <th scope="col">Nr. crt</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Role2</th>
      <th scope="col">Modify details</th>
      <th scope="col">Delete details</th>
    </tr>
  </thead>
  <tbody>
       
                @forelse ($angajati as $user)
                <tr>
                    <form action="detaliiangajat/create" method="post" id="form1">
                   
                   <!-- Userul : {{$user->name}} cu emailul {{$user->email}} cu rolul {{$user->role}}
                   -->
                   <th scope="row">{{$nr}}</th>
      <td>{{$user->name ?? ''}} </td>
      <td>{{$user->email ?? ''}}</td>
      <td>{{$user->role ?? ''}} </td>
      <td>{{$user->role2 ?? ''}} </td>
                    @csrf 
                    <input type="hidden" name="user_id" value = {{$user->id}}>
                   <td> <button type="submit">Creeaza detalii angajat</button> </td>
                
                    </form>
                    <?php $nr=$nr+1;?>
                    <form action="detaliiangajat/delete" method="post" id="form2">
                    @method('DELETE')
                    @csrf 
                    <input type="hidden" name="user_id" value = {{$user->id}}>
                   <td> <button type="button" onclick="alert2YesNo('form2','angajatul','{{$user->name ?? ''}}')">Sterge detalii angajat</button>
                      
                    </td>
                    </form>
                    </tr> <!-- end row -->  
                    
                @empty
                <th scope="row">{{$nr}}</th>
      <td colspan="5"></td> 
                @endforelse
</tbody>
</table>

<div style="display:flex; justify-content:center;">
{{ $angajati->onEachSide(2)->links() }} </div> 
</div>
 @endsection
