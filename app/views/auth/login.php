<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in | Product Desk</title>
    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>">
</head>
<body>
    <main class="login-page">
        <section class="login-card glass">
            <p class="eyebrow">Product Desk</p>
            <h1>Welcome back.</h1>
            <p class="muted">Sign in to manage your product catalog.</p>
            <?php if (!empty($error)): ?><p class="alert"><?= html_escape($error) ?></p><?php endif; ?>
            <form method="post" action="<?= base_url('login') ?>">
                <div class="field"><label for="username">Username</label><input id="username" name="username" autocomplete="username" required></div>
                <div class="field"><label for="password">Password</label><input id="password" name="password" type="password" autocomplete="current-password" required></div>
                <button class="button" type="submit">Sign in</button>
            </form>
        </section>
    </main>
</body>
</html>