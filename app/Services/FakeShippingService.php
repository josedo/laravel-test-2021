<?php

namespace App\Services;

use App\Interfaces\IShippingService;

use Illuminate\Support\Str;

class FakeShippingService implements IShippingService
{
    public function store(string $name, int $height, int $width, int $weight,string $destination) : array
    {
        return [
            'company' => 'Fake Shipping Service S.A',
            'uuid' => Str::uuid(),
            'name' => $name,
            'height' => $height,
            'width' => $width,
            'weight' => $weight,
            'destination' => $destination
        ];
    }
}
