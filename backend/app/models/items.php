<?php
class ItemModel {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli; // Database connection
    }

    // Method to add an item to the database
    public function addItem($item_id,$organizationId, $itemName) {
        // Prepare the SQL query to insert the item
        $stmt = $this->mysqli->prepare("INSERT INTO Items (ID, Item_Name, Org_ID) VALUES (?,?,?)");
        $stmt->bind_param("sss", $item_id,$organizationId, $itemName);

        // Execute the query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
