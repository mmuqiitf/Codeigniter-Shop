<main role="main" class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    Formulir Registrasi
                </div>
                <div class="card-body">
                    <?=
                        form_open('register', ['method' => 'POST']);
                    ?>
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
                        <?= form_password('password', '', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Password minimal 5 karakter']) ?>
                        <?= form_error('password'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Konfirmasi Password</label>
                        <?= form_password('password_confirmation', '', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Konfirmasi password harus sama dengan Password']) ?>
                        <?= form_error('password_confirmation'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>