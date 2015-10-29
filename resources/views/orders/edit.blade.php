@extends('app')
@section('content')
    <div class="container">
        <h1>Editing Order : {{ $order->id }}</h1>

        @if($errors->any())
            <ul class="alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => ['orders.update', $order->id]]) !!}

        <div class="form-group">
            {!! Form::label('user', 'Client: ') !!}
            {!! Form::text('user', $order->user->name, ['readonly', 'class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('created_at', 'Data do Pedido: ') !!}
            {!! Form::text('created_at', date("d/m/Y", strtotime($order->created_at)), ['readonly', 'class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('status_id', 'Status: ') !!}

            {!! Form::select('status_id',
                $status,
                $order->status_id,
                ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Save Order', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection