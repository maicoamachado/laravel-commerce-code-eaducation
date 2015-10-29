<?php

namespace CodeCommerce\Listeners;

use CodeCommerce\Events\CheckoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailCheckout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CheckoutEvent  $event
     * @return void
     */
    public function handle(CheckoutEvent $event)
    {
        $user = $event->getUser();
        $order = $event->getOrder();

        Mail::send('emails.checkout', ['user' => $user, 'order' => $order], function ($m) use ($user, $order) {
            $m->from('maico21@gmail.com', 'Maico Machado' );
            $m->to($user->email, $user->name)->subject('Pedido #'.$order->id.' - Pedido Recebido');
        });
    }
}
