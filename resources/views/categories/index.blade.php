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
                    <th>{{ __('dash.category_name') }}</th>
                    <th>{{ __('dash.description') }}</th>
                    <th>{{ __('dash.action') }}</th>
                    </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>

                        <td>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">{{ __('dash.edit') }}</a>

                       <form action="{{ route('categories.destroy', $category) }}" class="d-inline" method="POST">
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
