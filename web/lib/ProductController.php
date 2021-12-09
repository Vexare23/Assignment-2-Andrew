<?php
declare(strict_types=1);
namespace App;

use App\Exception\ConnectionException;
use App\Exception\ProductNotFoundException;

class ProductController {
    private ProductRepository $productRepository;
    private ProductDetailViewRenderer $productDetailViewRenderer;

    public function __construct(ProductRepository $productRepository, ProductDetailViewRenderer $productDetailViewRenderer)
    {
        $this->productRepository = $productRepository;
        $this->productDetailViewRenderer = $productDetailViewRenderer;
    }

    public function viewProductAction($productId): string
    {
        try {
            $product = $this->productRepository->find($productId);
            $html = $this->productDetailViewRenderer->renderProduct($product);
        }
        catch (ConnectionException $connectionException) {
            // show error message
            $html = 'A database error occurred: ' . $connectionException->getMessage();
        }
        catch (ProductNotFoundException $productNotFoundException) {
            $html = $productNotFoundException->getMessage();
        }
        return $html;
    }
}
