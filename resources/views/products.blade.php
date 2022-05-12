<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos os Produtos - Hill eCommerce</title>
</head>
<body>
    <h1>Produtos</h1>

    @foreach ($products as $product)
        <a href="/products/{{ $product->id }}">
            {{ $product->title }}
            {{ $product->amount }}
        </a>

        <br>
    @endforeach
</body>
</html>