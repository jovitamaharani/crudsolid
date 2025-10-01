<?php

namespace App\Contracts\Interfaces\Eloquent;

interface DeleteInterface
{
    // interface berfungsi untuk membuat kerangka kerja    
    public function delete(mixed $id): mixed;
}