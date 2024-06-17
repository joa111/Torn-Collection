<?php

// app/Http/Livewire/CheckoutComponent.php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Cart;

class CheckoutComponent extends Component
{
    public function placeOrder()
    {
        $order = Order::create([
            'user_id' => Auth::id(),
            'status' => 'pending',
            'payment_method' => 'COD',
            'total' => Cart::instance('cart')->total(),
        ]);

        foreach (Cart::instance('cart')->content() as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->qty,
                'price' => $item->price,
            ]);
        }

        Cart::instance('cart')->destroy();

        session()->flash('success', 'Order placed successfully!');
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.checkout-component');
    }
}
