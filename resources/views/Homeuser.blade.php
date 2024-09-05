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
        @foreach($books as $book)
        <div class="card shadow" style="width: 14.5rem;">
            <img src="{{ $book->image ? url('storage/' . $book->image) : 'path/to/default/image.jpg' }}" class="card-img-top" alt="Book Image">
                <div class="card-body d-flex flex-column justify-content-between">

                <p class="card-text mb-2"><strong>Title</strong><br> {{ $book->title}}</p>

                <p class="card-text mb-1"><strong>Authors</strong><br>

                    @foreach($book->authors as $author)
                        <p class="mb-0">{{ $author->name }}</p>
                    @endforeach
                </p>

                {{-- <p class="card-text mb-1"><strong>Status:</strong> {{$book->status}}</p> --}}
            <div class="mt-auto">
                <a href="{{ route('book_reservation', $book) }}" class="btn btn-primary mt-2 w-100 read-button rounded-5">Reservation</a>
                {{-- يجب ارسال ايديت الكتاب الواجب حجزه الخطوة الاولى نرسله للراوت--}}
            </div>

            </div>
        </div>
        @endforeach
    </div>
</div>






