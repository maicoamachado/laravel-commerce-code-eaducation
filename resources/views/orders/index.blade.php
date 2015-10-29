@extends('app')
@section('content')
    <div class="container">
        <h1>Orders</h1>

        <br>
        <br><br>
        <table class="table">
            <tr>
            <th>#ID</th>
            <th>Client</th>
            <th>Itens</th>
            <th>Valor</th>
            <th>Status</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>
                        <ul>
                            @foreach($order->items as $item )
                                <li>{{ $item->product->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>R$ {{ number_format($order->total, 2, ',','.') }}</td>
                    <td>{{ $order->status->name }}</td>
                    <td>
                        <a href="{{ route('orders.edit', ['id' => $order->id]) }}">Edit Status</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="text-center">
            {!! $orders->render() !!}
        </div>
    </div>
@endsection