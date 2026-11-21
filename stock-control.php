<?php
declare(strict_types=1);

$candy_shop = [
    'Gummy Bears'    => ['price' => 55.00, 'stock' => 40],
    'Chocolate Bar'  => ['price' => 45.00, 'stock' => 12],
    'Lollipops'      => ['price' => 15.00, 'stock' => 6],
    'Toffee'         => ['price' => 30.00, 'stock' => 26],
    'Fudge'          => ['price' => 60.00, 'stock' => 8],
    'Mint Candies'   => ['price' => 25.00, 'stock' => 18],
];

$tax_rate = 12;

function get_reorder_message(int $stock): string
{
    return ($stock < 10) ? 'Yes' : 'No';
}

function get_total_value(float $price, int $quantity): float
{
    return $price * $quantity;
}

function get_tax_due(float $price, int $quantity, int $tax_rate = 0): float
{
    return ($price * $quantity) * ($tax_rate / 100);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dwayne's Candy Shop | Stock Control</title>
    <link rel="stylesheet" href="css/stock.css">
</head>
<body>
    <h1><img src="img/logo.png" alt="" width="55" height="35"> Dwayne's Candy Shop</h1>
    <h2>Stock Control</h2>
    <table>
        <tr>
            <th>Product</th>
            <th>Stock</th>
            <th>Reorder</th>
            <th>Total Value</th>
            <th>Tax Due</th>
        </tr>
        <?php foreach ($candy_shop as $product_name => $data) { ?>
        <tr>
            <td><?= $product_name ?></td>
            <td><?= $data['stock'] ?></td>
            <td><?= get_reorder_message($data['stock']) ?></td>
            <td>₱<?= number_format(get_total_value($data['price'], $data['stock']), 2) ?></td>
            <td>₱<?= number_format(get_tax_due($data['price'], $data['stock'], $tax_rate), 2) ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
