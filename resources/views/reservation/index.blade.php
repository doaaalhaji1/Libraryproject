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
                    <th>{{  __('dash.name') }}</th>
                    <th>{{  __('dash.book_titles') }}</th>
                    <th>{{  __ ('dash.strt_date') }}</th>
                    <th>{{  __('dash.reservation_end_date') }}</th>
                    <th>{{ __('dash.status')}}</th>
                    <th class="text-center">{{ __('dash.action') }}</th>
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
                                        <td class="text-center">
                                            {{$reservation->reservation_end_date}}
                                        </td>
                                        <td>{{$reservation->status}}</td>
                                        <td>
                                             {{-- ارسلنا لأي حجز  سيتم قبوله  لأن الدالة قبول الحجز تستقبل الحجز  لتغير حالته --}}
                                             <div style="display: flex; gap: 4px;">
                                                <form action="{{ route('aprove', $reservation) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-primary" type="submit">{{ __('dash.accept') }}</button>
                                                </form>

                                                <form action="{{ route('rject', $reservation) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-danger" type="submit">{{ __('dash.reject') }}</button>
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
