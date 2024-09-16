<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<style>
    [dir="rtl"] label.form-label {
        text-align: right;
        display: block;
    }

    [dir="ltr"] label.form-label {
        text-align: left;
        display: block;
    }


</style>
</head>

@extends('layouts.createditeshow')

@include('partials.navdash')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="margin-top:30px ">
        <div class="card w-75">
            <div class="card-body">
                <img src="/images/bookupdate.jpg" alt="..." width="70px" class="d-block mx-auto mb-3">
                <h2 class="text-center mb-3">{{ __('dash.edit_book_data') }}</h2>

                <form action="{{ route('books.update', $book) }}" method="POST" enctype="multi  part/form-data">
                    @csrf
                    @method('PUT')
                    @if($errors->any())
                        <div class="alert alert-danger mb-3">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">{{ __('dash.book_title') }}</label>
                            <input type="text" class="form-control" id="name" name="title" value="{{ $book->title }}">
                        </div>

                        <div class="col-md-6">
                            <label for="bookdescription" class="form-label">{{ __('dash.book_description') }}</label>
                            <input type="text" class="form-control" id="bookdescription" name="bookdescription" value="{{ $book->description }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-9">
                            <label for="language" class="form-label">{{ __('dash.language') }}</label>
                            <select name="language" id="language" class="form-select">
                                <option value="English" {{ $book->language == 'English' ? 'selected' : '' }}>{{ __('dash.english') }}</option>
                                <option value="Arabic" {{ $book->language == 'Arabic' ? 'selected' : '' }}>{{ __('dash.arabic') }}</option>
                                <option value="French" {{ $book->language == 'French' ? 'selected' : '' }}>{{ __('dash.french') }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="category" class="form-label">{{ __('dash.categories') }}</label>
                            <select name="categories[]" id="category" class="form-select" multiple size="4">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ in_array($category->id, old('categories', $book->categories->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="Auther" class="form-label">{{ __('dash.authors') }}</label>
                            <select name="Authers[]" id="Auther" class="form-select" multiple size="4">
                                @foreach ($authors as $author)
                                <option value="{{ $author->id }}"
                                    {{ in_array($author->id, old('authors', $book->authors->pluck('id')->toArray())) ? 'selected' : '' }}>
                                    {{ $author->name }}
                                </option>

                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="bookcontent" class="form-label">{{ __('dash.book_content') }}</label>
                        <input type="text" class="form-control" id="bookcontent" name="bookcontent" value="{{ $book->book_content }}">
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary w-50 mt-3">{{ __ ('dash.edit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
