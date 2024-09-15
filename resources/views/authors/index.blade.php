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
                <th>{{ __('dash.name') }}</th>
                <th>{{ __('dash.description') }}</th>
                <th>{{ __('dash.nationality') }}</th>
                <th>{{ __('dash.birthdate') }}</th>
                <th>{{ __('dash.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->description }}</td>
                        <td>{{ $author->nationality }}</td>
                        <td>{{ $author->birthdate ? $author->birthdate->format('Y-m-d') : '' }}</td>

                        <td>
                        <a href="{{ route('authors.edit', $author) }}" class="btn btn-warning btn-sm">{{ __('dash.edit') }}</a>

                       <form action="{{ route('authors.destroy', $author) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">{{ __('dash.delete') }}</button>
                        </td>
                        </form>

                    </tr>
                @endforeach
            </tbody>
        </table>

@endsection
