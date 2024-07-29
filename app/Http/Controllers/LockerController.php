<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enums\LockerStatusEnum;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Http\Resources\LockerResource;

class LockerController extends Controller
{
    public function index()
    {
        return view('locker');
    }

    public function getLockerData()
    {
        $rows = 8;
        $columns = 13;
        $data = new Collection();

        for ($row = 1; $row <= $rows; $row++) {
            for ($col = 1; $col <= $columns; $col++) {
                $status = LockerStatusEnum::random(); // Get a random status
                $period = rand(1, 24); // Random period between 1 and 24 hours

                $data->push([
                    'cell_name' => "Row $row, Column $col",
                    'status_id' => $status->getKey(),
                    'status_name' => $status->getValue(),
                    'status_color' => $status->getColor(),
                    'period' => $period
                ]);
            }
        }

        return LockerResource::collection($data);
    }
}
