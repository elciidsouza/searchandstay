@extends('layouts.app')

@section('title', 'Stores')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <stores-list></stores-list>
            </div>
        </div>
    </div>
@endsection
