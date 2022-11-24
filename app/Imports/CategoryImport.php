<?php

namespace App\Imports;

use App\Models\Categories;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoryImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Categories([
            'id'            => $row[0],
            'name'          => $row[1],
            'slug'          => $row[2],
            'description'   => $row[3],
            'status'        => $row[4],
            'popular'       => $row[5],
            'image'         => $row[6],
            'meta_title'    => $row[7],
            'meta_descrip'  => $row[8],
            'meta_keywords' => $row[9],
        ]);
    }
}