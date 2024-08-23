<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ff7e5f 20%, #ffffff 20%, #ffffff 80%, #ff7e5f 80%);
            color: #333;
            text-align: center;
        }

        .cover-img {
            width: 50%;
            height: 1000px;
        }

        .book-content {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        h1 {
            margin-top: 20px;
            font-size: 36px;
            color: #000;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
        }
    </style>
</head>
<body>

    <!-- صورة الغلاف -->
    {{-- <img src="book-cover.jpg" alt="Book Cover" class="cover-img"> --}}
    <img src="{{ url('storage/' . $book->image) }}" class="cover-img" alt="...">
    <!-- محتوى الكتاب -->
    <div class="book-content">
        <h1> {{$book->Book_Title}}</h1>
        <p> {{$book->Book_Description}}</p>
        <p>
            {{$book->Book_Content}}
        </p>
    </div>


</body>
</html>
