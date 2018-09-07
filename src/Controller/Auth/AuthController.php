<?php
/**
 * Created by PhpStorm.
 * User: Fede Marquesto
 * Date: 6/9/2018
 * Time: 20:09
 */

namespace App\Controller\Auth;

use App\Controller\Controller;
use App\Model\User;

class AuthController extends Controller
{
    public function getSignIn($request, $response)
    {
        $user = User::where('username','super')->first();
        if(!$user){
            User::create([
                'username'=> 'super',
                'nombre' => 'Super Admin',
                'password' => password_hash('12345678', PASSWORD_DEFAULT),
            ]);
        }

        return $this->view->render($response,'auth/signin.twig');
    }

    public function postSignIn($request, $response)
    {
        $auth = $this->auth->attempt(
            $request->getParam('username'),
            $request->getParam('password')
        );

        if(!$auth) {

            $this->flash->addMessage('error', 'Usuario o Contraseña inavalido');
            return $response->withRedirect($this->router->pathFor('auth.signin'));
        }

        return $response->withRedirect($this->router->pathFor('home'));
    }

    public function getSignOut($request, $response)
    {
        $this->auth->logout();
        return $response->withRedirect($this->router->pathFor('home'));

    }
}