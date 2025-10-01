<?php

namespace App\Contracts\Interfaces;

use App\Contracts\Interfaces\Eloquent\GetInterface;
use App\Contracts\Interfaces\Eloquent\StoreInterface;
use App\Contracts\Interfaces\Eloquent\DeleteInterface;
use App\Contracts\Interfaces\Eloquent\UpdateInterface;

// interface berfungsi membuat kerangka yang akan
interface ClassroomInterface extends GetInterface, StoreInterface, DeleteInterface, UpdateInterface
{

}