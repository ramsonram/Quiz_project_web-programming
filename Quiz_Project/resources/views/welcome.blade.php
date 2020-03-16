<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{URL::asset('css/main.css')}}">
        <link rel="stylesheet" href="{{URL::asset('css/search.css')}}">
        
        
    </head>
    <body>
        
        <div class="flex-center position-ref">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth

                        
                        <a href="{{ url('/home') }}"><i class="fa fa-user-circle-o" aria="true"></i> {{ Auth::user()->name }} </a>
                        
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif


        </div>

        <div class="container mt-5">

            <div class="row">

                <div class="col-sm-12">
                    <img src="{{URL::asset('/image/banners.png')}}" alt="profile Pic" class="img-fluid form-rounded">
                </div>
            </div>

            <div class="content mt-4 mb-3">
                
            </div>
              <div class="row">
                <div class="col-sm-12 col-md-3">

                    {{-- <form class="form-inline d-flex justify-content-center md-form form-sm active-pink active-pink-2 mt-2">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
                          aria-label="Search">
                      </form> --}}

                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">เว็บไซต์แนะนำ</li>
                        <li class="list-group-item"><a href="https://www.trueplookpanya.com/examination" target="_blank">trueplookpanya.com</a></li>
                        <li class="list-group-item"><a href="https://pisaitems.ipst.ac.th/" target="_blank">pisaitems</a></li>
                        <li class="list-group-item"><a href="https://www.scimath.org/" target="_blank">SciMath</a></li>
                        <li class="list-group-item"><a href="https://www.google.com" target="_blank">google</a></li>
                      </ul>
                      


                </div>
                <div class="col-sm-12 col-md-5">

                    <div class="card-unline">
                        @foreach ($questionnaire as $questionnaire)
                            <div class="card form-rounded mb-2 shadow-sm mb-1">
                                <div class="card-body">
                                    <h5> {{ $questionnaire->title }}</h5>
                                    <small><i class="fa fa-commenting-o" aria-hidden="true"></i>  รายละเอียด : {{ $questionnaire->purpose }} </small>
                                <div>
                                    <small><i class="fa fa-user-o" aria-hidden="true"></i> by..User ID : {{ $questionnaire->user_id}} </small>
                                </div>
                                    <small><i class="fa fa-share-square-o" aria-hidden="true"></i> Share URL</small>
                                    <a href="{{ $questionnaire->publicPath() }}">
                                        {{ $questionnaire->publicPath() }}
                                    </a>
                            </div>
                            </div>
                           
                        @endforeach


                    </div>

                </div>

                <div class="col-sm-12 col-md-4">
                    <div class="card border-info mb-2">
                        <div class="card-header"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> ข่าวสาร</div>
                    </div>

                    @foreach ($post as $item)

                        <div class="alert {{ $item->color}}">
                            <div><small><i class="fa fa-user-o" aria-hidden="true"></i> by..User ID :{{ $item->user_id}}</small></div>
        
                            <small> {{ $item->details}} </small> 
                        </div>
                
                    @endforeach











                </div>
              </div>


        </div>
    </body>
</html>
