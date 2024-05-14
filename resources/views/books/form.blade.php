@extends('layouts.app')

@section('title', 'Form Books')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <books-form @isset($id):id="{{$id}}"@endif></books-form>
            </div>
        </div>
    </div>
@endsection
