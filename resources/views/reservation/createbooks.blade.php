
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
                <img src="/images/reservationbook.png" alt="..." width="80px" class="d-block mx-auto mb-3">
                <h2 class="text-center">{{ __('public.Create_New_User') }}</h2>

                <form class="centered-form Style2" action="{{route("storbooks_reservation")}}" method="POST">
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
                    <label for="book" class="form-label">Titles</label>
                    <div class="d-flex flex-column align-items-center" style="max-height: 300px; overflow-y: auto;"> <!-- تحديد الحد الأقصى للارتفاع -->
                        @foreach ($books as $book)
                            <div class="form-check mb-2" style="width: 100%; margin-left:10px; justify-content:center;"> <!-- عرض كامل لكل عنصر -->
                                <input class="form-check-input" type="checkbox" name="books[]" value="{{ $book->id }}" id="book{{ $book->id }}">
                                <label class="form-check-label" for="book{{ $book->id }}">
                                    {{ $book->title }}
                                </label>
                            </div>
                        @endforeach
                    </div>
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

