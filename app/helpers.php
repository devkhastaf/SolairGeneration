<?php
function presentPrice($price){
    $fmt = new \NumberFormatter('de_DE', \NumberFormatter::CURRENCY);
    return $fmt->formatCurrency($price / 100, "EUR");
}

function setActiveCategory($category, $output = 'active'){
    return request()->category === $category ? $output : '';
}