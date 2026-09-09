<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Products extends Controller
{
    public function index()
    {
        $this->call->model('Product');
        $user = $this->session->userdata('user');

        $this->call->view('products/index', [
            'products' => $this->Product->all(),
            'user' => $user,
        ]);
    }

    public function create()
    {
        AuthMiddleware::requireAdmin();
        $this->call->view('products/form', ['product' => null]);
    }

    public function store()
    {
        AuthMiddleware::requireAdmin();
        $this->call->model('Product');
        $this->Product->insert($this->input());
        redirect('/products');
    }

    public function edit($id)
    {
        AuthMiddleware::requireAdmin();
        $this->call->model('Product');
        $this->call->view('products/form', [
            'product' => $this->Product->find((int) $id),
        ]);
    }

    public function update($id)
    {
        AuthMiddleware::requireAdmin();
        $this->call->model('Product');
        $this->Product->update((int) $id, $this->input());
        redirect('/products');
    }

    public function delete($id)
    {
        AuthMiddleware::requireAdmin();
        $this->call->model('Product');
        $this->Product->delete((int) $id);
        redirect('/products');
    }

    private function input()
    {
        return [
            'product_name' => trim($_POST['product_name'] ?? ''),
            'description' => trim($_POST['description'] ?? ''),
            'price' => (float) ($_POST['price'] ?? 0),
            'quantity' => (int) ($_POST['quantity'] ?? 0),
        ];
    }
}