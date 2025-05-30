<?php

// connessione al db
require_once("bootstrap.php");

if(isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case 'home':
            require("php/home.php");
            break;
        
        case 'login':
            require("php/login.php");
            break;
        
        case 'registration':
            require("php/registration.php");
            break;
        
        case 'notifications':
            require("php/notifications.php");
            break;
        
        case 'logout':
            require("php/logout.php");
            break;
        
        case 'account':
            require("php/account.php");
            break;
        
        case 'change-user-info':
            require("php/change-user-info.php");
            break;
        
        case 'change-user-pwd':
            require("php/change-user-pwd.php");
            break;
        
        case 'products':
            require("php/user/products.php");
            break;
        
        case 'manage-orders':
            require("php/seller/manageOrders.php");
            break;
        
        case 'manage-products':
            require("php/seller/manageProducts.php");
            break;
        
        case 'user-product-details':
            require("php/user/productDetails.php");
            break;

        case 'seller-product-details':
            require("php/seller/productDetails.php");
            break;

        case 'edit-product':
            require("php/seller/editProduct.php");
            break;
        
        case 'save-product-info':
            require("php/seller/editProduct.php");
            break;
        
        case 'edit-order':
            require("php/seller/editOrderState.php");
            break;
        
        case 'save-new-order-state':
            require("php/seller/editOrderState.php");
            break;
        
        case 'cart':
            require("php/user/cart.php");
            break;
        
        case 'delete-product':
            require("php/seller/deleteProduct.php");
            break;
        
        case 'checkout':
            require("php/user/checkout.php");
            break;
        
        case 'create-order':
            require("php/user/create-order.php");
            break;
        
        case 'add-item-to-cart':
            require("php/user/add-item-to-cart.php");
            break;
        
        case 'edit-cart-item':
            require("php/user/edit-cart-item.php");
            break;
        
        case 'update-cart-item':
            require("php/user/update-cart-item.php");
            break;
        
        case 'privacy-info':
            require("php/user/privacy-page.php");
            break;
        
        case 'cookie-info':
            require("php/user/cookie-page.php");
            break;

        case 'ToS':
            require("php/user/ToS-page.php");
            break;
        
        default:
            require("php/home.php");
            break;
    }
// template html base
require("php/user/template/base.php");

} elseif(isset($_GET["search"])) {

    switch ($_GET["search"]) {
        case 'bestseller':
            require("php/user/bestsellerProducts.php");
            break;
        
        case 'novità':
            require("php/user/newArrivalsProducts.php");
            break;

        default:
            require ("php/user/products.php");
            break;
    }

    require("php/user/template/base.php");
   
} elseif(isset($_GET["request"])) {

    switch ($_GET["request"]) {
        case 'get-new-notifications':
            require("php/get-new-notifications.php");
            break;
        
        case 'change-notification-status':
            require("php/change-notification-status.php");
            break;

        
        case 'remove-item-from-cart':
            require("php/remove-item-from-cart.php");
            break;
        
        case 'delete-notification':
            require("php/delete-notification.php");

        default:
            break;
    }

} else {
    require("php/home.php");
    require("php/user/template/base.php");
}

?>