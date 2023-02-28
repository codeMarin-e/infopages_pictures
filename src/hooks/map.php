<?php
return [
    implode(DIRECTORY_SEPARATOR, [ base_path(), 'app', 'Models', 'Infopage.php']) => [
        "// @HOOK_TRAITS" => "\tuse \\App\\Traits\\InfopagePicturesTrait; \n",
    ],
    implode(DIRECTORY_SEPARATOR, [ base_path(), 'config','marinar_infopages.php']) => [
        "// @HOOK_INFOPAGES_CONFIGS_ADDONS" => "\t\t\\Marinar\\InfopagesPictures\\MarinarInfopagesPictures::class, \n",
    ],
    implode(DIRECTORY_SEPARATOR, [ base_path(), 'resources', 'views', 'admin', 'infopages', 'infopage.blade.php']) => [
        "{{-- @HOOK_INFOPAGE_AFTER_CONTENT --}}" => implode(DIRECTORY_SEPARATOR, [__DIR__,  'HOOK_INFOPAGE_AFTER_CONTENT.blade.php']),
    ],
    implode(DIRECTORY_SEPARATOR, [ base_path(), 'app', 'Http', 'Controllers', 'Admin', 'InfopageController.php']) => [
        "// @HOOK_INFOPAGES_STORE_END" => implode(DIRECTORY_SEPARATOR, [__DIR__,  'HOOK_INFOPAGES_STORE_END.php']),
        "// @HOOK_INFOPAGES_UPDATE_END" => implode(DIRECTORY_SEPARATOR, [__DIR__,  'HOOK_INFOPAGES_STORE_END.php']),
    ],
    implode(DIRECTORY_SEPARATOR, [ base_path(), 'lang', 'en', 'admin', 'infopages', 'infopage.php']) => [
        "// @HOOK_INFOPAGE_LANG" => "\t'pictures' => [ \n\t\t'label' => 'Pictures', \n\t], \n",
    ],
    implode(DIRECTORY_SEPARATOR, [ base_path(), 'lang', 'en', 'admin', 'infopages', 'validation.php']) => [
        "// @HOOK_INFOPAGES_VALIDATION_LANG" => "\t'pictures.*.mime' => 'Wrong file type', \n",
    ],
    implode(DIRECTORY_SEPARATOR, [ base_path(), 'app', 'Http', 'Requests', 'Admin', 'InfopageRequest.php']) => [
        "// @HOOK_INFOPAGE_REQUEST_RULES" => implode(DIRECTORY_SEPARATOR, [__DIR__,  'HOOK_INFOPAGE_REQUEST_RULES.php']),
    ],
];
