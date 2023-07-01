<?php

use components\Helpers;

return [
    '' => [Helpers::GET, 'site/index'],
    'login' => [Helpers::GET, 'site/login'],
    'signup' => [Helpers::GET, 'site/signup'],
    'auth/login' => [Helpers::POST, 'auth/login'],
    'auth/signup' => [Helpers::POST, 'auth/signup'],
];
