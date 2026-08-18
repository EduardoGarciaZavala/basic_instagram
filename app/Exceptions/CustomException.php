<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Override;

class CustomException extends Exception {

 #[Override]
 public function __construct(
    string $message = "", 
    int $code = 0, 
    private mixed $context = [],
    Throwable|null $previous = null
    )
 {
    return parent::__construct($message, $code, $previous);
 }

 public function getContext(): mixed
 {
    return $this->context;
 }
}