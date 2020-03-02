<main role="main" class="container">
    <div class="row">
        <!-- Image -->
        <div class="col-12 col-lg-6">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <img src="<?= $content->image ? base_url('images/product/' . $content->image) : 'https://dummyimage.com/800x800/55595c/fff' ?>" height="400" width="500" />
                </div>
            </div>
        </div>

        <!-- Add to cart -->
        <div class="col-12 col-lg-6 add_to_cart_block">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <p class="title"><?= $content->title ?></p>
                    <p class="price">Rp<?= number_format($content->price, 0, ',', '.') ?></p>
                    Deskripsi : <br>
                    <p class="description"> <?= $content->description ?> </p>
                    <form action="<?= base_url("cart/add") ?>" method="POST">
                        <div class="input-group">
                            <input type="hidden" name="id_product" value="<?= $content->id ?>">
                            <div class="input-group">
                                <input type="number" name="qty" id="" class="form-control" value="1">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="product_rassurance">
                        <ul class="list-inline">
                            <li class="list-inline-item"><i class="fa fa-truck fa-2x"></i><br />Fast delivery</li>
                            <li class="list-inline-item"><i class="fa fa-credit-card fa-2x"></i><br />Secure payment
                            </li>
                            <li class="list-inline-item"><i class="fa fa-phone fa-2x"></i><br />+33 1 22 54 65 60
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>