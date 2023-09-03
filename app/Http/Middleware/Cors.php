<?php

namespace App\Http\Middleware;
use Closure;
class Cors
{
  public function handle($request, Closure $next)
  {
    // echo "CORS FUNCIONANDO";
    // return $next($request)
    //    //Url a la que se le dará acceso en las peticiones
    //   ->header("Access-Control-Allow-Origin", "*")
    // //   ->header("Access-Control-Allow-Origin", "http://urlfronted.example")
    //   //Métodos que a los que se da acceso
    //   ->header("Access-Control-Allow-Methods", "GET, POST, PUT, DELETE, OPTIONS")
    //   //Headers de la petición
    // //   ->header("Access-Control-Allow-Headers", "X-Requested-With, Content-Type, X-Token-Auth, Authorization"); 
    //   ->header("Access-Control-Allow-Headers", "Accept,X-Requested-With, Content-Type, X-Token-Auth, Authorization"); 


    $response = $next($request);

    $response->headers->set('Access-Control-Allow-Origin', '*');
    $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
    $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application');

    return $response;

  }
}