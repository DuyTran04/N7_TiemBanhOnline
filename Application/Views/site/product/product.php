<?php view('shared.site.header', [
    'title' => 'Product'
]); ?>
<style>
    .product-banner {
        background-image: url("./public/uploads/<?= $banners[0]['image'] ?>");
    }
</style>
<section class="banner product-banner">
    <div class="container-fluid banner-title">
        <div class="row">
            <div class="col-md-12">
                <h2 id="motto">Menu Bánh</h2>
                <span>Home</span> &nbsp;<span>\\</span> &nbsp;<span>Menu Bánh</span>
            </div>

        </div>
    </div>

    <div class="container-fluid banner-share">
        <div class="row">
            <span>Share this page:</span>
            <div class="banner-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
        </div>

    </div>

</section>


<section class="latest-products p-50">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="blog-right-side">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="./?controller=product&action=search" method="post">
                            <div class="form-group">
                                <div class="input-group mb-1">
                                    <input type="text" class="form-control" placeholder='Tìm kiếm từ khóa bánh' name="product_name">
                                    <div class="input-group-append">
                                        <button class="btns" type="submit"><i class="ti ti-search"></i></button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </aside>

                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Loại bánh</h4>
                        <ul class="list cat-list">
                            <?php foreach ($categories as $cat) : ?>
                                <li>
                                    <a href="<?= ($currentCategoryId == $cat['id']) ?
                                                    './?controller=product&action=allProducts' :
                                                    './?controller=product&action=allProducts&id=' . $cat['id'] ?>" class="<?php echo ($currentCategoryId == $cat['id']) ?  'category-chosen' : '' ?> category-item">
                                        <p><?= $cat['name'] ?></p>
                                    </a>
                                    <p class="category-num"><?= $cat['count'] ?></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </aside>

                    <aside class="single_sidebar_widget popular_post_widget top_product_widget">
                        <h3 class="widget_title">Bánh phổ biến</h3>
                        <?php foreach ($top_products as $pro) : ?>
                            <div class="media post_item">
                                <img src="./public/uploads/<?= $pro['image'] ?>" alt="post" style="border-radius: 100%; border: 1px solid #f0e5d4">
                                <div class="media-body">
                                    <a href="./?controller=product&action=productDetail&id=<?= $pro['id'] ?>">
                                        <h3 class="top-link"><?= $pro['name'] ?></h3>
                                    </a>
                                    <p class="discount-price">$<?= number_format($pro['sale_price'] > 0 ? $pro['sale_price'] : $pro['price'], 2, '.', '') ?></p>
                                    <?php if ($pro['sale_price'] > 0) : ?>
                                        <p class="old-price">$<?= number_format($pro['price'], 2, '.', '') ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </aside>
                    <aside class="single_sidebar_widget tag_cloud_widget">
                        <h4 class="widget_title">Tag</h4>
                        <ul class="list">
                            <li>
                                <a href="#">Sô cô la</a>
                            </li>
                            <li>
                                <a href="#">tart</a>
                            </li>
                            <li>
                                <a href="#">strawberry</a>
                            </li>
                            <li>
                                <a href="#">bánh mì</a>
                            </li>
                            <li>
                                <a href="#">bánh bắp</a>
                            </li>
                            <li>
                                <a href="#">công thức dễ làm bánh</a>
                            </li>
                            <li>
                                <a href="#">trái cây</a>
                            </li>
                            <li>
                                <a href="#">bánh ngon</a>
                            </li>
                        </ul>
                    </aside>


                </div>
            </div>


            <div class="col-md-9">
                <div class="content-block">
                    <ul id='pro-list'>

                        <?php foreach ($products as $product) : ?>
                            <li>
                                <a href="./?controller=product&action=productDetail&id=<?= $product['id'] ?>">
                                    <div class="pro-block">
                                        <div class="pro-img">
                                            <?php
                                            $productImage = !empty($product['image']) ? $product['image'] : 'no-image.png';
                                            ?>
                                            <img src="./public/uploads/<?= $productImage; ?>" alt="<?= $product['name']; ?>">
                                        </div>
                                        <div class="pro-info">
                                            <h5><?= $product['name'] ?? '' ?></h5>
                                            <h5>$<?= number_format($product['sale_price'] > 0 ? $product['sale_price'] : $product['price'], 2, '.', '') ?></h5>
                                        </div>
                                    </div>
                                </a>

                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?= $pagination ?>

            </div>
        </div>
    </div>
</section>
<?php view('shared.site.footer'); ?>