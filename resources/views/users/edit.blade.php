<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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
</head>
@extends('layouts.createditeshow')

@include('partials.navdash')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="margin-top:25px ">
        <div class="card w-50">
            <div class="card-body">
                <img src="/images/edituser.png" alt="..." width="70px" class="d-block mx-auto mb-3">
                <h2 class="text-center">{{ __('dash.Edie_User_Data') }}</h2>

                <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

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
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('public.email') }}</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('public.password') }}</label>
                        <input type="password" id="password" name="password" class="form-control">
                        <small class="form-text text-muted">{{ __('public.leave_blank_for_no_change') }}</small>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">{{ __('public.Confirm_Password') }}</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">{{ __('public.Role') }}</label>
                        <select id="role" name="role" class="form-select">
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>{{ __('public.Admin') }}</option>
                            <option value="employee" {{ $user->role == 'employee' ? 'selected' : '' }}>{{ __('public.Employee') }}</option>
                            <option value="member" {{ $user->role == 'member' ? 'selected' : '' }}>{{ __('public.Member') }}</option>
                        </select>
                    </div>
                    <!--  حقل رفع الصورة -->
                    <div class="mb-3">
                        <label for="image" class="form-label">{{ __('dash.select_image') }}</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary w-50">{{ __('dash.edit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
