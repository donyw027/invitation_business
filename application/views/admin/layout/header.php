<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= isset($page_title) ? $page_title : 'Admin'; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <style>
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
    </style> -->

    <style>
        :root {
            --blue: #2f80c3;
            --blue-dark: #1f5f97;
            --blue-soft: #eef8ff;

            --pink: #ff6fae;
            --pink-dark: #e45495;
            --pink-soft: #fff1f7;

            --yellow: #f3c94b;
            --yellow-soft: #fff9df;

            --navy: #0f2233;

            --text: #2b3e50;
            --muted: #6b7f93;
            --line: #dce8f3;

            --shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
            --shadow-soft: 0 20px 45px rgba(31, 41, 55, 0.08);
            --radius-lg: 30px;
            --radius-md: 24px;
            --radius-sm: 16px;
        }

        body {
            background: linear-gradient(180deg, #f8fbff 0%, #fffdf8 100%);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text);
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #0f2233 0%, #2f80c3 60%, #4f46e5 100%);
            padding-top: 20px;
        }

        .sidebar h4 {
            font-weight: 800;
        }

        .sidebar a {
            color: #e2e8f0;
            text-decoration: none;
            display: block;
            padding: 12px 16px;
            border-radius: 12px;
            transition: 0.25s ease;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
        }

        .sidebar .group {
            color: #cbd5e1;
            font-size: 11px;
            text-transform: uppercase;
            padding: 16px 16px 6px;
            letter-spacing: 0.08em;
        }

        .sidebar .brand-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            object-fit: cover;
            background: #334155;
        }

        /* ================= HEADER ================= */

        main h2 {
            font-weight: 800;
            color: var(--blue-dark);
        }

        main small {
            color: var(--muted);
        }

        /* ================= BUTTON ================= */

        .btn-primary {
            background: linear-gradient(135deg, var(--blue), var(--pink));
            border: 0;
            border-radius: 14px;
            transition: 0.25s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--blue-dark), var(--pink-dark));
        }

        .btn-outline-secondary {
            border-radius: 12px;
        }

        .btn-soft {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 16px;
            border-radius: 999px;
            border: 1px solid rgba(0, 0, 0, 0.06);
            background: rgba(255, 255, 255, 0.88);
            color: var(--text);
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 8px 18px rgba(15, 23, 42, 0.06);
            transition: 0.25s ease;
        }

        .btn-soft:hover {
            transform: translateY(-1px);
            background: #fff;
            color: var(--blue-dark);
        }

        /* ================= CARD ================= */

        .card-stat,
        .table-card {
            border: 0;
            border-radius: 20px;
            box-shadow: var(--shadow);
            background: #fff;
            transition: 0.2s ease;
        }

        .card-stat:hover,
        .table-card:hover {
            transform: translateY(-2px);
        }

        /* ================= TABLE ================= */

        .table {
            margin-bottom: 0;
        }

        .table thead {
            background: var(--blue-soft);
        }

        .table thead th {
            border-bottom: 0;
            font-weight: 700;
            color: var(--blue-dark);
        }

        /* ================= ALERT ================= */

        .alert {
            border-radius: 14px;
        }

        /* ================= SCROLLBAR ================= */

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        /* ================= SPOTLIGHT SECTION ================= */

        .spotlight-card {
            position: relative;
            height: 100%;
            padding: 28px;
            border-radius: var(--radius-lg);
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.45);
            box-shadow: var(--shadow-soft);
            backdrop-filter: blur(10px);
        }

        .spotlight-gift {
            background:
                radial-gradient(circle at top left, rgba(255, 214, 230, 0.95), transparent 42%),
                linear-gradient(135deg, #fff7fb 0%, #fffdf7 100%);
        }

        .spotlight-jastip {
            background:
                radial-gradient(circle at top right, rgba(255, 236, 179, 0.95), transparent 42%),
                linear-gradient(135deg, #fffef8 0%, #fff7fb 100%);
        }

        .spotlight-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin-bottom: 18px;
            flex-wrap: wrap;
        }

        .soft-label {
            display: inline-flex;
            align-items: center;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.88);
            border: 1px solid rgba(0, 0, 0, 0.05);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.04em;
            color: #334155;
            box-shadow: 0 8px 18px rgba(15, 23, 42, 0.06);
        }

        .spotlight-copy h3 {
            font-size: 28px;
            line-height: 1.3;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 12px;
        }

        .spotlight-copy p {
            font-size: 15px;
            line-height: 1.8;
            color: #6b7280;
            margin-bottom: 24px;
            max-width: 95%;
        }

        /* ================= SHOWCASE GRID ================= */

        .showcase-grid {
            display: grid;
            gap: 16px;
        }

        .gift-grid {
            grid-template-columns: 1.2fr 0.8fr;
            grid-template-areas:
                "large small1"
                "large small2";
        }

        .jastip-grid {
            grid-template-columns: 0.9fr 1.1fr;
            grid-template-areas:
                "small1 large"
                "small2 large";
        }

        .gift-grid .large,
        .jastip-grid .large {
            grid-area: large;
            min-height: 360px;
        }

        .gift-grid .small:nth-child(2),
        .jastip-grid .small:nth-child(1) {
            grid-area: small1;
        }

        .gift-grid .small:nth-child(3),
        .jastip-grid .small:nth-child(2) {
            grid-area: small2;
        }

        /* ================= MOCK CARD ================= */

        .mock-card {
            position: relative;
            overflow: hidden;
            border-radius: var(--radius-md);
            background: rgba(255, 255, 255, 0.78);
            border: 1px solid rgba(255, 255, 255, 0.55);
            box-shadow: 0 14px 30px rgba(15, 23, 42, 0.08);
            min-height: 170px;
        }

        .mock-card img {
            width: 100%;
            height: 100%;
            min-height: inherit;
            object-fit: cover;
            display: block;
        }

        .mock-card::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(15, 23, 42, 0.34), rgba(15, 23, 42, 0.05));
        }

        .mock-card span {
            position: absolute;
            left: 14px;
            right: 14px;
            bottom: 14px;
            z-index: 2;
            display: inline-flex;
            width: fit-content;
            max-width: calc(100% - 28px);
            padding: 10px 14px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.92);
            color: #1f2937;
            font-size: 13px;
            font-weight: 700;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 991.98px) {
            .spotlight-copy h3 {
                font-size: 24px;
            }

            .gift-grid,
            .jastip-grid {
                grid-template-columns: 1fr 1fr;
            }

            .gift-grid .large,
            .jastip-grid .large {
                min-height: 300px;
            }
        }

        @media (max-width: 767.98px) {
            .spotlight-card {
                padding: 20px;
                border-radius: 24px;
            }

            .spotlight-copy h3 {
                font-size: 21px;
            }

            .spotlight-copy p {
                font-size: 14px;
                max-width: 100%;
            }

            .gift-grid,
            .jastip-grid {
                grid-template-columns: 1fr;
                grid-template-areas:
                    "large"
                    "small1"
                    "small2";
            }

            .gift-grid .large,
            .jastip-grid .large,
            .mock-card {
                min-height: 220px;
            }
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
                        <h4 class="text-white mb-0">Dashboard</h4>
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