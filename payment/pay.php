<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 class = "paymentHeader"> Pay Here</h2>
    <form action = "checkout.php" method  = "post" autocomplete = "off">
    <label for = "item">
    Product
    <input type = "text" name = "product">
    </label>
    
    <label for = "amount">
    Price
    <input type = "text" name = "price">
    </label>
    <input type = "submit" value = "pay">
    </form>
</body>
</html>