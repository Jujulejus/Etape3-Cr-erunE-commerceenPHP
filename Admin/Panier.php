<?php
function Panier(){
        if(!isset($_SESSION)){
            session_start();
        }

    if(!isset($_SESSION["panier"])) {
        $_SESSION['panier'] = array();
        if (isset($_POST['panier'])) {
            echo "J'arrive bien à passer cette ligne";
            if (isset($_POST['productID'], $_POST['QuantitéRestante']) && is_numeric($_POST['productID']) && is_numeric($_POST['QuantitéRestante'])) {
                echo "J'arrive bien à passer cette ligne";
                $product_id = (int)$_POST['productID'];
                $quantity = (int)$_POST['QuantitéRestante'];
                $pdo = "";
                $stmt = $pdo->prepare('SELECT * FROM products WHERE productID = ?');
                $stmt->execute([$_POST['productID']]);
                $product = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($product && $quantity > 0) {
                    echo "J'arrive bien à passer cette ligne";
                    if (isset($_SESSION['panier']) && is_array($_SESSION['panier'])) {
                        echo "J'arrive bien à passer cette ligne";
                        if (array_key_exists($product_id, $_SESSION['panier'])) {
                            echo "J'arrive bien à passer cette ligne";
                            $_SESSION['panier'][$product_id] += $quantity;
                        } else {
                            $_SESSION['panier'][$product_id] = $quantity;
                        }
                        $_SESSION['panier'] = array($product_id => $quantity);
                    }
                }
                if (isset($_GET['supprimer']) && is_numeric($_GET['supprimer']) && isset($_SESSION['panier']) && isset($_SESSION['panier'][$_GET['supprimer']])) {
                    unset($_SESSION['panier'][$_GET['supprimer']]);
                    echo "J'arrive bien à passer cette ligne";
                }
                if (isset($_POST['MiseAJour']) && isset($_SESSION['panier'])) {
                    echo "J'arrive bien à passer cette ligne";
                    foreach ($_POST as $k => $v) {
                        if (strpos($k, 'QuantitéRestante') !== false && is_numeric($v)) {
                            $id = str_replace('QuantitéRestante', '', $k);
                            $quantity = (int)$v;
                            echo "J'arrive bien à passer cette ligne";
                            if (is_numeric($id) && isset($_SESSION['panier'][$id]) && $quantity > 0) {
                                $_SESSION['panier'][$id] = $quantity;
                                echo "J'arrive bien à passer cette ligne";}
                        }
                    }
                }
                if(!empty($_POST["quantity"])) {
                    $db_handle = "";
                    $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
                    $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));

                    if(!empty($_SESSION["cart_item"])) {
                        if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
                            foreach($_SESSION["cart_item"] as $k => $v) {
                                if($productByCode[0]["code"] == $k) {
                                    if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                        $_SESSION["cart_item"][$k]["quantity"] = 0;
                                    }
                                    $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                                }
                            }
                        } else {
                            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                        }
                    } else {
                        $_SESSION["cart_item"] = $itemArray;
                    }
                }
                ?> <div id="shopping-cart">
    <div class="txt-heading">Shopping Cart</div>

    <a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>
    <?php
    if(isset($_SESSION["cart_item"])){
        $total_quantity = 0;
        $total_price = 0;
        ?>
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
            <tbody>
            <tr>
                <th style="text-align:left;">Name</th>
                <th style="text-align:left;">Code</th>
                <th style="text-align:right;" width="5%">Quantity</th>
                <th style="text-align:right;" width="10%">Unit Price</th>
                <th style="text-align:right;" width="10%">Price</th>
                <th style="text-align:center;" width="5%">Remove</th>
            </tr>
            <?php
            foreach ($_SESSION["cart_item"] as $item){
                $item_price = $item["quantity"]*$item["price"];
                ?>
                <tr>
                    <td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
                    <td><?php echo $item["code"]; ?></td>
                    <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                    <td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
                    <td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
                    <td style="text-align:center;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
                </tr>
                <?php
                $total_quantity += $item["quantity"];
                $total_price += ($item["price"]*$item["quantity"]);
            }
            ?>

            <tr>
                <td colspan="2" align="right">Total:</td>
                <td align="right"><?php echo $total_quantity; ?></td>
                <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
                <td></td>
            </tr>
            </tbody>
        </table>
        <?php
    } else {
        ?>
        <div class="no-records">Your Cart is Empty</div>
        <?php
    }
    ?>
</div><?php
            }
        }
        if(!empty($_SESSION["cart_item"])) {
            foreach ($_SESSION["cart_item"] as $k => $v) {
                if ($_GET["code"] == $k) {
                    unset($_SESSION["cart_item"][$k]);
                }
                if (empty($_SESSION["cart_item"])) {
                    unset($_SESSION["cart_item"]);
                }
                echo "bien supp";
            }
        }
	unset($_SESSION["cart_item"]);
    }
    }
echo "LE PANIER EST VIDE !";?>