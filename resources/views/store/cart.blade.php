@extends('store.store')
@section('content')
 <section id="cart_items">
     <div class="container">
         <div class="table-responsive cart_info">
             <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="cart_descrition"></td>
                        <td class="price">Valor</td>
                        <td class="qtd">Quantidade</td>
                        <td class="price">Total</td>
                        <td></td>
                    </tr>
                </thead>
                 <tbody>
                    @forelse($cart->all() as $k => $item)
                        <tr>
                            <td class="cart_product">
                                <a href="{{ route('store.product', ['id' => $k]) }}">
                                    @if(count($products[$k]->images))
                                        <img src="{{ url('uploads/'.$products[$k]->images->first()->id.'.'.$products[$k]->images->first()->extension) }}" width="105" height="105" alt="" />
                                    @else
                                        <img src="{{ url('images/no-img.jpg') }}" width="105" height="105" alt="" />
                                    @endif
                                </a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="{{ route('store.product', ['id' => $k]) }}">{{$item['name']}}</a></h4>
                                <p>Código: {{ $k }}</p>
                            </td>
                            <td class="cart_price">
                                R$ {{number_format($item['price'], 2, ',', '.')}}
                            </td>
                            <td class="cart_quantity">

                                <div class="btn-group" role="group" aria-label="...">
                                    <button id="add_qtd" type="button" class="btn btn-default" onclick="document.location='{{route('cart.update', ['id' => $k, 'qtd' => $item['qtd'] + 1])}}'">+</button>
                                    <input type="text" readonly class="btn btn-default" style="cursor: none; width: 40px" value="{{ $item['qtd']  }}">
                                    <button type="button" {!! $item['qtd'] == 1 ? 'disabled' : '' !!} class="btn btn-default" onclick="document.location='{{route('cart.update', ['id' => $k, 'qtd' => $item['qtd'] - 1])}}'">-</button>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">R$ {{ number_format($item['price'] * $item['qtd'], 2, ',', '.') }}</p>
                            </td>
                            <td class="cart_delete">
                                <a href="{{ route('cart.destroy', ['id' => $k]) }}" class="cart_quantity_delete">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="cart_product" colspan="6">
                                <p>Nenhum item encontrado.</p>
                            </td>
                        </tr>
                    @endforelse
                 <tr class="cart_menu">
                     <td colspan="6">
                         <div class="pull-right">
                             <span style="margin-right: 120px">
                                 TOTAL : R$ {{number_format($cart->getTotal(), 2, ',', '.')}}
                             </span>
                             <a href="#" class="btn btn-success">Fechar a conta</a>
                         </div>
                     </td>
                 </tr>
                 </tbody>
             </table>
         </div>
     </div>
 </section>
@stop