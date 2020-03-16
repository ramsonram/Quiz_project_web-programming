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
                <div class="card-header">Score</div>
                <div class="card-body">
                    <h2 class="">{{ $score }}<h2>
                    <a href="/" class="btn btn-primary">กลับหน้าหลัก</a>
                    <a href="" class="btn btn-success">ลองอีกครั้ง</a>
                </div>
            </div>

        

        </div>
    </div>
</div>
@endsection