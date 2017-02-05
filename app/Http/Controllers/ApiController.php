<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Routing\Controller;

class ApiController extends Controller
{
    public function tender($id)
    {
        $db=DB::table('perevorot_dozorro_json_forms')->select('tender_json', 'model', DB::raw('count(*) AS total'), DB::raw('MAX(date) AS date'))->where('tender', $id)->groupBy('tender', 'model')->get();

        if($db)
        {
            $json=json_decode(head($db)->tender_json);
    
            $data=[
                'found'=>true,
                'id'=>$id,
                'tenderID'=>$json->tenderID,
                'dozorro'=>[]
            ];
            
            foreach($db as $row)
            {
                $date=new \Datetime($row->date);

                $data['dozorro'][$row->model.'Count']=$row->total;
                $data['dozorro']['last'.ucfirst($row->model).'Date']=$date->format(\DateTime::ATOM);
            }
        }
        else
        {
            $data=[
                'found'=>false
            ];
        }

        return response()->json([
            'data'=>$data
        ], 200, [
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'UTF-8'
        ], JSON_UNESCAPED_UNICODE);

    }
}
