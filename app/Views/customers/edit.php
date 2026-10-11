<?= $this->include('layout/header') ?>

<div class="card">
    <h1>Edit Customer</h1>

    <?php if (session('errors')): ?>
        <div class="error-box">
            <?php foreach (session('errors') as $error): ?>
                <div><?= esc($error) ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('customers/update/' . $customer['id']) ?>" method="post">
        <?= csrf_field() ?>

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name"
                   value="<?= old('full_name') ?? esc($customer['full_name']) ?>">
        </div>

        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email"
                   value="<?= old('email') ?? esc($customer['email']) ?>">
        </div>

        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" name="phone"
                   value="<?= old('phone') ?? esc($customer['phone']) ?>">
        </div>

        <button class="button" type="submit">Update Customer</button>
        <a class="button secondary-button" href="<?= base_url('customers') ?>">Cancel</a>
    </form>
</div>

<?= $this->include('layout/footer') ?>