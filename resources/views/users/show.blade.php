@extends('layouts.createditeshow')

@section('content')
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card w-75">
            <div class="card-body">
                <img src="/images/userdetails.jpg" alt="User Image" width="80px" class="d-block mx-auto mb-4">
                <h2 class="text-center mb-4">{{ __('public.User_Details') }}</h2>
                
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="name" class="form-label fw-bold">{{ __('public.name') }}</label>
                        <p class="form-control-plaintext">{{ $user->name }}</p>
                    </div>
                    
                    <div class="col-md-4">
                        <label for="email" class="form-label fw-bold">{{ __('public.email') }}</label>
                        <p class="form-control-plaintext">{{ $user->email }}</p>
                    </div>
                    
                    <div class="col-md-4">
                        <label for="role" class="form-label fw-bold">{{ __('public.Role') }}</label>
                        <p class="form-control-plaintext">{{ __('public.' . ucfirst($user->role)) }}</p>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">{{ __('public.Back_to_usres') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
