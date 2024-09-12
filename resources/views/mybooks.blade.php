

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

<div class="page">
    <div class="d-flex justify-content-center flex-wrap gap-4 p-4 text-center rounded-5">
        @foreach($reservations as $reservation)

            @foreach($reservation->books as $book)
            @if ($book->status === 'reserved')
                <div class="card shadow" style="width: 14.5rem;">
                    <img src="{{ $book->image ? url('storage/' . $book->image) : 'path/to/default/image.jpg' }}" class="card-img-top" alt="Book Image">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <p class="card-text mb-2"><strong>{{ __('user.TITLE') }}</strong><br> {{ $book->title }}</p>
                        <p class="card-text mb-1"><strong>{{ __('user.AUTHORS') }}</strong><br>
                            @foreach($book->authors as $author)
                                <span class="mb-0">{{ $author->name }}</span><br>
                            @endforeach
                        </p>
                        <p class="card-text mb-1"><strong>{{ __('user.RESERVATION_END') }}<</strong><br> {{$reservation->reservation_end_date}}</p>
                        <div class="mt-auto">
                            <a href="{{ route('books.sho', $book) }}" class="btn btn-primary mt-2 w-100 rounded-5">{{ __('user.READ') }}</a>
                            <a href="{{ route('return_run' ,$book) }}" onclick="confirmReturn(this); return false;" class="btn btn-warning mt-2 w-100 rounded-5">__('user.RETURN')</a>

                        </div>
                    </div>
                </div>
            @endif
            @endforeach
        @endforeach
    </div>
</div>
<script>
    function confirmReturn(element) {
        const confirmation = confirm("{{ __('messages.CONFIRM_RETURN') }}");
        if (confirmation) {
            // محاكاة الضغط على الرابط الأصلي
            window.location.href = element.href;
        }
    }
    </script>
