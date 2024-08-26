
@extends('layouts.createditeshow')

@include('partials.navdash')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="margin-top:25px ">
        <div class="card w-50">
            <div class="card-body">
                <img src="/images/adduser.jpg" alt="..." width="60px" class="d-block mx-auto mb-3">
                <h2 class="text-center">{{ __('public.Create_New_User') }}</h2>

                <form method="POST" action="{{ route('users.store') }}">
                    @csrf

                    @if($errors->any())
                        <div class="alert alert-danger mb-3">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('public.name') }}</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('public.email') }}</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('public.password') }}</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">{{ __('public.Confirm_Password') }}</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">{{ __('public.Role') }}</label>
                        <select id="role" name="role" class="form-select">
                            <option value="admin">{{ __('public.Admin') }}</option>
                            <option value="employee">{{ __('public.Employee') }}</option>
                            <option value="member" selected>{{ __('public.Member') }}</option>
                        </select>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary w-50">{{ __('public.Register') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
