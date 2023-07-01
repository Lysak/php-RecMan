<?php

namespace src\controllers;

use components\Response;
use src\services\AuthService;
use Throwable;

class AuthController
{
    public function actionLogin(): string
    {
        try {
            $email_or_phone = clean_input($_POST['email_or_phone']);
            $password = clean_input($_POST['password']);

            $siteService = new AuthService();
            $result = $siteService->login(
                $email_or_phone,
                $password,
            );

            if ($result) {
                return Response::successJsonMessage("Successfully login");
            } else {
                return Response::failureJsonMessage("Wrong credentials");
            }
        } catch (Throwable $e) {
            return Response::failureJsonMessage($e->getMessage());
        }
    }

    public function actionSignup(): string
    {
        try {
            $first_name = clean_input($_POST['first_name']);
            $last_name = clean_input($_POST['last_name']);
            $email = clean_input($_POST['email']);
            $phone = preg_replace('/[^0-9.]+/', '', clean_input($_POST['phone']));
            $password = clean_input($_POST['password']);

            $siteService = new AuthService();
            $result = $siteService->signup(
                $first_name,
                $last_name,
                $email,
                $phone,
                $password,
            );

            return Response::successJson($result);
        } catch (Throwable $e) {
            return Response::failureJsonMessage($e->getMessage());
        }
    }
}
