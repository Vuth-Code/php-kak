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

<!-- Modern Header Styles -->
<style>
    /* Modern Header Glassmorphism */
    .modern-header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: var(--z-fixed);
        background: var(--glass-bg);
        backdrop-filter: var(--glass-backdrop);
        border-bottom: 1px solid var(--glass-border);
        transition: all var(--transition-normal);
        box-shadow: var(--shadow-md);
    }

    .modern-header.scrolled {
        background: rgba(255, 255, 255, 0.95);
        box-shadow: var(--shadow-lg);
    }

    /* Modern Topbar */
    .modern-topbar {
        background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
        color: var(--white);
        padding: var(--spacing-xs) 0;
        font-size: 0.875rem;
        font-weight: var(--font-weight-medium);
    }

    .modern-topbar a {
        color: var(--white);
        text-decoration: none;
        transition: all var(--transition-fast);
        padding: var(--spacing-xs) var(--spacing-md);
        border-radius: var(--radius-sm);
    }

    .modern-topbar a:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: translateY(-1px);
    }

    /* Modern Navigation */
    .modern-nav {
        padding: var(--spacing-md) 0;
        background: transparent;
    }

    .modern-logo {
        transition: transform var(--transition-normal);
    }

    .modern-logo:hover {
        transform: scale(1.05);
    }

    .modern-logo img {
        height: 45px;
        width: auto;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
    }

    /* Modern Menu */
    .modern-menu {
        display: flex;
        align-items: center;
        gap: var(--spacing-lg);
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .modern-menu li {
        position: relative;
    }

    .modern-menu a {
        color: var(--gray-700);
        text-decoration: none;
        font-weight: var(--font-weight-medium);
        padding: var(--spacing-sm) var(--spacing-md);
        border-radius: var(--radius-md);
        transition: all var(--transition-normal);
        position: relative;
        overflow: hidden;
    }

    .modern-menu a::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        transition: left var(--transition-normal);
        z-index: -1;
        border-radius: var(--radius-md);
    }

    .modern-menu a:hover::before,
    .modern-menu .active-menu a::before {
        left: 0;
    }

    .modern-menu a:hover,
    .modern-menu .active-menu a {
        color: var(--white);
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    /* Hot Label */
    .label1[data-label1="hot"]::after {
        content: attr(data-label1);
        position: absolute;
        top: -8px;
        right: -8px;
        background: linear-gradient(135deg, var(--accent-color), var(--error-color));
        color: var(--white);
        font-size: 0.625rem;
        padding: 2px 6px;
        border-radius: var(--radius-full);
        font-weight: var(--font-weight-bold);
        text-transform: uppercase;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }

    /* Modern Header Icons */
    .modern-header-icons {
        display: flex;
        align-items: center;
        gap: var(--spacing-md);
    }

    .modern-icon {
        position: relative;
        width: 45px;
        height: 45px;
        border-radius: var(--radius-full);
        background: var(--glass-bg);
        border: 1px solid var(--glass-border);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--gray-700);
        transition: all var(--transition-normal);
        cursor: pointer;
        backdrop-filter: blur(10px);
    }

    .modern-icon:hover {
        background: var(--primary-color);
        color: var(--white);
        transform: translateY(-3px);
        box-shadow: var(--shadow-lg);
    }

    .modern-icon i {
        font-size: 1.125rem;
    }

    /* Notification Badge */
    .modern-icon[data-notify]:not([data-notify="0"])::after {
        content: attr(data-notify);
        position: absolute;
        top: -5px;
        right: -5px;
        background: linear-gradient(135deg, var(--error-color), var(--accent-color));
        color: var(--white);
        font-size: 0.75rem;
        font-weight: var(--font-weight-bold);
        min-width: 20px;
        height: 20px;
        border-radius: var(--radius-full);
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid var(--white);
        animation: bounce 1s ease-in-out infinite alternate;
    }

    @keyframes bounce {
        from { transform: scale(1); }
        to { transform: scale(1.1); }
    }

    /* Mobile Adjustments */
    @media (max-width: 991px) {
        .modern-header {
            position: relative;
        }

        .modern-topbar {
            display: none;
        }

        .modern-nav {
            padding: var(--spacing-sm) 0;
        }

        .modern-logo img {
            height: 35px;
        }

        .modern-icon {
            width: 40px;
            height: 40px;
        }
    }
</style>

<!-- Header -->
<header class="modern-header" id="modernHeader">
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Modern Topbar -->
        <div class="modern-topbar">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="left-top-bar">
                        <i class="fa fa-truck me-2"></i>
                        Free shipping for standard order over $100
                    </div>

                    <div class="right-top-bar d-flex">
                        <a href="<?= Helper::url('help') ?>">
                            <i class="fa fa-question-circle me-1"></i>
                            Help & FAQs
                        </a>
                        <a href="<?= Helper::url('account') ?>">
                            <i class="fa fa-user me-1"></i>
                            My Account
                        </a>
                        <a href="<?= Helper::url('language') ?>">
                            <i class="fa fa-globe me-1"></i>
                            EN
                        </a>
                        <a href="<?= Helper::url('currency') ?>">
                            <i class="fa fa-dollar me-1"></i>
                            USD
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modern Navigation -->
        <div class="modern-nav">
            <nav class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Modern Logo -->
                    <a href="<?= Helper::url('') ?>" class="modern-logo">
                        <img src="<?= Helper::asset('images/icons/logo-01.png') ?>" alt="OneStore Logo">
                    </a>

                    <!-- Modern Menu -->
                    <div class="menu-desktop d-none d-lg-block">
                        <ul class="modern-menu">
                            <li class="<?= isActiveMenu('/', $currentPath) ? 'active-menu' : '' ?>">
                                <a href="<?= Helper::url('') ?>">
                                    <i class="fa fa-home me-2"></i>Home
                                </a>
                            </li>

                            <li class="<?= isActiveMenu('/shop', $currentPath) ? 'active-menu' : '' ?>">
                                <a href="<?= Helper::url('shop') ?>">
                                    <i class="fa fa-shopping-bag me-2"></i>Shop
                                </a>
                            </li>

                            <li class="label1 <?= isActiveMenu('/checkout', $currentPath) ? 'active-menu' : '' ?>" data-label1="hot">
                                <a href="<?= Helper::url('checkout') ?>">
                                    <i class="fa fa-credit-card me-2"></i>Checkout
                                </a>
                            </li>

                            <li class="<?= isActiveMenu('/blog', $currentPath) ? 'active-menu' : '' ?>">
                                <a href="<?= Helper::url('blog') ?>">
                                    <i class="fa fa-newspaper-o me-2"></i>Blog
                                </a>
                            </li>

                            <li class="<?= isActiveMenu('/about', $currentPath) ? 'active-menu' : '' ?>">
                                <a href="<?= Helper::url('about') ?>">
                                    <i class="fa fa-info-circle me-2"></i>About
                                </a>
                            </li>

                            <li class="<?= isActiveMenu('/contact', $currentPath) ? 'active-menu' : '' ?>">
                                <a href="<?= Helper::url('contact') ?>">
                                    <i class="fa fa-envelope me-2"></i>Contact
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Modern Header Icons -->
                    <div class="modern-header-icons">
                        <div class="modern-icon js-show-modal-search" title="Search Products">
                            <i class="zmdi zmdi-search"></i>
                        </div>

                        <div class="modern-icon js-show-cart" data-notify="<?= $cart_count ?? 2 ?>" title="Shopping Cart">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>

                        <a href="<?= Helper::url('wishlist') ?>" class="modern-icon" data-notify="<?= $wishlist_count ?? 0 ?>" title="Wishlist">
                            <i class="zmdi zmdi-favorite-outline"></i>
                        </a>

                        <!-- Mobile Menu Toggle -->
                        <div class="modern-icon d-lg-none btn-show-menu-mobile hamburger hamburger--squeeze" title="Menu">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Modern Mobile Header -->
    <div class="wrap-header-mobile d-lg-none">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3">
                <!-- Mobile Logo -->
                <div class="logo-mobile">
                    <a href="<?= Helper::url('') ?>" class="modern-logo">
                        <img src="<?= Helper::asset('images/icons/logo-01.png') ?>" alt="OneStore Logo">
                    </a>
                </div>

                <!-- Mobile Icons -->
                <div class="modern-header-icons">
                    <div class="modern-icon js-show-modal-search" title="Search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="modern-icon js-show-cart" data-notify="<?= $cart_count ?? 2 ?>" title="Cart">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>

                    <a href="<?= Helper::url('wishlist') ?>" class="modern-icon" data-notify="<?= $wishlist_count ?? 0 ?>" title="Wishlist">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a>

                    <!-- Mobile Menu Button -->
                    <div class="modern-icon btn-show-menu-mobile hamburger hamburger--squeeze" title="Menu">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modern Mobile Menu -->
    <div class="menu-mobile">
        <style>
            .menu-mobile {
                background: var(--glass-bg);
                backdrop-filter: var(--glass-backdrop);
                border-top: 1px solid var(--glass-border);
            }

            .topbar-mobile {
                background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
                padding: var(--spacing-md);
                margin: 0;
                list-style: none;
            }

            .topbar-mobile li {
                margin-bottom: var(--spacing-sm);
            }

            .topbar-mobile .left-top-bar {
                color: var(--white);
                font-weight: var(--font-weight-medium);
                text-align: center;
                padding: var(--spacing-sm);
                background: rgba(255, 255, 255, 0.1);
                border-radius: var(--radius-md);
            }

            .topbar-mobile .right-top-bar {
                display: flex;
                justify-content: center;
                gap: var(--spacing-sm);
                flex-wrap: wrap;
            }

            .topbar-mobile .right-top-bar a {
                color: var(--white);
                text-decoration: none;
                padding: var(--spacing-xs) var(--spacing-sm);
                border-radius: var(--radius-sm);
                background: rgba(255, 255, 255, 0.1);
                font-size: 0.875rem;
                transition: all var(--transition-fast);
            }

            .topbar-mobile .right-top-bar a:hover {
                background: rgba(255, 255, 255, 0.2);
                transform: translateY(-1px);
            }

            .main-menu-m {
                list-style: none;
                padding: var(--spacing-lg);
                margin: 0;
            }

            .main-menu-m li {
                margin-bottom: var(--spacing-sm);
            }

            .main-menu-m a {
                display: flex;
                align-items: center;
                color: var(--gray-700);
                text-decoration: none;
                padding: var(--spacing-md);
                border-radius: var(--radius-lg);
                background: var(--white);
                box-shadow: var(--shadow-sm);
                transition: all var(--transition-normal);
                font-weight: var(--font-weight-medium);
            }

            .main-menu-m a:hover,
            .main-menu-m .active-menu a {
                background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
                color: var(--white);
                transform: translateX(10px);
                box-shadow: var(--shadow-md);
            }

            .main-menu-m a i {
                margin-right: var(--spacing-sm);
                width: 20px;
                text-align: center;
            }
        </style>

        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    <i class="fa fa-truck me-2"></i>
                    Free shipping for standard order over $100
                </div>
            </li>

            <li>
                <div class="right-top-bar">
                    <a href="<?= Helper::url('help') ?>">
                        <i class="fa fa-question-circle me-1"></i>Help
                    </a>
                    <a href="<?= Helper::url('account') ?>">
                        <i class="fa fa-user me-1"></i>Account
                    </a>
                    <a href="<?= Helper::url('language') ?>">
                        <i class="fa fa-globe me-1"></i>EN
                    </a>
                    <a href="<?= Helper::url('currency') ?>">
                        <i class="fa fa-dollar me-1"></i>USD
                    </a>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li class="<?= isActiveMenu('/', $currentPath) ? 'active-menu' : '' ?>">
                <a href="<?= Helper::url('') ?>">
                    <i class="fa fa-home"></i>Home
                </a>
            </li>

            <li class="<?= isActiveMenu('/shop', $currentPath) ? 'active-menu' : '' ?>">
                <a href="<?= Helper::url('shop') ?>">
                    <i class="fa fa-shopping-bag"></i>Shop
                </a>
            </li>

            <li class="<?= isActiveMenu('/checkout', $currentPath) ? 'active-menu' : '' ?>">
                <a href="<?= Helper::url('checkout') ?>">
                    <i class="fa fa-credit-card"></i>Checkout
                </a>
            </li>

            <li class="<?= isActiveMenu('/blog', $currentPath) ? 'active-menu' : '' ?>">
                <a href="<?= Helper::url('blog') ?>">
                    <i class="fa fa-newspaper-o"></i>Blog
                </a>
            </li>

            <li class="<?= isActiveMenu('/about', $currentPath) ? 'active-menu' : '' ?>">
                <a href="<?= Helper::url('about') ?>">
                    <i class="fa fa-info-circle"></i>About
                </a>
            </li>

            <li class="<?= isActiveMenu('/contact', $currentPath) ? 'active-menu' : '' ?>">
                <a href="<?= Helper::url('contact') ?>">
                    <i class="fa fa-envelope"></i>Contact
                </a>
            </li>
        </ul>
    </div>

    <!-- Modern Search Modal -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <style>
            .modal-search-header {
                background: rgba(0, 0, 0, 0.8);
                backdrop-filter: blur(10px);
            }

            .container-search-header {
                background: var(--white);
                border-radius: var(--radius-2xl);
                padding: var(--spacing-2xl);
                box-shadow: var(--shadow-2xl);
                max-width: 600px;
                width: 90%;
                position: relative;
                animation: searchModalIn 0.3s ease-out;
            }

            @keyframes searchModalIn {
                from {
                    opacity: 0;
                    transform: scale(0.9) translateY(-20px);
                }
                to {
                    opacity: 1;
                    transform: scale(1) translateY(0);
                }
            }

            .btn-hide-modal-search {
                position: absolute;
                top: var(--spacing-md);
                right: var(--spacing-md);
                width: 40px;
                height: 40px;
                border-radius: var(--radius-full);
                background: var(--gray-100);
                border: none;
                color: var(--gray-600);
                transition: all var(--transition-fast);
                cursor: pointer;
            }

            .btn-hide-modal-search:hover {
                background: var(--error-color);
                color: var(--white);
                transform: rotate(90deg);
            }

            .wrap-search-header {
                display: flex;
                align-items: center;
                background: var(--gray-50);
                border-radius: var(--radius-xl);
                padding: var(--spacing-md);
                margin-top: var(--spacing-lg);
                border: 2px solid transparent;
                transition: all var(--transition-normal);
            }

            .wrap-search-header:focus-within {
                border-color: var(--primary-color);
                background: var(--white);
                box-shadow: var(--shadow-lg);
            }

            .wrap-search-header button {
                background: var(--primary-color);
                color: var(--white);
                border: none;
                width: 50px;
                height: 50px;
                border-radius: var(--radius-lg);
                margin-right: var(--spacing-md);
                transition: all var(--transition-fast);
                cursor: pointer;
            }

            .wrap-search-header button:hover {
                background: var(--primary-dark);
                transform: scale(1.05);
            }

            .wrap-search-header input {
                flex: 1;
                border: none;
                background: transparent;
                font-size: 1.125rem;
                color: var(--gray-700);
                outline: none;
                font-weight: var(--font-weight-medium);
            }

            .wrap-search-header input::placeholder {
                color: var(--gray-400);
            }
        </style>

        <div class="container-search-header">
            <button class="btn-hide-modal-search js-hide-modal-search">
                <i class="zmdi zmdi-close"></i>
            </button>

            <div class="text-center mb-4">
                <h3 style="color: var(--gray-700); font-weight: var(--font-weight-bold); margin-bottom: var(--spacing-sm);">
                    Search Products
                </h3>
                <p style="color: var(--gray-500); margin: 0;">
                    Find exactly what you're looking for
                </p>
            </div>

            <form class="wrap-search-header" action="<?= Helper::url('shop') ?>" method="GET">
                <button type="submit">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input type="text" name="search" placeholder="Search for products, brands, categories..." autocomplete="off">
            </form>
        </div>
    </div>
</header>

<!-- Modern Header JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const header = document.getElementById('modernHeader');

    // Header scroll effect
    function handleScroll() {
        if (window.scrollY > 100) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    }

    // Add scroll event listener
    window.addEventListener('scroll', handleScroll);

    // Add body padding to account for fixed header
    document.body.style.paddingTop = header.offsetHeight + 'px';

    // Update padding on window resize
    window.addEventListener('resize', function() {
        document.body.style.paddingTop = header.offsetHeight + 'px';
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
</script>