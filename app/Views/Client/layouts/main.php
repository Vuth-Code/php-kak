<?php use App\Helpers\Helper; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $page_title ?? APP_NAME ?></title>
    <meta name="description" content="<?= $meta_description ?? 'OneStore - Your trusted e-commerce partner' ?>">
    <meta name="keywords" content="<?= $meta_keywords ?? 'ecommerce, shopping, online store' ?>">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?= $csrf_token ?? '' ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= Helper::asset('images/icons/favicon.png') ?>"/>
    
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900">
    
    <!-- CSS Assets -->
    <link rel="stylesheet" type="text/css" href="<?= Helper::asset('vendor/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= Helper::asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= Helper::asset('fonts/iconic/css/material-design-iconic-font.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= Helper::asset('fonts/linearicons-v1.0.0/icon-font.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= Helper::asset('vendor/animate/animate.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= Helper::asset('vendor/css-hamburgers/hamburgers.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= Helper::asset('vendor/animsition/css/animsition.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= Helper::asset('vendor/select2/select2.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= Helper::asset('vendor/daterangepicker/daterangepicker.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= Helper::asset('vendor/slick/slick.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= Helper::asset('vendor/MagnificPopup/magnific-popup.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= Helper::asset('vendor/perfect-scrollbar/perfect-scrollbar.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= Helper::asset('css/util.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= Helper::asset('css/main.css') ?>">

    <!-- Modern OneStore CSS Variables & Enhancements -->
    <style>
        :root {
            /* Modern Color Palette */
            --primary-color: #667eea;
            --primary-dark: #5a67d8;
            --primary-light: #7c3aed;
            --secondary-color: #4facfe;
            --accent-color: #f093fb;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --error-color: #ef4444;

            /* Neutral Colors */
            --white: #ffffff;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;

            /* Typography */
            --font-primary: 'Poppins', sans-serif;
            --font-weight-light: 300;
            --font-weight-normal: 400;
            --font-weight-medium: 500;
            --font-weight-semibold: 600;
            --font-weight-bold: 700;

            /* Spacing */
            --spacing-xs: 0.25rem;
            --spacing-sm: 0.5rem;
            --spacing-md: 1rem;
            --spacing-lg: 1.5rem;
            --spacing-xl: 2rem;
            --spacing-2xl: 3rem;
            --spacing-3xl: 4rem;

            /* Border Radius */
            --radius-sm: 0.375rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
            --radius-2xl: 1.5rem;
            --radius-full: 9999px;

            /* Shadows */
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --shadow-2xl: 0 25px 50px -12px rgba(0, 0, 0, 0.25);

            /* Glassmorphism */
            --glass-bg: rgba(255, 255, 255, 0.25);
            --glass-border: rgba(255, 255, 255, 0.18);
            --glass-backdrop: blur(20px);

            /* Transitions */
            --transition-fast: 0.15s ease-in-out;
            --transition-normal: 0.3s ease-in-out;
            --transition-slow: 0.5s ease-in-out;

            /* Z-index */
            --z-dropdown: 1000;
            --z-sticky: 1020;
            --z-fixed: 1030;
            --z-modal-backdrop: 1040;
            --z-modal: 1050;
            --z-popover: 1060;
            --z-tooltip: 1070;
        }

        /* Modern Body Styling */
        body {
            font-family: var(--font-primary);
            line-height: 1.6;
            color: var(--gray-700);
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding-top: 0 !important; /* Remove any default padding */
        }

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Fix for header spacing */
        .section-slide {
            margin-top: 0 !important;
            padding-top: 120px; /* Add padding to account for fixed header */
        }

        /* Ensure main content doesn't overlap with header */
        .main-content {
            position: relative;
            z-index: 1;
        }

        /* Override any conflicting margin-top classes */
        .m-t-23 {
            margin-top: 0 !important;
        }

        /* Modern Flash Messages */
        .flash-messages {
            position: fixed;
            top: var(--spacing-lg);
            right: var(--spacing-lg);
            z-index: var(--z-tooltip);
            max-width: 400px;
        }

        .flash-messages .alert {
            border: none;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            backdrop-filter: var(--glass-backdrop);
            margin-bottom: var(--spacing-sm);
            animation: slideInRight 0.3s ease-out;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* Modern Main Content */
        .main-content {
            background: transparent;
            position: relative;
            z-index: 1;
        }

        /* Enhanced Animations */
        .animsition {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
    
    <!-- Additional CSS -->
    <?php if (isset($additional_css)): ?>
        <?php foreach ($additional_css as $css): ?>
            <link href="<?= Helper::asset($css) ?>" rel="stylesheet">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body class="animsition">
    <!-- Flash Messages -->
    <?php if (!empty($flash_messages)): ?>
        <div class="flash-messages">
            <?php foreach ($flash_messages as $type => $message): ?>
                <div class="alert alert-<?= $type === 'error' ? 'danger' : $type ?> alert-dismissible fade show">
                    <?= $message ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- Header -->
    <?php include ROOT_PATH . '/app/Views/Client/components/header.php'; ?>

    <!-- Cart Modal -->
    <?php include ROOT_PATH . '/app/Views/Client/components/cart.php'; ?>

    <!-- Breadcrumbs -->
    <?php if (!empty($breadcrumbs)): ?>
        <div class="container">
            <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
                <a href="/" class="stext-109 cl8 hov-cl1 trans-04">Home</a>
                <?php foreach ($breadcrumbs as $crumb): ?>
                    <span class="stext-109 cl4">&nbsp;/&nbsp;</span>
                    <?php if ($crumb['url']): ?>
                        <a href="<?= $crumb['url'] ?>" class="stext-109 cl8 hov-cl1 trans-04"><?= $crumb['title'] ?></a>
                    <?php else: ?>
                        <span class="stext-109 cl4"><?= $crumb['title'] ?></span>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- Main Content -->
    <main class="main-content">
        <?= $content ?>
    </main>

    <!-- Footer -->
    <?php include ROOT_PATH . '/app/Views/Client/components/footer.php'; ?>

    <!-- Back to Top Button -->
    <?php include ROOT_PATH . '/app/Views/Client/components/back-to-top.php'; ?>

    <!-- JavaScript Assets -->
    <script src="<?= Helper::asset('vendor/jquery/jquery-3.2.1.min.js') ?>"></script>
    <script src="<?= Helper::asset('vendor/animsition/js/animsition.min.js') ?>"></script>
    <script src="<?= Helper::asset('vendor/bootstrap/js/popper.js') ?>"></script>
    <script src="<?= Helper::asset('vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script src="<?= Helper::asset('vendor/select2/select2.min.js') ?>"></script>
    <script>
        $(".js-select2").each(function(){
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <script src="<?= Helper::asset('vendor/daterangepicker/moment.min.js') ?>"></script>
    <script src="<?= Helper::asset('vendor/daterangepicker/daterangepicker.js') ?>"></script>
    <script src="<?= Helper::asset('vendor/slick/slick.min.js') ?>"></script>
    <script src="<?= Helper::asset('js/slick-custom.js') ?>"></script>
    <script src="<?= Helper::asset('vendor/parallax100/parallax100.js') ?>"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <script src="<?= Helper::asset('vendor/MagnificPopup/jquery.magnific-popup.min.js') ?>"></script>
    <script>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled:true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
    <script src="<?= Helper::asset('vendor/isotope/isotope.pkgd.min.js') ?>"></script>
    <script src="<?= Helper::asset('vendor/sweetalert/sweetalert.min.js') ?>"></script>
    <script>
        $('.js-addwish-b2').on('click', function(e){
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function(){
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function(){
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        $('.js-addwish-detail').each(function(){
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            $(this).on('click', function(){
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });

        /*---------------------------------------------*/

        $('.js-addcart-detail').each(function(){
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function(){
                swal(nameProduct, "is added to cart !", "success");
            });
        });
    </script>
    <script src="<?= Helper::asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
    <script>
        $('.js-pscroll').each(function(){
            $(this).css('position','relative');
            $(this).css('overflow','hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function(){
                ps.update();
            })
        });
    </script>
    <script src="<?= Helper::asset('js/main.js') ?>"></script>
    
    <!-- Additional JS -->
    <?php if (isset($additional_js)): ?>
        <?php foreach ($additional_js as $js): ?>
            <script src="<?= Helper::asset($js) ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- Inline Scripts -->
    <?php if (isset($inline_scripts)): ?>
        <script>
            <?= $inline_scripts ?>
        </script>
    <?php endif; ?>
    <script>
        // OneStoreClient Configuration - FIXED for both Development & Production
        window.OneStoreClient = window.OneStoreClient || {
            baseUrl: '<?= APP_URL ?>',
            url: function(path) {
                const cleanPath = (path || '').replace(/^\//, '');
                const baseUrl = '<?= APP_URL ?>';
                return baseUrl + (cleanPath ? '/' + cleanPath : '');
            }
        };
    </script>
</body>
</html> 