<?php

namespace src\controllers;

use components\View;
use Throwable;

class SiteController
{
    /**
     * @var View
     */
    private View $view;

    /**
     * SiteController constructor.
     */
    public function __construct()
    {
        $this->view = new View();
    }

    public function actionIndex(): void
    {
        try {
            $this->view->render('/views/site/index', ['$e->getMessage()']);
        } catch (Throwable $e) {
            $this->view->render('/views/site/error', [$e->getMessage()]);
        }
    }

    public function actionLogin(): void
    {
        try {
            $this->view->success('/views/site/login');
        } catch (Throwable $e) {
            $this->view->notFound($e->getMessage());
        }
    }

    public function actionSignup(): void
    {
        try {
            $this->view->success('/views/site/signup');
        } catch (Throwable $e) {
            $this->view->notFound($e->getMessage());
        }
    }
}
