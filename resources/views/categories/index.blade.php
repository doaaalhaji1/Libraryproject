@extends('layouts.Admindashboard')


@section('content')


            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif
                {{-- <p></p> --}}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{  __ ('messages.category_name') }}</th>
                    <th>{{  __ ('messages.slug') }}</th>
                    <th>{{  __ ('messages.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>

                        <td>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">{{  __ ('messages.edit') }}</a>

                       <form action="{{ route('categories.destroy', $category) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{  __ ('messages.delete') }}</button>
                        </td>
                        </form>

                    </tr>
                @endforeach
            </tbody>
        </table>

@endsection
