<form method="POST" action="">
    @csrf

    <div>
        <label>Name</label><br>
        <input type="text" name="name" placeholder="product name" required><br>
    </div>
    <div>
        <label >Description</label><br>
        <input type="text" name="description" placeholder="description" required><br>
    </div>
    <div>
        <label>Price</label><br>
        <input type="text name="price" placeholder="price" required><br>
    </div>
    <div>
        <label>Picture</label><br>
        <input type="file" name="pictures" placeholder="pictures" accept="image/*" required><br>
    </div>
    <input type="submit">

</form>