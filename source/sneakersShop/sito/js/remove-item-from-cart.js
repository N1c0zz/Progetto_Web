'use strict';

// recupera il nome del prodotto
function getProductId(item_node) {
    return item_node.dataset.id;
}

// recupera la taglia del prodotto
function getSize(item_node) {
    return item_node.querySelector('p.product-size').textContent.replace('Taglia: ', '');
}

async function removeItem(item_node, productId, size) {
    try {
        
        const formData = new FormData();
        formData.append('productId', productId);
        formData.append('size', size);

        const response = await fetch('index.php?request=remove-item-from-cart', {
            method: "POST",
            body: formData
        });

        if (!response.ok) {
            throw new Error(`Response status: ${response.status}`);
        }

        const json = await response.json();
        console.log(json);

        if(json["item-removed"]) {
            // rimozione dal DOM
            item_node.remove();
        } else if (json["cart-empty"]) {
            document.querySelector('.cart-list, .cart-info').remove();
            document.querySelector('#cart-section').innerHTML = `<p class="text-center">${json["empty-cart-msg"]}</p>`;
        }
    } catch (error) {
        console.error('Fetch error: ', error.message);
    }
}

document.querySelectorAll('button.cart-rm-btn').forEach(btn => {
    btn.addEventListener('click', async (e) => {
        let item = e.currentTarget.closest('li.cart-item');
        removeItem(item, getProductId(item), getSize(item));
        e.preventDefault();
    });
});