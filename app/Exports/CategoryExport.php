<?php

namespace App\Exports;

use App\Models\Categories;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class CategoryExport implements FromCollection, WithDrawings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $categories = Categories::all();
        return $categories;
    }

    public function drawings()
    {
        $rowNum = 1;
        $drawings = [];
        foreach ($this->collection() as $category) {
            $drawing = new Drawing();
            $drawing->setName('image');
            $drawing->setPath(public_path('/upload/image/category/'.$category->image));
            $drawing->setHeight(50);
            $drawing->setWidth(50);
            $drawing->setCoordinates('G'.$rowNum);
            $rowNum++;
            $drawings[] = $drawing ;
        }
        return $drawings;
    }
}