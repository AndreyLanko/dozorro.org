<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Classes\User;
use Carbon\Carbon;
use App\JsonForm;
use Exception;
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
        'comment' => 'comment.json',
        'F111' => 'F111.json',
        'F112' => 'F112.json',
    ];

    var $form;
    
    private $json_options = JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE;
    
	public function submit($model)
	{
        	$slug=Input::get('schema');

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

        $response = $this->payload($slug, $model, $jsonForm);

        return response()->json($response, 200, [
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'UTF-8'
        ], JSON_UNESCAPED_UNICODE);
	}

	protected function payload($slug, $model, \App\Classes\JsonForm $jsonForm)
    {
        $user = User::data();

        $PageController=app('App\Http\Controllers\PageController');
        $PageController->search_type='tender';

        $json=$PageController->getSearchResults([
            'tid='.Input::get('tender_public_id')
        ]);

        $data=json_decode($json);

        if(!empty($data->items[0])) {
            $tender=$data->items[0];

            $form = new JsonForm();
            $user = User::data();

            if ($user) {
                if(!Input::get('form'))
                    return true;

                if($model=='form') {
                    $data = $this->data($jsonForm->getJsonContent());
                } else {
                    $data = ['text'=>Input::get('form.text')];
                }

                if (in_array($slug, ['form102', 'form103'])) {
                    $data = array_filter($data);
                }

                if (!empty($data)) {
                    $form->tender=Input::get('tender');
                    $form->schema=$slug;
                    $form->model=$model;
                    $form->owner=env('JSONFORMS_OWNER_ID', 'dozorro.org');
                    $form->thread=Input::get('form.thread');
                    $form->date=Carbon::now();
                    $form->payload=$this->getPayload($data);
                    $form->object_id=$this->hash_id($form->payload);

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

	protected function getPayload($formData)
	{
        	$user = User::data();
        	
        	$payload = [
            	'author' => [
                	'authBy' => 'internal',
                	'name' => $user->full_name,
                	'email' => $user->email,
                	'social' => $user->social,
                    'uniqueKey' => md5($user->email . $user->social),
            	],
            	'tender'=>Input::get('tender'),
            	'userForm'=>$formData
        	];

        $this->recursive_sort($payload);

        return json_encode($payload, $this->json_options);
    }

    private function hash_id($data)
    {
		$h1 = hash('sha256', $data, true);
		$h2 = hash('sha256', $h1);

		return substr($h2, 0, 32);
	}
	
	private function recursive_sort(&$obj)
    {
		if (is_object($obj)){
			$obj = (array) $obj;
        }

		foreach ($obj as &$val)
		{
			if (is_array($val) || is_object($val)){
				$this->recursive_sort($val);
            }
        }
        
		ksort($obj);
	}

	protected function data($form)
	{
        $form=json_decode($form, true);

	    if (!array_key_exists('properties', $form) || !array_key_exists('userForm', $form['properties'])) {
            throw Exception('Случилась какая-то ошибка');
        }

        $form=$form['properties']['userForm'];

        $data =! empty($form['properties']) ? array_intersect_key(Input::get('form'), $form['properties']) : [];

        return $data;
    }
}
