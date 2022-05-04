<?php

use Illuminate\Support\Str;
if (!function_exists('showProductImage')) {
    function showProductImage($image_url)
    {
        if (Str::contains($image_url, 'popular')){

           return '/time-zone/assets/img/gallery/' .$image_url;
        }

       	return ('/storage/products/' .$image_url);
    }
}

if (!function_exists('showCartQuantity')) {
    function showCartQuantity()
    {
        $sessionData = session('cart');
        $quantity = 0;

        if ($sessionData) {
            $quantity = count($sessionData);
        }

        return $quantity;
    }
}
