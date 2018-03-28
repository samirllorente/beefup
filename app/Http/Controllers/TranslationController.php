<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Statickidz\GoogleTranslate;

class TranslationController extends Controller
{
   public function translate(Request $request)
   {
        if($request->ajax()){
            $trans = new GoogleTranslate();
            $result = $trans->translate($request['source'], $request['target'], $request['text']);
            return response()->json(["result"=>$result]);
        }
   }
}
