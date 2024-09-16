<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Reservation</title>
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

@extends('partials.navuser')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="margin-top:30px ">
        <div class="card w-50">
            <div class="card-body">
                <img src="/images/reservationbook.png" alt="..." width="80px" class="d-block mx-auto mb-3">
                <h2 class="text-center">{{ __('user.Create_New_reservation') }}</h2>

                <form class="centered-form Style2" action="{{ route('reservations.store') }}" method="POST">
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

                        <input type="hidden" name="book_id" value="{{ $book->id }}">

                        <div class="mb-3">
                            <label for="title" class="form-label">{{ __('dash.book_title')}}</label>
                            <input type="text" class="form-control" name="title" value="{{ $book->title }}" readonly>
                        </div>

                    <div class="mb-3">
                        <label for="birthdate" class="form-label">{{  __ ('dash.strt_date') }}</label>
                        <input type="text" name="start_date" id="birthdate" class="form-control" value="" />
                    </div>

                    <div class="mb-3">
                        <label for="birthdate" class="form-label">{{  __('dash.reservation_end_date') }}</label>
                        <input type="text" name="end_date" id="birthdate" class="form-control" value="" />
                    </div>


                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary w-50">{{ __('user.creat') }}</button>
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
            minDate: "today", // تاريخ البداية
            maxDate: "2024-11-01" // تاريخ النهاية
        });
    });
</script>

