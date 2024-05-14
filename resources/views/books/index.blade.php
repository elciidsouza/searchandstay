@extends('layouts.app')

@section('title', 'Books')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <books-list></books-list>
            </div>
        </div>
    </div>
@endsection
