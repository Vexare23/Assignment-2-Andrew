<?php

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
        $product = $this->productRepository->find($productId);
        return $this->productDetailViewRenderer->renderProduct($product);
    }

}
