<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        print_r($this->file('files')[0]->getClientMimeType());
        print_r($this->file('files')[0]->getMimeType());
        $xmlFiles = count($this->file('files'));
        foreach(range(0, $xmlFiles-1) as $xml) {
            $rules['files.' . $xml] = '';
        }
        
        /*foreach($this->files->get('files') as $file) {
            $rules['files.' . $file] = substr($this->files->get('files')[$files]->getClientOriginalName(), -3);
        }*/

        return $rules;
    }
}
