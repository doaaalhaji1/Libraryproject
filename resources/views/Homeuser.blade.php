@extends('partials.navdash')

<div class="page">
    <div class="d-flex justify-content-center flex-wrap gap-4 p-4 text-center rounded-5">
        @foreach($books as $book)
        <div class="card Larger shadow" style="width:15rem;">
            <img src="{{ url('storage/' . $book->image) }}" class="card-img-top" alt="Book Image">
            <div class="card-body position">
                <h6 class="card-title p-2"><strong>Title:</strong> {{$book->title}}</h6>
                    <h6 class="card-title"><strong>Authors:</strong></h6>
                    @foreach($book->authors as $author)
                    <p class="m-0 p-0">{{$author->name}}</p>
                    @endforeach

                <p class="card-text p-2"><strong>Status:</strong> {{$book->status}}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
