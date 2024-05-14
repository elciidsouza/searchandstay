@extends('layouts.app')

@section('title', 'Form Stores')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <stores-form @isset($id):id="{{$id}}"@endif></stores-form>
            </div>
        </div>
    </div>
@endsection
