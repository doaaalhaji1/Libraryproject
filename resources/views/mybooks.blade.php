<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> My Books </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@extends('partials.navuser')
<style>
    .page {
        margin-top: 60px;
    }
    .card-img-top {
        height: 210px;
        object-fit: cover;
    }
</style>
</head>
<div class="page">
@if($reservations->isEmpty() || !$reservations->pluck('books')->flatten()->contains(fn($book) => $book->status === 'reserved'))
        <div class="text-center container">
            <br>
             <br>
            <p>{{ __('user.NO_BOOKS_AVAILABLE') }}</p>
        </div>
@else

    <div class="d-flex justify-content-center flex-wrap gap-4 p-4 text-center rounded-5">
        @foreach($reservations as $reservation)

            @foreach($reservation->books as $book)
            @if ($book->status === 'reserved')
                <div class="card shadow" style="width: 14.5rem;">
                    <img src="{{ $book->image ? url('storage/' . $book->image) : 'path/to/default/image.jpg' }}" class="card-img-top" alt="Book Image">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <p class="card-text mb-2"><strong>{{ __('dash.book_title') }}</strong><br> {{ $book->title }}</p>
                        <p class="card-text mb-1"><strong>{{ __('dash.authors') }}</strong><br>
                            @foreach($book->authors as $author)
                                <span class="mb-0">{{ $author->name }}</span><br>
                            @endforeach
                        </p>
                        <p class="card-text mb-1"><strong>{{ __('user.RESERVATION_END') }}</strong><br> {{$reservation->reservation_end_date}}</p>
                        <div class="mt-auto">
                            <a href="{{ route('books.sho', $book) }}" class="btn btn-primary mt-2 w-100 rounded-5">{{ __('user.READ') }}</a>
                            <a href="{{ route('return_run' ,$book) }}" onclick="confirmReturn(this); return false;" class="btn btn-warning mt-2 w-100 rounded-5">{{__('user.RETURN')}}</a>

                        </div>
                    </div>
                </div>
            @endif
            @endforeach
        @endforeach
    </div>
    @endif

</div>
<script>
    function confirmReturn(element) {
        const confirmation = confirm("{{ __('user.CONFIRM_RETURN') }}");
        if (confirmation) {
            // محاكاة الضغط على الرابط الأصلي
            window.location.href = element.href;
        }
    }
    </script>
