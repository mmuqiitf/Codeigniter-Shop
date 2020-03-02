<main role="main" class="container">
    <?php $this->load->view('layouts/_alert') ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Checkout Berhasil</div>
                <div class="card-body">
                    <h5>Nomor Order : <?= $content->invoice; ?></h5>
                    <p>Terima kasih sudah berbelanja di sini!</p>
                    <p>Silakan lakukan pembayaran untuk kami bisa proses selanjutnya dengan cara : </p>
                    <ol>
                        <li>Lakukan pembayaran pada rekening <strong>BNI : 740483587</strong> a/n Muqiit </li>
                        <li>Sertakan keterangan nomor order : <?= $content->invoice; ?> </li>
                        <li>Total pembayaran : <strong>Rp<?= number_format($content->total, 0, ',', '.') ?></strong></li>
                    </ol>
                    <p>Jika sudah, silakan kirimkan bukti transfer di halaman konfirmasi atau bisa <a href=" <?= base_url('myorder/detail/' . $content->invoice) ?>">klik disini</a>.</p>
                    <a href="<?= base_url() ?>" class="btn btn-primary"><i class="fas fa-angle-left"></i> Kembali </a>
                </div>
            </div>
        </div>
    </div>
</main>