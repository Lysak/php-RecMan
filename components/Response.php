<?php

namespace components;

use JetBrains\PhpStorm\NoReturn;
use Throwable;

class Response
{
    /**
     * @param string     $view_path
     * @param array|null $data
     * @param int|null   $code
     * @return void
     */
    public static function render(string $view_path, array|null $data = null, int|null $code = Helpers::HTTP_OK): void
    {
        try {
            $data ??= [];

            $full_path = APPLICATION_ROOT . $view_path . Helpers::PHP_EXTENSION;

            if (file_exists($full_path)) {
                require_once($full_path);
                die();
            } else {
                self::render('/views/site/404', ['Page not found'], Helpers::HTTP_NOT_FOUND);
            }
        } catch (Throwable $e) {
            self::render('/views/site/error', [$e->getMessage()], Helpers::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @param string $errorMessage
     * @return void
     */
    public static function renderError(string $errorMessage): void
    {
        try {
            $data ??= [];

            $full_path = APPLICATION_ROOT . "/views/site/error" . Helpers::PHP_EXTENSION;

            if (file_exists($full_path)) {
                require_once($full_path);
                die();
            } else {
                self::render('/views/site/404', [$errorMessage], Helpers::HTTP_NOT_FOUND);
            }
        } catch (Throwable $e) {
            self::render('/views/site/error', [$e->getMessage()], Helpers::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @return void
     */
    public static function renderNotFound(): void
    {
        try {
            $data ??= [];

            $full_path = APPLICATION_ROOT . "/views/site/404" . Helpers::PHP_EXTENSION;

            if (file_exists($full_path)) {
                require_once($full_path);
                die();
            } else {
                self::render('/views/site/404', ["Page not found"], Helpers::HTTP_NOT_FOUND);
            }
        } catch (Throwable $e) {
            self::render('/views/site/error', [$e->getMessage()], Helpers::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @param array|null $data
     * @param int        $statusCode
     * @return bool
     */
    #[NoReturn] public static function successJson(
        array|null $data = null,
        int $statusCode = Helpers::HTTP_OK,
    ): bool
    {
        $data ??= [];
        $data = [
            'successful' => true,
            'data' => $data,
        ];

        http_response_code($statusCode);
        header('Content-Type: application/json');

        $json_data = json_encode($data);

        die($json_data);
    }

    /**
     * @param string $message
     * @param int    $statusCode
     * @return bool
     */
    #[NoReturn] public static function successJsonMessage(
        string $message,
        int $statusCode = Helpers::HTTP_OK,
    ): bool
    {
        $data = [
            'successful' => true,
            'message' => $message,
        ];

        http_response_code($statusCode);
        header('Content-Type: application/json');

        $json_data = json_encode($data);

        die($json_data);
    }

    /**
     * @param array|null $data
     * @param int        $statusCode
     * @return bool
     */
    #[NoReturn] public static function failureJson(
        array|null $data = null,
        int $statusCode = Helpers::HTTP_BAD_REQUEST,
    ): bool
    {
        $data ??= [];
        $data = [
            'successful' => false,
            'data' => $data,
        ];

        http_response_code($statusCode);
        header('Content-Type: application/json');

        $json_data = json_encode($data);

        die($json_data);
    }

    /**
     * @param string $message
     * @param int    $statusCode
     * @return bool
     */
    #[NoReturn] public static function failureJsonMessage(
        string $message,
        int $statusCode = Helpers::HTTP_BAD_REQUEST,
    ): bool
    {
        $data = [
            'successful' => false,
            'message' => $message,
        ];

        http_response_code($statusCode);
        header('Content-Type: application/json');

        $json_data = json_encode($data);

        die($json_data);
    }
}
