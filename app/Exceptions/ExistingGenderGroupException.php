<?php

namespace App\Exceptions;

use Exception;

class ExistingGenderGroupException extends Exception {
    public $experienceId;

    public function __construct($message, $experienceId, $code = 0, ?Exception $previous = null) {
        $this->experienceId = $experienceId;
        parent::__construct($message, $code, $previous);
    }

    /**
     * Get the exception's context information.
     *
     * @return array<string, mixed>
     */
    public function context(): array {
        return ['experience_id' => $this->experienceId];
    }
}
