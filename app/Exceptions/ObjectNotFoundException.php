<?php

namespace App\Exceptions;


use Exception;
use Illuminate\Http\Response;

class ObjectNotFoundException extends Exception
{
    public function render()
    {
        $message = $this->getMessage() ?? 'Object not found';

        return response()->json(
            [
                'message' => $message
            ],
            Response::HTTP_NOT_FOUND
        );
    }
}
