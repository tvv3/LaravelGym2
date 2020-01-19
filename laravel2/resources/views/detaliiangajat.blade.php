@extends('layouts.masterpage2')
@section('section_auth')
@auth
               <a href="{{ url('/home') }}">Home</a>
               
                @if (Route::has('login'))
                <?php
                    $user1 = Auth::user(); //functia user aduce tot obiectul !!!
                    // nu trebuie pus $this->$user1 ci $this->user1 !!!
                     if (isset($user1))
                     if ($user1->role2=='admin') 
                     {echo '';
                      /*echo ' <a href="../administrare">Administrare</a>';
                      echo ' <a href="../administrareangajati">Adm_Angajati</a>';
                     */
                    }   
                ?>
                @endif
                <?php $autentificat='da'; ?>
                    @else <!--else de la auth -->
                        <?php $autentificat='nu'; ?>
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                    
@endsection               

@section('pagetitle')
    Detalii angajat - creare si modificare <br>
 @endsection

 @section('links')
 @if (Route::has('login'))
                <?php
                    $user1 = Auth::user(); //functia user aduce tot obiectul !!!
                    // nu trebuie pus $this->$user1 ci $this->user1 !!!
                     if (isset($user1))
                     if ($user1->role2=='admin') 
                     {  echo ' <a href="../administrare">Administrare</a>';
                        echo ' <a href="../administrareangajati">Adm_Angajati</a>';
                        echo ' <a href="../register2">Register_Angajati</a>';    
                    }  
                ?>
                @endif
                    <a href="../antrenori">Antrenori</a>
                    <a href="../clientpage">Client_Page</a>
                    
                
@endsection
        
@section('content')   

  
     @if ($autentificat=='da') 
   
     @if ($user1)      
      Sunteti logat cu userul: email = {{$user1->email ?? ''}} !   
   <!-- @else
      Nu sunteti logat!-->
     @endif

            <!-- sectiune erori form 

            <br><br><br>            
                        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
-->

@if ($u_id<=0)<!--u_id==-1-->
   <h2>Nu ati selectat nici un angajat!</h2>
@else
 <!-- aici se vor putea introduce detaliile utilizatorilor -->
  
    <br><br>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalii angajat</div>

                <div class="card-body">
    <form action="store" method="post">
     @csrf
     
     
     <input type="hidden" name="user_id" id="user_id" value={{$u_id ?? -1}}><br>

     <div class="form-group row">
     <label for="salariu" class="col-md-4 col-form-label text-md-right">Salariu</label>
     <div class="col-md-6">
     <input type="text" name="salariu" id="salariu"
     class="form-control @error('salariu') is-invalid @enderror"
       value="{{ old('salariu') }}" required autocomplete="salariu" autofocus><br>
     @error('salariu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
         </div>
    </div>


     <div class="form-group row">
    <label for="descriere" class="col-md-4 col-form-label text-md-right">Descriere</label>
    <div class="col-md-6">
     <textarea name="descriere" id="descriere"
     class="form-control @error('descriere') is-invalid @enderror"
       value="{{ old('descriere') }}" required autocomplete="descriere">fitness</textarea><br>
     @error('descriere')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
         </div>
    </div>

     <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Salveaza detaliile angajatului
                                </button>
                            </div>
                        </div>


                        </form>

     </div></div></div></div>
       
                        <br><br>
                        @if (session('statusok'))
                       <div class="alert alert-success">
                           {{ session('statusok') }}
                      </div>
                       @endif
                       @if (session('statuserror'))
                       <div class="alert alert-danger">
                           {{ session('statuserror') }}
                      </div>
                       @endif
                       Detaliile angajatului {{$u_id ?? ''}} salvate in baza de date:<br>
                       @if ($angajat)
                         
                         Angajatul are  
                         salariu = {{$angajat[0]->salariu ?? ''}} <br>
                        descriere = {{$angajat[0]->descriere ?? ''}}
                        updated_at = {{$angajat[0]->updated_at ?? ''}}
                       @else
                       Detaliile nu exista. Creati detaliile!
                       @endif

@endif <!-- de la if u_id<=0 -->
@else
                
                       <br><br>
                        <h2>Nu sunteti logat. Access denied.</h2>
                        
                
@endif
      
</div>
<!--/div--> <!--flex-center initial div-->
@endsection
</body>
</html>
