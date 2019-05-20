<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use \Exception;

class UsuariosController extends Controller
{
    public function criarUsuario(Request $request){
        try{
            $usuario = Usuario::create($request->all());

            $retorno = $this->retorno(1, $usuario);
            $status = 200;
        }
        catch (Exception $e){
            $retorno = $this->retorno(0, $e->getMessage());
            $status = 400;
        }

        return response($retorno, $status);
    }


    public function listarUsuarios(){
        try{
            $usuarios = Usuario::all();

            $retorno = $this->retorno($usuarios->count(), $usuarios);
            $status = 200;
        }
        catch (Exception $e){
            $retorno = $this->retorno(0, $e->getMessage());
            $status = 400;
        }

        return response($retorno, $status);
    }


    public function listarUsuario($id){
        try{
            $usuario = Usuario::find($id);

            if(!isset($usuario)) {
                $retorno = $this->retorno(0, 'Nenhum registro encontrado');
            }
            else{
                $retorno = $this->retorno(1, $usuario);
            }

            $status = 200;

        }
        catch (Exception $e){
            $retorno = $this->retorno(0, $e->getMessage());
            $status = 400;
        }

        return response($retorno, $status);
    }


    public function atualizarUsuario(Request $request, $id){
        try{
            Usuario::find($id)->update($request->all());

            $retorno = $this->retorno(1, Usuario::find($id));
            $status = 200;
        }
        catch (Exception $e){
            $retorno = $this->retorno(0,  $e->getMessage());
            $status = 400;
        }

        return response($retorno, $status);
    }


    public function deletarUsuario($id){
        try{
            $usuario = Usuario::find($id);

            if(isset($usuario)){
                $usuario->delete();

                $retorno = $this->retorno(1, $usuario);
            }else{
                $retorno = $this->retorno(0, 'Nenhum registro encontrado');
            }

            $status = 200;

        }
        catch (Exception $e){
            $retorno = $this->retorno(0, $e->getMessage());
            $status = 400;
        }

        return response($retorno, $status)
            ->header('Entity', $id);
    }


    public function retorno($quantidade, $usuarios){
        return [
            'total_usuarios' => $quantidade,
            'usuarios' => $usuarios
        ];
    }
}
