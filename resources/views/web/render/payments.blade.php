<div class="table-responsive text-center border-rounded">
    <table class="table table-bordered mb-0">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Trans ID</th>
                <th scope="col">Method</th>
                <th scope="col">Details</th>
                <th scope="col">Type</th>
                <th scope="col">Amount</th>
            </tr>
        </thead>
        <tbody>
            @forelse($records as $row)
                <tr>
                    <td>{{ Carbon\Carbon::parse($row['payment']['createdDate'])->format('d-m-Y') }}</td>
                    <td>{{ $row['payment']['paymentId'] }}</td>
                    <td>{{ $row['payment']['paymentMethod'] }}</td>
                    <td>{{ $row['payment']['bundle']['bundleName'] }}</td>
                    <td>{{ $row['payment']['paymentType'] }}</td>
                    <td>{{ $row['payment']['amount'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No data found!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
