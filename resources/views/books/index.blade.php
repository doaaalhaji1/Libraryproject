@extends('layouts.Admindashboard')

@section('content')

            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif
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
                    <th class="text-center">{{ __('dash.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->status }}</td>
                    <td>{{ $book->language }}</td>
                    <td class="text-center d-flex justify-content-center align-items-center pb-4 pt-2">
                        <a href="{{ route('books.sho', $book) }}" class="btn btn-primary ms-1">{{ __('dash.show') }}</a>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning ms-1">{{ __('dash.edit') }}</a>
                        <form action="{{ route('books.destroy', $book) }}" class="d-inline ms-1" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('dash.delete') }}</button>

                    </td>
                </tr>
            </form>
                @endforeach
            </tbody>
        </table>

@endsection
