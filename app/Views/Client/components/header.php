<?php use App\Helpers\Helper;

// Get current path for active menu
$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$currentPath = str_replace('/php-test', '', $currentPath); // Remove base path if exists

// Function to check if menu item is active
function isActiveMenu($path, $currentPath) {
    if ($path === '/' || $path === '/home') {
        return $currentPath === '/' || $currentPath === '/home';
    }
    return $currentPath === $path;
}
?>

<!-- Modern Header with Enhanced Styling -->
<header class="modern-header">
    <!-- Header desktop -->
    <div class="container-menu-desktop modern-container">
        <!-- Enhanced Topbar with Gradient -->
        <div class="top-bar modern-topbar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar modern-promo">
                    <i class="fa fa-truck modern-icon"></i>
                    <span class="modern-text">Free shipping for standard order over $100</span>
                </div>

                <div class="right-top-bar flex-w h-full modern-nav-links">
                    <a href="<?= Helper::url('help') ?>" class="flex-c-m trans-04 p-lr-25 modern-link">
                        <i class="fa fa-question-circle modern-link-icon"></i>
                        Help & FAQs
                    </a>

                    <a href="<?= Helper::url('account') ?>" class="flex-c-m trans-04 p-lr-25 modern-link">
                        <i class="fa fa-user modern-link-icon"></i>
                        My Account
                    </a>

                    <a href="<?= Helper::url('language') ?>" class="flex-c-m trans-04 p-lr-25 modern-link">
                        <i class="fa fa-globe modern-link-icon"></i>
                        EN
                    </a>

                    <a href="<?= Helper::url('currency') ?>" class="flex-c-m trans-04 p-lr-25 modern-link">
                        <i class="fa fa-dollar modern-link-icon"></i>
                        USD
                    </a>
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop modern-nav-wrapper">
            <nav class="limiter-menu-desktop container modern-nav">

                <!-- Enhanced Logo desktop -->
                <a href="<?= Helper::url('') ?>" class="logo modern-logo">
                    <div class="logo-container">
                        <img src="<?= Helper::asset('images/icons/logo-01.jpg') ?>" alt="IMG-LOGO" class="modern-logo-img">
                        <div class="logo-shine"></div>
                    </div>
                </a>

                <!-- Enhanced Menu desktop -->
                <div class="menu-desktop modern-menu">
                    <ul class="main-menu modern-main-menu">
                        <li class="modern-menu-item <?= isActiveMenu('/', $currentPath) ? 'active-menu modern-active' : '' ?>">
                            <a href="<?= Helper::url('') ?>" class="modern-menu-link">
                                <span class="menu-text">Home</span>
                                <div class="menu-underline"></div>
                            </a>
                        </li>

                        <li class="modern-menu-item <?= isActiveMenu('/shop', $currentPath) ? 'active-menu modern-active' : '' ?>">
                            <a href="<?= Helper::url('shop') ?>" class="modern-menu-link">
                                <span class="menu-text">Shop</span>
                                <div class="menu-underline"></div>
                            </a>
                        </li>

                        <li class="modern-menu-item <?= isActiveMenu('/checkout', $currentPath) ? 'active-menu modern-active' : '' ?>">
                            <a href="<?= Helper::url('checkout') ?>" class="modern-menu-link">
                                <span class="menu-text">Checkout</span>
                                <div class="menu-underline"></div>
                            </a>
                        </li>

                        <li class="modern-menu-item <?= isActiveMenu('/blog', $currentPath) ? 'active-menu modern-active' : '' ?>">
                            <a href="<?= Helper::url('blog') ?>" class="modern-menu-link">
                                <span class="menu-text">Blog</span>
                                <div class="menu-underline"></div>
                            </a>
                        </li>

                        <li class="modern-menu-item <?= isActiveMenu('/about', $currentPath) ? 'active-menu modern-active' : '' ?>">
                            <a href="<?= Helper::url('about') ?>" class="modern-menu-link">
                                <span class="menu-text">About</span>
                                <div class="menu-underline"></div>
                            </a>
                        </li>

                        <li class="modern-menu-item <?= isActiveMenu('/contact', $currentPath) ? 'active-menu modern-active' : '' ?>">
                            <a href="<?= Helper::url('contact') ?>" class="modern-menu-link">
                                <span class="menu-text">Contact</span>
                                <div class="menu-underline"></div>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Enhanced Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m modern-icons">
                    <div class="icon-header-item modern-icon-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <div class="modern-icon-wrapper">
                            <i class="zmdi zmdi-search modern-icon-symbol"></i>
                            <div class="icon-ripple"></div>
                        </div>
                        <span class="icon-tooltip">Search</span>
                    </div>

                    <div class="icon-header-item modern-icon-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?= $cart_count ?? 2 ?>">
                        <div class="modern-icon-wrapper">
                            <i class="zmdi zmdi-shopping-cart modern-icon-symbol"></i>
                            <div class="icon-ripple"></div>
                           
                        </div>
                        <span class="icon-tooltip">Cart</span>
                    </div>

                    <a href="<?= Helper::url('wishlist') ?>" class="dis-block icon-header-item modern-icon-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="<?= $wishlist_count ?? 0 ?>">
                        <div class="modern-icon-wrapper">
                            <i class="zmdi zmdi-favorite-outline modern-icon-symbol"></i>
                            <div class="icon-ripple"></div>
                            <?php if (($wishlist_count ?? 0) > 0): ?>
                                <span class="modern-notification-badge"><?= $wishlist_count ?></span>
                            <?php endif; ?>
                        </div>
                        <span class="icon-tooltip">Wishlist</span>
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <!-- Enhanced Header Mobile -->
    <div class="wrap-header-mobile modern-mobile-header">
        <!-- Enhanced Logo mobile -->
        <div class="logo-mobile modern-mobile-logo">
            <a href="<?= Helper::url('') ?>" class="mobile-logo-link">
                <div class="mobile-logo-container">
                    <img src="<?= Helper::asset('images/icons/logo-01.png') ?>" alt="IMG-LOGO" class="modern-mobile-logo-img">
                    <div class="mobile-logo-shine"></div>
                </div>
            </a>
        </div>

        <!-- Enhanced Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15 modern-mobile-icons">
            <div class="icon-header-item modern-mobile-icon cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <div class="mobile-icon-wrapper">
                    <i class="zmdi zmdi-search modern-mobile-icon-symbol"></i>
                    <div class="mobile-icon-ripple"></div>
                </div>
            </div>

            <div class="icon-header-item modern-mobile-icon cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?= $cart_count ?? 2 ?>">
                <div class="mobile-icon-wrapper">
                    <i class="zmdi zmdi-shopping-cart modern-mobile-icon-symbol"></i>
                    <div class="mobile-icon-ripple"></div>
                    <span class="modern-mobile-notification"><?= $cart_count ?? 2 ?></span>
                </div>
            </div>

            <a href="<?= Helper::url('wishlist') ?>" class="dis-block icon-header-item modern-mobile-icon cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="<?= $wishlist_count ?? 0 ?>">
                <div class="mobile-icon-wrapper">
                    <i class="zmdi zmdi-favorite-outline modern-mobile-icon-symbol"></i>
                    <div class="mobile-icon-ripple"></div>
                    <?php if (($wishlist_count ?? 0) > 0): ?>
                        <span class="modern-mobile-notification"><?= $wishlist_count ?></span>
                    <?php endif; ?>
                </div>
            </a>
        </div>

        <!-- Enhanced Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze modern-hamburger">
            <span class="hamburger-box modern-hamburger-box">
                <span class="hamburger-inner modern-hamburger-inner"></span>
            </span>
        </div>
    </div>

    <!-- Enhanced Menu Mobile -->
    <div class="menu-mobile modern-mobile-menu">
        <ul class="topbar-mobile modern-mobile-topbar">
            <li class="modern-mobile-promo-item">
                <div class="left-top-bar modern-mobile-promo">
                    <i class="fa fa-truck modern-mobile-promo-icon"></i>
                    <span class="modern-mobile-promo-text">Free shipping for standard order over $100</span>
                </div>
            </li>

            <li class="modern-mobile-links-item">
                <div class="right-top-bar flex-w h-full modern-mobile-links">
                    <a href="<?= Helper::url('help') ?>" class="flex-c-m p-lr-10 trans-04 modern-mobile-link">
                        <i class="fa fa-question-circle modern-mobile-link-icon"></i>
                        Help & FAQs
                    </a>

                    <a href="<?= Helper::url('account') ?>" class="flex-c-m p-lr-10 trans-04 modern-mobile-link">
                        <i class="fa fa-user modern-mobile-link-icon"></i>
                        My Account
                    </a>

                    <a href="<?= Helper::url('language') ?>" class="flex-c-m p-lr-10 trans-04 modern-mobile-link">
                        <i class="fa fa-globe modern-mobile-link-icon"></i>
                        EN
                    </a>

                    <a href="<?= Helper::url('currency') ?>" class="flex-c-m p-lr-10 trans-04 modern-mobile-link">
                        <i class="fa fa-dollar modern-mobile-link-icon"></i>
                        USD
                    </a>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m modern-main-menu-mobile">
            <li class="modern-mobile-menu-item <?= isActiveMenu('/', $currentPath) ? 'active-menu modern-mobile-active' : '' ?>">
                <a href="<?= Helper::url('') ?>" class="modern-mobile-menu-link">
                    <i class="fa fa-home modern-mobile-menu-icon"></i>
                    <span class="mobile-menu-text">Home</span>
                </a>
            </li>

            <li class="modern-mobile-menu-item <?= isActiveMenu('/shop', $currentPath) ? 'active-menu modern-mobile-active' : '' ?>">
                <a href="<?= Helper::url('shop') ?>" class="modern-mobile-menu-link">
                    <i class="fa fa-shopping-bag modern-mobile-menu-icon"></i>
                    <span class="mobile-menu-text">Shop</span>
                </a>
            </li>

            <li class="modern-mobile-menu-item <?= isActiveMenu('/checkout', $currentPath) ? 'active-menu modern-mobile-active' : '' ?>">
                <a href="<?= Helper::url('checkout') ?>" class="modern-mobile-menu-link">
                    <i class="fa fa-credit-card modern-mobile-menu-icon"></i>
                    <span class="mobile-menu-text">Checkout</span>
                    <span class="modern-mobile-hot-badge">HOT</span>
                </a>
            </li>

            <li class="modern-mobile-menu-item <?= isActiveMenu('/blog', $currentPath) ? 'active-menu modern-mobile-active' : '' ?>">
                <a href="<?= Helper::url('blog') ?>" class="modern-mobile-menu-link">
                    <i class="fa fa-newspaper modern-mobile-menu-icon"></i>
                    <span class="mobile-menu-text">Blog</span>
                </a>
            </li>

            <li class="modern-mobile-menu-item <?= isActiveMenu('/about', $currentPath) ? 'active-menu modern-mobile-active' : '' ?>">
                <a href="<?= Helper::url('about') ?>" class="modern-mobile-menu-link">
                    <i class="fa fa-info-circle modern-mobile-menu-icon"></i>
                    <span class="mobile-menu-text">About</span>
                </a>
            </li>

            <li class="modern-mobile-menu-item <?= isActiveMenu('/contact', $currentPath) ? 'active-menu modern-mobile-active' : '' ?>">
                <a href="<?= Helper::url('contact') ?>" class="modern-mobile-menu-link">
                    <i class="fa fa-envelope modern-mobile-menu-icon"></i>
                    <span class="mobile-menu-text">Contact</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Enhanced Modal Search -->
    <div class="modal-search-header modern-search-modal flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header modern-search-container">
            <button class="flex-c-m btn-hide-modal-search modern-close-btn trans-04 js-hide-modal-search">
                <div class="close-icon-wrapper">
                    <i class="zmdi zmdi-close modern-close-icon"></i>
                    <div class="close-ripple"></div>
                </div>
            </button>

            <form class="wrap-search-header modern-search-form flex-w p-l-15">
                <button class="flex-c-m trans-04 modern-search-btn">
                    <i class="zmdi zmdi-search modern-search-icon"></i>
                </button>
                <input class="plh3 modern-search-input" type="text" name="search" placeholder="What are you looking for?">
                <div class="search-suggestions modern-suggestions">
                    <div class="suggestion-item">Popular searches</div>
                </div>
            </form>
        </div>
    </div>
</header>

<!-- Modern Header Styles -->
<style>
/* Modern Header Base Styles */
.modern-header {
    position: relative;
    z-index: 1000;
}

.modern-container {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    box-shadow: 0 2px 20px rgba(0,0,0,0.1);
}

/* Enhanced Topbar */
.modern-topbar {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 12px 0;
    border-bottom: 1px solid rgba(255,255,255,0.1);
}

.modern-promo {
    color: white;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 8px;
}

.modern-icon {
    font-size: 16px;
    margin-right: 8px;
    animation: pulse 2s infinite;
}

.modern-text {
    font-size: 14px;
    letter-spacing: 0.5px;
}

.modern-nav-links .modern-link {
    color: rgba(255,255,255,0.9);
    font-size: 13px;
    font-weight: 500;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.modern-nav-links .modern-link:hover {
    color: white;
    background: rgba(255,255,255,0.1);
    border-radius: 20px;
    transform: translateY(-1px);
}

.modern-link-icon {
    margin-right: 6px;
    font-size: 12px;
}

/* Enhanced Navigation */
.modern-nav-wrapper {
    background: white;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    border-bottom: 1px solid #f0f0f0;
}

.modern-nav {
    padding: 15px 30px;
}

/* Enhanced Logo */
.modern-logo {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.logo-container {
    position: relative;
    display: flex;
    align-items: center;
}

.modern-logo-img {
    transition: all 0.3s ease;
    border-radius: 6px;
}

.logo-shine {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.6s ease;
}

.modern-logo:hover .logo-shine {
    left: 100%;
}

.modern-logo:hover .modern-logo-img {
    transform: scale(1.05);
}

/* Enhanced Menu */
.modern-menu {
    margin-left: 40px;
}

.modern-main-menu {
    display: flex;
    gap: 5px;
}

.modern-menu-item {
    position: relative;
    margin: 0 !important;
    padding: 0 !important;
}

.modern-menu-link {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 15px 20px;
    color: #333;
    font-weight: 500;
    font-size: 14px;
    text-decoration: none;
    transition: all 0.3s ease;
    position: relative;
    border-radius: 8px;
}

.menu-text {
    position: relative;
    z-index: 2;
}

.menu-underline {
    position: absolute;
    bottom: 8px;
    left: 50%;
    width: 0;
    height: 2px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    transition: all 0.3s ease;
    transform: translateX(-50%);
    border-radius: 1px;
}

.modern-menu-link:hover {
    color: #667eea;
    background: rgba(102, 126, 234, 0.05);
    transform: translateY(-2px);
}

.modern-menu-link:hover .menu-underline {
    width: 80%;
}

.modern-active .modern-menu-link {
    color: #667eea;
    background: rgba(102, 126, 234, 0.1);
}

.modern-active .menu-underline {
    width: 80%;
}

.modern-hot-badge {
    position: absolute;
    top: 5px;
    right: 5px;
    background: linear-gradient(135deg, #ff6b6b, #ee5a24);
    color: white;
    font-size: 9px;
    padding: 2px 6px;
    border-radius: 10px;
    font-weight: bold;
    animation: bounce 2s infinite;
}

/* Enhanced Icons */
.modern-icons {
    margin-left: auto;
    gap: 10px;
}

.modern-icon-item {
    position: relative;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.modern-icon-wrapper {
    position: relative;
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #f8f9fa;
    transition: all 0.3s ease;
}

.modern-icon-symbol {
    font-size: 18px;
    color: #333;
    transition: all 0.3s ease;
    z-index: 2;
    position: relative;
}

.icon-ripple {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: rgba(102, 126, 234, 0.3);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: all 0.3s ease;
}

.modern-icon-item:hover .modern-icon-wrapper {
    background: #667eea;
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
}

.modern-icon-item:hover .modern-icon-symbol {
    color: white;
    transform: scale(1.1);
}

.modern-icon-item:hover .icon-ripple {
    width: 100%;
    height: 100%;
}

/* Override original notification system for modern badges */
.modern-icon-item.icon-header-noti::after {
    display: none !important;
}

.modern-mobile-icon.icon-header-noti::after {
    display: none !important;
}

.modern-notification-badge {
    position: absolute;
    top: -5px;
    right: -5px;
    background: linear-gradient(135deg, #ff6b6b, #ee5a24);
    color: white;
    font-size: 11px;
    font-weight: bold;
    padding: 2px 6px;
    border-radius: 10px;
    min-width: 18px;
    text-align: center;
    animation: pulse 2s infinite;
    z-index: 10;
    display: block !important;
    visibility: visible !important;
}

.icon-tooltip {
    position: absolute;
    bottom: -35px;
    left: 50%;
    transform: translateX(-50%);
    background: #333;
    color: white;
    padding: 5px 10px;
    border-radius: 4px;
    font-size: 12px;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.icon-tooltip::before {
    content: '';
    position: absolute;
    top: -5px;
    left: 50%;
    transform: translateX(-50%);
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-bottom: 5px solid #333;
}

.modern-icon-item:hover .icon-tooltip {
    opacity: 1;
    visibility: visible;
    bottom: -40px;
}

/* Mobile Header Styles */
.modern-mobile-header {
    background: white;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    padding: 15px 20px;
}

.modern-mobile-logo {
    flex: 1;
}

.mobile-logo-container {
    position: relative;
    display: inline-block;
}

.modern-mobile-logo-img {
    transition: all 0.3s ease;
    max-height: 40px;
}

.mobile-logo-shine {
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: left 0.6s ease;
}

.mobile-logo-link:hover .mobile-logo-shine {
    left: 100%;
}

.modern-mobile-icons {
    gap: 15px;
}

.modern-mobile-icon {
    position: relative;
}

.mobile-icon-wrapper {
    position: relative;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: #f8f9fa;
    transition: all 0.3s ease;
}

.modern-mobile-icon-symbol {
    font-size: 16px;
    color: #333;
    transition: all 0.3s ease;
}

.mobile-icon-ripple {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: rgba(102, 126, 234, 0.3);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: all 0.3s ease;
}

.modern-mobile-icon:hover .mobile-icon-wrapper {
    background: #667eea;
    transform: scale(1.1);
}

.modern-mobile-icon:hover .modern-mobile-icon-symbol {
    color: white;
}

.modern-mobile-icon:hover .mobile-icon-ripple {
    width: 100%;
    height: 100%;
}

.modern-mobile-notification {
    position: absolute;
    top: -5px;
    right: -5px;
    background: linear-gradient(135deg, #ff6b6b, #ee5a24);
    color: white;
    font-size: 10px;
    font-weight: bold;
    padding: 2px 5px;
    border-radius: 8px;
    min-width: 16px;
    text-align: center;
    z-index: 10;
    display: block !important;
    visibility: visible !important;
}

/* Enhanced Hamburger */
.modern-hamburger {
    position: relative;
}

.modern-hamburger-box {
    position: relative;
    width: 30px;
    height: 24px;
}

.modern-hamburger-inner {
    background: #333;
    border-radius: 2px;
    height: 3px;
    transition: all 0.3s ease;
}

.modern-hamburger-inner::before,
.modern-hamburger-inner::after {
    background: #333;
    border-radius: 2px;
    height: 3px;
    transition: all 0.3s ease;
}

.modern-hamburger:hover .modern-hamburger-inner,
.modern-hamburger:hover .modern-hamburger-inner::before,
.modern-hamburger:hover .modern-hamburger-inner::after {
    background: #667eea;
}

/* Mobile Menu Styles */
.modern-mobile-menu {
    background: white;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.modern-mobile-topbar {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.modern-mobile-promo-item {
    padding: 15px 20px;
    border: none;
}

.modern-mobile-promo {
    color: white;
    display: flex;
    align-items: center;
    gap: 10px;
}

.modern-mobile-promo-icon {
    font-size: 16px;
}

.modern-mobile-promo-text {
    font-size: 14px;
    font-weight: 500;
}

.modern-mobile-links-item {
    padding: 10px 20px;
    border-top: 1px solid rgba(255,255,255,0.1);
}

.modern-mobile-links {
    flex-wrap: wrap;
    gap: 10px;
}

.modern-mobile-link {
    color: rgba(255,255,255,0.9);
    font-size: 12px;
    padding: 8px 12px;
    border-radius: 15px;
    transition: all 0.3s ease;
}

.modern-mobile-link:hover {
    background: rgba(255,255,255,0.1);
    color: white;
}

.modern-mobile-link-icon {
    margin-right: 5px;
    font-size: 11px;
}

.modern-main-menu-mobile {
    background: white;
    padding: 10px 0;
}

.modern-mobile-menu-item {
    border-bottom: 1px solid #f0f0f0;
}

.modern-mobile-menu-link {
    display: flex;
    align-items: center;
    padding: 15px 20px;
    color: #333;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
    position: relative;
}

.modern-mobile-menu-icon {
    margin-right: 15px;
    font-size: 16px;
    color: #667eea;
    width: 20px;
    text-align: center;
}

.mobile-menu-text {
    flex: 1;
    font-size: 15px;
}

.modern-mobile-hot-badge {
    background: linear-gradient(135deg, #ff6b6b, #ee5a24);
    color: white;
    font-size: 9px;
    padding: 3px 8px;
    border-radius: 10px;
    font-weight: bold;
}

.modern-mobile-menu-link:hover {
    background: rgba(102, 126, 234, 0.05);
    color: #667eea;
    padding-left: 25px;
}

.modern-mobile-active .modern-mobile-menu-link {
    background: rgba(102, 126, 234, 0.1);
    color: #667eea;
    border-left: 4px solid #667eea;
}

/* Enhanced Search Modal */
.modern-search-modal {
    background: rgba(0,0,0,0.7);
    backdrop-filter: blur(5px);
}

.modern-search-container {
    position: relative;
    max-width: 800px;
    margin: 0 auto;
}

.modern-close-btn {
    position: absolute;
    top: -60px;
    right: 0;
    width: 50px;
    height: 50px;
    background: white;
    border-radius: 50%;
    box-shadow: 0 5px 20px rgba(0,0,0,0.2);
}

.close-icon-wrapper {
    position: relative;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    overflow: hidden;
}

.modern-close-icon {
    font-size: 20px;
    color: #333;
    transition: all 0.3s ease;
}

.close-ripple {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: rgba(102, 126, 234, 0.3);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: all 0.3s ease;
}

.modern-close-btn:hover .close-ripple {
    width: 100%;
    height: 100%;
}

.modern-close-btn:hover .modern-close-icon {
    color: #667eea;
    transform: rotate(90deg);
}

.modern-search-form {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.2);
    overflow: hidden;
    position: relative;
}

.modern-search-btn {
    width: 80px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: white;
    border-radius: 0;
}

.modern-search-icon {
    font-size: 24px;
}

.modern-search-input {
    font-size: 24px;
    padding: 30px 20px;
    border: none;
    outline: none;
    background: transparent;
    color: #333;
    width: calc(100% - 80px);
}

.modern-search-input::placeholder {
    color: #999;
    font-weight: 300;
}

.modern-suggestions {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border-radius: 0 0 15px 15px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    padding: 20px;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.modern-search-input:focus + .modern-suggestions {
    opacity: 1;
    visibility: visible;
}

.suggestion-item {
    color: #999;
    font-size: 14px;
    padding: 10px 0;
    border-bottom: 1px solid #f0f0f0;
}

/* Animations */
@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-5px); }
    60% { transform: translateY(-3px); }
}

/* Responsive Design */
@media (max-width: 1200px) {
    .modern-nav {
        padding: 15px 20px;
    }

    .modern-menu {
        margin-left: 30px;
    }

    .modern-menu-link {
        padding: 12px 15px;
        font-size: 13px;
    }
}

@media (max-width: 991px) {
    .modern-container {
        display: none;
    }
}

@media (max-width: 768px) {
    .modern-mobile-header {
        padding: 12px 15px;
    }

    .modern-mobile-icons {
        gap: 10px;
    }

    .mobile-icon-wrapper {
        width: 35px;
        height: 35px;
    }

    .modern-search-input {
        font-size: 18px;
        padding: 20px 15px;
    }

    .modern-search-btn {
        width: 60px;
    }
}
</style>