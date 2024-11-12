<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            // Vérifie si un jeton est présent dans l'en-tête de la requête
            $user = JWTAuth::parseToken()->authenticate();

            if (!$user) {
                return response()->json(['error' => 'Utilisateur non trouvé'], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['error' => 'Le token a expiré'], 401);
        } catch (TokenInvalidException $e) {
            return response()->json(['error' => 'Le token est invalide'], 401);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Token d\'authentification manquant'], 401);
        }


        return $next($request);
    }
}
