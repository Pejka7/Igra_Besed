<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Adjective;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
 
class AddDataController extends Controller
{
    public function upload()
    {
        return view('uploadForm');
    }
    
    public function uploadSubmit(Request $request)
    {
       //print_r($request->file('files'));
        $customMessages = ['is_xml_file' => 'Datoteka mora biti tipa xml. Nepravilne datoteke so zapisane v storage/app/file.txt'];
        
        $this->validate($request, [
	    'files' => 'is_xml_file',
	], $customMessages);
     
	//$product = Product::create($request->all());
        foreach ($request->files as $file) {
            $filename = $file->store('files');
           // ProductsPhoto::create([
           //     'product_id' => $product->id,
           //     'filename' => $filename
          //  ]);
        }
        
        return 'Upload successful!';
        
        /*$filename = 'C:\xampp\htdocs\igrabesed_start\storage\app\bel-p.xml';
        $xmlReader = new XMLReader();
        $xmlReader -> open($filename);
        
        while($xmlReader->read()){ 
            if($xmlReader-> nodeType == XMLReader::ELEMENT && $xmlReader -> name == "k"){
                $kid = $xmlReader-> getAttribute("kid");
                $frek_kol = $xmlReader-> getAttribute("frek_kol");
                $jak_kol = $xmlReader -> getAttribute("jak_kol");
                $xmlReader -> read();
                $noun = $xmlReader -> value;        
                print "{$kid}, {$frek_kol}, {$jak_kol}, {$noun}<br>";
            }
        }*/
       
        /*$time_end = microtime(true);
        $execution_time = ($time_end - $time_start);
        print "{$execution_time}";*/
        //}
        //}
    }
    
}
