<?php

/**
 * Error and exception handler
 */

 namespace Core;

 class Error
 {
    /**
     * Errors are turned into exceptions
     */
    public static function errorHandler(int $level, string $message, string $file, int $line): void
    {
        if (error_reporting() !== 0) {
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }

    public static function exceptionHandler(\Exception $exception): void 
    {
        $code = $exception->getCode();
        if ($code !== 404) {
            $code = 500;
        }

        http_response_code($code);

        $exceptionClass = get_class($exception);
        $exceptionInfo = <<<EXCEPTION
            <section>
                <p>Uncaught exception: $exceptionClass</p>
                <p>Message: {$exception->getMessage()}</p>
                <p>Stack trace: {$exception->getTraceAsString()}</p>
                <p>Throw in: {$exception->getFile()} on line {$exception->getLine()}</p>
            </section>
        EXCEPTION;

        if (\App\Config::SHOW_ERRORS) {
            View::render("Errors/$code.php", [
                'pageTile' => 'Error',
                'errorInfo' => $exceptionInfo
            ]);
        } 
    }
 }