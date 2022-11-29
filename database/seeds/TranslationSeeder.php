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
            [
                'ar_name' => 'تغير كلمة المرور و البيانات الشخصية',
                'en_name' => 'Change the password and personal data',
                'page_name' => 'All',
                'slug' => 'profile_desc',
            ],
           [
                'ar_name' => 'الصورة الشخصية',
                'en_name' => 'personal image',
                'page_name' => 'All',
                'slug' => 'user_image',
            ],
            [
                'ar_name' => 'تغيير الصورة',
                'en_name' => 'change image',
                'page_name' => 'All',
                'slug' => 'change_image',
            ],
            [
                'ar_name' => 'إلغاء',
                'en_name' => 'cancel',
                'page_name' => 'All',
                'slug' => 'cancel',
            ],
        ];
        foreach ($cancel_reasons_data as $row) {
            Language::updateOrCreate($row);
        }
    }
}
