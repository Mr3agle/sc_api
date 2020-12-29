<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use App\User;

class CartController extends Controller
{
    public function addToClientCart(Request $request)
    {
        $clientCart = $request->all();

        $addToCart = Cart::create($clientCart);

        return response()->json(['message' => 'added successfully', 'cart' => $addToCart], 200);
    }
    public function addToGuestCart(Request $request)
    {
        $guestCart = $request->all();
        return response()->json($guestCart, 200);
    }
    public function getClientCart($id)
    {
        // $user = User::findOrFail($id);

        $userCart = Cart::where('user_id', $id)->get();

        return response()->json(['cart' => $userCart]);
    }
}
