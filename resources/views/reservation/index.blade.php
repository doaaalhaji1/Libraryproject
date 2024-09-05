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

                     @foreach ($reservations as $reservation)
                        @if ($reservation->status === 'pending')
                                @if ($reservation->books->count() > 0)
                                    <tr>
                                        {{-- عرض اسم المستخدم --}}
                        {{--   يوجد علاقة بين الحجز والمستخدم ( كل حجز تابع لمستخدم) اي الدالة يوزر في مودل الحجز استدعيت  المستخدم اي الدالة
                        ومن المستخدم  وصلت لاسمه ولاانسى عمود الفورنك كيي  موجود بجدول الحجز --}}
                                        <td>{{ $reservation->user->name }}</td>

                                        {{-- جمع عناوين الكتب في متغير واحد --}}
                                        @php
                                            $bookTitles = $reservation->books->pluck('title')->implode('<br>');
                                        @endphp

                                        {{-- عرض عناوين الكتب في خانة واحدة --}}
                                        <td>{!! $bookTitles !!}</td>

                                        <td>{{$reservation->reservation_start_date}}</td>
                                        <td>{{$reservation->reservation_end_date}}</td>
                                        <td>{{$reservation->status}}</td>
                                        <td>
                                             {{-- ارسلنا لأي حجز  سيتم قبوله  لأن الدالة قبول الحجز تستقبل الحجز  لتغير حالته --}}
                                             <div style="display: flex; gap: 10px;">
                                                <form action="{{ route('aprove', $reservation) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-primary" type="submit">yes</button>
                                                </form>

                                                <form action="{{ route('rject', $reservation) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-danger" type="submit">no</button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endif
                             @endif
                        @endforeach

                    </tr>
            </tbody>
        </table>

@endsection
