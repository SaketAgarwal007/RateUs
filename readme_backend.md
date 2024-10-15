

### Add Item form
#### frontend code should contain
#### route ../../backend/public/index.php
#### method : POST
```
<form action="your_item_controller_route.php" method="POST">
    <input type="hidden" name="action" value="login">
    <!-- Hidden Organization ID -->
    <input type="hidden" name="organization_id" value="123"> <!-- Example organization ID -->

    <!-- Item fields (could dynamically add more via JavaScript) -->
    <div>
        <label>Item Name 1</label>
        <input type="text" name="items[0][name]" required>
    </div>
    <div>
        <label>Item Name 2</label>
        <input type="text" name="items[1][name]" required>
    </div>
    <!-- Add more item fields as needed -->

    <button type="submit">Submit</button>
</form>
```
    name=items[0][name]
    organization_id value="make a get request"
    input type="hidden" name="action" value="addItem"
