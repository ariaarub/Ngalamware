
@forelse ($products as $prod)
    <form action="product/modify" method="post">
    <li>{{ $prod->name }}</li><br>
    <li>{{ $prod->description }}</li><br>
    <li>{{ $prod->price }}</li><br>
    <img src="data:image/png;base64,{{ chunk_split(base64_encode($prod->picture)) }}" height="100" width="100">
    <li><a href="product/delete/{{$prod->id}}">Delete product</a></li>
    <li><a href="product/edit/{{$prod->id}}">Edit product</a></li>
    </form>
    </div>
@empty
    <p>It's empty</p>
@endforelse
<a href="{{ route('product.add') }}" method="post">Add</a>
