<?php
require '../../connection/connection.php';

$client = new MongoDB\Client;
$collectionproducts = $client->BTBA->products;

$colected = $collectionproducts->find([])->toArray();

// Get the list of categories
$categories = [];
foreach ($colected as $product) {
    $categories[] = $product['productCategory'];
}
$categories = array_unique($categories);

$imageData = [];
foreach ($colected as $product) {
    if (isset($product['image'])) {
        $imageData[$product['productName']] = $product['image'];
    }
}

?>
<body>
    <label for="category">Filter by Category:</label>
    <select id="category" onchange="filterTableByCategory(this.value)">
        <option value="">All</option>
        <?php
        sort($categories);
        foreach ($categories as $category) { ?>
            <option value="<?= htmlspecialchars($category); ?>"><?= htmlspecialchars($category); ?></option>
        <?php } ?>
    </select>

    <script>
        function filterTableByCategory(category) {
            const tableRows = document.querySelectorAll('table tr');
            tableRows.forEach((row, index) => {
                if (index === 0) return;
                const cellCategory = row.querySelector('td:nth-child(1)');
                if (category === "" || cellCategory.textContent.trim() === category) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>

    <table>
        <tr>
            <th>Product Category</th>
            <th>Product Name</th>
            <th>Image</th>
            <th>Stocks</th>
            <th>Sold</th>
            <th>Price</th>
        </tr>
        <?php foreach ($colected as $product) { ?>
            <tr>
                <td><?= htmlspecialchars($product['productCategory'] ?? ''); ?></td>
                <td><?php echo isset($product['productName']) ? htmlspecialchars($product['productName']) : ''; ?></td>
                <td>
                    <?php if (isset($product['image']) && isset($imageData[$product['productName']])) { ?>
                        <img src="/../allasset/<?= htmlspecialchars($imageData[$product['productName']]); ?>" alt="" style="width: 100px; height: 100px; object-fit: cover;">
                    <?php } else { ?>
                        <img src="" alt="" style="width: 100px; height: 100px; object-fit: cover;">
                    <?php } ?>
                </td>
                <td><?= htmlspecialchars($product['productStock'] ?? ''); ?></td>
                <td><?= htmlspecialchars($product['sold'] ?? ''); ?></td>
                <td><?= htmlspecialchars($product['productPrice'] ?? ''); ?></td>
            </tr>
        <?php } ?>
    </table>

    <script>
        function filterTableByCategory(category) {
            const tableRows = document.querySelectorAll('table tr');
            tableRows.forEach((row, index) => {
                if (index === 0) return;
                const cell = row.querySelector('td:first-child');
                if (category === "" || cell.textContent.trim() === category) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>


