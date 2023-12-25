<?php

namespace App\Repositories;

use App\Models\OrderDetail;

class OrderDetailRepository
{

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return OrderDetail::create($data);
    }

}
