<h1 class="mb-4">Modifica Prodotto</h1>
    <form action="" method="post">
        <div class="mb-3">
            <label for="productName" class="form-label">Nome Prodotto</label>
            <input type="text" class="form-control" id="productName" placeholder="Inserisci il nome del prodotto" />
        </div>
        <div class="mb-3">
            <label for="productColor" class="form-label">Colore</label>
            <input type="text" class="form-control" id="productColor" placeholder="Inserisci il colore del prodotto" />
        </div>
        <div class="mb-3">
            <label for="productCode" class="form-label">Codice Prodotto</label>
            <input type="text" class="form-control" id="productCode" placeholder="Inserisci il codice del prodotto" />
        </div>
        <div class="mb-3">
            <label for="productCategory" class="form-label">Categoria</label>
            <input type="text" class="form-control" id="productCategory" placeholder="Inserisci la categoria del prodotto" />
        </div>
        <div class="mb-3">
            <label for="productBrand" class="form-label">Marca</label>
            <input type="text" class="form-control" id="productBrand" placeholder="Inserisci la marca del prodotto" />
        </div>
        <div class="mb-3">
            <label for="productAvailability" class="form-label">Disponibilità</label>
            <input type="text" class="form-control" id="productAvailability" placeholder="Inserisci la disponibilità del prodotto" />
        </div>
        <div class="mb-3">
            <label for="productDescription" class="form-label">Descrizione</label>
            <textarea class="form-control" id="productDescription" rows="4" placeholder="Inserisci la descrizione del prodotto"></textarea>
        </div>
        <div class="mb-4">
            <label for="productImage" class="form-label">Immagine</label>
            <input type="file" class="form-control" id="productImage" />
        </div>
        <div class="d-flex justify-content-end mt-5">
            <button type="submit" class="btn btn-dark">Salva Modifiche</button>
        </div>
    </form>