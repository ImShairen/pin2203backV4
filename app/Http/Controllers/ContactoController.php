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

        $details = [
            'title' => 'New contact: ' . $contacto->name,
            'body' => 'Email: ' . $contacto->email,
            'body1' => 'Phone: ' . $contacto->phone,
        ];
        \Mail::to('ezedemartin@gmail.com')->send(new \App\Mail\SendPost($details));

        return response()->json([
            'mensaje' => 'Se Agregó Correctamente al Contacto',
            'data' => $contacto,
        ]);
}
}