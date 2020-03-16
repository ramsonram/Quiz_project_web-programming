@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">เพิ่มคำถาม</div>


                <div class="card-body">
                    <form method="POST" action="/question/{{$question->id}}/update">

                       
                        @csrf
                        {{-- <input type="hidden" name="_method" value="PATCH" /> --}}

                        <div class="form-group">
                            <legend>คำถาม ?</legend>
                        <textarea name="question[question]" type="text" class="form-control"rows="3"> {{ $question->question}}</textarea>

                            @error('question.question')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="form-geoup">
                            <fieldset>
                                <legend>ตัวเลือก</legend>
                                <div>
                                    <div class="form-group">
                                        <label for="answer1">choice 1</label>
                                    <textarea name="answers[][answer]" type="text" class="form-control" rows="1"
                                    value="{{ old('answers.0.answer') }}"> {{ $answer[0]->answer }}</textarea>
            
                                        @error('answers.0.answer')
                                            <small class="text-danger"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="answer2">choice 2</label>
                                        <textarea name="answers[][answer]" type="text" class="form-control" rows="1"
                                        value="{{ old('answers.1.answer') }}"> {{ $answer[1]->answer }}</textarea>
                                       
                                        @error('answers.1.answer')
                                            <small class="text-danger"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="answer3">choice 3</label>
                                        <textarea name="answers[][answer]" type="text" class="form-control" rows="1"
                                        value="{{ old('answers.2.answer') }}">{{ $answer[2]->answer }}</textarea>
                                       
                                        @error('answers.2.answer')
                                            <small class="text-danger"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="answer4">choice 4</label>
                                        <textarea name="answers[][answer]" type="text" class="form-control" rows="1"
                                        value="{{ old('answers.3.answer') }}">{{ $answer[3]->answer }}</textarea>
                                        
                                        @error('answers.3.answer')
                                            <small class="text-danger"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>

                            </fieldset>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect2"><legend>เฉลย</legend></label>
                            <select class="form-control" id="exampleFormControlSelect2" name="question[correct]">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                            </select>
                          </div>
                        
                        
                        <button type="submit" class="btn btn-warning">Edit Question</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
