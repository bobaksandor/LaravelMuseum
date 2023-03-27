<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = Item::all();
        //$users2 = User::all()->random(1)->first()->id;

        foreach($items as $item)
        {
            // Comment::factory()
            //     ->for($item)
            //     ->create(['user_id' => $users2]);
            $users = User::all()->random(4);
            foreach($users as $user)
            {
                Comment::factory()
                    ->for($item)
                    ->create(['user_id' => $user->id]);
            }
        }
    }
}
