<?php use App\Helpers\Helper; ?>

<!-- Modern Shop Styles -->
<style>
    /* Modern Shop Container */
    .modern-shop {
        background: transparent;
        padding: var(--spacing-2xl) 0;
        min-height: 100vh;
    }

    /* Modern Shop Header */
    .modern-shop-header {
        background: var(--white);
        border-radius: var(--radius-2xl);
        padding: var(--spacing-2xl);
        box-shadow: var(--shadow-lg);
        margin-bottom: var(--spacing-2xl);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .shop-title {
        text-align: center;
        margin-bottom: var(--spacing-xl);
    }

    .shop-title h1 {
        font-size: 2.5rem;
        font-weight: var(--font-weight-bold);
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: var(--spacing-sm);
    }

    .shop-title p {
        color: var(--gray-600);
        font-size: 1.125rem;
        margin: 0;
    }

    /* Modern Filter Buttons */
    .modern-filter-group {
        display: flex;
        flex-wrap: wrap;
        gap: var(--spacing-sm);
        justify-content: center;
        margin-bottom: var(--spacing-xl);
    }

    .modern-filter-btn {
        padding: var(--spacing-sm) var(--spacing-lg);
        border: 2px solid var(--gray-200);
        background: var(--white);
        color: var(--gray-700);
        border-radius: var(--radius-full);
        font-weight: var(--font-weight-medium);
        transition: all var(--transition-normal);
        cursor: pointer;
        text-decoration: none;
        position: relative;
        overflow: hidden;
    }

    .modern-filter-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        transition: left var(--transition-normal);
        z-index: -1;
    }

    .modern-filter-btn:hover::before,
    .modern-filter-btn.how-active1::before {
        left: 0;
    }

    .modern-filter-btn:hover,
    .modern-filter-btn.how-active1 {
        color: var(--white);
        border-color: transparent;
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    /* Modern Control Buttons */
    .modern-controls {
        display: flex;
        gap: var(--spacing-sm);
        justify-content: center;
        flex-wrap: wrap;
    }

    .modern-control-btn {
        display: flex;
        align-items: center;
        gap: var(--spacing-sm);
        padding: var(--spacing-md) var(--spacing-lg);
        background: var(--glass-bg);
        border: 1px solid var(--glass-border);
        border-radius: var(--radius-lg);
        color: var(--gray-700);
        text-decoration: none;
        font-weight: var(--font-weight-medium);
        transition: all var(--transition-normal);
        backdrop-filter: blur(10px);
        cursor: pointer;
    }

    .modern-control-btn:hover {
        background: var(--primary-color);
        color: var(--white);
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .modern-control-btn i {
        font-size: 1.125rem;
        transition: transform var(--transition-fast);
    }

    .modern-control-btn:hover i {
        transform: scale(1.1);
    }
</style>

<!-- Modern Shop -->
<div class="modern-shop">
    <div class="container">
        <!-- Modern Shop Header -->
        <div class="modern-shop-header">
            <div class="shop-title">
                <h1>Our Products</h1>
                <p>Discover amazing products crafted with love and attention to detail</p>
            </div>

            <!-- Modern Filter Categories -->
            <div class="modern-filter-group filter-tope-group">
                <button class="modern-filter-btn how-active1" data-filter="*">
                    <i class="fa fa-th-large me-2"></i>All Products
                </button>

                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $category): ?>
                    <button class="modern-filter-btn"
                            data-filter=".<?= strtolower(Helper::sanitize($category['catName'] ?? $category['name'] ?? '')) ?>">
                        <i class="fa fa-tag me-2"></i><?= Helper::sanitize($category['catName'] ?? $category['name'] ?? 'Unknown') ?>
                    </button>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Modern Controls -->
            <div class="modern-controls">
                <button class="modern-control-btn js-show-filter">
                    <i class="icon-filter zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter zmdi zmdi-close dis-none"></i>
                    <span>Filter</span>
                </button>

                <button class="modern-control-btn js-show-search">
                    <i class="icon-search zmdi zmdi-search"></i>
                    <i class="icon-close-search zmdi zmdi-close dis-none"></i>
                    <span>Search</span>
                </button>
            </div>
        </div>

        <!-- Filter -->
        <div class="dis-none panel-filter w-full p-t-10">
            <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                <div class="filter-col1 p-r-15 p-b-27">
                    <div class="mtext-102 cl2 p-b-15">Sort By</div>
                    <ul>
                        <li class="p-b-6">
                            <a href="#" class="filter-link stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-sort="newest">
                                Newest Products
                            </a>
                        </li>
                        <li class="p-b-6">
                            <a href="#" class="filter-link stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-sort="price-low">
                                Price: Low to High
                            </a>
                        </li>
                        <li class="p-b-6">
                            <a href="#" class="filter-link stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-sort="price-high">
                                Price: High to Low
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="filter-col2 p-r-15 p-b-27">
                    <div class="mtext-102 cl2 p-b-15">Price</div>
                    <ul>
                        <li class="p-b-6">
                            <a href="#" class="filter-link stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-price="0-50">
                                $0.00 - $50.00
                            </a>
                        </li>
                        <li class="p-b-6">
                            <a href="#" class="filter-link stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-price="50-100">
                                $50.00 - $100.00
                            </a>
                        </li>
                        <li class="p-b-6">
                            <a href="#" class="filter-link stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-price="100-150">
                                $100.00 - $150.00
                            </a>
                        </li>
                        <li class="p-b-6">
                            <a href="#" class="filter-link stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-price="150+">
                                $150.00+
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="filter-col3 p-r-15 p-b-27">
                    <div class="mtext-102 cl2 p-b-15">Tags</div>
                    <div class="flex-w p-t-4 m-r--5">
                        <?php if (!empty($tags)): ?>
                            <?php foreach ($tags as $tag): ?>
                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5" data-tag="<?= Helper::sanitize($tag) ?>">
                                <?= Helper::sanitize($tag) ?>
                            </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
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

        <!-- Modern Product Grid -->
        <div class="row isotope-grid" id="product-grid">
            <style>
                /* Modern Product Cards */
                .modern-product-card {
                    background: var(--white);
                    border-radius: var(--radius-2xl);
                    overflow: hidden;
                    box-shadow: var(--shadow-md);
                    transition: all var(--transition-normal);
                    border: 1px solid rgba(255, 255, 255, 0.2);
                    backdrop-filter: blur(10px);
                    height: 100%;
                    display: flex;
                    flex-direction: column;
                }

                .modern-product-card:hover {
                    transform: translateY(-10px);
                    box-shadow: var(--shadow-2xl);
                }

                .modern-product-image {
                    position: relative;
                    overflow: hidden;
                    aspect-ratio: 1;
                    background: var(--gray-50);
                }

                .modern-product-image img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    transition: transform var(--transition-slow);
                }

                .modern-product-card:hover .modern-product-image img {
                    transform: scale(1.1);
                }

                /* Sale Badge */
                .sale-badge {
                    position: absolute;
                    top: var(--spacing-md);
                    left: var(--spacing-md);
                    background: linear-gradient(135deg, var(--error-color), var(--accent-color));
                    color: var(--white);
                    padding: var(--spacing-xs) var(--spacing-sm);
                    border-radius: var(--radius-full);
                    font-size: 0.75rem;
                    font-weight: var(--font-weight-bold);
                    text-transform: uppercase;
                    z-index: 2;
                    animation: pulse 2s infinite;
                }

                /* Product Actions Overlay */
                .product-actions {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    display: flex;
                    gap: var(--spacing-sm);
                    opacity: 0;
                    transition: all var(--transition-normal);
                    z-index: 3;
                }

                .modern-product-card:hover .product-actions {
                    opacity: 1;
                }

                .action-btn {
                    width: 50px;
                    height: 50px;
                    border-radius: var(--radius-full);
                    background: var(--white);
                    border: none;
                    color: var(--gray-700);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    transition: all var(--transition-fast);
                    cursor: pointer;
                    box-shadow: var(--shadow-lg);
                }

                .action-btn:hover {
                    background: var(--primary-color);
                    color: var(--white);
                    transform: scale(1.1);
                }

                .action-btn.add-to-cart {
                    background: var(--primary-color);
                    color: var(--white);
                    width: auto;
                    padding: 0 var(--spacing-lg);
                    border-radius: var(--radius-full);
                    font-weight: var(--font-weight-medium);
                    font-size: 0.875rem;
                }

                .action-btn.add-to-cart:hover {
                    background: var(--primary-dark);
                    transform: scale(1.05);
                }

                /* Product Info */
                .modern-product-info {
                    padding: var(--spacing-lg);
                    flex: 1;
                    display: flex;
                    flex-direction: column;
                }

                .product-category {
                    color: var(--gray-500);
                    font-size: 0.875rem;
                    font-weight: var(--font-weight-medium);
                    text-transform: uppercase;
                    letter-spacing: 0.5px;
                    margin-bottom: var(--spacing-xs);
                }

                .product-name {
                    color: var(--gray-800);
                    font-size: 1.125rem;
                    font-weight: var(--font-weight-semibold);
                    margin-bottom: var(--spacing-sm);
                    text-decoration: none;
                    transition: color var(--transition-fast);
                    line-height: 1.4;
                    display: -webkit-box;
                    -webkit-line-clamp: 2;
                    line-clamp: 2;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                }

                .product-name:hover {
                    color: var(--primary-color);
                }

                .product-price {
                    margin-top: auto;
                    display: flex;
                    align-items: center;
                    gap: var(--spacing-sm);
                }

                .current-price {
                    font-size: 1.25rem;
                    font-weight: var(--font-weight-bold);
                    color: var(--primary-color);
                }

                .old-price {
                    font-size: 1rem;
                    color: var(--gray-400);
                    text-decoration: line-through;
                }

                .discount-percent {
                    background: var(--success-color);
                    color: var(--white);
                    padding: 2px 6px;
                    border-radius: var(--radius-sm);
                    font-size: 0.75rem;
                    font-weight: var(--font-weight-bold);
                }

                /* Wishlist Button */
                .wishlist-btn {
                    position: absolute;
                    top: var(--spacing-md);
                    right: var(--spacing-md);
                    width: 40px;
                    height: 40px;
                    border-radius: var(--radius-full);
                    background: var(--white);
                    border: none;
                    color: var(--gray-400);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    transition: all var(--transition-fast);
                    cursor: pointer;
                    box-shadow: var(--shadow-md);
                    z-index: 2;
                }

                .wishlist-btn:hover,
                .wishlist-btn.active {
                    background: var(--error-color);
                    color: var(--white);
                    transform: scale(1.1);
                }

                /* Empty State */
                .empty-products {
                    text-align: center;
                    padding: var(--spacing-3xl);
                    background: var(--white);
                    border-radius: var(--radius-2xl);
                    box-shadow: var(--shadow-lg);
                }

                .empty-products i {
                    font-size: 4rem;
                    color: var(--gray-300);
                    margin-bottom: var(--spacing-lg);
                }

                .empty-products h4 {
                    color: var(--gray-700);
                    font-weight: var(--font-weight-bold);
                    margin-bottom: var(--spacing-sm);
                }

                .empty-products p {
                    color: var(--gray-500);
                    margin: 0;
                }
            </style>

            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?= strtolower($product['catName'] ?? 'general') ?>">
                    <div class="modern-product-card">
                        <div class="modern-product-image">
                            <img src="<?= Helper::upload($product['image_path'] ?: 'placeholder.jpg') ?>"
                                 alt="<?= Helper::sanitize($product['productName']) ?>">

                            <!-- Sale Badge -->
                            <?php if (!empty($product['sale_price']) && $product['sale_price'] < $product['price']): ?>
                                <?php $discount = round((($product['price'] - $product['sale_price']) / $product['price']) * 100); ?>
                                <div class="sale-badge">-<?= $discount ?>%</div>
                            <?php endif; ?>

                            <!-- Wishlist Button -->
                            <button class="wishlist-btn js-addwish-b2" data-product-id="<?= $product['productID'] ?>">
                                <i class="zmdi zmdi-favorite-outline"></i>
                            </button>

                            <!-- Product Actions -->
                            <div class="product-actions">
                                <button class="action-btn" title="Quick View">
                                    <i class="zmdi zmdi-eye"></i>
                                </button>
                                <button class="action-btn add-to-cart add-to-cart-btn"
                                        data-product-id="<?= $product['productID'] ?>"
                                        data-product-name="<?= Helper::sanitize($product['productName']) ?>"
                                        data-product-price="<?= $product['sale_price'] ?: $product['price'] ?>"
                                        data-product-image="<?= Helper::upload($product['image_path'] ?: 'placeholder.jpg') ?>">
                                    <i class="zmdi zmdi-shopping-cart me-2"></i>Add to Cart
                                </button>
                                <button class="action-btn" title="Compare">
                                    <i class="zmdi zmdi-swap"></i>
                                </button>
                            </div>
                        </div>

                        <div class="modern-product-info">
                            <div class="product-category"><?= Helper::sanitize($product['catName'] ?? 'General') ?></div>

                            <a href="/product/<?= $product['productID'] ?>" class="product-name js-name-b2">
                                <?= Helper::sanitize($product['productName']) ?>
                            </a>

                            <div class="product-price">
                                <span class="current-price">
                                    <?= Helper::formatCurrency($product['sale_price'] ?: $product['price']) ?>
                                </span>
                                <?php if (!empty($product['sale_price']) && $product['sale_price'] < $product['price']): ?>
                                    <span class="old-price">
                                        <?= Helper::formatCurrency($product['price']) ?>
                                    </span>
                                    <?php $discount = round((($product['price'] - $product['sale_price']) / $product['price']) * 100); ?>
                                    <span class="discount-percent">-<?= $discount ?>%</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="empty-products">
                        <i class="zmdi zmdi-shopping-cart"></i>
                        <h4>No Products Found</h4>
                        <p>Try adjusting your filters or search terms to find what you're looking for.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Modern Load More -->
        <?php
        $per_page = $per_page ?? 12; // Default value if not set
        $current_page = $current_page ?? $currentPage ?? 1; // Handle different variable names
        ?>
        <?php if (!empty($products) && count($products) >= $per_page): ?>
        <div class="text-center" style="margin-top: var(--spacing-2xl);">
            <button id="load-more-btn" class="modern-load-more-btn" data-page="<?= $current_page + 1 ?>">
                <span class="btn-text">Load More Products</span>
                <span class="btn-loading" style="display: none;">
                    <i class="zmdi zmdi-refresh zmdi-hc-spin"></i> Loading...
                </span>
            </button>
        </div>

        <style>
            .modern-load-more-btn {
                background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
                color: var(--white);
                border: none;
                padding: var(--spacing-md) var(--spacing-2xl);
                border-radius: var(--radius-full);
                font-size: 1.125rem;
                font-weight: var(--font-weight-semibold);
                cursor: pointer;
                transition: all var(--transition-normal);
                box-shadow: var(--shadow-lg);
                position: relative;
                overflow: hidden;
            }

            .modern-load-more-btn::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
                transition: left var(--transition-normal);
                z-index: -1;
            }

            .modern-load-more-btn:hover::before {
                left: 0;
            }

            .modern-load-more-btn:hover {
                transform: translateY(-3px);
                box-shadow: var(--shadow-2xl);
            }

            .modern-load-more-btn:disabled {
                opacity: 0.7;
                cursor: not-allowed;
                transform: none;
            }

            @keyframes spin {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }

            .zmdi-hc-spin {
                animation: spin 1s linear infinite;
            }
        </style>
        <?php endif; ?>
    </div>
</div>

<script src="<?= Helper::asset('js/product-filter.js') ?>"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize product filtering for shop page with load more functionality
    new ProductFilter({
        gridId: 'product-grid',
        loadMoreBtnId: 'load-more-btn',
        enableLoadMore: true
    });
});
</script> 