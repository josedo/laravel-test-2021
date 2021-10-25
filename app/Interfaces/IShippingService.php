<?php

namespace App\Interfaces;

interface IShippingService {

    public function store(string $name, int $height, int $width, int $weigth,string $destination) : array;
}
