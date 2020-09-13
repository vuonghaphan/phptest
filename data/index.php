<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Bai test </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Thư viện vedor -->
    <link rel="stylesheet" href="assets/css/vendor.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<style>
    .style{
       height: 200px;
    }
    .css{
        margin-right: 20px;
    }
</style>
<body>
<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];
} else {
    $id = 1;
}

$dataStore = file_get_contents('stores.json');
$stores = json_decode($dataStore, true);

$dataStoresProduct = file_get_contents('storeProducts.json');
$storesProduct = json_decode($dataStoresProduct,true);

$dataProducts = file_get_contents('products.json');
$products = json_decode($dataProducts,true);
?>
<div class="main-wrapper">
    <div class="app" id="app">
        <aside class="sidebar">
            <div class="sidebar-container">
                <div class="sidebar-header">
                    <div class="brand">
                        <div class="logo">
                        </div>
                        <p> Milk tea stores</p>
                    </div>
                </div>
                <nav class="menu">
                    <ul class="sidebar-menu metismenu" id="sidebar-menu">
                        <?php foreach( $stores as $key => $value){
                                foreach ($value as $item => $str){
                            ?>
                        <li class="">
                            <a href="index.php?id=<?php echo $str['id']?>?shop=<?php echo $str['name'] ?>">
                                <i class=""></i> <?php echo $str['name']; ?>
                            </a>
                        </li>
                        <?php } } ?>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1> Store Menu  <?php echo $id ?></h1>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-10">
                    <button type="button" class="btn btn-dark">Filler</button>
                </div>
                <div class="col-lg-2">
                    <div class="dropdown">
                        <label> Sort by</label>
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Name
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item" type="button">Name</button>
                            <button class="dropdown-item" type="button">Another action</button>
                            <button class="dropdown-item" type="button">Something else here</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($storesProduct as $key => $value) {
                        foreach ($value as $key => $item) {
                            if ($id == $item['shop']) {
                                $idProduct = $item['product'];
                                foreach ($products as $key => $product){
                                    foreach ($product as $key => $prd){
                                        if ($idProduct == $prd['id']){
                                        ?>
                                        <div class="col-lg-3 ">
                                        <div class="card border-dark mb-3 css" style="max-height: 220px;">
                                            <div class="card-header bg-transparent border-dark"><?php  echo 'MT-0'.$prd['id']?></div>
                                            <div class="card-body text-dark" style="padding: 1px">
                                                <h5 class="card-title"><?php echo $prd['name']; ?></h5>
                                                <p class="card-text" style="padding-bottom: 2px">Toppings: <?php echo $prd['toppings'];?></p>
                                            </div>
                                            <div class="card-footer bg-transparent border-dark"><?php echo '$'.$prd['price']; ?></div>
                                        </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }
                        }
                    }
                }
                ?>
            </div>
        </div>
        <!-- end content -->
        <footer class="footer">
            <div class="footer-block buttons">
                <a href="https://www.facebook.com/VuongHaPhan/"><em class="fa fa-facebook"></em></a>
            </div>
            <div class="footer-block author">
                <ul>
                    <li> Design by
                        <a href="https://www.facebook.com/VuongHaPhan/">VuongHaPhan</a>
                    </li>
                </ul>
            </div>
        </footer>
    </div>
</div>

<script src="assets/js/vendor.js"></script>
<script src="assets/js/app.js"></script>

</body>

</html>
