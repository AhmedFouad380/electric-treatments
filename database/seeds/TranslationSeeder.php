<?php

namespace database\seeds;

use Illuminate\Database\Seeder;
use App\Language;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cancel_reasons_data = [
            [
                'ar_name' => 'الصفحة الشخصية',
                'en_name' => 'profile',
                'page_name' => 'All',
                'slug' => 'profile',
            ],
        ];
        foreach ($cancel_reasons_data as $row) {
            Language::updateOrCreate($row);
        }
    }
}
