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
 LaravelGym2 - Index Page <br>
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
    <div style="display:block;background-color:#343a40; 
    color:khaki;text-align:center;margin:20px;margin-bottom:0px;">
    <div style="padding-left:20px; padding-right:20px;">
    <br>
    <p>ALEGE ACUM SA FACI O SCHIMBARE IN VIATA TA! ALEGE SA FACI MISCARE!</p>
    <p>Vezi mai jos detalii despre facilitatile oferite de sala noastra de gimnastica!</p>
    <br>
    </div>
      
    <section  style="background-color:#fff;
                                         color:#343a40;margin:0px;">
            <div style="display:block;margin:auto;width:auto;
            background:url('imagini/gym2.jpeg');
            padding:20px;color:black;"> <!--centered-->
            <h2 
            style="display:block;text-align:center;">Tu ce abonament alegi?
            </h2>
            <h2  style="display:block;text-align: center;">
            <span>
                <strong>Laravelgym especially for you! </strong></span>
            </h2>
            <h2 
            style="display:block;text-align:center;color:yellow">Choose one offer <strong>today!</strong></span>
            </h2>
    
            </div> <!--centered-->

    <div class="membershipContainer" style="display:flex;justify-content:center;">
        
                <div class="membership" style="background:#343a40;">
                    <div>
                        <div>
                            <h3 class="fs-l" style="text-align:center;"><span style="font-family: PantonBlackItalic;">FITNESS</span>&nbsp;ALL FOR ONE MONTH</h3>

                            <h4 class="fs-xl"><strong class="fs-xxxl">159</strong> Lei</h4>

                            <ul>
                                                                    <li>ACCES NELIMITAT</li>
                                                                    <li>Acces Sauna</li>
                                                            </ul>
                        </div>
                    </div>
                </div>

            
                <div class="membership  membership1 bg-danger" style="background:red;">
                    <div>
                        <div>
                            <h3 class="fs-l" style="text-align: center;"><span style="font-family: PantonBlackItalic;">FITNESS</span>&nbsp;FOR 4 MONTHS</h3>

                            <h4 class="fs-xl"><strong class="fs-xxxl">129</strong> Lei</h4>

                            <ul>
                                                                    <li>ACCES NELIMITAT</li>
                                                                    <li>Acces Sauna</li>
                                                                    <li>Acces Jacuzzi</li>
                                                                    <li>Preț total 516 lei/4 luni</li>
                                                            </ul>
                        </div>
                    </div>
                </div>

            
                <div class="membership  bg-dark" style="background:#343a40;">
                    <div>
                        <div>
                            <h3 class="fs-l" style="text-align: center;"><span style="font-family: PantonBlackItalic;">FITNESS</span>&nbsp; ONE&nbsp;YEAR</h3>

                            <h4 class="fs-xl"><strong class="fs-xxxl">100</strong> Lei</h4>

                            <ul>
                                                                    <li>ACCES NELIMITAT</li>
                                                                    <li>Acces Sauna</li>
                                                                    <li>Access Jacuzzi</li>
                                                                    
                                                                    <li>Preț total 1200 lei/12 luni</li>
                                                            </ul>
                        </div>
                    </div>
                </div>

                </div>
 
            <div style="margin:auto;width:300px;"> <!--centered2-->
 
            <h2 class="fs-xl clr-dark" 
            style="display:block;text-align:center;padding:20px;"><strong>Let our team of trainers change your life and body!
            </strong></h2>
            
            <a href="#begindiv">Sus</a>
            <br><br><br><br>
            </div><!--centered2-->
</section>
</div> <!--dark div -->

 @endsection

           
           