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
                    <th>{{  __ ('messages.name') }}</th>
                    <th>{{  __ ('messages.discription') }}</th>
                    <th>{{  __ ('messages.action') }}</th>
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
                        <a href="{{ route('authors.edit', $author) }}" class="btn btn-warning btn-sm">{{  __ ('messages.edit') }}</a>

                       <form action="{{ route('authors.destroy', $author) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">{{  __ ('messages.delete') }}</button>
                        </td>
                        </form>

                    </tr>
                @endforeach
            </tbody>
        </table>

@endsection
