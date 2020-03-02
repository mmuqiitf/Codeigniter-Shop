<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url() ?>">CI E-Commerce</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <?php
                $role = $this->session->userdata('role');
                if ($role == 'admin') :
                ?>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-1">
                            <a href="<?= base_url('category') ?>" class="dropdown-item">Kategori</a>
                            <a href="<?= base_url('product') ?>" class="dropdown-item">Product</a>
                            <a href="<?= base_url('order') ?>" class="dropdown-item">Order</a>
                            <a href="<?= base_url('user') ?>" class="dropdown-item">Pengguna</a>

                        </div>
                    </li>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= base_url('cart') ?>" class="nav-link"><i class="fas fa-shopping-cart"></i> Cart (<?= getCart() ?>) </a>
                </li>
                <?php if (!$this->session->userdata('is_login')) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('login') ?>" class="nav-link"> Login </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('register') ?>" class="nav-link"> Register </a>
                    </li>
                <?php else : ?>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= getProfile()->name; ?></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-1">
                            <a href="<?= base_url('profile') ?>" class="dropdown-item">Profile</a>
                            <a href="<?= base_url('myorder') ?>" class="dropdown-item">Orders</a>
                            <a href="<?= base_url('logout') ?>" class="dropdown-item">Logout</a>

                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('profile') ?>" class="nav-link">
                            <img src="<?= base_url('images/user/' . getProfile()->image) ?>" class="rounded-circle" height="25" width="25">
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

    </div>
</nav>