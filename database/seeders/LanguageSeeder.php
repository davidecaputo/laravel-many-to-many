<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = config('languages');
        foreach($languages as $language){
            $newLanguage = new Language();
            $newLanguage->name = $language;
            $newLanguage->slug = Str::slug($language, '-');
            $newLanguage->save();
        }
    }
}
