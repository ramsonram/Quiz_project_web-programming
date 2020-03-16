@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">เพิ่มคำถาม</div>

                <div class="card-body">
                <form method="POST" action="/question/{{ $title_id->id }}/stores">

                        @csrf

                        <div class="form-group">
                            <legend>คำถาม ?</legend>
                            <textarea name="question[question]" type="text" class="form-control" value="{{ old('question.question') }}" rows="3"></textarea>

                            @error('question.question')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="form-geoup">
                            <fieldset>
                                <legend>ตัวเลือก</legend>
                                <div>
                                    <div class="form-group">
                                        <label for="answer1">ตัวเลือก 1</label>
                                        <textarea name="answers[][answer]" type="text" class="form-control" rows="1" 
                                        value="{{ old('answers.0.answer') }}"></textarea>
            
                                        @error('answers.0.answer')
                                            <small class="text-danger"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="answer2">ตัวเลือก 2</label>
                                        <textarea name="answers[][answer]" type="text" class="form-control" rows="1"
                                        value="{{ old('answers.1.answer') }}"></textarea>
                                       
                                        @error('answers.1.answer')
                                            <small class="text-danger"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="answer3">ตัวเลือก 3</label>
                                        <textarea name="answers[][answer]" type="text" class="form-control" rows="1"
                                        value="{{ old('answers.2.answer') }}"></textarea>
                                       
                                        @error('answers.2.answer')
                                            <small class="text-danger"> {{ $message }} </small>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <div class="form-group">
                                        <label for="answer4">ตัวเลือก 4</label>
                                        <textarea name="answers[][answer]" type="text" class="form-control" rows="1"
                                        value="{{ old('answers.3.answer') }}"></textarea>
                                        
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
                              <option value="1">ตัวเลือก 1</option>
                              <option value="2">ตัวเลือก 2</option>
                              <option value="3">ตัวเลือก 3</option>
                              <option value="4">ตัวเลือก 4</option>
                            </select>
                          </div>

                        <button type="submit" class="btn btn-primary">Add Question</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
