<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Auth extends Controller
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->call->view('auth/login');
            return;
        }

        $this->call->model('User');
        $user = $this->User->find_by('username', trim($_POST['username'] ?? ''));
        $password = $_POST['password'] ?? '';
        $valid_password = $user
            && $user['is_active']
            && password_verify($password, (string) $user['password']);

        // Upgrade old plain-text rows the first time their password is used.
        if (!$valid_password && $user && $user['is_active']
            && hash_equals((string) $user['password'], $password)) {
            $this->User->update((int) $user['id'], [
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ]);
            $valid_password = true;
        }

        if (!$user || !$user['is_active'] || !$valid_password) {
            $this->call->view('auth/login', ['error' => 'Invalid username or password.']);
            return;
        }

        $this->session->set_userdata([
            'user' => [
                'id' => $user['id'],
                'username' => $user['username'],
                'role' => $user['role'],
            ],
        ]);

        redirect('/products');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/login');
    }
}