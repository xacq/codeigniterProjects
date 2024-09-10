<?php namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
class Auth implements FilterInterface
{
public function before(RequestInterface $request, $arguments = null)
{
    // Si el usuario no esta logeado
    //if(! session()->get('logged_in')){
    if(! session()->get('login')){
        // redirige a login 
        return redirect()->to(site_url('/login'));
    }
}

public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
{
    //lo que sea
}
}