@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        

        <h1> {{ $questionnaire->title }}</h1>
        <h5> รายละเอียด :: {{ $questionnaire->purpose}}</h5> 

        <form action="/quiz/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}" method="POST">
            @csrf
            @foreach ($questionnaire->questions as $key => $question)

                <div class="card mt-4">
                    <div class="card-header"><strong>ข้อที่ {{ $key + 1 }}.</strong> </div>
                    <div class="card-body ml-2">
                        {{ $question->question }}
                    </div>

                    <div class="card-body">

                        @error('responses.' . $key . '.answer_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <ul class="list-group">
                            
                            @foreach ($question->answers as $correct => $answer)
                                <label for="answers{{ $answer->id }}">


                                    <li class="list-group-item">

                                        <input type="radio" name="responses[{{ $key }}][answer_id]" id="answers{{ $answer->id}}" 
                                        {{ (old('responses.' . $key . '.answer_id') == $answer->id) ? 'checked' : ''}}
                                        class="mr-2" value="{{ $correct+1 }}">
                                        {{$answer->answer}}
                                


                                        <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $questionnaire->id}}">
                                    </li>
                                    
                                </label>
                                
                            @endforeach
                            
                        </ul>
                    </div>

                </div>

                
            @endforeach
            

            <div class="card mt-2">
                <div class="card-body">
                    <p>ตรวจสอบความแน่ใจก่อนส่งคำตอบ</p>
                    <button type="submit" class="btn btn-primary">ส่งคำตอบ</button>
                </div>
            </div>

            

        
            {{-- <div class="card mt-4">
                <div class="card-header">Your Information</div>

                <div class="card-body">

                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input name="survey[name]" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name">
                            <small id="namelHelp" class="form-text text-muted">Hello What's your name?</small>

                            @error('name')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input name="survey[email]" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">Your Email Please</small>

                            @error('email')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create Questionnaier</button>
                </div>
            </div> --}}

        </form>
        </div>
    </div>
</div>
@endsection
