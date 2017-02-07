<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Routing\Controller;

class ApiController extends Controller
{
    public function tender_index()
    {
        $db=DB::table('perevorot_dozorro_json_forms')->select('tender_json', 'model', DB::raw('count(*) AS total'), DB::raw('MAX(date) AS date'))->where('tender_json', '!=', '')->groupBy('tender', 'model')->take(300)->get();

        if($db)
        {
            $data=[
                'found'=>true,
                'dozorro'=>[]
            ];
            
            foreach($db as $row)
            {
                $json=json_decode($row->tender_json);

                if(empty($data['dozorro'][$json->tenderID]))
                    $data['dozorro'][$json->tenderID]=[];
                
                $date=new \Datetime($row->date);

                $item[$row->model.'Count']=$row->total;
                $item['last'.ucfirst($row->model).'Date']=$date->format(\DateTime::ATOM);
                
                $data['dozorro'][$json->tenderID]=$item;
            }
            
            if(empty($data['dozorro']))
            {
                $data=[
                    'found'=>false
                ];
            }
            else
            {
                $items=[];

                foreach($data['dozorro'] as $tenderID=>$row)
                {
                    $row['tenderID']=$tenderID;
                    $row=array_reverse($row);

                    array_push($items, $row);
                }

                $data['dozorro']=$items;
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
