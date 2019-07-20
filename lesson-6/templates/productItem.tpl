<div class="col-md-4">
    <div class="card mb-4 shadow-sm">
        <img src="{{IMAGE}}" style="width: 100%;height: 200px;object-fit: cover">
        <div class="card-body">
            <p class="card-name">{{NAME}}</p>
            <p class="card-text">{{DESCRIPTION}}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="/showProduct.php?id={{ID}}" class="btn btn-sm btn-outline-secondary">show</a>
                    <a href="/editProduct.php?id={{ID}}" class="btn btn-sm btn-outline-secondary">edit</a>
                    <a href="/deleteProduct.php?id={{ID}}" class="btn btn-sm btn-outline-secondary">delete</a>
                </div>
                <small class="text-muted">{{PRICE}} руб.</small>
            </div>
        </div>
    </div>
</div>