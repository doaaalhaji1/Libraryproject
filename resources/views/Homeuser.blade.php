
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

@extends('partials.navuser')

<div class="page">
    <div class="positionbutton">
        <h2><span style="color:orange;">Welcome to our library,</span> we provide all the books you are looking for</h2>
        <div class="d-flex align-items-center ms-3"> <!-- إضافة ديف للحاوية -->
            <h5 class="mb-0">To reserve more than one book, click on the following button ...</h5>
            <a href="{{ route('books_reservation') }}" class="btn btn-primary ms-2 rounded-5">Books Reservation </a>
        </div>
    </div>
    <br>
    <div class="container">
        <!-- نموذج البحث النصي والفئة -->
        <form id="searchForm" action="{{ route('books.search') }}" method="GET">
            <div class="input-group mb-1">
                <input type="text" name="search" class="form-control" placeholder="Search for books or authors..." value="{{ request('search') }}">

                <select name="category" class="form-select ms-3" onchange="submitForm()">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
    </div>

    <div class="d-flex justify-content-center flex-wrap gap-4 p-4 text-center rounded-5">
        @foreach($books as $book)
        <div class="card shadow" style="width: 14.5rem;">
            <img src="{{ $book->image ? url('storage/' . $book->image) : 'path/to/default/image.jpg' }}" class="card-img-top" alt="Book Image" loading="lazy">
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
        </div>
        @endforeach
    </div>
</div>
