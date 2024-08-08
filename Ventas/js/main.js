document.addEventListener('DOMContentLoaded', function () {
    const searchBar = document.getElementById('searchBar');
    const products = document.querySelectorAll('.producto');
    const modal = document.getElementById('productModal');
    const closeBtn = document.querySelector('.closeBtn');

    searchBar.addEventListener('keyup', function (e) {
        const searchString = e.target.value.toLowerCase();
        products.forEach(product => {
            const productName = product.getAttribute('data-name');
            if (productName.includes(searchString)) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    });

    document.querySelectorAll('.detailsBtn').forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-id');
            fetch(`product.php?id=${productId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('modalTitle').innerText = data.nombre;
                    document.getElementById('modalImage').src = data.imagen;
                    document.getElementById('modalDescription').innerText = data.descripcion;
                    document.getElementById('modalPrice').innerText = `$${data.precio}`;
                    modal.style.display = 'block';
                });
        });
    });

    closeBtn.addEventListener('click', function () {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function (e) {
        if (e.target == modal) {
            modal.style.display = 'none';
        }
    });
});
