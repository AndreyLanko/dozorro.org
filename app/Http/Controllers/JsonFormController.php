<?php namespace App\Http\Controllers;

use App\Classes\User;
use Illuminate\Routing\Controller as BaseController;
use App\JsonForm;
use Carbon\Carbon;
use Input;

class JsonFormController extends BaseController
{
    var $folder = '/sources/forms';
    var $forms = [
        'F101' => 'F101.json',
        'F102' => 'F102.json',
        'F103' => 'F103.json',
        'F104' => 'F104.json',
        'F105' => 'F105.json',
        'F106' => 'F106.json',
        'F107' => 'F107.json',
        'F108' => 'F108.json',
        'F109' => 'F109.json',
    ];

    var $form;
    
	public function submit()
	{
        	$slug=Input::get('form_code');

		if(!in_array($slug, array_keys($this->forms)))
			abort(404);

        $jsonFormPath = public_path().$this->folder.'/'.$this->forms[$slug];

        $jsonForm = new \App\Classes\JsonForm($jsonFormPath);

        if (!$jsonForm->validate()) {
            return response()->json(false, 200, [
                'Content-Type' => 'application/json; charset=UTF-8',
                'charset' => 'UTF-8'
            ], JSON_UNESCAPED_UNICODE);
        }

        $response = $this->form101($slug, $jsonForm);

        return response()->json($response, 200, [
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'UTF-8'
        ], JSON_UNESCAPED_UNICODE);

//        if(file_exists($jsonFormPath))
//        {
//            $jsonForm=file_get_contents($jsonFormPath);
//
//            if($jsonForm)
//            {
//                $jsonForm=json_decode($jsonForm, true);
//                $jsonFormArray=array_dot($jsonForm);
//
//                foreach($jsonFormArray as $k=>$one)
//                {
//                    if(strpos($k, '.form.')!==false)
//                    {
//                        $key=substr($k, 0, strpos($k, '.form.'));
//                        $this->form=array_get($jsonForm, $key);
//
//                        break;
//                    }
//                };
//
//                if($this->form && !empty($this->form['required']) && is_array($this->form['required']))
//                {
//                    $response=true;
//
//                    foreach($this->form['required'] as $field)
//                    {
//                        if(empty(Input::get('form.'.$field)))
//                            $response=false;
//                    }
//                }
//
//                if($response)
//                {
//
//                }
//            }
//        }


	}

	protected function form101($slug, \App\Classes\JsonForm $jsonForm)
    {
        $user = User::data();

        $PageController=app('App\Http\Controllers\PageController');
        $PageController->search_type='tender';

        $json=$PageController->getSearchResults(['tid='.Input::get('tender_public_id')]);
        $data=json_decode($json);

        if(!empty($data->items[0])) {
            $tender=$data->items[0];

            $form = new JsonForm();
            $user = User::data();

            if ($user) {
                if(!Input::get('form'))
                    return true;

                $data = $this->data($jsonForm->getJsonContent(), $slug);

                if (in_array($slug, ['form102', 'form103'])) {
                    $data = array_filter($data);
                }

                if (!empty($data)) {
                    $data = json_encode($data, JSON_UNESCAPED_UNICODE);

                    $form->object_id=null;
                    $form->tender_id=Input::get('tender_id');
                    $form->model=$slug;
                    $form->thread_id=Input::get('form.thread_id');
                    $form->created_at=Carbon::now();
                    $form->data = $data;

                    $form->user_name = $user->full_name;
                    $form->user_email = $user->email;
                    $form->user_social = $user->social;

                    $form->tender_public_id=$tender->tenderID;
                    $form->tender_name=$tender->title;
                    $form->procuring_entity_name=!empty($tender->procuringEntity->identifier->legalName) ? $tender->procuringEntity->identifier->legalName : $tender->procuringEntity->name;
                    $form->procuring_entity_code=$tender->procuringEntity->identifier->id;

                    $form->save();
                }

                $response = true;
            } else {
                $response = false;
            }
        } else {
            $response = false;
        }

        return $response;
    }

	protected function check()
	{
    }
    	
	protected function data($form, $slug)
	{
        $form = json_decode($form, 1);

	    if (!array_key_exists('properties', $form) || !array_key_exists('userForm', $form['properties'])) {
            throw Exception('Случилась какая-то ошибка');
        }

        $form = $form['properties']['userForm'];

        $data =! empty($form['properties']) ? array_intersect_key(Input::get('form'), $form['properties']) : [];

        return $data;
    }
}
