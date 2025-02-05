<h1 class="mb-4">Modifica Prodotto</h1>

    <form action="index.php?action=save-product-info" method="post" enctype="multipart/form-data">

        <input type="hidden" name="idprodotto" value="<?php echo $idprodotto; ?>" />

        <div class="mb-3">
            <label for="productName" class="form-label">Nome Prodotto</label>
            <input type="text" class="form-control" id="productName" placeholder="Inserisci il nome del prodotto" name="nomeProdotto" value="<?php echo $prodotto["modello"]; ?>" />
        </div>
        <div class="mb-3">
            <label for="productColor" class="form-label">Colore</label>
            <input type="text" class="form-control" id="productColor" placeholder="Inserisci il colore del prodotto" name="colore" value="<?php echo $prodotto["colore"]; ?>" />
        </div>
        <div class="mb-3">
            <label for="productCategory" class="form-label">Categoria</label>
            <?php $categorie = implode(', ', $prodotto["categorie"]); ?>
            <input type="text" class="form-control" id="productCategory" placeholder="Inserisci la categoria del prodotto" name="categoria" value="<?php echo $categorie; ?>" />
        </div>
        <div class="mb-3">
            <label for="productBrand" class="form-label">Marca</label>
            <input type="text" class="form-control" id="productBrand" placeholder="Inserisci la marca del prodotto" name="marca" value="<?php echo $prodotto["marca"]; ?>" />
        </div>
        <div class="mb-3">
            <label for="productAvailability" class="form-label">Disponibilità</label>
            <input type="text" class="form-control" id="productAvailability" placeholder="Inserisci la disponibilità del prodotto" name="disponibilità" value="<?php echo $prodotto["disponibilità"]; ?>" />
        </div>
        <div class="mb-3">
            <label for="productTitleDescription" class="form-label">Titolo descrizione</label>
            <input type="text" class="form-control" id="productTitleDescription" placeholder="Inserisci il titolo della descrizione del prodotto" name="titoloDescrizione" value="<?php echo $prodotto["titoloDescrizione"]; ?>" />
        </div>
        <div class="mb-3">
            <label for="productDescription" class="form-label">Descrizione</label>
            <textarea class="form-control" id="productDescription" rows="4" placeholder="Inserisci la descrizione del prodotto" name="descrizione"><?php echo $prodotto["descrizione"]; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="productDetails" class="form-label">Dettagli</label>
            <textarea class="form-control" id="productDetails" rows="4" placeholder="Inserisci i dettagli tecnici del prodotto" name="dettagli"><?php echo $prodotto["dettagli"]; ?></textarea>
        </div>
        <div class="mb-4">
            <label for="productImage" class="form-label">Immagine</label>
            <input type="file" class="form-control" name="productImage" id="productImage" />
        </div>
        <div class="d-flex justify-content-between">
            <a href="index.php?action=manage-products" class="btn btn-outline-secondary col-1 text-center">Annulla</a>
            <button type="submit" class="btn btn-dark col-2">Salva Modifiche</button>
        </div>
  
    </form>