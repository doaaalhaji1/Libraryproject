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
            <th>{{ __('name') }}</th>
            <th>{{ __('messages.titles') }}</th>
            <th>{{ __('تاريخ انتهاء الحجز') }}</th>
            <th>{{ __('تاريخ التسليم') }}</th>
            <th>{{ __('messages.stutuse') }}</th>
            <th>{{ __('messages.action') }}</th>
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
                    <button class="btn btn-primary btn" type="submit">استلام</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
