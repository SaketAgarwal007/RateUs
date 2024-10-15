<?php
require_once "../confiq/confiq.php";
require_once "../session/session.php";
require_once "../app/models/items.php";

class itemController {
    private $itemModel;

    public function __construct($mysqli) {
        // Instantiate the ItemModel with the database connection
        $this->itemModel = new ItemModel($mysqli);
    }

    // Method to handle item-related actions
    public function itemMethods() {
        // Check if the form has been submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Assuming 'items' is an array of item data from the form
            if (isset($_POST['items']) && isset($_POST['organization_id'])) {
                $organizationId = $_POST['organization_id']; // Organization ID (hidden input)
                $items = $_POST['items']; // Array of item data

                // Loop through each item and add it to the database
                foreach ($items as $item) {
                    $itemName = $item['name']; // Extract item name from the form
                    $item_id=create_unique_id();
                    $this->itemModel->addItem($item_id,$organizationId, $itemName);
                }
                echo json_encode([
                    'status'=>'success'
                ]);
            }
        }
    }
}
?>
