<div class="table-responsive text-center border-rounded">
    <table class="table table-bordered mb-0">
        <thead>
            <tr>
                <th scope="col">Date/Time</th>
                <th scope="col">Transaction ID</th>
                <th scope="col">Order ID</th>
                <th scope="col">Details</th>
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($records as $row)
                <tr>
                    <td>{{ Carbon\Carbon::parse($row['payment']['createdDate'])->format('d-m-Y') .' | '. Carbon\Carbon::parse($row['payment']['createdDate'])->format('H:i:s')
                    }}</td>
                    <td>{{ $row['payment']['paymentId'] }}</td>
                    <td>
                        <span class="transaction-id" data-full-id="{{ $row['payment']['orderId'] }}" onclick="copyToClipboard('{{ $row['payment']['orderId'] }}')">***{{ getTransactionIdInnerPart($row['payment']['orderId']) }}***</span>
                    </td>
                    <td>{{ $row['payment']['bundle']['bundleName'] }}</td>
                    <td>{{ '$'.$row['payment']['amount'] }}</td>
                    <td>{{ $row['payment']['status'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No data found!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
