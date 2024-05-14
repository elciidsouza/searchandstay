@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">Welcome, {{ Auth::user()->name }}! :)</div>

                    <div class="card-body">
                        Select what you want to do from the menu.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
