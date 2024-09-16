<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

@extends('layouts.createditeshow')

@include('partials.navdash')
<style>
    [dir="rtl"] label.form-label {
        text-align: right;
        display: block;
    }

    [dir="ltr"] label.form-label {
        text-align: left;
        display: block;
    }


</style>
@section('content')
    <div class="d-flex justify-content-center align-items-center" style="margin-top:100px ">
        <div class="card w-50">
            <div class="card-body">
                <img src="/images/addcategory.jpg" alt="..." width="70px" class="d-block mx-auto mb-3">
                <h2 class="text-center">{{__('dash.add_category') }}</h2>

                <form class="centered-form Style2" action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('dash.category_name') }}</label>
                        <input type="name" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">{{  __ ('dash.description') }}</label>
                        <input type="name" class="form-control" id="slug" name="slug">
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary w-50">{{ __('dash.Add_Categ') }}</button>
                    </div>
            </form>
            </div>
        </div>
    </div>
@endsection
