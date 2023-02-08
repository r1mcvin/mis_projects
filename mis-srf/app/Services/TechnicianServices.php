<?php

namespace App\Services;

use App\Models\Technician;
use App\Traits\SystemMessage;

class TechnicianServices
{
    use SystemMessage;

    public function create($data)
    {
        if ($this->techExists($data['given_name'], $data['middle_name'], $data['last_name']))
        {
            return ['error' => 'Technician has already been added to our record!'];
        }

        Technician::create([
            'given_name' => $data['given_name'],
            'middle_name' => ($data['middle_name']) ? $data['middle_name'] : null,
            'last_name' => $data['last_name'],
            'technician_id' => null,
            'location_id' => null,
            'current_ticket' => null
        ]);

        return ['success' => $data['given_name'] . ' ' . $data['last_name'] .'has been successfully added to our record!'];
    }


    public function techExists($given_name, $middle_name, $last_name)
    {
        $tech = Technician::where('given_name', $given_name);

        if ($middle_name)
        {
            $tech->where('middle_name', $middle_name);
        }

        $tech->where('last_name', $last_name);

        if (empty($tech->first()))
        {
            return false;
        }

        return true;
    }
}
