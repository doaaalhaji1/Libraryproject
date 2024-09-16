<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


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
@extends('layouts.createditeshow')

@include('partials.navdash')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="margin-top:100px ">
        <div class="card w-50">
            <div class="card-body">
                <img src="/images/updatecategory.png" alt="..." width="70px" class="d-block mx-auto mb-3">
                <h2 class="text-center">{{ __('dash.edit_category') }}</h2>

                <form class="centered-form Style2" action="{{ route('categories.update',$category) }}" method="POST">
                    @csrf
                    @method('PUT')
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
                    <input type="name" class="form-control" id="name" name="name" value="{{$category->name}}">
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">{{  __ ('dash.description') }}</label>
                    <input type="name" class="form-control" id="slug" name="slug" value="{{$category->slug}}">
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary w-50">{{ __('dash.edit') }}</button>
                </div>
           </form>
            </div>
        </div>
    </div>
@endsection
