<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Author</title>
    <!-- إضافة CSS ل Flatpickr -->
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
    <div class="d-flex justify-content-center align-items-center" style="margin-top:30px  " >
        <div class="card w-50">
            <div class="card-body">
                <img src="/images/adduser.jpg" alt="..." width="70px" class="d-block mx-auto mb-3">
                <h2 class="text-center">{{ __('dash.add_author') }}
                </h2>

                <form class="centered-form Style2" action="{{ route('authors.store') }}" method="POST">
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
                        <label for="name" class="form-label text-end">{{ __('dash.name') }}</label>
                        <input type="name" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">{{ __('dash.description') }}
                        </label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>

                    <div class="mb-3">
                            <label for="nationality" class="form-label">{{ __('dash.nationality') }}
                            </label>
                            <select name="nationality" id="nationality" class="form-select">
                                <option value="English">{{ __('dash.english') }}
                                </option>
                                <option value="Arabic">{{ __('dash.arabic') }}
                                </option>
                                <option value="French">{{ __('dash.french') }}
                                </option>
                            </select>
                    </div>

                    <div class="mb-3">
                        <label for="birthdate" class="form-label">{{ __('dash.birthdate') }}</label>
                        <input type="text" name="birthdate" id="birthdate" class="form-control" value="" >
                    </div>


                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary w-50">{{ __('dash.add_book') }}</button>
                    </div>
            </form>

            </div>
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#birthdate", {
            dateFormat: "Y-m-d", // تنسيق التاريخ
            minDate: "1900-01-01", // تاريخ البداية
            maxDate: "today" // تاريخ النهاية
        });
    });
</script>





