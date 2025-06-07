<?php use App\Helpers\Helper; ?>

<!-- Modern Cart Styles -->
<style>
    /* Modern Cart Overlay */
    .wrap-header-cart {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(10px);
        z-index: var(--z-modal);
        visibility: hidden;
        opacity: 0;
        transition: all var(--transition-normal);
    }

    .wrap-header-cart.show-header-cart {
        visibility: visible;
        opacity: 1;
    }

    .s-full {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    /* Modern Cart Panel */
    .header-cart {
        position: absolute;
        top: 0;
        right: 0;
        width: 450px;
        max-width: 90vw;
        height: 100%;
        background: var(--white);
        box-shadow: var(--shadow-2xl);
        transform: translateX(100%);
        transition: transform var(--transition-normal);
        display: flex;
        flex-direction: column;
    }

    .wrap-header-cart.show-header-cart .header-cart {
        transform: translateX(0);
    }

    /* Modern Cart Header */
    .header-cart-title {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: var(--white);
        padding: var(--spacing-xl);
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: var(--shadow-md);
    }

    .header-cart-title span {
        font-size: 1.5rem;
        font-weight: var(--font-weight-bold);
        margin: 0;
    }

    .cart-close-btn {
        width: 40px;
        height: 40px;
        border-radius: var(--radius-full);
        background: rgba(255, 255, 255, 0.2);
        border: none;
        color: var(--white);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all var(--transition-fast);
    }

    .cart-close-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: rotate(90deg);
    }

    .cart-close-btn i {
        font-size: 1.25rem;
    }
</style>

<!-- Modern Modal Shopping Cart -->
<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart">
        <div class="header-cart-title">
            <span>
                <i class="zmdi zmdi-shopping-cart me-3"></i>
                Your Cart
            </span>

            <button class="cart-close-btn js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </button>
        </div>

        <div class="header-cart-content">
            <style>
                /* Modern Cart Content */
                .header-cart-content {
                    flex: 1;
                    display: flex;
                    flex-direction: column;
                    overflow: hidden;
                }

                .header-cart-wrapitem {
                    flex: 1;
                    overflow-y: auto;
                    padding: var(--spacing-lg);
                    list-style: none;
                    margin: 0;
                }

                /* Modern Cart Items */
                .header-cart-item {
                    display: flex;
                    gap: var(--spacing-md);
                    padding: var(--spacing-lg);
                    background: var(--gray-50);
                    border-radius: var(--radius-lg);
                    margin-bottom: var(--spacing-md);
                    transition: all var(--transition-fast);
                    border: 1px solid var(--gray-200);
                }

                .header-cart-item:hover {
                    background: var(--white);
                    box-shadow: var(--shadow-md);
                    transform: translateY(-2px);
                }

                .header-cart-item-img {
                    flex-shrink: 0;
                }

                .header-cart-item-img img {
                    width: 70px;
                    height: 70px;
                    object-fit: cover;
                    border-radius: var(--radius-md);
                    box-shadow: var(--shadow-sm);
                }

                .header-cart-item-txt {
                    flex: 1;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                }

                .header-cart-item-name {
                    color: var(--gray-800);
                    font-weight: var(--font-weight-semibold);
                    text-decoration: none;
                    margin-bottom: var(--spacing-xs);
                    transition: color var(--transition-fast);
                    display: -webkit-box;
                    -webkit-line-clamp: 2;
                    line-clamp: 2;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                    line-height: 1.4;
                }

                .header-cart-item-name:hover {
                    color: var(--primary-color);
                }

                .header-cart-item-info {
                    color: var(--gray-600);
                    font-weight: var(--font-weight-medium);
                    font-size: 0.875rem;
                }

                .btn-remove-header-cart {
                    background: var(--error-color);
                    color: var(--white);
                    border: none;
                    width: 30px;
                    height: 30px;
                    border-radius: var(--radius-full);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    cursor: pointer;
                    transition: all var(--transition-fast);
                    margin-left: auto;
                }

                .btn-remove-header-cart:hover {
                    background: var(--error-color);
                    transform: scale(1.1);
                    box-shadow: var(--shadow-md);
                }

                /* Empty Cart */
                .empty-cart {
                    flex: 1;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    padding: var(--spacing-2xl);
                    text-align: center;
                }

                .empty-cart i {
                    font-size: 4rem;
                    color: var(--gray-300);
                    margin-bottom: var(--spacing-lg);
                }

                .empty-cart h4 {
                    color: var(--gray-600);
                    font-weight: var(--font-weight-semibold);
                    margin-bottom: var(--spacing-sm);
                }

                .empty-cart p {
                    color: var(--gray-500);
                    margin: 0;
                }

                /* Cart Summary */
                .cart-summary {
                    background: var(--gray-50);
                    border-top: 1px solid var(--gray-200);
                    padding: var(--spacing-xl);
                }

                .cart-total {
                    background: var(--white);
                    padding: var(--spacing-lg);
                    border-radius: var(--radius-lg);
                    margin-bottom: var(--spacing-lg);
                    text-align: center;
                    box-shadow: var(--shadow-sm);
                }

                .cart-total-label {
                    color: var(--gray-600);
                    font-size: 0.875rem;
                    font-weight: var(--font-weight-medium);
                    text-transform: uppercase;
                    letter-spacing: 0.5px;
                    margin-bottom: var(--spacing-xs);
                }

                .cart-total-amount {
                    color: var(--primary-color);
                    font-size: 1.5rem;
                    font-weight: var(--font-weight-bold);
                }

                .checkout-btn {
                    width: 100%;
                    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
                    color: var(--white);
                    border: none;
                    padding: var(--spacing-md) var(--spacing-lg);
                    border-radius: var(--radius-lg);
                    font-size: 1.125rem;
                    font-weight: var(--font-weight-semibold);
                    text-decoration: none;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: var(--spacing-sm);
                    transition: all var(--transition-normal);
                    cursor: pointer;
                }

                .checkout-btn:hover {
                    transform: translateY(-2px);
                    box-shadow: var(--shadow-lg);
                    color: var(--white);
                }
            </style>

            <ul class="header-cart-wrapitem" id="header-cart-items">
                <!-- Cart Items will be loaded here dynamically -->
            </ul>

            <!-- Empty Cart Message -->
            <div id="empty-cart-message" class="empty-cart" style="display: none;">
                <i class="zmdi zmdi-shopping-cart"></i>
                <h4>Your cart is empty</h4>
                <p>Add some products to get started</p>
            </div>

            <!-- Cart Summary -->
            <div id="cart-summary" class="cart-summary" style="display: none;">
                <div class="cart-total">
                    <div class="cart-total-label">Total Amount</div>
                    <div class="cart-total-amount" id="header-cart-total">$0.00</div>
                </div>

                <a href="<?= Helper::url('/checkout') ?>" class="checkout-btn">
                    <i class="zmdi zmdi-credit-card"></i>
                    Proceed to Checkout
                </a>
            </div>
        </div>
    </div>
</div>

<script>
// JavaScript Configuration - FIXED for both Development & Production
window.OneStoreClient = window.OneStoreClient || {
    baseUrl: '<?= APP_URL ?>',
    url: function(path) {
        const cleanPath = (path || '').replace(/^\//, '');
        const baseUrl = '<?= APP_URL ?>';
        return baseUrl + (cleanPath ? '/' + cleanPath : '');
    }
};
// Header Cart Management
class HeaderCart {
    constructor() {
        this.init();
    }

    init() {
        this.loadCartData();
        this.bindEvents();
        
        // Listen for cart updates from other parts of the site
        document.addEventListener('cartUpdated', () => {
            this.loadCartData();
        });
    }

    async loadCartData() {
        try {
            const response = await fetch(window.OneStoreClient.url('/cart/get'));
            const data = await response.json();
            
            if (data.success) {
                this.updateCartDisplay(data.cart_items, data.cart_totals);
            } else {
                this.showEmptyCart();
            }
        } catch (error) {
            console.error('Error loading cart:', error);
            this.showEmptyCart();
        }
    }

    updateCartDisplay(items, totals) {
        const itemsContainer = document.getElementById('header-cart-items');
        const totalElement = document.getElementById('header-cart-total');
        const summaryElement = document.getElementById('cart-summary');
        const emptyMessage = document.getElementById('empty-cart-message');

        // Safety check for items array
        if (!items || !Array.isArray(items) || items.length === 0) {
            this.showEmptyCart();
            return;
        }

        // Show cart content
        summaryElement.style.display = 'block';
        emptyMessage.style.display = 'none';

        // Update items with modern styling
        itemsContainer.innerHTML = items.map(item => `
            <li class="header-cart-item" data-product-id="${item.product_id || item.productID}">
                <div class="header-cart-item-img">
                    <img src="${window.OneStoreClient.url('/uploads/')}${item.image_path || item.image || 'placeholder.jpg'}"
                         alt="${item.name || item.productName}">
                </div>

                <div class="header-cart-item-txt">
                    <a href="${window.OneStoreClient.url('/product/')}${item.product_id || item.productID}"
                       class="header-cart-item-name">
                        ${item.name || item.productName}
                    </a>

                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: auto;">
                        <span class="header-cart-item-info">
                            ${item.quantity} × $${parseFloat(item.price).toFixed(2)}
                        </span>
                        <button class="btn-remove-header-cart"
                                data-product-id="${item.product_id || item.productID}"
                                data-cart-id="${item.cartID}"
                                title="Remove item">
                            <i class="zmdi zmdi-close"></i>
                        </button>
                    </div>
                </div>
            </li>
        `).join('');

        // Update total with modern formatting
        totalElement.textContent = `$${parseFloat(totals?.total || 0).toFixed(2)}`;

        // Update cart count in header using reduce
        const totalQuantity = items.reduce((sum, item) => sum + parseInt(item.quantity || 0), 0);
        this.updateCartCount(totalQuantity);

        // Bind remove buttons
        this.bindRemoveButtons();
    }

    showEmptyCart() {
        const summaryElement = document.getElementById('cart-summary');
        const emptyMessage = document.getElementById('empty-cart-message');
        const itemsContainer = document.getElementById('header-cart-items');
        
        summaryElement.style.display = 'none';
        emptyMessage.style.display = 'block';
        itemsContainer.innerHTML = '';
        
        this.updateCartCount(0);
    }

    updateCartCount(count) {
        const cartCountElement = document.querySelector('[data-notify]');
        if (cartCountElement) {
            cartCountElement.setAttribute('data-notify', count || 0);
        }
    }

    bindEvents() {
        // Add to cart buttons
        document.addEventListener('click', (e) => {
            if (e.target.matches('.add-to-cart-btn') || e.target.closest('.add-to-cart-btn')) {
                e.preventDefault();
                const button = e.target.matches('.add-to-cart-btn') ? e.target : e.target.closest('.add-to-cart-btn');
                this.addToCart(button);
            }
        });
    }

    bindRemoveButtons() {
        document.querySelectorAll('.btn-remove-header-cart').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                const cartId = button.getAttribute('data-cart-id');
                const productId = button.getAttribute('data-product-id');
                this.removeFromCart(cartId || productId, cartId ? 'cart_id' : 'product_id');
            });
        });
    }

    async addToCart(button) {
        const productData = {
            product_id: button.getAttribute('data-product-id'),
            name: button.getAttribute('data-product-name'),
            price: button.getAttribute('data-product-price'),
            image: button.getAttribute('data-product-image'),
            quantity: 1
        };

        try {
            const response = await fetch(window.OneStoreClient.url('/cart/add'), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(productData)
            });

            const data = await response.json();
            
            if (data.success) {
                this.showNotification(`${productData.name} added to cart!`, 'success');
                this.loadCartData();
                
                // Dispatch cart updated event
                document.dispatchEvent(new CustomEvent('cartUpdated'));
            } else {
                this.showNotification(data.message || 'Failed to add item to cart', 'error');
            }
        } catch (error) {
            console.error('Error adding to cart:', error);
            this.showNotification('An error occurred while adding to cart', 'error');
        }
    }

    async removeFromCart(id, idType = 'product_id') {
        try {
            const requestBody = {};
            requestBody[idType] = id;
            
            const response = await fetch(window.OneStoreClient.url('/cart/remove'), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(requestBody)
            });

            const data = await response.json();
            
            if (data.success) {
                this.showNotification('Item removed from cart', 'success');
                this.loadCartData();
                
                // Dispatch cart updated event
                document.dispatchEvent(new CustomEvent('cartUpdated'));
            } else {
                this.showNotification(data.message || 'Failed to remove item', 'error');
            }
        } catch (error) {
            console.error('Error removing from cart:', error);
            this.showNotification('An error occurred', 'error');
        }
    }

    showNotification(message, type) {
        // Use SweetAlert if available, otherwise fallback to simple alert
        if (typeof swal !== 'undefined') {
            swal(message, "", type === 'error' ? 'error' : 'success');
        } else {
            alert(message);
        }
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    new HeaderCart();
});
</script> 