
<h2>Products</h2>
<a href="index.php?controller=product&action=add" class="btn btn-primary mb-3">Add Product</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product->id; ?></td>
                <td><?php echo $product->name; ?></td>
                <td><?php echo $product->description; ?></td>
                <td><?php echo $product->price; ?></td>
                <td><?php echo $product->category_name; ?></td>
                <td>
                    <a href="index.php?controller=product&action=edit&id=<?php echo $product->id; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="index.php?controller=product&action=delete&id=<?php echo $product->id; ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>