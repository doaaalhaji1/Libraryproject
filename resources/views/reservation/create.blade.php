
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- إضافة CSS ل Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

@extends('layouts.createditeshow')

@extends('partials.navuser')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="margin-top:30px ">
        <div class="card w-50">
            <div class="card-body">
                <img src="/images/adduser.jpg" alt="..." width="60px" class="d-block mx-auto mb-3">
                <h2 class="text-center">{{ __('public.Create_New_User') }}</h2>

                <form class="centered-form Style2" action="{{ route('reservations.store', $book) }}" method="POST">
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
                            <label for="title" class="form-label">Title Book</label>
                            <input type="text" class="form-control" name="title" value="{{ $book->title }}" readonly>
                        </div>

                    <div class="mb-3">
                        <label for="birthdate" class="form-label">start reservation</label>
                        <input type="text" name="start_date" id="birthdate" class="form-control" value="" />
                    </div>

                    <div class="mb-3">
                        <label for="birthdate" class="form-label">end reservations</label>
                        <input type="text" name="end_date" id="birthdate" class="form-control" value="" />
                    </div>


                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary w-50">{{ __('public.Register') }}</button>
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

