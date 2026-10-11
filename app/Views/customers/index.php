<?= $this->include('layout/header') ?>

<div class="card">
    <h1>Customer Accounts</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="success-box">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <a class="button" href="<?= base_url('customers/new') ?>">+ Add New Customer</a>

    <table>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= esc($customer['full_name']) ?></td>
                    <td><?= esc($customer['email']) ?></td>
                    <td><?= esc($customer['phone']) ?></td>
                    <td>
                        <a class="button"
                           href="<?= base_url('customers/edit/' . $customer['id']) ?>">
                            Edit
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->include('layout/footer') ?>