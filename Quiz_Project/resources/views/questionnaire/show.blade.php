@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(\Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ \Session::get('success') }}
            </div>
            @endif  

            <div class="card">
                <div class="card-header">{{ $title_name->title }}</div>
                <div class="card-body">   
                    <a href="/question/{{ $title_name->id }}/create" class="btn btn-primary">เพิ่มคำถาม</a>
                    <a href="/quiz/{{ $title_name->id }}-II-{{ Str::slug($title_name->title) }}" class="btn btn-primary">ทดสอบ</a>
                </div>
            </div>

            @foreach ($title_name->questions as $question)

                <div class="card mt-4">
                    <div class="card-header">{{ $question->question }}</div>

                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($question->answers as $answer)
                                <li class="list-group-item">{{$answer->answer}}</li>
                            @endforeach
                        </ul>
                    </div>


                    <div class="card-footer">
                        <form action="/question/{{ $title_name->id }}/destroy/{{ $question->id }}" method="POST" class="delete_form">
                            @method('DELETE')
                            @csrf

                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete Question</button>
                            <a href="/question/{{$question->id}}/edit" class="btn btn-sm btn-warning">Edit Qusetion</a>
                        </form>

                    </div>

                </div>
                
            @endforeach


        </div>
    </div>
</div>

<script type="text/javascript" src="{{ URL::asset('js/delete.js') }}"></script>

@endsection