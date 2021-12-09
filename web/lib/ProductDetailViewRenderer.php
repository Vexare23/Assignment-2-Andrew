<?php

declare(strict_types=1);

namespace App;

class ProductDetailViewRenderer
{
    public function renderProduct(Product $product): string
    {
        $html = '<div class="container">';
        $html .=    '<div class="row">';
        $html .=        '<div class="col-lg-4 pet-list-item">';
        $html .=            '<h2>';
        $html .=                'Name of product: ';
        $html .=  $product->getName();
        $html .='<br>';
        $html .=                'Price in euro: ';
        $html .= $product->getPrice();
        $html .=                '<hr>';
        $html .=            '</h2>';
        $html .=        '</div>';
        $html .=    '</div>';
        $html .='</div>';
        // build the HTML for displaying one product here e.g.:
        //$html .= '<h1>'.$product->getName().'</h1>';
        // ... more code here
        return $html;
    }
}
