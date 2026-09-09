<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthMiddleware
{
    public function handle(Closure $next)
    {
        $user = lava_instance()->session->userdata('user');

        if (!is_array($user) || !in_array($user['role'] ?? null, ['admin', 'user'], true)) {
            redirect('/login');
        }

        return $next();
    }

    public static function requireAdmin()
    {
        $user = lava_instance()->session->userdata('user');

        if (($user['role'] ?? null) !== 'admin') {
            http_response_code(403);
            exit('Only administrators can change products.');
        }
    }
}