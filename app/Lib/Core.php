<?php
/**
 * Created by PhpStorm.
 * User: Mirjalol
 * Date: 22-Feb-19
 * Time: 12:24
 */

namespace Lib;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class Core implements HttpKernelInterface
{
    protected $routes;

    public function __construct()
    {
        $this->routes = new RouteCollection();
    }

    /**
     * Handles a Request to convert it to a Response.
     *
     * When $catch is true, the implementation must catch all exceptions
     * and do its best to convert them to a Response instance.
     *
     * @param Request $request A Request instance
     * @param int $type The type of the request
     *                         (one of HttpKernelInterface::MASTER_REQUEST or HttpKernelInterface::SUB_REQUEST)
     * @param bool $catch Whether to catch exceptions or not
     *
     * @return Response A Response instance
     *
     * @throws \Exception When an Exception occurs during processing
     */
    public function handle(Request $request, $type = self::MASTER_REQUEST, $catch = true)
    {
        // create a context using the current request
        $context = new RequestContext();
        $context->fromRequest($request);
        $matcher = new UrlMatcher($this->routes, $context);
        try {
            $attributes = $matcher->match($request->getPathInfo());

            list($controller, $action) = explode("::", $attributes['controller']);
            $controller = "\\Controllers\\" . $controller;
            $response = call_user_func_array(array(new $controller(), $action), array($request, $attributes));
        } catch (ResourceNotFoundException $e) {
            $response = new Response('Not found!', Response::HTTP_NOT_FOUND);
        }

        return $response;
    }

    public function map($path, $controller)
    {
        $this->routes->add($path, new Route(
            $path,
            array('controller' => $controller)
        ));
    }
}