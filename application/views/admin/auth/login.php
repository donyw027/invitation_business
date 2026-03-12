<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $page_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { min-height:100vh; display:flex; align-items:center; justify-content:center; background:linear-gradient(135deg,#0f172a,#1e293b); }
        .login-card { width:100%; max-width:420px; border:0; border-radius:22px; overflow:hidden; box-shadow:0 20px 60px rgba(0,0,0,.25); }
    </style>
</head>
<body>
    <div class="card login-card">
        <div class="card-body p-4 p-lg-5">
            <h2 class="mb-2">Login Admin</h2>
            <p class="text-muted mb-4">Starter undangan digital & greeting card.</p>
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?= $error; ?></div>
            <?php endif; ?>
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" value="admin" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" value="admin123" required>
                </div>
                <button class="btn btn-dark w-100">Masuk</button>
            </form>
            <div class="mt-4 small text-muted">
                Login default: admin / admin123
            </div>
        </div>
    </div>
</body>
</html>
