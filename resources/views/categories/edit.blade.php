
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Update Category</title>

</head>

<style>

    .Style1 {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top:65px;
        justify-content: center;

    }

    .Style2 {
        width:370px;
        padding: 20px;
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .Style .Style1 .Style2 .btn1
    {

    margin-left: 93;
    margin-top: 20px;

    }

    </style>

      @include('partials.navdash')
<div class="container Style">

    <div class="form-container Style1">

        <img src="/images/updatecategory.png" alt="..." width="70px">
        <h2>{{  __ ('messages.update_category') }}</h2>
        <p></p>
        <form class="centered-form Style2" action="{{ route('categories.update',$category) }}" method="POST">
                @csrf
                @method('PUT')
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
                <label for="name" class="form-label">{{  __ ('messages.category_name') }}</label>
                <input type="name" class="form-control" id="name" name="name" value="{{$category->name}}">
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">{{  __ ('messages.category_description') }}</label>
                <input type="name" class="form-control" id="slug" name="slug" value="{{$category->slug}}">
            </div>
          <button type="submit" class="btn btn1 btn-primary">{{  __ ('messages.update_category') }}</button>
       </form>
    </div>
</div>





