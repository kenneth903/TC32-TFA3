<?= $this->include('layout/header') ?>

<div class="card">
    <h1>Add New Customer</h1>

    <?php if (session('errors')): ?>
        <div class="error-box">
            <?php foreach (session('errors') as $error): ?>
                <div><?= esc($error) ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('customers/create') ?>" method="post">
        <?= csrf_field() ?>

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name" value="<?= old('full_name') ?>">
        </div>

        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" value="<?= old('email') ?>">
        </div>

        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phone" value="<?= old('phone') ?>">
        </div>

        <button class="button" type="submit">Save Customer</button>
        <a class="button secondary-button" href="<?= base_url('customers') ?>">Cancel</a>
    </form>
</div>

<?= $this->include('layout/footer') ?>