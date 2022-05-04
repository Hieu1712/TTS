<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;

class OrderController extends Controller
{
    public function saveDataToSession(Request $request)
    {
        $productId = (int) $request->product_id;
        $quantity = (int) $request->quantity;
        $existFlg = false;

        if (session('cart')) {
            $data['cart'] = session('cart');


            foreach ($data['cart'] as $key => $value) {
                if ($productId == $value['id']) {
                    $data['cart'][$key]['quantity'] += $quantity;
                    $existFlg = true;
                }
            }

            if (!$existFlg) {
                $data['cart'][] = [
                    'id' => $productId,
                    'quantity' => $quantity
                ];
            }
        } else {
            $data = [
                'cart' => [
                    [
                        'id' => $productId,
                        'quantity' => $quantity
                    ],
                ],
            ];
        }
        session($data);

        return json_encode($data);
    }

    public function orderList()
    {
        $cartData = session('cart');
        $cartData = collect($cartData);

        $productData = $cartData->pluck('quantity', 'id')->toArray();
        $productIds = $cartData->pluck('id');
        
        $products = Product::whereIn('id', $productIds)->get();

        return view('mypage.cart', [
            'products' => $products,
            'productData' => $productData,
        ]);
    }

    public function deleteProduct(Request $request)
    {
        $productId = (int) $request->product_id;
        $cartData = session('cart');

        foreach ($cartData as $key => $productData) {
            if ($productData['id'] == $productId) {
                unset($cartData[$key]);
            }
        }

        if (is_null($cartData)) {
            session()->forget('cart');

            return json_encode([]);
        }

        $request->session()->forget('cart');
        session(['cart' => $cartData]);

        return json_encode(['cart' => $cartData]);
    }

    public function update(Request $request)
    {
        $productId = (int) $request->product_id;
        $quantity = (int) $request->quantity;

        if (session('cart')) {
            $data['cart'] = session('cart');

            foreach ($data['cart'] as $key => $value) {
                if ($productId == $value['id']) {
                    $data['cart'][$key]['quantity'] = $quantity;
                }
            }
            session($data);

            return json_encode($data);
        }

        return json_encode(['status' => false]);
    }

    public function checkout()
    {
        $cartData = session('cart');
        $cartData = collect($cartData);

        $productData = $cartData->pluck('quantity', 'id')->toArray();
        $productIds = $cartData->pluck('id');
        
        $products = Product::whereIn('id', $productIds)->get();

        return view('mypage.checkout', [
            'products' => $products,
            'productData' => $productData,
        ]);
    }

    public function purchase(Request $request)
    {
        $data = $request->only([
            'name',
            'phone',
            'email',
            'address',
            'note',
            'total_price',
        ]);
        
        $orderSession = session('cart');
        
        $orderData = [
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'address' => $data['address'],
            'note' => $data['note'],
            'total_price' => $data['total_price'],
        ];

        try {
            DB::beginTransaction();
            
            $order = Order::create($orderData);
            
            $orderId = $order->id;

            $OrderProduct = [];

            foreach ($orderSession as $product) {
                $productId = $product['id'];
                $productRecord = Product::find($productId);
                $price = $productRecord->price * (int)$product['quantity'];
                $OrderProduct = [
                    'product_id' => $productId,
                    'order_id' => $orderId,
                    'price' => $price,
                    'quantity' => $product['quantity'],
                ];
                $cartData = session('cart');
                $cartData = collect($cartData);
                $productIds = $cartData->pluck('id');
                $products = Product::whereIn('id', $productIds)->get();
                $orderproducts[] = OrderProduct::create($OrderProduct);
            }

            $dataOrderProduct = $request->all();
            foreach($dataOrderProduct['orderProductId'] as $key => $product_id) {
                $checkProduct = Product::find($product_id);
                $productQuantity = $checkProduct->quantity;
                $product_sold = $checkProduct->product_sold;
                foreach($dataOrderProduct['quantity'] as $key2 => $qty) {
                    
                    if($key == $key2) {
                        $product_remain = $productQuantity - $qty;
                        $checkProduct->quantity = $product_remain;
                        $checkProduct->product_sold = $product_sold + $qty;
                        $checkProduct->save();
                    }
                }
            }
        }
        catch (\Exception $e) {
            return json_encode(['orderSession' => 'fail']);
            Log::error($e);
            DB::rollBack();
        }

        DB::commit();

        Mail::send('mails.order',[
            'orderproducts'=> $orderproducts,
            'products'=> $products,
            'order'=>$order,
        ], function($mail) use($data) {
            $mail->to($data['email'],'a');
            $mail->from('nguyendinhhieuqvhm@gmail.com','Dinh Hieu');
            $mail->subject('DinhHieu Shop');
        });

        session()->forget('cart');
        return json_encode(['status' => true]);
    }
}