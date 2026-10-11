<?= $this->include('layout/header') ?>

<div class="card">
    <h1>Add New User</h1>

    <?php if (session('errors')): ?>
        <div class="error-box">
            <?php foreach (session('errors') as $error): ?>
                <div><?= esc($error) ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('users/create') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" value="<?= old('username') ?>">
        </div>

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name" value="<?= old('full_name') ?>">
        </div>

        <div class="form-group">
            <label>Avatar (JPG or PNG, maximum 2MB)</label>
            <input type="file" name="avatar" accept=".jpg,.jpeg,.png">
        </div>

        <button class="button" type="submit">Save User</button>
        <a class="button secondary-button" href="<?= base_url('users') ?>">Cancel</a>
    </form>
</div>

<?= $this->include('layout/footer') ?>