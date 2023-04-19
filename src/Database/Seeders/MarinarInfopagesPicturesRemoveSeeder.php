<?php
    namespace Marinar\InfopagesPictures\Database\Seeders;

    use App\Models\Attachment;
    use App\Models\Infopage;
    use Illuminate\Database\Seeder;
    use Marinar\InfopagesPictures\MarinarInfopagesPictures;

    class MarinarInfopagesPicturesRemoveSeeder extends Seeder {

        use \Marinar\Marinar\Traits\MarinarSeedersTrait;

        public static function configure() {
            static::$packageName = 'marinar_infopages_pictures';
            static::$packageDir = MarinarInfopagesPictures::getPackageMainDir();
        }

        public function run() {
            if(!in_array(env('APP_ENV'), ['dev', 'local'])) return;

            $this->autoRemove();

            $this->refComponents->info("Done!");
        }

        public function clearMe() {
            $this->refComponents->task("Clear DB", function() {
                try {
                    \Illuminate\Support\Facades\DB::beginTransaction();
                    foreach(Attachment::whereHasMorph('attachable', [Infopage::class])->where('type', 'pictures')->get() as $attachment) {
                        $attachment->delete();
                    }
                    \Illuminate\Support\Facades\DB::commit();
                } catch (\Exception $exception) {
                    echo PHP_EOL.$exception->getMessage().PHP_EOL;
                    // Don't Persist Changes to DB; Rollback
                    \Illuminate\Support\Facades\DB::rollBack();
                    return false;
                }
                return true;
            });
        }
    }
