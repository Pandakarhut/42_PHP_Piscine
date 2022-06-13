<p>List of your orders:</p>

<?php
    $orders = unserialize(file_get_contents("../private/orders"));
    $products = unserialize(file_get_contents("../private/products"));
    $order_total = 0;
    $order_count = 0;
    if ($orders)
    {
        foreach ($orders as $order => $values)
        {
            if ($values['user'] == $_SESSION['loggued_on_user']) {
                echo '<b>Order #' . $values['id'] . '</b>';
                $order_count++;
                foreach ($values['order'] as $index => $article) {
                    foreach ($products as $product => $information) {
                        if ($information['id'] == $article['id']) {
                            echo 'Item: ' . $information['name'];
                            echo ',  Unit price: ' . $information['price'];
                            echo ',  Quantity: ' . $article['amount'];
                            echo ',  Total price: ' . $information['price'] * $article['amount'];
                            echo '<br>';
                            $order_total = $order_total + $information['price'] * $article['amount'];
                        }
                    }
                }
                echo '<b>Grand total price: ' . $order_total . '</b>';
                echo '<br>';
                $order_total = 0;
            }
            
        }
    }
    
    if (!$order_count)
        echo '<p>No orders done yet</p>';
?>
