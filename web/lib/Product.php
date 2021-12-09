<?php
declare(strict_types=1);
namespace App;

class Product
{

    private int $id;

    private string $name;

    private float $price;

    private int $categoryId;

    public function getId(): int {
        return $this->id; }

    public function setId(int $id): void {
        $this->id = $id; }

    public function getName(): string {
        return $this->name; }

    public function setName(string $name): void {
        $this->name = $name; }

    public function getPrice(): float|string {
        return $this->price; }

    public function setPrice(float $price): void {
        $this->price = $price; }

    public function getCategoryId(): int {
        return $this->categoryId; }

    public function setCategoryId(int $categoryId): void {
        $this->categoryId = $categoryId; }

}