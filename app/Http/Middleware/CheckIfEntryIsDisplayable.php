<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfEntryIsDisplayable
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->competition->id !== $request->entry->competition_id) {
             return redirect('/');
        }

        if (! $request->entry->approved) {
             return redirect('/invalidentry');
        }

        return $next($request);
    }
}
