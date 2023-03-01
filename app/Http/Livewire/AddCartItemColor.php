<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class AddCartItemColor extends Component
{
    public $product, $colors;
    public $qty = 1;
    public $quantity = 0;
    public $color_id = "";
    public $options = [
        "size_id"=>null
    ];

    public function mount()
    {
        $this->colors = $this->product->colors;
        $this->options['image'] = $this->product->images->first()->url;
    }
    public function updatedColorId($value)
    {
        $color = $this->product->colors->find($value);
        $this->quantity = qty_available($this->product->id,$color->id);
        $this->options['color'] = $color->name;
    }
    //añadir al carrito
    public function addItem()
    {
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $this->qty,
            'price' => $this->product->price,
            'weight' => 550,
            'options' => $this->options
        ]);
        $this->quantity = qty_available($this->product->id,$this->color->id);
        $this->reset('qty');
        $this->emitTo('dropdown-cart', 'render');
    }
    public function decrement()
    {

        $this->qty = $this->qty - 1;
    }
    public function increment()
    {
        $this->qty = $this->qty + 1;
    }

    public function render()
    {
        return view('livewire.add-cart-item-color');
    }
}
