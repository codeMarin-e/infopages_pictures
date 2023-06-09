<?php
    namespace Marinar\InfopagesPictures\Database\Seeders;

    use Illuminate\Database\Seeder;
    use Marinar\InfopagesPictures\MarinarInfopagesPictures;

    class MarinarInfopagesPicturesInstallSeeder extends Seeder {

        use \Marinar\Marinar\Traits\MarinarSeedersTrait;

        public static function configure() {
            static::$packageName = 'marinar_infopages_pictures';
            static::$packageDir = MarinarInfopagesPictures::getPackageMainDir();
        }

        public function run() {
            if(!in_array(env('APP_ENV'), ['dev', 'local'])) return;

            $this->autoInstall();

            $this->refComponents->info("Done!");
        }

    }
