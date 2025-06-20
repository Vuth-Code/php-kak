<?php use App\Helpers\Helper; ?>

<!-- Slider -->
<?php if (!empty($sliders)): ?>
<section class="section-slide m-t-23">
    <div class="wrap-slick1">
        <div class="slick1">
            <?php foreach ($sliders as $slider): ?>
            <div class="item-slick1" style="background-image: url(<?= Helper::upload($slider['image']) ?>);">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-101 cl2 respon2">
                                <?= Helper::sanitize($slider['subtitle'] ?? '') ?>
                            </span>
                        </div>
                        
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                <?= Helper::sanitize($slider['title'] ?? '') ?>
                            </h2>
                        </div>
                        
                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                            <?php if ($slider['link_url']): ?>
                            <a href="<?= Helper::sanitize($slider['link_url']) ?>" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                <?= Helper::sanitize($slider['button_text'] ?: 'Shop Now') ?>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>



<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Product Overview
            </h3>
        </div>

        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    All Products
                </button>

                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $category): ?>
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" 
                            data-filter=".<?= strtolower(Helper::sanitize($category['catName'])) ?>">
                        <?= Helper::sanitize($category['catName']) ?>
                    </button>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Filter
                </div>

                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Search
                </div>
            </div>
        </div>

        <!-- Search -->
        <div class="dis-none panel-search w-full p-t-10 p-b-15">
            <div class="bor8 dis-flex p-l-15">
                <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
            </div>
        </div>

        <div class="row isotope-grid" id="product-grid">
            <?php if (!empty($featured_products)): ?>
                <?php foreach ($featured_products as $product): ?>
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?= strtolower($product['catName'] ?? 'general') ?>">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="<?= Helper::upload($product['image_path'] ?: 'placeholder.jpg') ?>" alt="<?= Helper::sanitize($product['productName']) ?>">

                            <button class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 add-to-cart-btn"
                                    data-product-id="<?= $product['productID'] ?>"
                                    data-product-name="<?= Helper::sanitize($product['productName']) ?>"
                                    data-product-price="<?= $product['sale_price'] ?: $product['price'] ?>"
                                    data-product-image="<?= Helper::upload($product['image_path'] ?: 'placeholder.jpg') ?>">
                                Add to Cart
                            </button>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="/product/<?= $product['productID'] ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    <?= Helper::sanitize($product['productName']) ?>
                                </a>

                                <span class="stext-105 cl3">
                                    <?= Helper::formatCurrency($product['sale_price'] ?: $product['price']) ?>
                                    <?php if (!empty($product['sale_price']) && $product['sale_price'] < $product['price']): ?>
                                        <span class="old-price text-muted text-decoration-line-through ms-2"><?= Helper::formatCurrency($product['price']) ?></span>
                                    <?php endif; ?>
                                </span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="<?= Helper::asset('images/icons/icon-heart-01.png') ?>" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="<?= Helper::asset('images/icons/icon-heart-02.png') ?>" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p class="text-center">No featured products available at the moment.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-45">
            <a href="<?= Helper::url('shop') ?>" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Load More
            </a>
        </div>
    </div>
</section>

<script src="<?= Helper::asset('js/product-filter.js') ?>"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize product filtering for home page
    new ProductFilter({
        gridId: 'product-grid',
        enableLoadMore: false // Home page uses link to shop for more products
    });
});
</script> 