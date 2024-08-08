<?php
include 'db.php';
include 'templates/header.php';

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?>

<h1>Catálogo de Productos</h1>
<input type="text" id="searchBar" placeholder="Buscar productos...">

<div class="productos">
    <?php while($row = $result->fetch_assoc()): ?>
        <div class="producto" data-name="<?php echo strtolower($row['nombre']); ?>">
            <img src="<?php echo $row['imagen']; ?>" alt="<?php echo $row['nombre']; ?>">
            <h2><?php echo $row['nombre']; ?></h2>
            <p><?php echo $row['descripcion']; ?></p>
            <p>$<?php echo $row['precio']; ?></p>
            <button class="detailsBtn" data-id="<?php echo $row['id']; ?>">Ver detalles</button>
        </div>
    <?php endwhile; ?>
</div>

<div id="productModal" class="modal">
    <div class="modal-content">
        <span class="closeBtn">&times;</span>
        <h2 id="modalTitle"></h2>
        <img id="modalImage" src="" alt="">
        <p id="modalDescription"></p>
        <p id="modalPrice"></p>
    </div>
</div>

<?php include 'templates/footer.php'; ?>
