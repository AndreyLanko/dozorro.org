<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\JsonForm;
use Carbon\Carbon;
use Input;

class JsonFormController extends BaseController
{
    var $folder='/sources/forms';
    var $forms=[
        'review'=>'F101.json'
    ];

    var $form;
    
	public function submit($slug)
	{
		if(!in_array($slug, array_keys($this->forms)))
			abort(404);

        $jsonFormPath=public_path().$this->folder.'/'.$this->forms[$slug];
        $response=false;
        
        if(file_exists($jsonFormPath))
        {
            $jsonForm=file_get_contents($jsonFormPath);

            if($jsonForm)
            {
                $jsonForm=json_decode($jsonForm, true);
                $jsonFormArray=array_dot($jsonForm);

                foreach($jsonFormArray as $k=>$one)
                {
                    if(strpos($k, '.form.')!==false)
                    {
                        $key=substr($k, 0, strpos($k, '.form.'));
                        $this->form=array_get($jsonForm, $key);

                        break;
                    }
                };

                if($this->form && !empty($this->form['required']) && is_array($this->form['required']))
                {
                    $response=true;

                    foreach($this->form['required'] as $field)
                    {
                        if(empty(Input::get('form.'.$field)))
                            $response=false;
                    }
                }
                
                if($response)
                {
                    $PageController=app('App\Http\Controllers\PageController');
                    $PageController->search_type='tender';

                    $json=$PageController->getSearchResults(['tid='.Input::get('tender_public_id')]);
                    $data=json_decode($json);

                    if(!empty($data->items[0]))
                    {
                        $tender=$data->items[0];
                        
                        $form=new JsonForm();
                        
                        $form->object_id=null;
                        $form->tender_id=Input::get('tender_id');
                        $form->model=$slug;
                        $form->thread_id=Input::get('form.thread_id');
                        $form->created_at=Carbon::now();
                        $form->data=$this->data();
    
                        $form->tender_public_id=$tender->tenderID;
                        $form->tender_name=$tender->title;
                        $form->procuring_entity_name=!empty($tender->procuringEntity->identifier->legalName) ? $tender->procuringEntity->identifier->legalName : $tender->procuringEntity->name;
                        $form->procuring_entity_code=$tender->procuringEntity->identifier->id;
    
                        $form->save();
                    }
                    else
                        $response=false;
                }
            }
        }

		return response()->json($response, 200, [
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'UTF-8'
        ], JSON_UNESCAPED_UNICODE);
	}
	
	protected function check()
	{
    	}
    	
	protected function data()
	{
        	$data=!empty($this->form['properties']) ? array_intersect_key(Input::get('form'), $this->form['properties']) : [];

    	    	return json_encode($data, JSON_UNESCAPED_UNICODE);
    	}
}
