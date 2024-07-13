<?php

return [
    'userManagement' => [
        'title'          => 'Správa uživatelů',
        'title_singular' => 'Správa uživatelů',
    ],
    'permission' => [
        'title'          => 'Práva',
        'title_singular' => 'Právo',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Role',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Uživatelé',
        'title_singular' => 'Uživatel',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'approved'                 => 'Approved',
            'approved_helper'          => ' ',
        ],
    ],
    'place' => [
        'title'          => 'Place',
        'title_singular' => 'Place',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'kontakt'                 => 'Kontakt',
            'kontakt_helper'          => ' ',
            'zip'                     => 'ZIP',
            'zip_helper'              => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'link'                    => 'Link',
            'link_helper'             => ' ',
            'update'                  => 'Update',
            'update_helper'           => ' ',
            'cover_img'               => 'Cover Img',
            'cover_img_helper'        => ' ',
            'order'                   => 'Order',
            'order_helper'            => ' ',
            'title'                   => 'Title',
            'title_helper'            => ' ',
            'excerp'                  => 'Excerp',
            'excerp_helper'           => ' ',
            'text'                    => 'Text',
            'text_helper'             => ' ',
            'slug'                    => 'Slug',
            'slug_helper'             => ' ',
            'parking'                 => 'Parking',
            'parking_helper'          => ' ',
            'info'                    => 'Info',
            'info_helper'             => ' ',
            'tags'                    => 'Tags',
            'tags_helper'             => ' ',
            'opening'                 => 'Opening',
            'opening_helper'          => ' ',
            'opening_note'            => 'Opening Note',
            'opening_note_helper'     => ' ',
            'price'                   => 'Price',
            'price_helper'            => ' ',
            'price_note'              => 'Price Note',
            'price_note_helper'       => ' ',
            'activities'              => 'Activities',
            'activities_helper'       => ' ',
            'display_in_place'        => 'Display In Place',
            'display_in_place_helper' => ' ',
        ],
    ],
    'activity' => [
        'title'          => 'Activity',
        'title_singular' => 'Activity',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'order'              => 'Order',
            'order_helper'       => ' ',
            'title_sk'        => 'Activity DE',
            'title_sk_helper' => ' ',
            'title_de'        => 'Activity SK',
            'title_de_helper' => ' ',
            'title_cs'        => 'Activity CZ',
            'title_cs_helper' => ' ',
            'title_hu'        => 'Activity HU',
            'title_hu_helper' => ' ',
            'title_sl'        => 'Activity SI',
            'title_sl_helper' => ' ',
            'slug_de'            => 'Slug DE',
            'slug_de_helper'     => ' ',
            'slug_sk'            => 'Slug SK',
            'slug_sk_helper'     => ' ',
            'slug_cs'            => 'Slug CZ',
            'slug_cs_helper'     => ' ',
            'slug_hu'            => 'Slug HU',
            'slug_hu_helper'     => ' ',
            'slug_sl'            => 'Slug SI',
            'slug_sl_helper'     => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'cover_img'          => 'Cover Img',
            'cover_img_helper'   => ' ',
        ],
    ],
    'mall' => [
        'title'          => 'Mall',
        'title_singular' => 'Mall',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'kontakt'             => 'Kontakt',
            'kontakt_helper'      => ' ',
            'zip'                 => 'ZIP',
            'zip_helper'          => ' ',
            'link'                => 'Link',
            'link_helper'         => ' ',
            'update'              => 'Update',
            'update_helper'       => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'cover_img'           => 'Cover Img',
            'cover_img_helper'    => ' ',
            'order'               => 'Order',
            'order_helper'        => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'map_embed'           => 'Map Embed',
            'map_embed_helper'    => ' ',
            'slug'                => 'Slug',
            'slug_helper'         => ' ',
            'subtitle'            => 'Subtitle',
            'subtitle_helper'     => ' ',
            'text'                => 'Text',
            'text_helper'         => ' ',
            'parking'             => 'Parking',
            'parking_helper'      => ' ',
            'info'                => 'Info',
            'info_helper'         => ' ',
            'opening'             => 'Opening',
            'opening_helper'      => ' ',
            'opening_note'        => 'Opening Note',
            'opening_note_helper' => ' ',
        ],
    ],
    'shop' => [
        'title'          => 'Shop',
        'title_singular' => 'Shop',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'gallery'             => 'Gallery',
            'gallery_helper'      => ' ',
            'kontakt'             => 'Kontakt',
            'kontakt_helper'      => ' ',
            'zip'                 => 'ZIP',
            'zip_helper'          => ' ',
            'link'                => 'Link',
            'link_helper'         => ' ',
            'update'              => 'Update',
            'update_helper'       => ' ',
            'mall'                => 'Mall',
            'mall_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'slug'                => 'Slug',
            'slug_helper'         => ' ',
            'logo'                => 'Logo',
            'logo_helper'         => ' ',
            'text'                => 'Text',
            'text_helper'         => ' ',
            'map_img'             => 'Map Img',
            'map_img_helper'      => ' ',
            'opening'             => 'Opening',
            'opening_helper'      => ' ',
            'opening_note'        => 'Opening Note',
            'opening_note_helper' => ' ',
        ],
    ],
    'main' => [
        'title'          => 'Main',
        'title_singular' => 'Main',
    ],
    'tag' => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'title_sk'          => 'Title Sk',
            'title_sk_helper'   => ' ',
            'title_de'          => 'Title De',
            'title_de_helper'   => ' ',
            'title_cs'          => 'Title Cz',
            'title_cs_helper'   => ' ',
            'title_sl'          => 'Title Si',
            'title_si_helper'   => ' ',
            'title_hu'          => 'Title Hu',
            'title_hu_helper'   => ' ',
        ],
    ],
    'property' => [
        'title'          => 'Properties',
        'title_singular' => 'Property',
    ],
    'navi' => [
        'title'          => 'Navi',
        'title_singular' => 'Navi',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'titel_1'            => 'Title 1',
            'titel_1_helper'     => ' ',
            'text_1'             => 'Text 1',
            'text_1_helper'      => ' ',
            'titel_2'            => 'Title 2',
            'titel_2_helper'     => ' ',
            'text_2'             => 'Text 2',
            'text_2_helper'      => ' ',
            'titel_3'            => 'Title 3',
            'titel_3_helper'     => ' ',
            'text_3'             => 'Text 3',
            'text_3_helper'      => ' ',
            'titel_4'            => 'Title 4',
            'titel_4_helper'     => ' ',
            'text_4'             => 'Text 4',
            'text_4_helper'      => ' ',
            'titel_5'            => 'Title 5',
            'titel_5_helper'     => ' ',
            'text_5'             => 'Text 5',
            'text_5_helper'      => ' ',
            'coordinates'        => 'Coordinates',
            'coordinates_helper' => ' ',
            'zoom'               => 'Zoom',
            'zoom_helper'        => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'priceText' => [
        'title'          => 'Price Text',
        'title_singular' => 'Price Text',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'de'               => 'de',
            'de_helper'        => ' ',
            'sk'               => 'sk',
            'sk_helper'        => ' ',
            'cs'               => 'cs',
            'cs_helper'        => ' ',
            'hu'               => 'hu',
            'hu_helper'        => ' ',
            'sl'               => 'sl',
            'sl_helper'        => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'lang' => [
        'title'          => 'Lang',
        'title_singular' => 'Lang',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'lang'              => 'Lang',
            'lang_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'translation' => [
        'title'          => 'Translations',
        'title_singular' => 'Translation',
    ],
    'transMall' => [
        'title'          => 'Trans Mall',
        'title_singular' => 'Trans Mall',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'lang'                => 'Lang',
            'lang_helper'         => ' ',
            'order'               => 'Order',
            'order_helper'        => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'subtitle'            => 'Subtitle',
            'subtitle_helper'     => ' ',
            'slug'                => 'Slug',
            'slug_helper'         => ' ',
            'excerp'              => 'Excerp',
            'excerp_helper'       => ' ',
            'text'                => 'Text',
            'text_helper'         => ' ',
            'opening'             => 'Opening',
            'opening_helper'      => ' ',
            'parking'             => 'Parking',
            'parking_helper'      => ' ',
            'info'                => 'Info',
            'info_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'origin'              => 'Origin',
            'origin_helper'       => ' ',
            'open_note_1'         => 'Open Note 1',
            'open_note_1_helper'  => ' ',
            'open_note_2'         => 'Open Note 2',
            'open_note_2_helper'  => ' ',
            'open_note_3'         => 'Open Note 3',
            'open_note_3_helper'  => ' ',
            'price_note_1'        => 'Price Note 1',
            'price_note_1_helper' => ' ',
            'price_note_2'        => 'Price Note 2',
            'price_note_2_helper' => ' ',
            'price_note_3'        => 'Price Note 3',
            'price_note_3_helper' => ' ',
        ],
    ],
    'transShop' => [
        'title'          => 'Trans Shop',
        'title_singular' => 'Trans Shop',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'lang'                => 'Lang',
            'lang_helper'         => ' ',
            'order'               => 'Order',
            'order_helper'        => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'subtitle'            => 'Subtitle',
            'subtitle_helper'     => ' ',
            'slug'                => 'Slug',
            'slug_helper'         => ' ',
            'excerp'              => 'Excerp',
            'excerp_helper'       => ' ',
            'text'                => 'Text',
            'text_helper'         => ' ',
            'open_note_1'         => 'Open Note 1',
            'open_note_1_helper'  => ' ',
            'open_note_2'         => 'Open Note 2',
            'open_note_2_helper'  => ' ',
            'open_note_3'         => 'Open Note 3',
            'open_note_3_helper'  => ' ',
            'price_note_1'        => 'Price Note 1',
            'price_note_1_helper' => ' ',
            'price_note_2'        => 'Price Note 2',
            'price_note_2_helper' => ' ',
            'price_note_3'        => 'Price Note 3',
            'price_note_3_helper' => ' ',
            'opening'             => 'Opening',
            'opening_helper'      => ' ',
            'parking'             => 'Parking',
            'parking_helper'      => ' ',
            'info'                => 'Info',
            'info_helper'         => ' ',
            'origin'              => 'Origin',
            'origin_helper'       => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'transPlace' => [
        'title'          => 'Trans Place',
        'title_singular' => 'Trans Place',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'lang'                => 'Lang',
            'lang_helper'         => ' ',
            'order'               => 'Order',
            'order_helper'        => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'subtitle'            => 'Subtitle',
            'subtitle_helper'     => ' ',
            'slug'                => 'Slug',
            'slug_helper'         => ' ',
            'excerp'              => 'Excerp',
            'excerp_helper'       => ' ',
            'text'                => 'Text',
            'text_helper'         => ' ',
            'open_note_1'         => 'Open Note 1',
            'open_note_1_helper'  => ' ',
            'open_note_2'         => 'Open Note 2',
            'open_note_2_helper'  => ' ',
            'open_note_3'         => 'Open Note 3',
            'open_note_3_helper'  => ' ',
            'price_note_1'        => 'Price Note 1',
            'price_note_1_helper' => ' ',
            'price_note_2'        => 'Price Note 2',
            'price_note_2_helper' => ' ',
            'price_note_3'        => 'Price Note 3',
            'price_note_3_helper' => ' ',
            'opening'             => 'Opening',
            'opening_helper'      => ' ',
            'parking'             => 'Parking',
            'parking_helper'      => ' ',
            'info'                => 'Info',
            'info_helper'         => ' ',
            'origin'              => 'Origin',
            'origin_helper'       => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'transPost' => [
        'title'          => 'Trans Post',
        'title_singular' => 'Trans Post',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'lang'                => 'Lang',
            'lang_helper'         => ' ',
            'order'               => 'Order',
            'order_helper'        => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'subtitle'            => 'Subtitle',
            'subtitle_helper'     => ' ',
            'slug'                => 'Slug',
            'slug_helper'         => ' ',
            'excerp'              => 'Excerp',
            'excerp_helper'       => ' ',
            'text'                => 'Text',
            'text_helper'         => ' ',
            'open_note_1'         => 'Open Note 1',
            'open_note_1_helper'  => ' ',
            'open_note_2'         => 'Open Note 2',
            'open_note_2_helper'  => ' ',
            'open_note_3'         => 'Open Note 3',
            'open_note_3_helper'  => ' ',
            'price_note_1'        => 'Price Note 1',
            'price_note_1_helper' => ' ',
            'price_note_2'        => 'Price Note 2',
            'price_note_2_helper' => ' ',
            'price_note_3'        => 'Price Note 3',
            'price_note_3_helper' => ' ',
            'opening'             => 'Opening',
            'opening_helper'      => ' ',
            'parking'             => 'Parking',
            'parking_helper'      => ' ',
            'info'                => 'Info',
            'info_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'origin'              => 'Origin',
            'origin_helper'       => ' ',
        ],
    ],
    'transInfo' => [
        'title'          => 'Trans Info',
        'title_singular' => 'Trans Info',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'lang'                => 'Lang',
            'lang_helper'         => ' ',
            'order'               => 'Order',
            'order_helper'        => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'subtitle'            => 'Subtitle',
            'subtitle_helper'     => ' ',
            'slug'                => 'Slug',
            'slug_helper'         => ' ',
            'excerp'              => 'Excerp',
            'excerp_helper'       => ' ',
            'text'                => 'Text',
            'text_helper'         => ' ',
            'open_note_1'         => 'Open Note 1',
            'open_note_1_helper'  => ' ',
            'open_note_2'         => 'Open Note 2',
            'open_note_2_helper'  => ' ',
            'open_note_3'         => 'Open Note 3',
            'open_note_3_helper'  => ' ',
            'price_note_1'        => 'Price Note 1',
            'price_note_1_helper' => ' ',
            'price_note_2'        => 'Price Note 2',
            'price_note_2_helper' => ' ',
            'price_note_3'        => 'Price Note 3',
            'price_note_3_helper' => ' ',
            'opening'             => 'Opening',
            'opening_helper'      => ' ',
            'parking'             => 'Parking',
            'parking_helper'      => ' ',
            'info'                => 'Info',
            'info_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'origin'              => 'Origin',
            'origin_helper'       => ' ',
        ],
    ],
    'price' => [
        'title'          => 'Price',
        'title_singular' => 'Price',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'price'             => 'Price',
            'price_helper'      => ' ',
            'price_text'        => 'Price Text',
            'price_text_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'opening' => [
        'title'          => 'Opening',
        'title_singular' => 'Opening',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'open_hours'        => 'Open Hours',
            'open_hours_helper' => ' ',
            'open_text'         => 'Open Text',
            'open_text_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'openingText' => [
        'title'          => 'Opening Text',
        'title_singular' => 'Opening Text',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'de'               => 'de',
            'de_helper'        => ' ',
            'sk'               => 'sk',
            'sk_helper'        => ' ',
            'cs'               => 'cs',
            'cs_helper'        => ' ',
            'hu'               => 'hu',
            'hu_helper'        => ' ',
            'sl'               => 'sl',
            'sl_helper'        => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'priceNote' => [
        'title'          => 'Price Note',
        'title_singular' => 'Price Note',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'sk'                => 'Sk',
            'sk_helper'         => ' ',
            'cz'                => 'Cz',
            'cz_helper'         => ' ',
            'de'                => 'De',
            'de_helper'         => ' ',
            'hu'                => 'Hu',
            'hu_helper'         => ' ',
            'si'                => 'Si',
            'si_helper'         => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'openingNote' => [
        'title'          => 'Opening Note',
        'title_singular' => 'Opening Note',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'sk'                => 'Sk',
            'sk_helper'         => ' ',
            'cz'                => 'Cz',
            'cz_helper'         => ' ',
            'de'                => 'De',
            'de_helper'         => ' ',
            'hu'                => 'Hu',
            'hu_helper'         => ' ',
            'si'                => 'Si',
            'si_helper'         => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'post' => [
        'title'          => 'Post',
        'title_singular' => 'Post',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'order'               => 'Order',
            'order_helper'        => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'slug'                => 'Slug',
            'slug_helper'         => ' ',
            'cover_img'           => 'Cover Img',
            'cover_img_helper'    => ' ',
            'excerp'              => 'Excerp',
            'excerp_helper'       => ' ',
            'text'                => 'Text',
            'text_helper'         => ' ',
            'opening'             => 'Opening',
            'opening_helper'      => ' ',
            'opening_note'        => 'Opening Note',
            'opening_note_helper' => ' ',
            'price'               => 'Price',
            'price_helper'        => ' ',
            'price_note'          => 'Price Note',
            'price_note_helper'   => ' ',
            'parking'             => 'Parking',
            'parking_helper'      => ' ',
            'info'                => 'Info',
            'info_helper'         => ' ',
            'kontakt'             => 'Kontakt',
            'kontakt_helper'      => ' ',
            'zip'                 => 'ZIP',
            'zip_helper'          => ' ',
            'link'                => 'Link',
            'link_helper'         => ' ',
            'update'              => 'Update',
            'update_helper'       => ' ',
            'tags'                => 'Tags',
            'tags_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'activity'            => 'Activity',
            'activity_helper'     => ' ',
        ],
    ],
    'info' => [
        'title'          => 'Info',
        'title_singular' => 'Info',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'order'               => 'Order',
            'order_helper'        => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'slug'                => 'Slug',
            'slug_helper'         => ' ',
            'cover_img'           => 'Cover Img',
            'cover_img_helper'    => ' ',
            'excerp'              => 'Excerp',
            'excerp_helper'       => ' ',
            'text'                => 'Text',
            'text_helper'         => ' ',
            'opening'             => 'Opening',
            'opening_helper'      => ' ',
            'opening_note'        => 'Opening Note',
            'opening_note_helper' => ' ',
            'price'               => 'Price',
            'price_helper'        => ' ',
            'price_note'          => 'Price Note',
            'price_note_helper'   => ' ',
            'parking'             => 'Parking',
            'parking_helper'      => ' ',
            'info'                => 'Info',
            'info_helper'         => ' ',
            'kontakt'             => 'Kontakt',
            'kontakt_helper'      => ' ',
            'zip'                 => 'ZIP',
            'zip_helper'          => ' ',
            'link'                => 'Link',
            'link_helper'         => ' ',
            'update'              => 'Update',
            'update_helper'       => ' ',
            'tags'                => 'Tags',
            'tags_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'sidebarMall' => [
        'title'          => 'Sidebar Mall',
        'title_singular' => 'Sidebar Mall',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'mall'                 => 'Mall',
            'mall_helper'          => ' ',
            'sidebar_mall'         => 'Sidebar Mall',
            'sidebar_mall_helper'  => ' ',
            'sidebar_place'        => 'Sidebar Place',
            'sidebar_place_helper' => ' ',
            'sidebar_post'         => 'Sidebar Post',
            'sidebar_post_helper'  => ' ',
            'sidebar_info'         => 'Sidebar Info',
            'sidebar_info_helper'  => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'sidebarPlace' => [
        'title'          => 'Sidebar Place',
        'title_singular' => 'Sidebar Place',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'place'                => 'Place',
            'place_helper'         => ' ',
            'sidebar_mall'         => 'Sidebar Mall',
            'sidebar_mall_helper'  => ' ',
            'sidebar_place'        => 'Sidebar Place',
            'sidebar_place_helper' => ' ',
            'sidebar_post'         => 'Sidebar Post',
            'sidebar_post_helper'  => ' ',
            'sidebar_info'         => 'Sidebar Info',
            'sidebar_info_helper'  => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'sidebabrPost' => [
        'title'          => 'Sidebabr Post',
        'title_singular' => 'Sidebabr Post',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'post'                 => 'Post',
            'post_helper'          => ' ',
            'sidebar_mall'         => 'Sidebar Mall',
            'sidebar_mall_helper'  => ' ',
            'sidebar_place'        => 'Sidebar Place',
            'sidebar_place_helper' => ' ',
            'sidebar_post'         => 'Sidebar Post',
            'sidebar_post_helper'  => ' ',
            'sidebar_info'         => 'Sidebar Info',
            'sidebar_info_helper'  => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'sidebarInfo' => [
        'title'          => 'Sidebar Info',
        'title_singular' => 'Sidebar Info',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'info'                 => 'Info',
            'info_helper'          => ' ',
            'sidebar_mall'         => 'Sidebar Mall',
            'sidebar_mall_helper'  => ' ',
            'sidebar_place'        => 'Sidebar Place',
            'sidebar_place_helper' => ' ',
            'sidebar_post'         => 'Sidebar Post',
            'sidebar_post_helper'  => ' ',
            'sidebar_info'         => 'Sidebar Info',
            'sidebar_info_helper'  => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'accordion' => [
        'title'          => 'Accordion',
        'title_singular' => 'Accordion',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'cover_img'         => 'Cover Img',
            'cover_img_helper'  => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'subtitle'          => 'Subtitle',
            'subtitle_helper'   => ' ',
            'btn_1'             => 'Btn 1',
            'btn_1_helper'      => ' ',
            'btn_2'             => 'Btn 2',
            'btn_2_helper'      => ' ',
            'btn_3'             => 'Btn 3',
            'btn_3_helper'      => ' ',
            'btn_1_link'        => 'Btn 1 Link',
            'btn_1_link_helper' => ' ',
            'btn_2_link'        => 'Btn 2 Link',
            'btn_2_link_helper' => ' ',
            'btn_3_link'        => 'Btn 3 Link',
            'btn_3_link_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],

];
