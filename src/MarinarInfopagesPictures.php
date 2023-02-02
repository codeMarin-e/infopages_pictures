<?php
namespace Marinar\InfopagesPictures;

use Marinar\InfopagesPictures\Database\Seeders\MarinarInfopagesPicturesInstallSeeder;

class MarinarInfopagesPictures {

    public static function getPackageMainDir() {
        return __DIR__;
    }

    public static function injects() {
        return MarinarInfopagesPicturesInstallSeeder::class;
    }
}
