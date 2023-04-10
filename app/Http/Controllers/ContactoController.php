<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index(Request $req)
    {
        $contacto = New Contacto();

        $contacto->name=$req->name;
        $contacto->email=$req->email;
        $contacto->phone=$req->phone;

        $data=$contacto->save();
        if(!$data)
        {
        return response()->json([
            'status'=>400,
            'error'=> 'something went wrong'
        ]);
    }
    else{
        return response()->json([
            'status'=>200,
            'message'=>'Data successfully saved'
        ]);
    }
    }
}
