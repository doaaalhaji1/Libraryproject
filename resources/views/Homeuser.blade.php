<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Library </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
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
@extends('partials.navuser')

<div class="page">
    <br>
    <div class="positionbutton container">
        <h2><span style="color:orange;">{{ __('user.welcome_message') }}</span>{{ __('user.library_description') }}</h2>
        <div class="d-flex align-items-center ms-3"> <!-- إضافة ديف للحاوية -->
            <h5 class="mb-0">{{ __('user.reserve_books_message') }}</h5>
            <a href="{{ route('books_reservation') }}" class="btn btn-primary ms-2 rounded-5">{{ __('user.books_reservation') }} </a>
        </div>
    </div>
    <br>
    <div class="container">
        <!-- نموذج البحث النصي والفئة -->
        <form id="searchForm" action="{{ route('books.search') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="{{__('user.Searchf')}}" value="{{ request('search') }}">
                <select name="category" class="form-select" onchange="submitForm()">
                    <option value="">{{__('user.Select_Category')}}</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <button class="btn btn-primary" type="submit">{{__('user.Search')}}</button>
            </div>
        </form>
    </div>
    </div>
    @if(isset($categoryDescription) && $categoryDescription)
    <div class="container">
    <div class="alert alert-info">
        <p>{{__('public.cd')}}</p>
        <p>{{ $categoryDescription }}</p>
    </div>
    </div>
@endif
 @if(session('success'))
 <div class="container">
                <div class="alert alert-success">

                    {{ session('success') }}

                </div></div>

            @endif
    <div class="d-flex justify-content-center flex-wrap gap-4 p-4 text-center rounded-5">
        @foreach($books as $book)
        <div class="card shadow" style="width: 14.5rem;">
            <img src="{{ $book->image ? url('storage/' . $book->image) : 'path/to/default/image.jpg' }}" class="card-img-top" alt="Book Image" loading="lazy">
            <div class="card-body d-flex flex-column justify-content-between">
                <p class="card-text mb-2"><strong>{{__('user.Title')}}</strong><br> {{ $book->title }}</p>
                <p class="card-text mb-1"><strong>{{__('user.Authors')}}</strong><br>
                    @foreach($book->authors as $author)
                        <p class="mb-0">{{ $author->name }}</p>
                    @endforeach
                </p>
                <div class="mt-auto">
                    <a href="{{ route('book_reservation', $book) }}" class="btn btn-primary mt-2 w-100 read-button rounded-5">{{__('user.Reservation')}}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
