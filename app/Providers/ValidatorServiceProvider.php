<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;
use Validator;

class ValidatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('is_xml_file', function($attribute, $value, $parameters, $validator) {
            $filesCounter = count($validator->getData()['files'])-1;
            $mimeTypes = array('text/plain', 'application/xml');
            $validation = true;
            Storage::disk('local')->put('file.txt', 'Nepravilne datoteke '.date("d.m.Y h:i:sa").":\n");
            $validate = $validator->getData()['files'];
            
            foreach(range(0, $filesCounter) as $counter) {  
                if (!(in_array($validate[$counter]->getMimeType(), $mimeTypes)) || ($validate[$counter]->getClientOriginalExtension() != 'xml')){
                    Storage::disk('local')->append('file.txt', '-'.$validate[$counter]->getClientOriginalName());
                    $validation = false;
                }       
            }
            return $validation;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
