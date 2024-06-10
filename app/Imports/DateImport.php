<?php

namespace App\Imports;

use App\Models\DateManagement;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;



class DateImport implements ToCollection, WithHeadingRow
{

    private $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {
            if ($row['date'] != '' && $row['time'] != '') {
                DateManagement::create([
                    'date'       => $row['date'],
                    'time'       => $row['time'],
                    'mode'       => $row['mode'],
                    'zone'       => $row['zone'],
                    'status'     => $row['status'],
                ]);
            }
        }
    }
}
