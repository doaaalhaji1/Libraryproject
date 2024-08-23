
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Create Book</title>

</head>

<style>


.form-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top:20px;
        justify-content: center;

    }

    .centered-form {
        width:370px;
        padding: 20px;
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .container .form-container .centered-form .btn1
    {

    margin-left:80;
    margin-top: 20px;

    }
    </style>

    {{-- @include('partials.navdash') --}}
<div class="container">

    <div class="form-container">

        <img src="/images/addbook.jpg" alt="..." width="70px">
        <h2>{{  __ ('messages.Add_Book') }}</h2>
        <p></p>
        <form class="centered-form" action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                @csrf
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif
                <div class="mb-3">
                    <label for="name" class="form-label">{{  __ ('messages.book_title') }}</label>
                    <input type="name" class="form-control" id="name" name="title">
                </div>

                <div class="mb-3">
                    <label for="bookdescription" class="form-label">{{  __ ('messages.book_description') }}</label>
                    <input type="text" class="form-control" id="bookdescription" name="bookdescription">
                </div>

                <div class="mb-3">
                    <label for="language">{{ __('Language') }}</label>
                    <select name="language" id="language" class="form-select">
                        <option value="en">{{ __('English') }}</option>
                        <option value="ar">{{ __('Arabic') }}</option>
                        <option value="fr">{{ __('French') }}</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="image">{{  __ ('messages.selectimage') }}</label></label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>


                <div class="mb-3">
                    <label for="categoryname" class="form-label">{{  __ ('messages.category_name') }}</label>
                    <select name="categoryname" id="categoryname" class="form-control">
                        <option value="" disabled selected>{{  __ ('messages.select_the_book_category...') }}</option>
                        @foreach ($categories as $category )
                        {
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        }
                        @endforeach
                    </select>
                </div>


                <div class="mb-3">
                    <label for="bookcontent" class="form-label">{{  __ ('messages.book_content') }}</label>
                    <input type="text" class="form-control" id="bookcontent" name="bookcontent">
                </div>

                <div class="mb-3">
                    <label for="Auther" class="form-label">Tags</label>
                    <select name="Authers[]" id="Auther" class="form-control" multiple size="3">
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>


            <button type="submit" class="btn btn1 btn-primary">{{  __ ('messages.create_book') }}</button>
        </form>
    </div>
</div>




