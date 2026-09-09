<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products | Product Desk</title>
    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>">
</head>
<body>
    <main class="shell">
        <header class="topbar">
            <a class="brand" href="<?= base_url('products') ?>"><span class="brand-mark">PD</span>Product Desk</a>
            <div class="topbar-actions"><span class="profile"><?= html_escape($user['username']) ?><span class="role"><?= html_escape($user['role']) ?></span></span><a class="button secondary small" href="<?= base_url('logout') ?>">Log out</a></div>
        </header>
        <section class="page-heading">
            <div><p class="eyebrow">Catalog / Overview</p><h1>Products</h1><p>Keep the catalog clear, current, and ready to ship.</p></div>
            <?php if ($user['role'] === 'admin'): ?><a class="button" href="<?= base_url('products/create') ?>">+ Add product</a><?php endif; ?>
        </section>
        <section class="table-card glass">
            <?php if (empty($products)): ?>
                <div class="empty"><h2>Your catalog is empty</h2><p>Add your first product to get started.</p></div>
            <?php else: ?>
                <div class="table-wrap"><table>
                    <thead><tr><th>Product</th><th>Description</th><th>Price</th><th>Stock</th><th>Actions</th></tr></thead>
                    <tbody><?php foreach ($products as $product): ?><tr>
                        <td class="product-name"><?= html_escape($product['product_name']) ?></td>
                        <td class="description"><?= html_escape($product['description']) ?></td>
                        <td><?= number_format((float) $product['price'], 2) ?></td>
                        <td><?= html_escape($product['quantity']) ?></td>
                        <td class="actions"><?php if ($user['role'] === 'admin'): ?>
                            <a class="button secondary small" href="<?= base_url('products/edit/' . $product['id']) ?>">Edit</a>
                            <form method="post" action="<?= base_url('products/delete/' . $product['id']) ?>" onsubmit="return confirm('Are you sure you want to delete this product?');"><button class="button danger small" type="submit">Delete</button></form>
                        <?php else: ?><span class="muted">View only</span><?php endif; ?></td>
                    </tr><?php endforeach; ?></tbody>
                </table></div>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>