<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\CorreoMail;
use Illuminate\Support\Facades\Mail;

class CorreoController extends Controller
{
    public function index(){



    }

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $destino=$request->input('correo');
            $correo = new CorreoMail($request->all());
            Mail::to($destino)->send($correo->attach($request->file->getRealPath(), [
                'as' => $request->file->getClientOriginalName(),
                'mime' => $request->file->getClientMimeType(),
            ]));
            return "Mensaje y archivo adjunto enviados correctamente";
        } else {
            return "No se ha subido correctamente el archivo";
        }
    }
}
