<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

  public function show()
  {
    return view('cart.show');
  }

  public function addToCart()
  {
    $this->validateRequest();
    Cart::add(request('id'), request('name'), request('qty'), request('price'))->associate(Product::class);
    return back();
  }

  public function removeItem ($item) {
    Cart::remove($item);
    return back();
  }


  public function validateRequest()
  {
    request()->validate([
      'id' => 'required',
      'name' => 'required',
      'qty' => 'required',
      'price' => 'required'
    ]);
  }
}
