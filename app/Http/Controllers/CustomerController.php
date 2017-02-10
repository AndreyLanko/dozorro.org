<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CustomerController extends Controller
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function search(Request $request)
    {
        $customers = json_decode(file_get_contents(public_path().'/sources/ua/edrpou.json'), true);
        $result = array();

        foreach ($customers as $key => $customer){

            if($request->has('edrpou')) {
                if($request->get('edrpou') != $key) {
                    continue;
                } else {
                    return [
                        'value' => $customer,
                        'key' => $key,
                    ];
                }
            } else if (stripos($customer, $request->get('query')) === false || count($result) === 20) {
                continue;
            }

            $result[] = [
                'value' => $customer,
                'key' => $key,
            ];
        }

        return new JsonResponse($result);
    }
}
