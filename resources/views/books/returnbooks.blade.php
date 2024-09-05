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
                    <th>{{  __ ('messages.titles') }}</th>
                    <th>{{  __ ('messages.strt date') }}</th>
                    <th>{{  __ ('messages.end date') }}</th>
                    <th>{{  __ ('messages.stutuse') }}</th>
                    <th>{{  __ ('messages.action') }}</th>
                </tr>
            </thead>
            <tbody>
                    <tr>

                     @foreach ($books as $book)

                                    <tr>
                                        {{-- عرض اسم المستخدم --}}

                                        <td>{{ $book->reservation->user->name }}</td>

                                        <td>{{$book->title}}</td>
                                        <td>{{ $book->reservation->reservation_end_date }}</td>
                                        <td>{{ now()->format('Y-m-d') }}</td><!-- صيغة التاريخ: سنة-شهر-يوم -->
                                        <td>{{$book->status}}</td>
                                        <td>
                                            {{-- <a href="{{ route('') }}" class="btn btn-primary btn">استلام</a> --}}
                                        </td>
                                    </tr>


                        @endforeach

                    </tr>
            </tbody>
        </table>

@endsection
