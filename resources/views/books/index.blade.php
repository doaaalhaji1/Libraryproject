@extends('layouts.Admindashboard')

@section('content')

            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif
                {{-- <p></p> --}}
                <form id="searchForm" action="{{ route('books.searchemploy') }}" method="GET">
    <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="{{ __('dash.search_placeholder') }}" value="{{ request('search') }}">
        <button class="btn btn-primary" type="submit">{{ __('dash.search') }}</button>
    </div>
</form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('dash.book_title') }}</th>
                    <th>{{ __('dash.description') }}</th>
                    <th>{{ __('dash.status') }}</th>
                    <th>{{ __('dash.language') }}</th>
                    <th>{{ __('dash.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->description }}</td>
                        <td>{{ $book->status}}</td>
                        <td>{{ $book->language }}</td>

                        <td >
                            <a href="{{ route('books.sho', $book) }}" class="btn btn-primary btn-sm m-1">{{ __('dash.show') }}</a>

                            <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm m-1">{{ __('dash.edit') }}</a>

                           <form action="{{ route('books.destroy', $book) }}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">{{ __('dash.delete') }}</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

@endsection
