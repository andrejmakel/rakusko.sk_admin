<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'place_create',
            ],
            [
                'id'    => 18,
                'title' => 'place_edit',
            ],
            [
                'id'    => 19,
                'title' => 'place_show',
            ],
            [
                'id'    => 20,
                'title' => 'place_delete',
            ],
            [
                'id'    => 21,
                'title' => 'place_access',
            ],
            [
                'id'    => 22,
                'title' => 'activity_create',
            ],
            [
                'id'    => 23,
                'title' => 'activity_edit',
            ],
            [
                'id'    => 24,
                'title' => 'activity_show',
            ],
            [
                'id'    => 25,
                'title' => 'activity_delete',
            ],
            [
                'id'    => 26,
                'title' => 'activity_access',
            ],
            [
                'id'    => 27,
                'title' => 'mall_create',
            ],
            [
                'id'    => 28,
                'title' => 'mall_edit',
            ],
            [
                'id'    => 29,
                'title' => 'mall_show',
            ],
            [
                'id'    => 30,
                'title' => 'mall_delete',
            ],
            [
                'id'    => 31,
                'title' => 'mall_access',
            ],
            [
                'id'    => 32,
                'title' => 'shop_create',
            ],
            [
                'id'    => 33,
                'title' => 'shop_edit',
            ],
            [
                'id'    => 34,
                'title' => 'shop_show',
            ],
            [
                'id'    => 35,
                'title' => 'shop_delete',
            ],
            [
                'id'    => 36,
                'title' => 'shop_access',
            ],
            [
                'id'    => 37,
                'title' => 'main_access',
            ],
            [
                'id'    => 38,
                'title' => 'tag_create',
            ],
            [
                'id'    => 39,
                'title' => 'tag_edit',
            ],
            [
                'id'    => 40,
                'title' => 'tag_show',
            ],
            [
                'id'    => 41,
                'title' => 'tag_delete',
            ],
            [
                'id'    => 42,
                'title' => 'tag_access',
            ],
            [
                'id'    => 43,
                'title' => 'property_access',
            ],
            [
                'id'    => 44,
                'title' => 'navi_create',
            ],
            [
                'id'    => 45,
                'title' => 'navi_edit',
            ],
            [
                'id'    => 46,
                'title' => 'navi_show',
            ],
            [
                'id'    => 47,
                'title' => 'navi_delete',
            ],
            [
                'id'    => 48,
                'title' => 'navi_access',
            ],
            [
                'id'    => 49,
                'title' => 'price_text_create',
            ],
            [
                'id'    => 50,
                'title' => 'price_text_edit',
            ],
            [
                'id'    => 51,
                'title' => 'price_text_show',
            ],
            [
                'id'    => 52,
                'title' => 'price_text_delete',
            ],
            [
                'id'    => 53,
                'title' => 'price_text_access',
            ],
            [
                'id'    => 54,
                'title' => 'lang_create',
            ],
            [
                'id'    => 55,
                'title' => 'lang_edit',
            ],
            [
                'id'    => 56,
                'title' => 'lang_show',
            ],
            [
                'id'    => 57,
                'title' => 'lang_delete',
            ],
            [
                'id'    => 58,
                'title' => 'lang_access',
            ],
            [
                'id'    => 59,
                'title' => 'translation_access',
            ],
            [
                'id'    => 60,
                'title' => 'trans_mall_create',
            ],
            [
                'id'    => 61,
                'title' => 'trans_mall_edit',
            ],
            [
                'id'    => 62,
                'title' => 'trans_mall_show',
            ],
            [
                'id'    => 63,
                'title' => 'trans_mall_delete',
            ],
            [
                'id'    => 64,
                'title' => 'trans_mall_access',
            ],
            [
                'id'    => 65,
                'title' => 'trans_shop_create',
            ],
            [
                'id'    => 66,
                'title' => 'trans_shop_edit',
            ],
            [
                'id'    => 67,
                'title' => 'trans_shop_show',
            ],
            [
                'id'    => 68,
                'title' => 'trans_shop_delete',
            ],
            [
                'id'    => 69,
                'title' => 'trans_shop_access',
            ],
            [
                'id'    => 70,
                'title' => 'trans_place_create',
            ],
            [
                'id'    => 71,
                'title' => 'trans_place_edit',
            ],
            [
                'id'    => 72,
                'title' => 'trans_place_show',
            ],
            [
                'id'    => 73,
                'title' => 'trans_place_delete',
            ],
            [
                'id'    => 74,
                'title' => 'trans_place_access',
            ],
            [
                'id'    => 75,
                'title' => 'trans_post_create',
            ],
            [
                'id'    => 76,
                'title' => 'trans_post_edit',
            ],
            [
                'id'    => 77,
                'title' => 'trans_post_show',
            ],
            [
                'id'    => 78,
                'title' => 'trans_post_delete',
            ],
            [
                'id'    => 79,
                'title' => 'trans_post_access',
            ],
            [
                'id'    => 80,
                'title' => 'trans_info_create',
            ],
            [
                'id'    => 81,
                'title' => 'trans_info_edit',
            ],
            [
                'id'    => 82,
                'title' => 'trans_info_show',
            ],
            [
                'id'    => 83,
                'title' => 'trans_info_delete',
            ],
            [
                'id'    => 84,
                'title' => 'trans_info_access',
            ],
            [
                'id'    => 85,
                'title' => 'price_create',
            ],
            [
                'id'    => 86,
                'title' => 'price_edit',
            ],
            [
                'id'    => 87,
                'title' => 'price_show',
            ],
            [
                'id'    => 88,
                'title' => 'price_delete',
            ],
            [
                'id'    => 89,
                'title' => 'price_access',
            ],
            [
                'id'    => 90,
                'title' => 'opening_create',
            ],
            [
                'id'    => 91,
                'title' => 'opening_edit',
            ],
            [
                'id'    => 92,
                'title' => 'opening_show',
            ],
            [
                'id'    => 93,
                'title' => 'opening_delete',
            ],
            [
                'id'    => 94,
                'title' => 'opening_access',
            ],
            [
                'id'    => 95,
                'title' => 'opening_text_create',
            ],
            [
                'id'    => 96,
                'title' => 'opening_text_edit',
            ],
            [
                'id'    => 97,
                'title' => 'opening_text_show',
            ],
            [
                'id'    => 98,
                'title' => 'opening_text_delete',
            ],
            [
                'id'    => 99,
                'title' => 'opening_text_access',
            ],
            [
                'id'    => 100,
                'title' => 'post_create',
            ],
            [
                'id'    => 101,
                'title' => 'post_edit',
            ],
            [
                'id'    => 102,
                'title' => 'post_show',
            ],
            [
                'id'    => 103,
                'title' => 'post_delete',
            ],
            [
                'id'    => 104,
                'title' => 'post_access',
            ],
            [
                'id'    => 105,
                'title' => 'info_create',
            ],
            [
                'id'    => 106,
                'title' => 'info_edit',
            ],
            [
                'id'    => 107,
                'title' => 'info_show',
            ],
            [
                'id'    => 108,
                'title' => 'info_delete',
            ],
            [
                'id'    => 109,
                'title' => 'info_access',
            ],
            [
                'id'    => 110,
                'title' => 'shop_category_create',
            ],
            [
                'id'    => 111,
                'title' => 'shop_category_edit',
            ],
            [
                'id'    => 112,
                'title' => 'shop_category_show',
            ],
            [
                'id'    => 113,
                'title' => 'shop_category_delete',
            ],
            [
                'id'    => 114,
                'title' => 'shop_category_access',
            ],
            [
                'id'    => 115,
                'title' => 'sidebar_create',
            ],
            [
                'id'    => 116,
                'title' => 'sidebar_edit',
            ],
            [
                'id'    => 117,
                'title' => 'sidebar_show',
            ],
            [
                'id'    => 118,
                'title' => 'sidebar_delete',
            ],
            [
                'id'    => 119,
                'title' => 'sidebar_access',
            ],
            [
                'id'    => 120,
                'title' => 'ad_create',
            ],
            [
                'id'    => 121,
                'title' => 'ad_edit',
            ],
            [
                'id'    => 122,
                'title' => 'ad_show',
            ],
            [
                'id'    => 123,
                'title' => 'ad_delete',
            ],
            [
                'id'    => 124,
                'title' => 'ad_access',
            ],
            [
                'id'    => 125,
                'title' => 'holiday_name_create',
            ],
            [
                'id'    => 126,
                'title' => 'holiday_name_edit',
            ],
            [
                'id'    => 127,
                'title' => 'holiday_name_show',
            ],
            [
                'id'    => 128,
                'title' => 'holiday_name_delete',
            ],
            [
                'id'    => 129,
                'title' => 'holiday_name_access',
            ],
            [
                'id'    => 130,
                'title' => 'holiday_create',
            ],
            [
                'id'    => 131,
                'title' => 'holiday_edit',
            ],
            [
                'id'    => 132,
                'title' => 'holiday_show',
            ],
            [
                'id'    => 133,
                'title' => 'holiday_delete',
            ],
            [
                'id'    => 134,
                'title' => 'holiday_access',
            ],
            [
                'id'    => 135,
                'title' => 'carousel_create',
            ],
            [
                'id'    => 136,
                'title' => 'carousel_edit',
            ],
            [
                'id'    => 137,
                'title' => 'carousel_show',
            ],
            [
                'id'    => 138,
                'title' => 'carousel_delete',
            ],
            [
                'id'    => 139,
                'title' => 'carousel_access',
            ],
            [
                'id'    => 140,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
