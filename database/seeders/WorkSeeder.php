<?php

namespace Database\Seeders;

use App\Models\Work;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $works = config('works.works');
        foreach($works as $work){
            $newWork = new Work();
            $newWork->name = $work['name'];
            $newWork->slug = Str::slug($work['name'], '-');
            $newWork->image = $work['image'];
            $newWork->description = $work['description'];
            $newWork->link = $work['link'];
            $newWork->save();
        }
    }
}
