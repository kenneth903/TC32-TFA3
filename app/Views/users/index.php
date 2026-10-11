<?= $this->include('layout/header') ?>

<div class="card">
    <h1>User Accounts</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="success-box">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <a class="button" href="<?= base_url('users/new') ?>">+ Add New User</a>

    <table>
        <thead>
            <tr>
                <th>Avatar</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td>
                        <?php if (! empty($user['avatar'])): ?>
                            <img class="avatar"
                                 src="<?= base_url('uploads/' . $user['avatar']) ?>"
                                 alt="User avatar">
                        <?php else: ?>
                            <div class="avatar-placeholder">
                                <?= esc(strtoupper(substr($user['full_name'], 0, 1))) ?>
                            </div>
                        <?php endif; ?>
                    </td>
                    <td><?= esc($user['username']) ?></td>
                    <td><?= esc($user['full_name']) ?></td>
                    <td>
                        <a class="button"
                           href="<?= base_url('users/edit/' . $user['id']) ?>">
                            Edit
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->include('layout/footer') ?>