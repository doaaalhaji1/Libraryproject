@extends('layouts.Admindashboard')

@section('content')


            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif
                <p></p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{  __ ('messages.book_title') }}</th>
                    <th>{{  __ ('messages.author_name') }}</th>
                    <th>{{  __ ('messages.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->description }}</td>
                        <td>{{ $book->status}}</td>
                        <td>{{ $book->language }}</td>
                        <td>{{ $book->language }}</td>
                        <td>
                            {{-- <a href="{{ route('books.show', $book) }}" class="btn btn-primary btn-sm">{{  __ ('messages.show') }}</a> --}}

                            <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm">{{  __ ('messages.edit') }}</a>
                           {{--  ارسلنا الايدي كمان منشان نحطو بين {}  منشان عند الضغط على زر التعديل يحط ايديت الكتاب يلي منا نعدله بالurl--}}

                           <form action="{{ route('books.destroy', $book) }}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">{{  __ ('messages.delete') }}</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

@endsection
