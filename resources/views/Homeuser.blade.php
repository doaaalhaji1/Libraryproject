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
    <br>
    <div class="container mb-4">
        <!-- نموذج البحث النصي والفئة -->
        <form id="searchForm" action="{{ route('books.search') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="{{__('user.Search')}}" value="{{ request('searchf') }}">
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

    <div class="d-flex justify-content-center flex-wrap gap-4 p-4 text-center rounded-5">
        @foreach($books as $book)
        <div class="card shadow" style="width: 14.5rem;">
            <img src="{{ $book->image ? url('storage/' . $book->image) : 'path/to/default/image.jpg' }}" class="card-img-top" alt="Book Image">
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
