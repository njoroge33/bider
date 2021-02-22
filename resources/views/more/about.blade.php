
@extends('layouts.app')

@section('content')
    <div class='text-center'>
        <h1>About Us</h1>
    </div>
    <div class="page-content">
             
        <div class="card card-style bg-1" data-card-height="400">
            <div class="card-top text-center">
                <h1 class="color-white text-center font-22 pt-3 mb-0">Greetings from</h1>
                <h1 class="color-white font-40">Enabled</h1>
            </div>
            <div class="card-bottom text-center">
                <p class="color-white font-15 opacity-70 px-4">
                    We're the only Elite Mobile Author on Envato Market, creating amazing Mobile Products ever since 2009 only for you!
                </p>
            </div>
            
            <div class="card-overlay bg-gradient"></div>
        </div>
        
        
        
        <div class="card card-style">
            <div class="content">
                <p class="mb-0 font-600 color-highlight">A very short biography</p>
                <h1>Who we are?</h1>
                <p>
                    Enabled is a business powered by 2 folks just like you who aim 
                    to create beautiful mobile interfaces and treat customers like we love to be treated.
                </p>        
            </div>
        </div>
        
        <div class="row mb-0">
            <div class="col-6 pr-0">
                <div class="card card-style">
                    <img src="images/pictures/16t.jpg" class="img-fluid">
                    <div class="p-2">
                        <p class="font-600 color-highlight mb-n2">Development</p>
                        <h4 class="pt-2">Mr. Enabled</h4>
                        <p class="mb-2">
                            Husband and front end developer at Enabled.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6 pl-0">
                <div class="card card-style">
                    <img src="images/pictures/2t.jpg" class="img-fluid">
                    <div class="p-2">
                        <p class="font-600 color-highlight mb-n2">Marketing</p>
                        <h4 class="pt-2">Mrs. Enabled</h4>
                        <p class="mb-2">
                            Wife and Marketing Specialist at Enabled
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-style">
            <div class="content">
                <p class="mb-0 font-600 color-highlight">A very short bio</p>
                <h1>Our Values</h1>
                <p>
                    Enabled is a business powered by 2 folks just like you who aim 
                    to create beautiful mobile interfaces and treat customers like we love to be treated.
                </p>
                            
                <div class="d-flex mb-4">
                    <div class="align-self-center"><i class="fa fa-code color-highlight fa-4x icon-70 text-center"></i></div>
                    <div class="mr-auto pl-4">
                        <h4>Quality Code</h4>
                        <p>
                            We create products we want to use for ourselves and that make us proud
                        </p>
                    </div>
                </div>
                            
                <div class="d-flex mb-4">
                    <div class="align-self-center"><i class="fa fa-life-ring color-orange-dark fa-4x icon-70 text-center"></i></div>
                    <div class="mr-auto pl-4">
                        <h4>Hands on Support</h4>
                        <p>
                            We treat our customers like we like to be treated. We're always here for you!
                        </p>
                    </div>
                </div>
            
                <div class="d-flex">
                    <div class="align-self-center"><i class="fa fa-trophy color-yellow-dark fa-4x icon-70 text-center"></i></div>
                    <div class="mr-auto pl-4">
                        <h4>Elite Care</h4>
                        <p>
                            We became elite because we cared about our customers and products
                        </p>
                    </div>
                </div>
            
            </div>
        </div>
        
        
        <div class="card card-style">
            <div class="content">
                <p class="mb-0 font-600 color-highlight">Let's connect</p>
                <h1>We're very Social</h1>
                <p>
                    We're very social and always love to keep in touch with our customers. Along our 11 year journey we've made
                    tones of awesome friends.
                </p>        
            </div>
        </div>
        
        <div class="row px-3">
            <div class="col-6 p-0">
                <div class="card card-style mr-1 mb-2 bg-facebook p-3">
                    <i class="fab fa-facebook fa-3x color-white text-center"></i>
                    <p class="font-11 text-center pt-2 mb-0 color-white">enabled.labs</p>
                </div>
            </div>
            <div class="col-6 p-0">
                <div class="card card-style ml-1 mb-2 bg-twitter p-3">
                    <i class="fab fa-twitter fa-3x color-white text-center"></i>
                    <p class="font-11 text-center pt-2 mb-0 color-white">@iEnabled</p>
                </div>
            </div>
            <div class="col-6 p-0">
                <div class="card card-style mr-1 mb-0 bg-instagram p-3">
                    <i class="fab fa-instagram fa-3x color-white text-center"></i>
                    <p class="font-11 text-center pt-2 mb-0 color-white">enabled.labs</p>
                </div>
            </div>
            <div class="col-6 p-0">
                <div class="card card-style ml-1 mb-0 bg-green-dark p-3">
                    <i class="fa fa-envelope fa-3x color-white text-center"></i>
                    <p class="font-11 text-center pt-2 mb-0 color-white">name@domain.com</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
