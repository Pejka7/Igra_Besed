<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Adjective;
use \XMLReader;

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
        $rules = ['files' => 'is_xml_file'];
        $this->validate($request, $rules, $customMessages);
     
	//$product = Product::create($request->all());

        //$request->file('files')->storeAs('files', $request->file('files')->getClientOriginalName());
        //return $request->file('files');
       // echo "</br>********************";
        $xmls = $request->file('files');
        foreach ($xmls as $xml) {
            $originalName = $xml->getClientOriginalName();
            $xml->storeAs('datoteke_xml', $originalName);
            $filename = storage_path('app\datoteke_xml\\' .$originalName);
            
            $xmlReader = new XMLReader();
            $xmlReader -> open($filename);
            while($xmlReader->read()){ 
                if($xmlReader -> nodeType == XMLReader::ELEMENT && $xmlReader -> name == "k"){
                    $kid = $xmlReader-> getAttribute("kid");
                    $frek_kol = $xmlReader-> getAttribute("frek_kol");
                    $jak_kol = $xmlReader -> getAttribute("jak_kol");
                    $xmlReader -> read();
                    $noun = $xmlReader -> value;        
                    print "{$kid}, {$frek_kol}, {$jak_kol}, {$noun}<br>";
                }
            }
            $xmlReader -> close($filename);
            
        }
        Storage::deleteDirectory('datoteke_xml');
        
        
        return 'Upload successful!';
        
        /*
        
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
