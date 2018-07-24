<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    /**
     * Return generic json response with the given data.
     *
     * @param $data
     * @param int $statusCode
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */

    protected function respond($data, $statusCode = 200, $headers = [])
    {
        return response()->json($data, $statusCode, $headers);
    }


    /**
     * Respond with error.
     *
     * @param $message
     * @param $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondError($statusCode, $message = '', $params = [])
    {
        $data = [
                'message' => empty($message) ? (empty(config('errors.code')[$statusCode]) ? '' : config('errors.code')[$statusCode])  : $message,
                'statusCode' => $statusCode,
            ];
        if(config('app.debug')) {
            $data['params'] = $params;
        }
        return $this->respond($data, 200);
    }

    /**
     * Respond with success.
     *
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondSuccess($data)
    {
        return $this->respond([
                'message' => config('errors.code')[200],
                'statusCode' => '200',
                'data' => $data
        ], 200);
    }

}
