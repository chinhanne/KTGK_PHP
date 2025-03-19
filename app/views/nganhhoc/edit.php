<h2>Edit Product</h2>
<form action="index.php?controller=product&action=edit&id=<?php echo $product->id; ?>" method="post">
    <div>
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $product->name; ?>" required>
    </div>
    <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo $product->description; ?></textarea>
    </div>
    <div>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" value="<?php echo $product->price; ?>" required>
    </div>
    <div>
        <label for="category_id">Category:</label>
        <select id="category_id" name="category_id" required>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category->id; ?>" <?php if ($category->id == $product->category_id) echo 'selected'; ?>><?php echo $category->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <button type="submit">Update Product</button>
    </div>
</form>