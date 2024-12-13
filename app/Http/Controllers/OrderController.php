<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 


class OrderController extends Controller
{
    // Get all orders
    public function index()
    {
        $orders = Order::with('product')->get();
        return response()->json($orders, 200);
    }

    // Create a new order
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($validated['product_id']);

        if ($product->stock < $validated['quantity']) {
            return response()->json(['message' => 'Not enough stock'], 400);
        }

        $total_price = $product->price * $validated['quantity'];
        $order = Order::create([
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
            'total_price' => $total_price,
        ]);

        $product->decrement('stock', $validated['quantity']);

        return response()->json($order, 201);
    }

    // Get a single order
    public function show($id)
    {
        $order = Order::with('product')->find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return response()->json($order, 200);
    }

    // Update an order
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $validated = $request->validate([
            'product_id' => 'nullable|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
        ]);

        if (isset($validated['product_id'])) {
            $order->product_id = $validated['product_id'];
        }

        if (isset($validated['quantity'])) {
            $order->quantity = $validated['quantity'];
            $order->total_price = $order->product->price * $validated['quantity'];
        }

        $order->save();
        return response()->json($order, 200);
    }

    // Delete an order
    public function destroy($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->delete();
        return response()->json(['message' => 'Order deleted successfully'], 200);
    }
}
