<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [ 
                'name'=>'nha',
                'phone'=>'0124142414',
            ],
           
            [
                'name'=>'nich',
                'phone'=>'01223232414',
            ],
        
            [
                'name'=>'jj',
                'phone'=>'045462462',
            ],
            
        
            
        ];
        foreach($data as $item){
            Category::create($item);
        }
    }
}
