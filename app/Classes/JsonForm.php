<?php

namespace App\Classes;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Input;

/**
 * Class JsonForm
 * @package App\Classes
 */
class JsonForm
{
    /**
     * @var string
     */
    private $form;

    private $jsonContent;

    /**
     * JsonForm constructor.
     * @param $form
     */
    public function __construct($form)
    {
        $this->form = $form;
    }

    /**
     * @return string
     * @throws FileNotFoundException
     */
    private function getFormFile()
    {
        if (!file_exists($this->form)) {
            throw new FileNotFoundException();
        }

        return file_get_contents($this->form);
    }

    /**
     * @return array|mixed
     */
    private function handleFormContent()
    {
        $jsonContent = $this->getFormFile();

        $this->jsonContent = $jsonContent;

        $jsonForm = json_decode($jsonContent, true);
        $jsonFormArray = array_dot($jsonForm);
        $formContent = [];

        foreach($jsonFormArray as $k => $one)
        {
            if(strpos($k, '.form.') !== false)
            {
                $key = substr($k, 0, strpos($k, '.form.'));
                $formContent = array_get($jsonForm, $key);

                break;
            }
        };

        return $formContent;
    }

    /**
     * @return mixed
     */
    public function getJsonContent()
    {
        return $this->jsonContent;
    }

    /**
     * @return bool
     */
    public function validate()
    {
        $this->handleFormContent();

        $is_valid = true;

        if($this->form && !empty($this->form['required']) && is_array($this->form['required']))
        {
            foreach($this->form['required'] as $field)
            {
                if(empty(Input::get('form.'.$field)))
                    $is_valid = false;
            }
        }

        return $is_valid;
    }
}
