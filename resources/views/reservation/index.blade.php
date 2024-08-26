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
                    <th>{{  __ ('name') }}</th>
                    <th>{{  __ ('messages.book') }}</th>
                    {{-- <th>{{  __ ('messages.action') }}</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        {{-- يوجد علاقة بين الحجز والمستخدم ( كل حجز تابع لمستخدم) الدالة يوزر في مودل الحجز استدعيت  المستخدم
                        ومن المستخدم  وصلت لاسمه ولاانسى عمود الفورنك كيي  موجود بجدول الحجز --}}
                        <td>{{ $reservation->user->name }}</td>

                        @foreach ($reservation->books as $book)
                            <td>{{ $book->title }} </td>
                        @endforeach
                        {{-- <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">{{  __ ('messages.edit') }}</a>

                       <form action="{{ route('categories.destroy', $category) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">{{  __ ('messages.delete') }}</button>
                        </td>
                        </form> --}}

                    </tr>
                @endforeach
            </tbody>
        </table>

@endsection
