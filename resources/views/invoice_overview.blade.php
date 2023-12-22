@extends('layouts.app')
@extends('layouts.topbar')

@section('content')

<div class="flex justify-center items-center w-full mt-10">
    <table>
        <tr class="mx-10">
            <th>Invoice</th>
            <th>Created At</th>
            <th>User</th>
            <th>Type</th>
            <th>Price</th>
            <th>Status</th>
            <th>Due Date</th>
        </tr>
        @foreach ($invoices as $invoice)
        <tr class="mx-10">
            <td>{{ $invoice->id }}</td>
            <td>{{ $invoice->created_at }}</td>
            <td>{{ $invoice->user_id }}</td>
            <td>{{ $invoice->type }}</td>
            <td>${{ $invoice->price }}</td>
            <td>{{ $invoice->status }}</td>
            <td>{{ $invoice->due_date }}</td>
        </tr>
        @endforeach
    </table>
</div>

@endsection
