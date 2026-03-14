<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= isset($page_title) ? $page_title : 'Admin'; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background:#f5f7fb; }
        .sidebar { min-height:100vh; background:#111827; }
        .sidebar a { color:#cbd5e1; text-decoration:none; display:block; padding:12px 16px; border-radius:10px; }
        .sidebar a:hover { background:#1f2937; color:#fff; }
        .sidebar .group { color:#94a3b8; font-size:12px; text-transform:uppercase; padding:16px 16px 6px; letter-spacing:.08em; }
        .card-stat { border:0; border-radius:20px; box-shadow:0 10px 25px rgba(15,23,42,.06); }
        .table-card { border:0; border-radius:20px; overflow:hidden; box-shadow:0 10px 25px rgba(15,23,42,.06); }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <aside class="col-lg-2 p-3 sidebar">
            <h4 class="text-white mb-4">InviteBiz V3</h4>
            <div class="group">Main</div>
            <a href="<?= site_url('admin/dashboard'); ?>">Dashboard</a>
            <a href="<?= site_url('admin/customers'); ?>">Customers</a>
            <a href="<?= site_url('admin/orders'); ?>">Orders</a>
            <a href="<?= site_url('admin/projects'); ?>">Projects</a>
            <a href="<?= site_url('admin/projects'); ?>">Guest Tools</a>
            <div class="group">Master</div>
            <a href="<?= site_url('admin/product-types'); ?>">Product Types</a>
            <a href="<?= site_url('admin/packages'); ?>">Packages</a>
            <a href="<?= site_url('admin/templates'); ?>">Templates</a>
            <a href="<?= site_url('admin/settings'); ?>">Settings</a>
            <div class="group">Session</div>
            <a href="<?= site_url('admin/logout'); ?>">Logout</a>
        </aside>
        <main class="col-lg-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="mb-1"><?= isset($page_title) ? $page_title : 'Admin'; ?></h2>
                    <small class="text-muted">Halo, <?= setting_value($admin_name, 'Admin'); ?></small>
                </div>
                <a href="<?= site_url(); ?>" target="_blank" class="btn btn-outline-secondary">Lihat Frontend</a>
            </div>
