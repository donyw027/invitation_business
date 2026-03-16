<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= isset($page_title) ? $page_title : 'Admin'; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f7fb;
        }

        .sidebar {
            min-height: 100vh;
            background: #111827;
        }

        .sidebar a {
            color: #cbd5e1;
            text-decoration: none;
            display: block;
            padding: 12px 16px;
            border-radius: 10px;
        }

        .sidebar a:hover {
            background: #1f2937;
            color: #fff;
        }

        .sidebar .group {
            color: #94a3b8;
            font-size: 12px;
            text-transform: uppercase;
            padding: 16px 16px 6px;
            letter-spacing: .08em;
        }

        .card-stat {
            border: 0;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(15, 23, 42, .06);
        }

        .table-card {
            border: 0;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(15, 23, 42, .06);
        }

        .sidebar .brand-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            object-fit: cover;
            background: #334155;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <aside class="col-lg-2 p-3 sidebar">
                <div class="d-flex align-items-center gap-2 mb-4">
                    <?php $photo = !empty($current_admin->photo) ? asset_or_url($current_admin->photo) : 'https://ui-avatars.com/api/?name=' . rawurlencode($admin_name ?? 'Admin') . '&background=1f2937&color=fff'; ?>
                    <img src="<?= $photo; ?>" class="brand-avatar" alt="admin">
                    <div>
                        <h4 class="text-white mb-0">InviteBiz Ops</h4>
                        <small class="text-secondary"><?= html_escape($current_admin->role ?? 'admin'); ?></small>
                    </div>
                </div>
                <div class="group">Main</div>
                <?php if (!empty($can_access['dashboard'])): ?><a href="<?= site_url('admin/dashboard'); ?>">Dashboard</a><?php endif; ?>
                <?php if (!empty($can_access['reports'])): ?><a href="<?= site_url('admin/reports'); ?>">Reports</a><?php endif; ?>
                <?php if (!empty($can_access['customers'])): ?><a href="<?= site_url('admin/customers'); ?>">Customers</a><?php endif; ?>
                <?php if (!empty($can_access['orders'])): ?><a href="<?= site_url('admin/orders'); ?>">Orders</a><?php endif; ?>
                <?php if (!empty($can_access['projects'])): ?><a href="<?= site_url('admin/projects'); ?>">Projects</a><?php endif; ?>
                <div class="group">Engagement</div>
                <?php if (!empty($can_access['wishes'])): ?><a href="<?= site_url('admin/wishes'); ?>">Moderasi Ucapan</a><?php endif; ?>
                <?php if (!empty($can_access['guests'])): ?><a href="<?= site_url('admin/projects'); ?>">Guest Tools</a><?php endif; ?>
                <div class="group">Master</div>
                <?php if (!empty($can_access['product_types'])): ?><a href="<?= site_url('admin/product-types'); ?>">Product Types</a><?php endif; ?>
                <?php if (!empty($can_access['packages'])): ?><a href="<?= site_url('admin/packages'); ?>">Packages</a><?php endif; ?>
                <?php if (!empty($can_access['templates'])): ?><a href="<?= site_url('admin/templates'); ?>">Templates</a><?php endif; ?>
                <?php if (!empty($can_access['users'])): ?><a href="<?= site_url('admin/users'); ?>">Admin Users</a><?php endif; ?>
                <?php if (!empty($can_access['settings'])): ?><a href="<?= site_url('admin/settings'); ?>">Settings</a><?php endif; ?>
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
                <?php if ($this->session->flashdata('flash_message')): ?>
                    <div class="alert alert-<?= html_escape($this->session->flashdata('flash_type') ?: 'info'); ?> alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('flash_message'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>