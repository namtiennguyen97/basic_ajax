<?php

namespace Database\Seeders;

use App\Models\Accessory;
use Illuminate\Database\Seeder;

class AccessorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $acc = new Accessory();
        $acc->id = 9;
        $acc->name = 'Nier xBox';
        $acc->vendor = 'Platinum';
        $acc->image = 'a2.jpg';
        $acc->price = 20000;
        $acc->save();
    }
}
