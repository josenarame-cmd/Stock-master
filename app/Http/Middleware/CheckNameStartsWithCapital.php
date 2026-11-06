<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckNameStartsWithCapital
{
    public function handle(Request $request, Closure $next): Response
    {
        $name = $request->input('name');

        if (is_string($name) && $name !== '' && preg_match('/^\p{Lu}/u', $name) !== 1) {
            return redirect()->back()
                ->withErrors(['name' => 'The name must start with a capital letter.'])
                ->withInput();
        }

        return $next($request);
    }
}
