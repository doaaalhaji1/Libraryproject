
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Create Author</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- إضافة CSS ل Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>

<style>

    .Style1 {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top:40px;
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

        <img src="/images/addcategory.jpg" alt="..." width="70px">
        <h2>{{  __ ('messages.add_category') }}</h2>
        <p></p>
        <form class="centered-form Style2" action="{{ route('authors.store') }}" method="POST">
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
                    <label for="name" class="form-label">{{  __ ('messages.name') }}</label>
                    <input type="name" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">{{  __ ('messages.discription') }}</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>

                <div class="mb-3">
                        <label for="nationality" class="form-label">{{ __('nationality') }}</label>
                        <select name="nationality" id="nationality" class="form-select">
                            <option value="English">{{ __('English') }}</option>
                            <option value="Arabic">{{ __('Arabic') }}</option>
                            <option value="French">{{ __('French') }}</option>
                        </select>
                </div>

                <div class="mb-3">
                    <label for="birthdate" class="form-label">{{ __('Birthdate') }}</label>
                    <input type="text" name="birthdate" id="birthdate" class="form-control" value="" />
                </div>

            <button type="submit" class="btn btn1 btn-primary">{{  __ ('messages.create_author') }}</button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#birthdate", {
            dateFormat: "Y-m-d", // تنسيق التاريخ
            minDate: "1900-01-01", // تاريخ البداية
            maxDate: "today" // تاريخ النهاية
        });
    });
</script>




