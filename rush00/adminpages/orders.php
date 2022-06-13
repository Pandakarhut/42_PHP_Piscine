<?php
    if (is_admin())
    {

        $orders = unserialize(file_get_contents("../private/orders"));
        $products = unserialize(file_get_contents("../private/products"));
        $order_total = 0;
        $order_count = 0;
        if ($orders)
        {
            foreach ($orders as $order => $values)
            {
				?><form action="/store/utils/modifyorders.php" method="post"><?php
                echo '<b>Order #' . $values['id'] . ' buyer: <input type=text class="text_field" name="buyer" value="' . $values['user'] . '" ></b><br>';
                $order_count++;
                foreach ($values['order'] as $index => $article) {
                    foreach ($products as $product => $information) {
                        if ($information['id'] == $article['id']) {
                            echo '<span>Item: ' . $information['name'];
                            echo ',  Unit price: ' . $information['price'];
                            echo ',  Quantity: <input type=text class="num_field" name="quantity" value="' . $article['amount'] . '" >';
                            echo ',  Total price: ' . $information['price'] * $article['amount'];
                            echo '</span><br>';
							echo '<input type=hidden name=itemid value="' . $product . '">';
							echo '<input type=hidden name=orderid value="' . $values['id'] . '">';
                            $order_total = $order_total + $information['price'] * $article['amount'];
                        }
                    }
                }
                echo '<b>Grand total price: ' . $order_total . '</b>';
                echo '<input type="submit" style="margin-left: 50px" value="save">';
                $order_total = 0;
				//This is for deleting, everything above is for editing
				?></form><form action="/store/utils/deleteorder.php" method="post"><?php
				echo '<input type=hidden name=orderid value=' . $values['id'] . '>';
                echo '<input type=submit name=submit value=delete><br><hr>';
				?></form>
				<?php
            }

        }
    }
    else
        header('Location: /store/index.php?page=error&message=unauthorized');
        
    if (!$order_count)
        echo '<p>No one has done any orders yet.</p>';
    
?>
