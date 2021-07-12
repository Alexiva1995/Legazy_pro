<?php

namespace Database\Seeders;

use App\Models\Packages;
use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayPackage = [

            [
              "id"=>"2",
              "name"=>"Paquete B",
              "price"=>"100",
               "group_id" => '1',
            ],

    ];
    foreach ($arrayPackage as $package ) {
        Packages::create($package);
    }

    }
}
