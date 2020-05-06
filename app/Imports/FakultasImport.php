<?php

namespace App\Imports;

use App\Fakultas;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FakultasImport implements ToModel, WithValidation, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function startRow(): Int{
        return 2;
    }


    public function model(array $row)
    {
        return new Fakultas([
            'name' => $row[1]            
        ]);
    }

    public function rules(): array
    {
        return [
            '1' => 'max:255|unique:fakultas,name'
        ];
    }
}