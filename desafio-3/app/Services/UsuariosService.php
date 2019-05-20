<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class UsuariosService
{
    public function salvar($request)
    {
        $url = 'http://localhost/api/usuarios';
        $data = $this->getApi($url, 'post', $request);

        return $data;
    }

    public function atualizar($request, $id)
    {
        $url = 'http://localhost/api/usuarios/' . $id;
        $data = $this->getApi($url, 'put', $request);

        return $data;
    }

    public function usuarios()
    {
        $url = 'http://localhost/api/usuarios';
        $data = $this->getApi($url, 'get', null);

        return $data;
    }

    public function usuario($id)
    {
        $url = 'http://localhost/api/usuarios/' . $id;
        $data = $this->getApi($url, 'get', null);

        return $data;
    }

    public function deletar($id)
    {
        $url = 'http://localhost/api/usuarios/' . $id;
        $request = Request::create($url, 'delete');
        $response = Route::dispatch($request);

        return $response->headers->get('entity');
    }


    public function getApi($url, $method, $data)
    {
        if ($method == 'post')
            $request = Request::create($url, $method, $data);
        else
            $request = Request::create($url, $method);

        $response = Route::dispatch($request);
        $data = json_decode($response->getContent());

        if($data->total_usuarios != 0){
            return (object)[
                'success' => true,
                'data' => $data,
            ];
        }else {
            return (object)[
                'success' => false,
                'data' => $data->usuarios,
            ];
        }

    }
}
