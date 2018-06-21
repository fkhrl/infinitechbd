<?php $table = "product"; ?>
<?php
include('../class/auth.php');

$magrition = $obj->FlyQuery("SELECT 
							p.id,
							p.name,
							bn.name as brand_id,
							pcn.name as `product_category_id`,
							p.photo_thumble,
							p.photo_1,
							p.photo_2,
							p.photo_3,
							p.photo_4,
							p.purchase_price,
							p.sell_price,
							p.quantity,
							p.details,
							p.product_code,
							p.manufacturer
							FROM product as p
							LEFT JOIN brand_name as bn ON bn.id = p.brand_id
							LEFT JOIN product_category_name as pcn on pcn.id = p.product_category_id");
//echo $magrition;
echo "{\"data\":" . json_encode($magrition) . ",\"total\":" . count($magrition) . "}";
?>