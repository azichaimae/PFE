<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

public function model(array $row)
{
    $categoryName = $row[0]; // Assuming the category name is in the first column

    $category = Category::where('name', $categoryName)->first();

    if (!$category) {
        $category = new Category([
            'name' => $categoryName
        ]);
        $category->save();
    }

    return new Product([
        'id'=>$row[0],
        'name' => $row[1], // Assuming the name is in the second column
        'image' => $row[2],
        'description' => $row[3], // Assuming the description is in the third column
        'price' => $row[4], // Assuming the price is in the fourth column
        'quantity' => $row[5], // Assuming the quantity is in the fifth column
        'category_id' => $category->id,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ]);
}
}
