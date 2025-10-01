<?php

namespace App\Contracts\Repositories;
// use App\Contracts\Interfaces\StudentInterface;
use App\Contracts\Interfaces\EkstraInterface;
use App\Models\Ekstra;

// repository untuk menjalankan query query dari database

class EkstraRepository extends BaseRepository implements EkstraInterface
{
    // __construct untuk menjadikan sebuah object
    public function __construct(Ekstra $ekstra)
    {
        $this->model = $ekstra;
    }

    public function delete(mixed $id): mixed
    {
        return $this->model->query()
        ->findOrFail($id)
        ->delete();
    }

    public function get(): mixed
    {
        return $this->model->query()
        ->get();
    }
    
    public function store(array $data): mixed
    {
        return $this->model->query()
            ->create($data);
    }
    public function update(mixed $id, array $data): mixed
    {
        return $this->model->query()
            ->findOrFail($id)
            ->update($data);
    }
}