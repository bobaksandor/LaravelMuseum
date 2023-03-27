<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Label;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $labels = Label::all();
        foreach($labels as $label)
        {
            //$tmpUsers = $users->where('id', '!=', $submitter->id)->random(5);
            Item::factory()
                ->hasAttached($labels->random(3))
                ->create();
        }
    }
}
