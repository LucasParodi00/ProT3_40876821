<?php

namespace App\Controllers;

use App\Models\Usuario;

class Login_controller extends BaseController
{
    public function login()
    {
        $session = session();
        $usuarioModel = new Usuario();
        $usuario = $this->request->getPost('usuario');
        $password = $this->request->getPost('password');

        $datos = $usuarioModel->where('usuario', $usuario)->first();

        if ($datos) {
            $pass = $datos['password'];
            $passwordVerificada = password_verify($password, $pass);

            if ($passwordVerificada) {
                $nuevaSesion = [
                    'codUsuario' => $datos['codUsuario'],
                    'usuario'    => $datos['usuario'],
                    'correo'     => $datos['correo'],
                    'telefono'   => $datos['telefono'],
                    'direccion'  => $datos['direccion'],
                    'logged_in'  => TRUE
                ];
                $session->set($nuevaSesion);
                return redirect()->to('/');
            } else {
                $errores = ['Credencial inválida.'];
                return redirect()->to('/login')->withInput()->with('errores', $errores);
            }
        } else {
            $errores = ['Credencial inválida.'];
            return redirect()->to('/login')->withInput()->with('errores', $errores);
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    public function index()
    {
        return view('front/login');
    }
}
