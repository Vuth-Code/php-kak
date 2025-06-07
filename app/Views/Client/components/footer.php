<?php use App\Helpers\Helper; ?>

<!-- Modern Footer Styles -->
<style>
    .modern-footer {
        background: linear-gradient(135deg, var(--gray-900) 0%, var(--gray-800) 100%);
        color: var(--white);
        position: relative;
        overflow: hidden;
    }

    .modern-footer::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.03)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.5;
    }

    .footer-content {
        position: relative;
        z-index: 1;
        padding: var(--spacing-3xl) 0 var(--spacing-xl);
    }

    .footer-section {
        margin-bottom: var(--spacing-2xl);
    }

    .footer-title {
        font-size: 1.25rem;
        font-weight: var(--font-weight-bold);
        margin-bottom: var(--spacing-lg);
        color: var(--white);
        position: relative;
        padding-bottom: var(--spacing-sm);
    }

    .footer-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 40px;
        height: 3px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: var(--radius-full);
    }

    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: var(--spacing-sm);
    }

    .footer-links a {
        color: var(--gray-300);
        text-decoration: none;
        transition: all var(--transition-fast);
        display: flex;
        align-items: center;
        gap: var(--spacing-sm);
        padding: var(--spacing-xs) 0;
    }

    .footer-links a:hover {
        color: var(--primary-color);
        transform: translateX(5px);
    }

    .footer-links a i {
        width: 16px;
        text-align: center;
    }

    .footer-contact {
        color: var(--gray-300);
        line-height: 1.6;
        margin-bottom: var(--spacing-lg);
    }

    .social-links {
        display: flex;
        gap: var(--spacing-md);
        margin-top: var(--spacing-lg);
    }

    .social-link {
        width: 45px;
        height: 45px;
        border-radius: var(--radius-full);
        background: rgba(255, 255, 255, 0.1);
        color: var(--white);
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all var(--transition-normal);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .social-link:hover {
        background: var(--primary-color);
        color: var(--white);
        transform: translateY(-3px);
        box-shadow: var(--shadow-lg);
    }

    .newsletter-form {
        display: flex;
        gap: var(--spacing-sm);
        margin-top: var(--spacing-lg);
    }

    .newsletter-input {
        flex: 1;
        padding: var(--spacing-md);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: var(--radius-lg);
        background: rgba(255, 255, 255, 0.1);
        color: var(--white);
        backdrop-filter: blur(10px);
        transition: all var(--transition-fast);
    }

    .newsletter-input::placeholder {
        color: var(--gray-400);
    }

    .newsletter-input:focus {
        outline: none;
        border-color: var(--primary-color);
        background: rgba(255, 255, 255, 0.15);
    }

    .newsletter-btn {
        padding: var(--spacing-md) var(--spacing-lg);
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: var(--white);
        border: none;
        border-radius: var(--radius-lg);
        font-weight: var(--font-weight-semibold);
        cursor: pointer;
        transition: all var(--transition-normal);
        white-space: nowrap;
    }

    .newsletter-btn:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
    }
</style>

<!-- Modern Footer -->
<footer class="modern-footer">
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3 footer-section">
                    <h4 class="footer-title">Categories</h4>
                    <ul class="footer-links">
                        <li>
                            <a href="/shop?category=women">
                                <i class="fa fa-female"></i>Women
                            </a>
                        </li>
                        <li>
                            <a href="/shop?category=men">
                                <i class="fa fa-male"></i>Men
                            </a>
                        </li>
                        <li>
                            <a href="/shop?category=shoes">
                                <i class="fa fa-shoe-prints"></i>Shoes
                            </a>
                        </li>
                        <li>
                            <a href="/shop?category=watches">
                                <i class="fa fa-clock-o"></i>Watches
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 footer-section">
                    <h4 class="footer-title">Help & Support</h4>
                    <ul class="footer-links">
                        <li>
                            <a href="/track-order">
                                <i class="fa fa-truck"></i>Track Order
                            </a>
                        </li>
                        <li>
                            <a href="/returns">
                                <i class="fa fa-undo"></i>Returns
                            </a>
                        </li>
                        <li>
                            <a href="/shipping">
                                <i class="fa fa-shipping-fast"></i>Shipping Info
                            </a>
                        </li>
                        <li>
                            <a href="/faqs">
                                <i class="fa fa-question-circle"></i>FAQs
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 footer-section">
                    <h4 class="footer-title">Get in Touch</h4>
                    <div class="footer-contact">
                        <p style="margin-bottom: var(--spacing-md);">
                            <i class="fa fa-map-marker me-2" style="color: var(--primary-color);"></i>
                            8th floor, 379 Hudson St<br>
                            New York, NY 10018
                        </p>
                        <p style="margin-bottom: var(--spacing-md);">
                            <i class="fa fa-phone me-2" style="color: var(--primary-color);"></i>
                            <a href="tel:+19671668790" style="color: var(--gray-300); text-decoration: none;">
                                (+1) 96 716 6879
                            </a>
                        </p>
                        <p>
                            <i class="fa fa-envelope me-2" style="color: var(--primary-color);"></i>
                            <a href="mailto:info@onestore.com" style="color: var(--gray-300); text-decoration: none;">
                                info@onestore.com
                            </a>
                        </p>
                    </div>

                    <div class="social-links">
                        <a href="#" class="social-link" title="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" class="social-link" title="Instagram">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link" title="Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link" title="Pinterest">
                            <i class="fa fa-pinterest"></i>
                        </a>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3 footer-section">
                    <h4 class="footer-title">Newsletter</h4>
                    <p class="footer-contact" style="margin-bottom: var(--spacing-lg);">
                        Subscribe to our newsletter and get 10% off your first order!
                    </p>

                    <form class="newsletter-form" onsubmit="handleNewsletterSubmit(event)">
                        <input type="email"
                               class="newsletter-input"
                               name="email"
                               placeholder="Enter your email"
                               required>
                        <button type="submit" class="newsletter-btn">
                            <i class="fa fa-paper-plane"></i>
                        </button>
                    </form>

                    <div style="margin-top: var(--spacing-lg);">
                        <p style="color: var(--gray-400); font-size: 0.875rem; margin: 0;">
                            <i class="fa fa-shield me-2" style="color: var(--success-color);"></i>
                            We respect your privacy
                        </p>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div style="margin-top: var(--spacing-2xl); padding-top: var(--spacing-xl); border-top: 1px solid rgba(255, 255, 255, 0.1);">
                <!-- Payment Methods -->
                <div class="text-center" style="margin-bottom: var(--spacing-lg);">
                    <h5 style="color: var(--gray-300); margin-bottom: var(--spacing-md); font-size: 0.875rem; text-transform: uppercase; letter-spacing: 1px;">
                        Secure Payment Methods
                    </h5>
                    <div style="display: flex; justify-content: center; gap: var(--spacing-md); flex-wrap: wrap;">
                        <div style="background: var(--white); padding: var(--spacing-sm); border-radius: var(--radius-md); box-shadow: var(--shadow-sm);">
                            <img src="<?= Helper::asset('images/icons/icon-pay-01.png') ?>" alt="Visa" style="height: 30px;">
                        </div>
                        <div style="background: var(--white); padding: var(--spacing-sm); border-radius: var(--radius-md); box-shadow: var(--shadow-sm);">
                            <img src="<?= Helper::asset('images/icons/icon-pay-02.png') ?>" alt="Mastercard" style="height: 30px;">
                        </div>
                        <div style="background: var(--white); padding: var(--spacing-sm); border-radius: var(--radius-md); box-shadow: var(--shadow-sm);">
                            <img src="<?= Helper::asset('images/icons/icon-pay-03.png') ?>" alt="PayPal" style="height: 30px;">
                        </div>
                        <div style="background: var(--white); padding: var(--spacing-sm); border-radius: var(--radius-md); box-shadow: var(--shadow-sm);">
                            <img src="<?= Helper::asset('images/icons/icon-pay-04.png') ?>" alt="American Express" style="height: 30px;">
                        </div>
                        <div style="background: var(--white); padding: var(--spacing-sm); border-radius: var(--radius-md); box-shadow: var(--shadow-sm);">
                            <img src="<?= Helper::asset('images/icons/icon-pay-05.png') ?>" alt="Discover" style="height: 30px;">
                        </div>
                    </div>
                </div>

                <!-- Copyright -->
                <div class="text-center">
                    <p style="color: var(--gray-400); margin: 0; font-size: 0.875rem;">
                        Copyright &copy; <script>document.write(new Date().getFullYear());</script> OneStore. All rights reserved.
                        <br class="d-sm-none">
                        Made with <i class="fa fa-heart" style="color: var(--error-color); animation: heartbeat 1.5s ease-in-out infinite;"></i>
                        for amazing shopping experience.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Modern Back to Top Button -->
<div class="modern-back-to-top" id="modernBackToTop">
    <i class="zmdi zmdi-chevron-up"></i>
</div>

<style>
    /* Modern Back to Top */
    .modern-back-to-top {
        position: fixed;
        bottom: var(--spacing-xl);
        right: var(--spacing-xl);
        width: 55px;
        height: 55px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: var(--white);
        border-radius: var(--radius-full);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all var(--transition-normal);
        box-shadow: var(--shadow-lg);
        z-index: var(--z-fixed);
        opacity: 0;
        visibility: hidden;
        transform: translateY(20px);
    }

    .modern-back-to-top.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .modern-back-to-top:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-2xl);
    }

    .modern-back-to-top i {
        font-size: 1.25rem;
        transition: transform var(--transition-fast);
    }

    .modern-back-to-top:hover i {
        transform: translateY(-2px);
    }

    /* Heartbeat Animation */
    @keyframes heartbeat {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }

    /* Newsletter Form Handler */
</style>

<script>
// Modern Back to Top Functionality
document.addEventListener('DOMContentLoaded', function() {
    const backToTopBtn = document.getElementById('modernBackToTop');

    // Show/hide back to top button
    window.addEventListener('scroll', function() {
        if (window.scrollY > 300) {
            backToTopBtn.classList.add('show');
        } else {
            backToTopBtn.classList.remove('show');
        }
    });

    // Smooth scroll to top
    backToTopBtn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});

// Newsletter Form Handler
function handleNewsletterSubmit(event) {
    event.preventDefault();
    const email = event.target.email.value;

    // Simple validation
    if (!email || !email.includes('@')) {
        alert('Please enter a valid email address');
        return;
    }

    // Show success message (you can replace this with actual API call)
    alert('Thank you for subscribing! You\'ll receive 10% off your first order.');
    event.target.reset();
}
</script>