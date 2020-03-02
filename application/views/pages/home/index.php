<main role="main" class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            Kategori : <strong> <?= isset($category) ? $category : 'Semua Kategori' ?> </strong>
                            <span class="float-right">
                                Harga : <a href="<?= base_url("shop/sortprice/asc") ?>" class="badge badge-primary">Termurah</a> | <a href="<?= base_url("shop/sortprice/desc") ?>" class="badge badge-primary">Termahal</a>
                            </span>
                            <span class="float-right mr-3">
                                Urutkan : <a href="<?= base_url("shop/sortdate/asc") ?>" class="badge badge-primary">Terlama</a> | <a href="<?= base_url("shop/sortdate/desc") ?>" class="badge badge-primary">Terbaru</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                foreach ($content as $row) :
                ?>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <img src="<?= $row->image ? base_url("/images/product/$row->image") : 'http://placehold.co/100x70" alt="placehold.co' ?>" class="card-img-top" height="400">
                            <div class="card-body">
                                <h5 class="card-title"><a href="<?= base_url('detail/' . $row->slug) ?>"><?= $row->product_title; ?></a></h5>
                                <p class="card-text"><strong>Rp<?= number_format($row->price, 0, ',', '.'); ?></strong></p>
                                <p class="card-text"><?= $row->description ?></p>
                                <a href="<?= base_url("shop/category/$row->category_slug") ?>" class="badge badge-primary"><i class="fas fa-tags"></i> <?= $row->category_title ?> </a>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach; ?>
            </div>
            <nav aria-label="Page navigation">
                <?= $pagination; ?>
            </nav>
        </div>
        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header">Pencarian</div>
                        <div class="card-body">
                            <form action="<?= base_url('shop/search') ?>" method="POST">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="keyword" placeholder="Cari" value="<?= $this->session->userdata('keyword') ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header">Kategori</div>
                        <ul class="list-group">
                            <li class="list-group-item"><a href="<?= base_url('/') ?>">Semua Kategori</a></li>
                            <?php foreach (getCategories() as $category) : ?>
                                <li class="list-group-item"><a href="<?= base_url("shop/category/$category->slug") ?>"><?= $category->title; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>