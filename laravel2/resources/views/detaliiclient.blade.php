
@extends('layouts.masterpage2')
@section('section_auth')
@auth
               <a href="{{ url('/home') }}">Home</a>
               
                @if (Route::has('login'))
                <?php
                    $user1 = Auth::user(); //functia user aduce tot obiectul !!!
                    // nu trebuie pus $this->$user1 ci $this->user1 !!!
                     /*if (isset($user1))
                     if ($user1->role2=='admin') 
                     echo ' <a href="../administrare">Administrare</a>';
                     */
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
    Detalii client - creare si modificare <br>
 @endsection

 @section('links')
 @if (Route::has('login'))
                <?php
                    $user1 = Auth::user(); //functia user aduce tot obiectul !!!
                    // nu trebuie pus $this->$user1 ci $this->user1 !!!
                     if (isset($user1))
                     if ($user1->role2=='admin') 
                     {
                     echo ' <a href="../administrare">Administrare</a>';
                     echo ' <a href="../administrareangajati">Adm_Angajati</a>';
                     echo '<a href="../register2">Register_Angajati</a>'; 
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
<!--
{{session('u_id') ?? 'sesiunea'}}
metoda= {{$metoda ?? ''}}
client={{$client ?? ''}}
u_id={{$u_id ?? ''}}-->
<BR>
@if ($u_id<=-1)
   <h2>Nu ati selectat nici un client!</h2>
@else
 <!-- aici se vor putea introduce detaliile utilizatorilor -->
  
    <br><br>
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalii client</div>

                <div class="card-body">
    <form action="store" method="post">
     @csrf
     
     
     <input type="hidden" name="user_id" id="user_id" value={{$u_id ?? -1}}><br>
     
     <div class="form-group row">
     <label for="data_inceput" class="col-md-4 col-form-label text-md-right">Data_inceput</label>
      <div class="col-md-6">
      <input type="text" name="data_inceput" id="data_inceput" 
      class="form-control @error('data_inceput') is-invalid @enderror"
       value="{{ old('data_inceput') }}" required autocomplete="data_inceput" 
       autofocus><br>
     @error('data_inceput')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
         </div>
    </div>

     <div class="form-group row">
     <label for="data_sfarsit" class="col-md-4 col-form-label text-md-right">Data_sfarsit</label>
     <div class="col-md-6">
     <input type="text" name="data_sfarsit" id="data_sfarsit"
     class="form-control @error('data_sfarsit') is-invalid @enderror"
       value="{{ old('data_sfarsit') }}" required autocomplete="data_sfarsit"><br>
     @error('data_sfarsit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
         </div>
    </div>

     <div class="form-group row">
     <label for="abonament" class="col-md-4 col-form-label text-md-right">Abonament</label>
     <div class="col-md-6">
     <input type="text" name="abonament" id="abonament"
     class="form-control @error('abonament') is-invalid @enderror"
       value="{{ old('abonament') }}" required autocomplete="abonament"><br>
     @error('abonament')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
         </div>
    </div>

     <div class="form-group row">
     <label for="pret" class="col-md-4 col-form-label text-md-right">Pret</label>
     <div class="col-md-6">
     <input type="text" name="pret" id="pret"
     class="form-control @error('pret') is-invalid @enderror"
       value="{{ old('pret') }}" required autocomplete="pret"><br>
     @error('pret')
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
                                    Salveaza detaliile clientului
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
                      
                       Detaliile clientului {{$u_id ?? ''}} salvate in baza de date:<br>
                       @if ($client)
                         
                         Clientul are abonament= {{($client[0]->abonament) ?? ''}}<br> 
                         pret = {{$client[0]->pret ?? ''}} <br>
                         perioada de valabilitate: {{$client[0]->data_inceput ?? ''}}
                          - pana la (exclusiv) {{$client[0]->data_sfarsit ?? ''}}
                        <br>
                        descriere = {{$client[0]->descriere ?? ''}}

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
