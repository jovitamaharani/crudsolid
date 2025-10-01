<?php

namespace App\Observers;

use App\Models\Classroom;
use Faker\Provider\Uuid;

class ClassroomObserver
{
    /**
     * Handle the Product "creating" event.
     *
     * @param Product $product
     * @return void
     */
    public function creating(Classroom $classroomt): void
    {
        $classroomt->id = Uuid::uuid();
    }

}
