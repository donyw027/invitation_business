<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="<?= base_url('assets/img/logo.ico'); ?>">

    <title><?= isset($page_title) ? html_escape($page_title) : 'Admin'; ?> | Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#fff8ec">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@400;500;600;700;800;900&family=Playfair+Display:wght@700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --cream: #fff8ec;
            --cream-2: #f8ead2;
            --pink: #efe0c8;
            --pink-2: #f3d9a6;
            --peach: #ddb892;
            --rose: #b08968;
            --ink: #3f2e24;
            --body: #6f5a48;
            --muted: #8a7665;
            --line: rgba(63, 46, 36, .09);
            --white: #ffffff;
            --mint: #f1ead7;
            --lavender: #f5e7c6;
            --shadow: 0 18px 45px rgba(63, 46, 36, .08);
            --shadow-soft: 0 12px 30px rgba(63, 46, 36, .06);
            --radius-xl: 30px;
            --radius-lg: 24px;
            --radius-md: 18px;
            --radius-sm: 14px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(239, 224, 200, .78), transparent 32%),
                radial-gradient(circle at 90% 12%, rgba(221, 184, 146, .28), transparent 28%),
                linear-gradient(180deg, var(--cream) 0%, #ffffff 58%, var(--cream-2) 100%);
            color: var(--ink);
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            letter-spacing: -.01em;
        }

        a {
            color: inherit;
        }

        .admin-shell {
            min-height: 100vh;
        }

        .sidebar {
            position: sticky;
            top: 0;
            min-height: 100vh;
            background:
                linear-gradient(180deg, rgba(255, 255, 255, .96), rgba(255, 248, 236, .92)),
                radial-gradient(circle at top, rgba(239, 224, 200, .9), transparent 36%);
            border-right: 1px solid var(--line);
            padding: 22px 16px;
        }

        .brand-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: var(--radius-lg);
            padding: 12px;
            box-shadow: var(--shadow-soft);
        }

        .sidebar .brand-avatar {
            width: 46px;
            height: 46px;
            border-radius: 999px;
            object-fit: cover;
            background: linear-gradient(135deg, var(--pink), var(--cream-2));
            border: 2px solid #fff;
            box-shadow: 0 10px 24px rgba(63, 46, 36, .12);
        }

        .brand-title {
            margin: 0;
            font-size: 16px;
            font-weight: 900;
            line-height: 1.1;
            color: var(--ink);
        }

        .brand-role {
            color: var(--muted);
            font-size: 12px;
            font-weight: 700;
        }

        .sidebar .group {
            margin: 22px 10px 8px;
            color: #b7a38d;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .14em;
            font-weight: 900;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 9px;
            color: var(--body);
            text-decoration: none;
            padding: 11px 13px;
            margin: 4px 0;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 800;
            transition: .22s ease;
        }

        .sidebar a:hover,
        .sidebar a:focus {
            color: var(--ink);
            background: #fff;
            box-shadow: var(--shadow-soft);
            transform: translateX(2px);
        }

        .sidebar a[href*="logout"] {
            color: #8a5a44;
            background: rgba(239, 224, 200, .58);
        }

        main.admin-content {
            padding: 26px 30px 48px;
        }

        .topbar-pretty {
            background: rgba(255, 255, 255, .82);
            border: 1px solid var(--line);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-soft);
            backdrop-filter: blur(18px);
            padding: 18px 20px;
            margin-bottom: 22px;
        }

        .page-kicker {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 12px;
            border-radius: 999px;
            background: var(--cream-2);
            color: #8b5e34;
            font-size: 12px;
            font-weight: 900;
            margin-bottom: 8px;
        }

        main h2,
        .h2 {
            font-family: "Playfair Display", "Cormorant Garamond", serif;
            color: var(--ink);
            font-size: clamp(28px, 3vw, 42px);
            font-weight: 900;
            letter-spacing: -.04em;
            line-height: .98;
        }

        main small,
        .text-muted {
            color: var(--muted) !important;
        }

        .btn,
        button,
        input,
        select,
        textarea {
            font-family: Inter, system-ui, sans-serif;
        }

        .btn {
            border-radius: 999px;
            font-weight: 850;
            border-width: 1px;
            padding: 10px 16px;
        }

        .btn-sm {
            padding: 7px 12px;
        }

        .btn-primary,
        .btn-success,
        .btn-info {
            background: var(--ink) !important;
            border-color: var(--ink) !important;
            color: #fff !important;
            box-shadow: 0 14px 30px rgba(63, 46, 36, .12);
        }

        .btn-primary:hover,
        .btn-success:hover,
        .btn-info:hover {
            transform: translateY(-1px);
            background: #2f2118 !important;
            border-color: #2f2118 !important;
        }

        .btn-warning {
            background: #f8ead2 !important;
            border-color: rgba(221, 184, 146, .5) !important;
            color: #7f4f24 !important;
        }

        .btn-danger {
            background: #fff3d6 !important;
            border-color: rgba(176, 137, 104, .35) !important;
            color: #8a5a44 !important;
        }

        .btn-outline-secondary,
        .btn-secondary,
        .btn-light {
            background: #fff !important;
            border-color: var(--line) !important;
            color: var(--ink) !important;
        }

        .btn-outline-secondary:hover,
        .btn-secondary:hover,
        .btn-light:hover {
            background: var(--cream-2) !important;
            transform: translateY(-1px);
        }

        .btn-soft {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 16px;
            border-radius: 999px;
            border: 1px solid var(--line);
            background: #fff;
            color: var(--ink);
            font-weight: 900;
            text-decoration: none;
            box-shadow: var(--shadow-soft);
            transition: .22s ease;
        }

        .btn-soft:hover {
            transform: translateY(-1px);
            color: var(--ink);
            background: var(--cream-2);
        }

        .card,
        .card-stat,
        .table-card {
            border: 1px solid var(--line) !important;
            border-radius: var(--radius-xl) !important;
            box-shadow: var(--shadow-soft);
            background: rgba(255, 255, 255, .94) !important;
            overflow: hidden;
        }

        .card-header,
        .card-footer {
            background: rgba(255, 248, 236, .9) !important;
            border-color: var(--line) !important;
        }

        .card-stat {
            position: relative;
        }

        .card-stat::before {
            content: "";
            position: absolute;
            inset: 0 auto 0 0;
            width: 7px;
            background: linear-gradient(180deg, var(--pink), var(--peach));
        }

        .card-stat .card-body {
            padding-left: 26px;
        }

        .table-card {
            padding: 0;
        }

        .table {
            color: var(--body);
            margin-bottom: 0;
            vertical-align: middle;
        }

        .table thead th {
            background: var(--cream-2);
            color: var(--ink);
            border-bottom: 1px solid var(--line);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .08em;
            font-weight: 900;
            padding: 14px 16px;
        }

        .table tbody td {
            border-color: rgba(63, 46, 36, .065);
            padding: 14px 16px;
        }

        .table tbody tr:hover td {
            background: rgba(255, 248, 236, .7);
        }

        .form-control,
        .form-select,
        textarea,
        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="password"],
        input[type="date"],
        input[type="time"],
        select {
            border-radius: 16px !important;
            border: 1px solid var(--line) !important;
            background: #fff !important;
            color: var(--ink) !important;
            min-height: 44px;
            box-shadow: none !important;
        }

        .form-control:focus,
        .form-select:focus,
        textarea:focus,
        input:focus,
        select:focus {
            border-color: rgba(176, 137, 104, .42) !important;
            box-shadow: 0 0 0 4px rgba(239, 224, 200, .8) !important;
        }

        label,
        .form-label {
            color: var(--ink);
            font-weight: 850;
            font-size: 13px;
        }

        .badge {
            border-radius: 999px;
            padding: 7px 10px;
            font-weight: 850;
        }

        .badge.bg-primary,
        .badge.bg-success {
            background: var(--ink) !important;
        }

        .badge.bg-warning {
            background: #f8ead2 !important;
            color: #7f4f24 !important;
        }

        .badge.bg-danger {
            background: #fff3d6 !important;
            color: #8a5a44 !important;
        }

        .alert {
            border-radius: var(--radius-lg);
            border: 1px solid var(--line);
            box-shadow: var(--shadow-soft);
        }

        .pagination .page-link {
            border-radius: 999px !important;
            margin: 0 3px;
            color: var(--ink);
            border-color: var(--line);
        }

        .page-item.active .page-link {
            background: var(--ink);
            border-color: var(--ink);
            color: #fff;
        }

        .spotlight-card {
            position: relative;
            height: 100%;
            padding: 28px;
            border-radius: var(--radius-xl);
            overflow: hidden;
            border: 1px solid rgba(63, 46, 36, .08);
            box-shadow: var(--shadow);
            background: #fff;
        }

        .spotlight-gift {
            background:
                radial-gradient(circle at top left, rgba(239, 224, 200, .95), transparent 42%),
                linear-gradient(135deg, #fff 0%, #f8ead2 100%);
        }

        .spotlight-jastip {
            background:
                radial-gradient(circle at top right, rgba(221, 184, 146, .35), transparent 42%),
                linear-gradient(135deg, #fffef8 0%, #fff 100%);
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
            background: rgba(255, 255, 255, .9);
            border: 1px solid var(--line);
            font-size: 12px;
            font-weight: 900;
            letter-spacing: .04em;
            color: var(--ink);
            box-shadow: var(--shadow-soft);
        }

        .spotlight-copy h3 {
            font-family: "Playfair Display", serif;
            font-size: 30px;
            line-height: 1.05;
            font-weight: 900;
            letter-spacing: -.04em;
            color: var(--ink);
            margin-bottom: 12px;
        }

        .spotlight-copy p {
            font-size: 15px;
            line-height: 1.8;
            color: var(--muted);
            margin-bottom: 24px;
            max-width: 95%;
        }

        .showcase-grid {
            display: grid;
            gap: 16px;
        }

        .gift-grid {
            grid-template-columns: 1.2fr .8fr;
            grid-template-areas: "large small1" "large small2";
        }

        .jastip-grid {
            grid-template-columns: .9fr 1.1fr;
            grid-template-areas: "small1 large" "small2 large";
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

        .mock-card {
            position: relative;
            overflow: hidden;
            border-radius: var(--radius-lg);
            background: var(--cream-2);
            border: 1px solid var(--line);
            box-shadow: var(--shadow-soft);
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
            background: linear-gradient(to top, rgba(63, 46, 36, .32), rgba(63, 46, 36, .04));
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
            background: rgba(255, 255, 255, .94);
            color: var(--ink);
            font-size: 13px;
            font-weight: 850;
            box-shadow: 0 10px 20px rgba(0, 0, 0, .08);
        }

        .admin-footer-note {
            color: var(--muted);
            font-size: 12px;
            margin-top: 28px;
            text-align: center;
        }

        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--cream-2);
        }

        ::-webkit-scrollbar-thumb {
            background: #d8b78f;
            border-radius: 999px;
            border: 2px solid var(--cream-2);
        }

        @media (max-width: 991.98px) {
            .sidebar {
                position: relative;
                min-height: auto;
                border-right: 0;
                border-bottom: 1px solid var(--line);
            }

            main.admin-content {
                padding: 20px 16px 38px;
            }

            .topbar-pretty {
                border-radius: var(--radius-lg);
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
            .sidebar {
                padding: 16px;
            }

            .sidebar a {
                display: inline-flex;
                margin: 4px 4px 4px 0;
            }

            .sidebar .group {
                margin: 18px 4px 6px;
            }

            .spotlight-card {
                padding: 20px;
                border-radius: 24px;
            }

            .spotlight-copy h3 {
                font-size: 24px;
            }

            .spotlight-copy p {
                font-size: 14px;
                max-width: 100%;
            }

            .gift-grid,
            .jastip-grid {
                grid-template-columns: 1fr;
                grid-template-areas: "large" "small1" "small2";
            }

            .gift-grid .large,
            .jastip-grid .large,
            .mock-card {
                min-height: 220px;
            }

            .table-responsive {
                border-radius: var(--radius-lg);
            }
        }

        .advantage-toggle {
            width: 100%;
            border: 0;
            background: rgba(255, 255, 255, .08);
            color: inherit;
            padding: 10px 12px;
            border-radius: 12px;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .advantage-toggle .chevron {
            margin-left: auto;
            transition: .25s;
        }

        .advantage-toggle[aria-expanded="true"] .chevron {
            transform: rotate(180deg);
        }
    </style>
</head>

<body>
    <div class="container-fluid admin-shell">
        <div class="row">
            <aside class="col-lg-2 sidebar">
                <div class="brand-card d-flex align-items-center gap-2 mb-3">
                    <?php $photo = !empty($current_admin->photo) ? asset_or_url($current_admin->photo) : 'https://ui-avatars.com/api/?name=' . rawurlencode($admin_name ?? 'Admin') . '&background=f7dfe4&color=1f2937'; ?>
                    <img src="<?= $photo; ?>" class="brand-avatar" alt="admin">
                    <div>
                        <p class="brand-title">Dashboard</p>
                        <span class="brand-role"><?= html_escape($current_admin->role ?? 'admin'); ?></span>
                    </div>
                </div>

                <div class="group">Main</div>
                <?php if (!empty($can_access['dashboard'])): ?><a href="<?= site_url('admin/dashboard'); ?>">🏠 Dashboard</a><?php endif; ?>
                <?php if (!empty($can_access['orders'])): ?><a href="<?= site_url('admin/orders'); ?>">🛍️ Order</a><?php endif; ?>
                <?php if (!empty($can_access['orders'])): ?>
                    <a href="<?= site_url('admin/quick-create'); ?>">⚡ Quick Create</a>
                <?php endif; ?>
                <?php if (!empty($can_access['reports'])): ?><a href="<?= site_url('admin/reports'); ?>">📊 Reports</a><?php endif; ?>
                <?php if (!empty($can_access['settings'])): ?><a href="<?= site_url('admin/settings'); ?>">⚙️ Settings</a><?php endif; ?>

                <div class="group">Session</div>
                <a href="<?= site_url('admin/logout'); ?>">Logout</a>

                <div class="sidebar-advantage">

                    <div class="group">Advantage</div>

                    <button class="advantage-toggle"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#advantageMenu"
                        aria-expanded="false"
                        aria-controls="advantageMenu">
                        <span>✨</span> Open Advantage
                        <span class="chevron">⌄</span>
                    </button>

                    <div class="collapse" id="advantageMenu">
                        <div class="group">Flow</div>

                        <?php if (!empty($can_access['customers'])): ?><a href="<?= site_url('admin/customers'); ?>">👥 Customers</a><?php endif; ?>

                        <?php if (!empty($can_access['projects'])): ?><a href="<?= site_url('admin/projects'); ?>">✨ Projects</a><?php endif; ?>

                        <div class="group">Engagement</div>
                        <?php if (!empty($can_access['wishes'])): ?><a href="<?= site_url('admin/wishes'); ?>">💌 Moderasi Ucapan</a><?php endif; ?>
                        <?php if (!empty($can_access['guests'])): ?><a href="<?= site_url('admin/projects'); ?>">🔗 Guest Tools</a><?php endif; ?>

                        <div class="group">Master</div>
                        <?php if (!empty($can_access['product_types'])): ?><a href="<?= site_url('admin/product-types'); ?>">🏷️ Product Types</a><?php endif; ?>
                        <?php if (!empty($can_access['packages'])): ?><a href="<?= site_url('admin/packages'); ?>">🎀 Packages</a><?php endif; ?>
                        <?php if (!empty($can_access['templates'])): ?><a href="<?= site_url('admin/templates'); ?>">🖼️ Templates</a><?php endif; ?>
                        <?php if (!empty($can_access['users'])): ?><a href="<?= site_url('admin/users'); ?>">🔐 Admin Users</a><?php endif; ?>

                    </div>
                </div>
            </aside>
            <main class="col-lg-10 admin-content">
                <div class="topbar-pretty d-flex flex-wrap justify-content-between align-items-center gap-3">
                    <div>
                        <span class="page-kicker">Admin Workspace</span>
                        <h2 class="mb-1"><?= isset($page_title) ? html_escape($page_title) : 'Admin'; ?></h2>
                        <small>Halo, <?= setting_value($admin_name, 'Admin'); ?></small>
                    </div>
                    <a href="<?= site_url(); ?>" target="_blank" class="btn btn-outline-secondary">Lihat Frontend</a>
                </div>
                <?php if ($this->session->flashdata('flash_message')): ?>
                    <div class="alert alert-<?= html_escape($this->session->flashdata('flash_type') ?: 'info'); ?> alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('flash_message'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>