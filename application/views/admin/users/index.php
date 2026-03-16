<?php $this->load->view('admin/layout/header'); ?>
<div class="card table-card"><div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Data Admin User</h5>
        <a href="<?= site_url('admin/users/create'); ?>" class="btn btn-dark">Tambah User</a>
    </div>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>#</th><th>Photo</th><th>Name</th><th>Username</th><th>Email</th><th>Role</th><th>Status</th><th>Last Login</th><th></th></tr></thead>
            <tbody>
            <?php foreach($users as $u): ?>
                <tr>
                    <td><?= $u->id; ?></td>
                    <td><?php if(!empty($u->photo)): ?><img src="<?= asset_or_url($u->photo); ?>" style="width:44px;height:44px;object-fit:cover;border-radius:50%"><?php else: ?>-<?php endif; ?></td>
                    <td><?= html_escape($u->name); ?></td>
                    <td><?= html_escape($u->username); ?></td>
                    <td><?= html_escape($u->email); ?></td>
                    <td><span class="badge text-bg-<?= admin_role_badge($u->role); ?>"><?= html_escape($role_options[$u->role] ?? $u->role); ?></span></td>
                    <td><span class="badge text-bg-<?= $u->is_active ? 'success' : 'secondary'; ?>"><?= $u->is_active ? 'Active' : 'Inactive'; ?></span></td>
                    <td><?= html_escape($u->last_login_at); ?></td>
                    <td class="text-end">
                        <a href="<?= site_url('admin/users/edit/'.$u->id); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                        <?php if($u->id != 1): ?><a href="<?= site_url('admin/users/delete/'.$u->id); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus user ini?')">Hapus</a><?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div></div>
<?php $this->load->view('admin/layout/footer'); ?>
