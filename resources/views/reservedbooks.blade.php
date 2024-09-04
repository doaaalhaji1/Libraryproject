@extends('partials.navdash')
<style>
    .page
    {
        margin-top: 60px;
    }
</style>
<div class="page">
    <div class="d-flex justify-content-center flex-wrap gap-4 p-4 text-center rounded-5">
             @foreach($books as $book)
                <div class="card Larger shadow" style="width:15rem;">
                     <img src="{{ url('storage/' . $book->image) }}" class="card-img-top" alt="Book Image">
                    <div class="card-body position">

                        <p class="card-text mb-2"><strong>Title</strong><br> {{ $book->title}}</p>

                        <p class="card-text mb-1"><strong>Authors</strong><br>

                            @foreach($book->authors as $author)
                                <p class="mb-0">{{ $author->name }}</p>
                            @endforeach
                        </p>


                            {{-- <p class="card-text mb-1"><strong>Reservation End</strong><br> {{$reservation->reservation_end_date}}</p> --}}

                            <a href="{{ route('books.sho', $book) }}" class="btn btn-primary mt-2">Read</a>


                        </div>
                    </div>
        @endforeach
    </div>
</div>
