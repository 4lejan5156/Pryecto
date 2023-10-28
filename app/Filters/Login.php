<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Login implements FilterInterface
{
    /**
     
     * @param RequestInterface $request
     * @param array|null       $arguments
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if ( ! auth()->loggedIn()) {

            return redirect()->to("login")
                             ->with("message", "Please login first");

        }
    }

    /**
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
