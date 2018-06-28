<?php
function presentPrice($price){
    $fmt = new \NumberFormatter('de_DE', \NumberFormatter::CURRENCY);
    return $fmt->formatCurrency($price / 100, "EUR");
}

function setActiveCategory($category, $output = 'active'){
    return request()->category === $category ? $output : '';
}

function productImage($path){
    return $path && file_exists('storage/' . $path) ? asset('storage/'. $path) : asset('images/not_found.jpg');
}

function categoryImage($path){
    return $path && file_exists('storage/' . $path) ? asset('storage/'. $path) : asset('images/not_found.jpg');
}