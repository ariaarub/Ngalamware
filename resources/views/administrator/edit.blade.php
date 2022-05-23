
<form method="POST" action="/product/update">

    @csrf

    <input type="hidden" name="id" value="{{$products->id}}"><br>

    <div>
        <label>Name</label><br>
        <input type="text" name="name" placeholder="product name" required value="{{$products->name}}"><br>
    </div>
    <div>
        <label>Description</label><br>
        <input type="text" name="description" placeholder="description" required value="{{$products->description}}"><br>
    </div>
    <div>
        <label>Price</label><br>
        <input type="text" name="price" placeholder="price" required value="{{$products->price}}"><br>
    </div>
    <input type="submit">

</form>
