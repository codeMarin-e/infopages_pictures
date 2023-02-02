<?php
	return [
		'install' => [
            'php artisan db:seed --class="\Marinar\InfopagesPictures\Database\Seeders\MarinarInfopagesPicturesInstallSeeder"',
		],
		'remove' => [
            'php artisan db:seed --class="\Marinar\InfopagesPictures\Database\Seeders\MarinarInfopagesPicturesRemoveSeeder"',
        ]
	];
