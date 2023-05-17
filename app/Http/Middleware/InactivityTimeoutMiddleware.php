<?php

namespace App\Http\Middleware;

use Closure;

class InactivityTimeoutMiddleware
{
    public function handle($request, Closure $next)
    {
        // Récupérer le temps d'inactivité en minutes depuis la configuration
        $inactivityTimeout = config('auth.inactivity_timeout');

        // Vérifier si l'utilisateur est authentifié et s'il y a une session active
        if (auth()->check() && session()->has('last_activity')) {
            // Calculer le temps écoulé depuis la dernière activité de l'utilisateur
            $lastActivity = session()->get('last_activity');
            $elapsedTime = time() - $lastActivity;

            // Vérifier si le temps écoulé dépasse le temps d'inactivité autorisé
            if ($elapsedTime > ($inactivityTimeout * 60)) {
                // Déconnecter l'utilisateur et vider la session
                auth()->logout();
                session()->invalidate();
                session()->regenerateToken();

                // Rediriger l'utilisateur vers la page de connexion avec un message d'erreur
                return redirect('/login')->with('error', 'Vous avez été déconnecté en raison d\'une inactivité prolongée.');
            }
        }

        // Mettre à jour la dernière activité de l'utilisateur dans la session
        session(['last_activity' => time()]);

        return $next($request);
    }
}
