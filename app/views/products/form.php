<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $product ? 'Edit' : 'Add' ?> Product | Product Desk</title>
    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>">
</head>
<body>
    <main class="shell">
        <header class="topbar"><a class="brand" href="<?= base_url('products') ?>"><span class="brand-mark">PD</span>Product Desk</a><a class="button secondary small" href="<?= base_url('products') ?>">Back to products</a></header>
        <section class="form-card glass">
            <p class="eyebrow">Catalog / <?= $product ? 'Edit' : 'New' ?></p>
            <h1><?= $product ? 'Edit product' : 'Add a product' ?></h1>
            <p class="muted">Use clear details so this item is easy to find and manage.</p>
            <form method="post" action="<?= $product ? base_url('products/update/' . $product['id']) : base_url('products/store') ?>">
                <div class="form-grid">
                    <div class="field wide"><label for="product_name">Product name</label><input id="product_name" name="product_name" maxlength="100" required value="<?= html_escape($product['product_name'] ?? '') ?>"></div>
                    <div class="field wide"><label for="description">Description</label><textarea id="description" name="description" required><?= html_escape($product['description'] ?? '') ?></textarea></div>
                    <div class="field"><label for="price">Price</label><input id="price" name="price" type="number" step="0.01" min="0" required value="<?= html_escape($product['price'] ?? '') ?>"></div>
                    <div class="field"><label for="quantity">Quantity</label><input id="quantity" name="quantity" type="number" min="0" required value="<?= html_escape($product['quantity'] ?? '') ?>"></div>
                </div>
                <div class="form-actions"><button class="button" type="submit"><?= $product ? 'Save changes' : 'Create product' ?></button><a class="button secondary" href="<?= base_url('products') ?>">Cancel</a></div>
            </form>
        </section>
    </main>
</body>
</html>