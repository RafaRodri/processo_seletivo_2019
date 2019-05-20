<?php

namespace App\Http\Controllers;

use App\Services\NoticiaService;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    protected $service;

    public function __construct(NoticiaService $service)
    {
        $this->service = $service;
    }


    public function index()
    {
        $noticias = $this->service->search(1);

        return view('noticias.index', [
            'noticias' => $noticias,
            'search' => null
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $noticias = $this->service->search(1, $search);

        return view('noticias.index', [
            'noticias' => $noticias,
            'search' => $search
        ]);
    }

    public function page($id, $search = null)
    {
        $noticias = $this->service->search($id, $search);

        return view('noticias.index', [
            'noticias' => $noticias,
            'page' => $id,
            'search' => $search
        ]);
    }


    public function removeImage($texto)
    {
        $parte1 = explode('<img', $texto);// />
        $parte2 = explode('/>', $parte1[1]);

        $texto = $parte1[0] . "" . $parte2[1];

        return $texto;
    }
}
