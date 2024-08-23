@extends('layouts.dash')

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
                        <td>{{ $book->Book_Title }}</td>
                        <td>{{ $book->Author_name }}</td>
                        {{-- <td>{{ $book->Book_Description }}</td> --}}
                        {{-- <td>{{ $book->Book_Content }}</td> --}}
                        <td>
                            <a href="{{ route('books.sho', $book) }}" class="btn btn-primary btn-sm">{{  __ ('messages.show') }}</a>
                            {{--  او راوت في ملف الويب فعند الضغط على زر الشو ينفذ هذا الراوت  المسار ويضع الايدي فيه و التي أرسلتها  له  أيضا من هنا وهي  ($بوك) يذهب الى دالة الاندكس 'books.show  عند الضغط عبى زر الشو هذا اسم مسار  --}}
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
