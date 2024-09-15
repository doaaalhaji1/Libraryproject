@extends('partials.navdash')
<style>
    .page
    {
        margin-top: 60px;
    }
</style>
<div class="page">
    <div class="d-flex justify-content-center flex-wrap gap-4 p-4 text-center rounded-5">
             @foreach($reservations as $reservation)
                   @foreach($reservation->books as $book)
                   {{-- الحجز لديه عدة كتب دالة الكتب في مودل الحجز --}}
                   <div class="card shadow" style="width: 14.5rem;">
                    <img src="{{ $book->image ? url('storage/' . $book->image) : 'path/to/default/image.jpg' }}" class="card-img-top" alt="Book Image">
                        <div class="card-body d-flex flex-column justify-content-between">

                            <p class="card-text mb-2"><strong>Title</strong><br> {{ $book->title }}</p>
                            {{-- اسم الموظف الذي وافق على الحجز --}}
                             {{-- employee دالة موجودة في مودل الحجز  كل حجز  له موظف موافق عليه --}}
                            <p class="card-text mb-2"><strong>Book booked by:</strong><br> {{ $reservation->employee->name}}</p>
                            {{-- اسم الموظف الذي استلم على الحجز --}}
                            {{-- اسم الموظف الذي استلم على الحجز --}}
                            <p class="card-text mb-2">
                                <strong>Book received by:</strong><br>
                                    @if($reservation->recipient)

                                        {{ $reservation->recipient->name }}
                                    </p>
                                      @else
                                    <p class="card-text mb-2">
                                        <strong>لم يتم استلام الكتاب بعد.</strong>
                                    </p>
                                    @endif

                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </div>

                        {{-- ---------------------------------------------- --}}

{{--
                        <div class="card shadow" style="width: 14.5rem;">
                            <img src="{{ $book->image ? url('storage/' . $book->image) : 'path/to/default/image.jpg' }}" class="card-img-top" alt="Book Image">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <p class="card-text mb-2"><strong>Title</strong><br> {{ $book->title }}</p>
                                <p class="card-text mb-1"><strong>Authors</strong><br>
                                    @foreach($book->authors as $author)
                                        <p class="mb-0">{{ $author->name }}</p>
                                    @endforeach
                                </p>
                                <div class="mt-auto">
                                    <a href="{{ route('book_reservation', $book) }}" class="btn btn-primary mt-2 w-100 read-button rounded-5">Reservation</a>
                                </div>
                            </div>
                        </div> --}}
