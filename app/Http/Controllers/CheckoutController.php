<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Events\CheckoutEvent;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;
use PHPSC\PagSeguro\Purchases\Transactions\Locator;

class CheckoutController extends Controller
{

    public function place(Order $orderModel, OrderItem $orderItem, CheckoutService $checkoutService){
        if(!Session::has('cart')){
            return false;
        }

        $cart = Session::get('cart');

        if($cart->getTotal() > 0){

            $checkout = $checkoutService->createCheckoutBuilder();

            $order = $orderModel->create(['user_id' => Auth::user()->id, 'total' => $cart->getTotal(), 'status_id' => 1]);
            $checkout->setReference($order->id);
            foreach($cart->all() as $k => $item){

                $checkout ->addItem(new Item($k, $item['name'], number_format($item['price'], 2, '.', ''), $item['qtd']));
                $order->items()->create(['product_id' => $k, 'price' => $item['price'], 'qtd' => $item['qtd']]);
            }

            $cart->clear();
            event(new CheckoutEvent(Auth::user(), $order));
            $response = $checkoutService->checkout($checkout->getCheckout());
            return redirect($response->getRedirectionUrl());

            //return view('store.checkout', compact('order', 'cart'));
        }

        $categories = Category::all();

        return view('store.checkout', ['cart' => 'empty', 'categories' => $categories]);
    }

    public function test(CheckoutService $checkoutService){

        $checkout = $checkoutService->createCheckoutBuilder()
            ->addItem(new Item(1, 'Televis�o LED 500', 8999.99))
            ->addItem(new Item(2, 'Video-game mega ultra blaster', 799.99))
            ->getCheckout();

        $response = $checkoutService->checkout($checkout);

        return redirect($response->getRedirectionUrl());
    }

    public function placeReturn(Request $request, Locator $locator, Order $orderModel){
        $transaction_code = $request->get('transaction_id');

        $transaction = $locator->getByCode($transaction_code);
        $status = $transaction->getDetails()->getStatus();
        $orderid = $transaction->getDetails()->getReference();

        $orderModel->find($orderid)->update(['status_id' => $status, 'transaction_code' => $transaction_code]);

        return redirect()->route('account.orders');
    }
}
