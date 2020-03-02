<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Ini adalah website CIShop">
    <meta name="author" content="M. Muqiit Faturrahman">
    <title><?= isset($title) ? $title : 'CIShop' ?> - CodeIginter E-Commerce</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/'); ?>libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>libs/fontawesome/css/all.min.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/app.css">
    <style>
        .bloc_left_price {
            color: #c01508;
            text-align: center;
            font-weight: bold;
            font-size: 150%;
        }

        .category_block li:hover {
            background-color: #007bff;
        }

        .category_block li:hover a {
            color: #ffffff;
        }

        .category_block li a {
            color: #343a40;
        }

        .add_to_cart_block .title {
            text-align: center;
            font-weight: bold;
            font-size: 30px;
        }

        .add_to_cart_block .description {
            color: #343a40;
            margin-top: 10px;
            text-align: justify;
        }

        .add_to_cart_block .price {
            color: #343a40;
            text-align: center;
            font-size: 140%;
        }

        .product_rassurance {
            padding: 10px;
            margin-top: 15px;
            background: #ffffff;
            border: 1px solid #6c757d;
            color: #6c757d;
        }

        .product_rassurance .list-inline {
            margin-bottom: 0;
            text-transform: uppercase;
            text-align: center;
        }

        .product_rassurance .list-inline li:hover {
            color: #343a40;
        }

        .reviews_product .fa-star {
            color: gold;
        }

        .pagination {
            margin-top: 20px;
        }

        footer {
            background: #343a40;
            padding: 40px;
        }

        footer a {
            color: #f8f9fa !important
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <?php $this->load->view('layouts/_navbar.php'); ?>
    <!-- End Navbar -->
    <!-- Content -->
    <?php $this->load->view($page); ?>
    <!-- End Content -->
    <script src="<?= base_url('assets/'); ?>libs/jquery-3.4.1.min.js"></script>
    <script src="<?= base_url('assets/'); ?>libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/app.js"></script>

</html>