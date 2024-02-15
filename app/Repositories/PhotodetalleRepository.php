<?php

namespace App\Repositories;

use App\Models\Photodetalle;
use App\Repositories\BaseRepository;

class PhotodetalleRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'gps_location',
        'status',
        'description'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Photodetalle::class;
    }
}
