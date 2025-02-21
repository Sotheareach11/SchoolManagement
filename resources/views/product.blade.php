<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container mt-5 border p-4">
        <h1>Product</h1>
        <form action="/product" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="pname" id="name">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" id="price">
            </div>
            <div class="mb-3">
                <label for="qty" class="form-label">Qty</label>
                <input type="text" class="form-control" name="qty" id="qty">
            </div>
            <div class="mb-3">
                <label for="discount" class="form-label">Discount</label>
                <input type="text" class="form-control" name="discount" id="discount">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    @if(isset($pname))
        <div class="container mx-auto border mt-4 p-3">
            <h3>Response...</h3>
            <p class="m-0">Product Name: {{$pname}}</p>
            <p class="m-0">Product Price: {{$price}}</p>
            <p class="m-0">Product Qty: {{$qty}}</p>
            <p class="m-0">Product Discount: {{$discount}}</p>
            <p class="m-0">Product Amount: {{$amount}}</p>
        </div>
    @endif
</body>

</html>
