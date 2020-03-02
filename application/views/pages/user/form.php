<main role="main" class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card mb-3">
                <div class="card-header">
                    <span>Formulir Tambah Pengguna</span>
                </div>
                <div class="card-body">
                    <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
                    <?= isset($input->id) ? form_hidden('id', $input->id) : ''; ?>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <?= form_input('name', $input->name, ['class' => 'form-control', 'required' => true, 'autofocus' => true]); ?>
                        <?= form_error('name'); ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <?= form_input(['type' => 'email', 'name' => 'email'], $input->email, ['class' => 'form-control', 'required' => true]); ?>
                        <?= form_error('email'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Password minimal 5 karakter']) ?>
                        <?= form_error('password'); ?>
                    </div>
                    <div class="form-group">
                        <label for="status">Role</label><br>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'role', 'value' => 'admin', 'checked' => $input->role == 'admin' ? true : false, 'class' => 'form-check-input']) ?>
                            <label for="status" class="form-check-label">Admin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'role', 'value' => 'member', 'checked' => $input->role == 'member' ? true : false, 'class' => 'form-check-input']) ?>
                            <label for="status" class="form-check-label">Member</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label><br>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'is_active', 'value' => 1, 'checked' => $input->is_active == 'admin' ? true : false, 'class' => 'form-check-input']) ?>
                            <label for="status" class="form-check-label">Aktif</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <?= form_radio(['name' => 'is_active', 'value' => 'member', 'checked' => $input->is_active == 0 ? true : false, 'class' => 'form-check-input']) ?>
                            <label for="status" class="form-check-label">Tidak Aktif</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto User</label><br>
                        <?= form_upload('image'); ?>
                        <?php if ($this->session->flashdata('image_error')) : ?>
                            <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                        <?php endif; ?>
                        <?php if (isset($input->image)) : ?>
                            <img src="<?= base_url("/images/user/$input->image") ?>" alt="" width="150" height="150">
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</main>