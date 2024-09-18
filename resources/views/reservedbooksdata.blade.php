<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Data Books</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


<style>
    .page
    {
        margin-top: 60px;
    }

    .page {
        margin-top:75px;
    }
    .card-img-top {
        height: 210px;
        object-fit: cover;
    }
    .positionbutton
    {
        text-align:start;
        margin-left:50px;
    }
</style>

</head>

@extends('partials.navdash')
<div class="page">
    <div class="d-flex justify-content-center flex-wrap gap-4 p-4 text-center rounded-5">
             @foreach($reservations as $reservation)
                   @foreach($reservation->books as $book)
                   {{-- الحجز لديه عدة كتب دالة الكتب في مودل الحجز --}}
                   <div class="card shadow" style="width: 14.5rem;">
                    <img src="{{ $book->image ? url('storage/' . $book->image) : 'path/to/default/image.jpg' }}" class="card-img-top" alt="Book Image">
                        <div class="card-body d-flex flex-column justify-content-between">

                            <p class="card-text mb-2"><strong>{{__('dash.book_title')}}</strong><br> {{ $book->title }}</p>
                            {{-- اسم الموظف الذي وافق على الحجز --}}
                             {{-- employee دالة موجودة في مودل الحجز  كل حجز  له موظف موافق عليه --}}
                            <p class="card-text mb-2"><strong>{{__('dash.Book_booked_by')}}</strong><br> {{ $reservation->employee->name}}</p>
                            {{-- اسم الموظف الذي استلم على الحجز --}}
                            <p class="card-text mb-2">
                                <strong>{{__('dash.Book_received_by')}}</strong><br>
                                    @if($reservation->recipient)

                                        {{ $reservation->recipient->name }}
                                    </p>
                                    @endif
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                    </div>
                </div>

