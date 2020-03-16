@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">

            <div class="list-group mb-2">
                <div class="list-group-item list-group-item-action active">
                    <i class="fa fa-home"></i> Home
                </div>

                <div class="card form-rounded mt-2">
                    <div class="card-body row text-center">
                      <div class="col">
                        {{-- <div class="text-value-xl">89k</div>
                        <div class="text-uppercase text-muted small">Test Quiz</div> --}}
                      </div>
                      <div class="vr"></div>
                      <div class="col">
                        <div class="text-value-xl">{{ $questionnarie_count }}</div>
                        <div class="text-uppercase text-muted small">Question</div>
                      </div>
                    </div>
                  </div>

                <div class="list-group-item list-group-item-action mt-2">
                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i> Post
                    <span class="badge badge-pill badge-primary pull-right">{{ $post_cout}}</span>
                    <div>
                    </div>
                </div>
                <div class="mt-2">

                    <form method="POST" action="{{ url('news/post')}}">
                        @csrf
                        <textarea name="details" type="text" class="form-control" rows="3"></textarea>
                        <select name="color" class="btn btn-sm btn-outline-primary mt-1">
                            <option value="alert-danger">danger</option>
                            <option value="alert-primary">primary</option>
                            <option value="alert-success">success</option>
                            <option value="alert-secondary">secondary</option>
                            <option value="alert-warning">warning</option>
                            <option value="alert-dark">dark</option>
                            <option value="alert-info">info</option>
                        </select>
                        <button type="submit" class="btn btn-sm btn-primary mt-1">POST</button>
                    </form>

                </div>
                <div class="mt-2">
                    <ul class="list-group">
                        @foreach ($post as $item)
                                <li class="list-group-item">{{ $item->details}}
                                    <a href="/post/delete/{{ $item->id }}" class="delete_post">
                                        <span class="badge badge-pill badge-danger pull-right">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </span>
                                    </a>
                                </li> 
                        @endforeach
                        
                    </ul>
                </div>


            </div>



        </div>
        <div class="col-md-7">


            <a href="{{url('questionnaire/create')}}" class="btn btn-primary"> เพิ่มชุดข้อสอบ </a>

    
            @if(\Session::has('success'))
            <div class="alert alert-success mt-2" role="alert">
                {{ \Session::get('success') }}
            </div>
            @endif  

            <div class="card mt-4">
                <div class="card-header">My questionnaires</div>



                <div class="card-body">
                    
                    <ul class="list-group">
                        @foreach ($questionnaires as $questionnaire)

                            <li class="list-group-item">
                                {{-- <a href="/questionnaires/{{ $questionnaire->id}}">{{ $questionnaire->title }}</a> --}}
                                <a href=" {{ $questionnaire->path()}} ">{{ $questionnaire->title }}</a>
                                
                                

                                <div class="mt-2">
                                    <div>
                                        <small><i class="fa fa-commenting-o" aria-hidden="true"></i>  รายละเอียด : {{ $questionnaire->purpose }} </small>
                                    </div>
                                    <small><i class="fa fa-user-o" aria-hidden="true"></i> by..User ID : {{ $questionnaire->user_id}} </small>
                                    <p>
                                        <small><i class="fa fa-share-square-o" aria-hidden="true"></i> Share URL</small>
                                        <a href="{{ $questionnaire->publicPath() }}">
                                            {{ $questionnaire->publicPath() }}
                                        </a>
                                        

                                        
                                        <form action="/home/{{ $questionnaire->id }}/destroy" method="POST" class="delete_form">
                                            @method('DELETE')
                                            @csrf


                                            <a href="{{ $questionnaire->path()}}" class="btn btn-sm btn-success">เพิ่มเติม</a>
                                            <a href="{{ action('QuestionnaireController@edit', $questionnaire->id)}}" class="btn btn-sm btn-warning float-right">Edit Qusetion</a>
                                            <button type="submit" class="btn btn-sm btn-outline-danger float-right mr-2">Delete Question</button>
                                            
                                    
                                        </form>
                                        
                                    </p>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>


        </div>
    </div>
</div>

<script type="text/javascript" src="{{ URL::asset('js/delete.js') }}"></script>
@endsection
