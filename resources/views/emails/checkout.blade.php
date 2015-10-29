<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('/fluidicon.png') }}" title="GitHub">
    <title>Home | E-Shop</title>

    <link href="{{ elixir('css/all.css') }}" rel="stylesheet">



</head><!--/head-->

<body>
    <div class="container">
        <h3>Ol�, {{ $user->name }}!!</h3>
        <p>O pedido #{{ $order->id }}, foi realizado com sucesso.</p>

        <p>Esses foram os produtos que voc� comprou:</p>
        <table class="table">
            <tbody>
            <tr>
                <th>#ID</th>
                <th>Itens</th>
                <th>Valor</th>
                <th>Status</th>
            </tr>
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>
                        <ul>
                            @foreach($order->items as $item )
                                <li>{{ $item->product->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>R$ {{ number_format($order->total, 2, ',','.') }}</td>
                    <td>
                            {{ $order->status->name }}

                    </td>
                </tr>
            </tbody>
        </table>
        <p>Para sua seguran�a, pode ser que a gente fa�a uma an�lise de dados cadastrais. Ent�o, � importante que voc� os mantenha sempre atualizados em nosso site.
            A qualquer momento voc� pode consultar o status da sua compra.<br><br>

            Ah, se tiver qualquer d�vida, entre em contato com a gente. ;-)<br><br>

            Um abra�o,
            <br><br>
            Equipe CodeCommerce</p>
        <br>
    </div>
<script src="{{ elixir('js/all.js') }}"></script>

</body>
</html>