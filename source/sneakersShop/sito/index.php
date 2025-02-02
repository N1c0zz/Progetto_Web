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
        
        case 'product-details':
            require("php/seller/productDetails.php");
            break;

        case 'edit-product':
            require("php/seller/editProduct.php");
            break;
        
        case 'save-product-info':
            require("php/seller/editProduct.php");
            break;
        
        case 'cart':
            require("php/user/cart.php");
            break;
        
        default:
            require("php/home.php");
            break;
    }
} else {
    require("php/home.php");
}

// template html base
require("php/user/template/base.php");

?>