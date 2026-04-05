<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $page_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #5c8dffff, #679ef6ff);
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            border: 0;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .25);
        }
    </style> -->

    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Plus Jakarta Sans', sans-serif;

            background:
                radial-gradient(circle at top left, rgba(255, 255, 255, .35), transparent 35%),
                radial-gradient(circle at bottom right, rgba(255, 255, 255, .25), transparent 35%),
                linear-gradient(135deg, #eaf6ff 0%, #d6ecff 30%, #ffeaf4 70%, #fff4c7 100%);
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            border: 0;
            border-radius: 26px;
            overflow: hidden;

            background: white;

            box-shadow:
                0 20px 60px rgba(47, 128, 195, .18),
                0 10px 30px rgba(232, 91, 156, .12);
        }

        .login-card h2 {
            font-weight: 800;
            color: #1f5f97;
        }

        .login-card p {
            color: #6f8096;
        }

        .form-control {
            border-radius: 12px;
            padding: 10px 14px;
            border: 1px solid #dce8f3;
        }

        .form-control:focus {
            border-color: #2f80c3;
            box-shadow: 0 0 0 .15rem rgba(47, 128, 195, .15);
        }

        .btn-dark {
            border: 0;
            border-radius: 14px;
            font-weight: 700;

            background: linear-gradient(135deg, #2f80c3, #e85b9c);
        }

        .btn-dark:hover {
            background: linear-gradient(135deg, #1f5f97, #c93d7e);
        }

        .alert-danger {
            border-radius: 12px;
        }
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
                    <input type="text" class="form-control" name="username" value="" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" value="" required>
                </div>
                <button class="btn btn-dark w-100">Masuk</button>
            </form>
            <div class="mt-4 small text-muted">
                Login Kedalam Sistem
                <a href="<?= base_url(); ?>" class="btn btn-outline-secondary w-100 mt-3">
                    ← Kembali ke Website
                </a>
            </div>
        </div>
    </div>
</body>

</html>