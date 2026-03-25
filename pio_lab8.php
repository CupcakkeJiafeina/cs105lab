<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Smart Receipt</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    font-family: 'Poppins', sans-serif;
    display: flex;
    height: 100vh;
    align-items: center;
    justify-content: center;
}

.card {
    background: white;
    padding: 25px;
    width: 380px;
    border-radius: 15px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.2);
}

.title {
    text-align: center;
    font-weight: 700;
    margin-bottom: 15px;
}

.receipt {
    border-top: 2px dashed #ccc;
    padding-top: 15px;
}

.line {
    display: flex;
    justify-content: space-between;
    margin: 6px 0;
}

.total {
    font-weight: 700;
    border-top: 1px solid #ddd;
    margin-top: 10px;
    padding-top: 10px;
}
</style>
</head>

<body>

<div class="card">
<div class="title">🧾 Smart Receipt</div>

<div class="receipt">
<?php
//=====================
//FIXED DATA DO NOT CHANGE
//=====================
$name="             JUan DelA Cruz                    ";
$item="             Laptop                            ";
$quantity=1;
$price=59999.99;
$card='123409912316591';
//DO TASKS HERE

// string to upper, then the trim function removes extraspaces
$name = strtoupper(trim($name));
$item = strtoupper(trim($item));

// compute values
$total = $quantity * $price;
$vat = $total * 0.12;
$grandTotal = $total + $vat;

// mask card (first 2, last 4)
$maskedCard = substr($card,0,2) .str_repeat('*', strlen($card)-6) .substr($card,-4);

// display
echo '<div class="line"><span>CUSTOMER</span><span>'.$name.'</span></div>';
echo '<div class="line"><span>ITEM</span><span>'.$item.'</span></div>';
echo '<div class="line"><span>PRICE</span><span>Php '.number_format($price,2).'</span></div>';
echo '<div class="line"><span>QTY</span><span>'.$quantity.'</span></div>';
echo '<div class="line"><span>TOTAL</span><span>Php '.number_format($total,2).'</span></div>';
echo '<div class="line"><span>VAT (12%)</span><span>Php '.number_format($vat,2).'</span></div>';
echo '<div class="line"><span>CARD</span><span>'.$maskedCard.'</span></div>';

// Add class "total" to GRAND TOTAL line

echo '<div class="line total"><span>GRAND TOTAL</span><span>Php '.number_format($grandTotal,2).'</span></div>';
// =====================================

//Thank you :3
echo '<div style="text-align:center; margin-top:15px; font-size:12px; color:#777;">Thank you for your purchase!</div>';

?>
</div>
</div>

</body>
</html>