<div>
    <table>
        <tr>
            <th>Invoice</th>
            <th>Created At</th>
            <th>User</th>
            <th>Type</th>
            <th>Price</th>
            <th>Status</th>
            <th>Due Date</th>
        </tr>
        @foreach ($invoices as $invoice)
        <tr>
            <td>{{ $invoice->id }}</td>
            <td>{{ $invoice->created_at }}</td>
            <td>{{ $invoice->user_id }}</td>
            <td>{{ $invoice->type }}</td>
            <td>{{ $invoice->price }}</td>
            <td>{{ $invoice->status }}</td>
            <td>{{ $invoice->due_date }}</td>
        </tr>
        @endforeach
    </table>
</div>
