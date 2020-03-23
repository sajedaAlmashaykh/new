<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

trait ApiResponser
{

    private function successResponse($data, $code)
    {

        return response()->json($data, $code);
    }

    protected function errorResponse($message, $code)
    {
        return response()->json(['errors' => $message, 'code' => $code], $code);
    }

    public function showOne(Model $instance, $code = 200, $key = 'data')
    {
        return $this->successResponse([$key => $instance], $code);
    }

    public function showAll(Collection $collection, $code = 200, $key = 'data')
    {
        return $this->successResponse([$key => $collection->toArray()], $code);
    }
}
