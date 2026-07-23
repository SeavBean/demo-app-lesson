<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [ 
                'name'=>'css',
                'phone'=>'0124142414',
            ],
           
            [
                'name'=>'HTML',
                'phone'=>'01223232414',
            ],
        
            [
                'name'=>'C#',
                'phone'=>'045462462',
            ],
            
        
            
        ];
        foreach($data as $item){
            Tag::create($item);
        }
    }
}
