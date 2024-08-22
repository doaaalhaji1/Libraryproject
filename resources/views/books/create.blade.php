<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Create Book</title>
</head>
<style>
            .card-custom {
            padding : 10px 20px 10px 20px;
        }

</style>
<body>
    @include('partials.navdash')

    <div class="container mt-3 mb-3">
        <div class="d-flex flex-column align-items-center">
            <div class="card w-75 card-custom">
                <div class="card-body">
                    <img src="/images/addbook.jpg" alt="..." width="60px" class="d-block mx-auto mb-3">
                    <h2 class="text-center">{{ __ ('messages.Add_Book') }}</h2>
                    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                <label for="name" class="form-label">{{ __ ('messages.book_title') }}</label>
                                <input type="text" class="form-control" id="name" name="title">
                            </div>

                            <div class="col-md-6">
                                <label for="bookdescription" class="form-label">{{ __ ('messages.book_description') }}</label>
                                <input type="text" class="form-control" id="bookdescription" name="bookdescription" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="language" class="form-label">{{ __('Language') }}</label>
                                <select name="language" id="language" class="form-select">
                                    <option value="English">{{ __('English') }}</option>
                                    <option value="Arabic">{{ __('Arabic') }}</option>
                                    <option value="French">{{ __('French') }}</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="image" class="form-label">{{ __ ('messages.selectimage') }}</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="category" class="form-label">Categories</label>
                                <select name="categories[]" id="category" class="form-select" multiple size="4">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="Auther" class="form-label">Authors</label>
                                <select name="Authers[]" id="Auther" class="form-select" multiple size="4">
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="bookcontent" class="form-label">{{ __ ('messages.book_content') }}</label>
                            <input type="text" class="form-control" id="bookcontent" name="bookcontent">
                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary w-45">{{ __ ('messages.create_book') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-0zA8Kw5sH7llwh6z9kn0sZpefOgaOrzHOe1HzdTZPcWfbH8cnTfTifzANkOZ5tIv" crossorigin="anonymous"></script>
</body>
</html>
