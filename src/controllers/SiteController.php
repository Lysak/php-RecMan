<?php

namespace src\controllers;

use components\Helpers;
use components\Response;
use Throwable;

class SiteController
{
    public function actionIndex(): void
    {
        try {
            Response::render('/views/site/index');
        } catch (Throwable $e) {
            Response::render('/views/site/error', [$e->getMessage()], Helpers::HTTP_BAD_REQUEST);
        }
    }

    public function actionLogin(): void
    {
        try {
            Response::render('/views/site/login');
        } catch (Throwable $e) {
            Response::render('/views/site/error', [$e->getMessage()], Helpers::HTTP_BAD_REQUEST);
        }
    }

    public function actionSignup(): void
    {
        try {
            Response::render('/views/site/signup');
        } catch (Throwable $e) {
            Response::render('/views/site/error', [$e->getMessage()], Helpers::HTTP_BAD_REQUEST);
        }
    }
}
