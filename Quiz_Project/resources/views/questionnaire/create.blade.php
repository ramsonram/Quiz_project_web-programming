@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">เพิ่มชุดข้อสอบ</div>

                <div class="card-body">
                    <form action="{{url('questionnaire')}}" method="POST">

                        @csrf

                        <div class="form-group">
                            <label for="title">เรื่อง / วิชา </label>
                            <textarea name="title" type="text" class="form-control" id="title" rows="2"></textarea>
                            <small id="emailHelp" class="form-text text-muted">Give your Questionnaier title</small>

                            @error('title')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title">รายละเอียด</label>
                            <textarea name="purpose" type="text" class="form-control" id="title" rows="3"></textarea>
                            <small id="emailHelp" class="form-text text-muted">Give your Questionnaier purpose</small>

                            @error('title')
                                <small class="text-danger"> {{ $message }} </small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create Questionnaier</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
