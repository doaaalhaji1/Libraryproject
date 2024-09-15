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
            <th>{{ __('dash.book_title') }}</th>
            <th>{{ __('dash.reservation_end_date') }}</th>
            <th>{{ __('dash.delivery_date') }}</th>
            <th>{{ __('dash.status') }}</th>
            <th>{{ __('dash.action') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr>
            {{-- عرض اسم المستخدم --}}
            <td>{{ $book->reservation->user->name }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->reservation->reservation_end_date }}</td>

            {{-- مقارنة تاريخ التسليم مع تاريخ انتهاء الحجز --}}

            @php
                $deliveryDate = now()->format('Y-m-d'); // تاريخ التسليم (اليوم)
                $endDate = $book->reservation->reservation_end_date; // تاريخ انتهاء الحجز
            @endphp

            <td style="background-color: {{ $deliveryDate > $endDate ? 'red' : 'green' }};">
                {{ $deliveryDate }}
            </td>

            <td>{{ $book->status }}</td>
            <td>
                <form action="{{ route('return_employee', $book) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-primary btn" type="submit">{{ __('dash.receive') }}</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
