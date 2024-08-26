
@extends('layouts.createditeshow')

@include('partials.navdash')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="margin-top:100px ">
        <div class="card w-50">
            <div class="card-body">
                <img src="/images/adduser.jpg" alt="..." width="60px" class="d-block mx-auto mb-3">
                <h2 class="text-center">{{ __('public.Create_New_User') }}</h2>

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
                    <label for="name" class="form-label">{{  __ ('messages.category_name') }}</label>
                    <input type="name" class="form-control" id="name" name="name" value="{{$category->name}}">
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">{{  __ ('messages.category_description') }}</label>
                    <input type="name" class="form-control" id="slug" name="slug" value="{{$category->slug}}">
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary w-50">{{ __('public.Register') }}</button>
                </div>
           </form>
            </div>
        </div>
    </div>
@endsection
