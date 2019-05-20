<?php

namespace App\Http\Controllers;

use App\Services\UsuariosService;
use Illuminate\Http\Request;

class WebController extends Controller
{
    protected $service;

    public function __construct(UsuariosService $service)
    {
        $this->service = $service;
    }


    public function criar()
    {
        return view('index', [
            'page' => 'criar',
            'total' => 0,
            'usuario' => null
        ]);
    }

    public function salvar(Request $request)
    {
        $request = $this->service->salvar($request->all());

        session()->flash('success', [
            'success' => $request->success,
            'mensagem' => $request->data
        ]);

        return redirect()->route('usuario.criar');
        /*return view('index', [
            'page' => 'criar',
            'total' => $usuario->total_usuarios,
            'usuario' => $usuario->usuarios,
        ]);*/
    }

    public function editar($id)
    {
        $usuario = $this->service->usuario($id);

        return view('editar', [
            'page' => 'criar',
            'usuario' => $usuario->data->usuarios
        ]);
    }

    public function atualizar(Request $request, $id)
    {
        $request = $this->service->atualizar($request->all(), $id);

        session()->flash('success', [
            'success' => $request->success,
            'mensagem' => $request->data
        ]);

        return redirect()->route('usuario.criar');
    }

    public function listar()
    {
        $usuarios = $this->service->usuarios();

        return view('listar', [
            'page' => 'listar',
            'usuario' => null,
            'usuarios' => $usuarios->data
        ]);
    }

    public function deletar($id)
    {
        $usuario = $this->service->deletar($id);

        session()->flash('success', [
            'success' => true,
            'messages' => 'Usuário ' . $usuario . ', foi removido com sucesso',
        ]);

        return redirect()->route('usuario.listar');
    }
}
