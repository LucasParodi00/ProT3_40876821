<?php
namespace App\Controllers;

use App\Models\Usuario;

class Usuario_controller extends BaseController 
{
    public function index()
    {
        $usuarioModel = new Usuario();
        $datos ['usuarios'] = $usuarioModel->findAll();
        echo view('front/header');
        echo view('front/navbar');
        echo view('front/usuario/listaUsuarios', $datos);
        echo view('front/footer');
    }

    public function nuevo($codUsuario = '')
    {
        $errores = session()->getFlashdata('errores');
        echo view('front/header');
        echo view('front/navbar');
        echo view('front/registro', ['errores' => $errores]);
        echo view('front/footer');
    }

    public function cargarUsuario()
    {
        $usuarioModel = new Usuario();

        $validationRules = $usuarioModel->validationRules;
        $validationRules['usuario'] = 'required|min_length[3]|max_length[10]|is_unique[usuario.usuario]';
        
        if (!$this->validate($validationRules, $usuarioModel->validationMessages)) {
            $errores = $this->validator->getErrors();
            return redirect()->to('/registro')->withInput()->with('errores', $errores);
        }

        $datos = [
            'nombre_completo' => $this->request->getPost('nombre_completo'),
            'usuario' => $this->request->getPost('usuario'),
            'correo' => $this->request->getPost('correo'),
            'telefono' => $this->request->getPost('telefono'),
            'direccion' => $this->request->getPost('direccion'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];
            
        $usuarioModel->insert($datos);
        return redirect()->to('/login');
    }

    public function editar($codUsuario)
    {   
        $usuarioModel = new Usuario();
        $datos['usuario'] = $usuarioModel->find($codUsuario);
        $datos['errores'] = session()->getFlashdata('errores');

        echo view('front/header');
        echo view('front/navbar');
        echo view('front/registro', $datos);
        echo view('front/footer');
    }

    public function actualizarUsuario($codUsuario) 
    {
        $usuarioModel = new Usuario();

        $validacion = $usuarioModel->validationRules;
        $validacion['usuario'] = 'required|min_length[3]|max_length[10]|is_unique[usuario.usuario, codUsuario, ' . $codUsuario . ']';
        
        if (!$this->validate($validacion, $usuarioModel->validationMessages)) {
            $errores = $this->validator->getErrors();
            return redirect()->to('/editar/' . $codUsuario)->withInput()->with('errores', $errores);
        }

        $datos = [
            'nombre_completo' => $this->request->getPost('nombre_completo'),
            'usuario' => $this->request->getPost('usuario'),
            'correo' => $this->request->getPost('correo'),
            'telefono' => $this->request->getPost('telefono'),
            'direccion' => $this->request->getPost('direccion'),
        ];

        $password = $this->request->getPost('password');
        
        if (!empty($password)) {
            $datos['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $resultado = $usuarioModel->update($codUsuario, $datos);

        if ($resultado === false) {
            $errores = $usuarioModel->errors();
            return redirect()->to('/editar/' . $codUsuario)->withInput()->with('errores', $errores);
        }

        return redirect()->to('/listaUsuarios');
    }
    
    public function eliminarUsuario($codUsuario)
    {
        $usuarioModel = new Usuario();
        $usuarioModel->delete($codUsuario);
        return redirect()->to('/listaUsuarios');
    }
}
