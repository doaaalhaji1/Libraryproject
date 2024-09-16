@extends('layouts.Admindashboard')


@section('content')


            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif

        <table class="table table-striped">
            <thead>
                <tr>
                <th>{{ __('dash.name') }}</th>
                <th>{{ __('dash.description') }}</th>
                <th>{{ __('dash.nationality') }}</th>
                <th>{{ __('dash.birthdate') }}</th>
                <th class="text-center">{{ __('dash.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->description }}</td>
                        <td>{{ $author->nationality }}</td>
                        <td style="width: 100px; padding: 10px;">
                            {{ $author->birthdate ? $author->birthdate->format('Y-m-d') : '' }}
                        </td>

                        <td class="text-center d-flex justify-content-center align-items-center">
                        <a href="{{ route('authors.edit', $author) }}" class="btn btn-warning ms-1">{{ __('dash.edit') }}</a>

                       <form action="{{ route('authors.destroy', $author) }}" class="d-inline ms-1" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('dash.delete') }}</button>
                        </td>
                        </form>

                    </tr>
                @endforeach
            </tbody>
        </table>

@endsection
