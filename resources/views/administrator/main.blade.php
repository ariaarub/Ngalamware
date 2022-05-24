
@forelse ($products as $prod)
    <form action="product/modify" method="post">
    <li>{{ $prod->name }}</li><br>
    <li>{{ $prod->description }}</li><br>
    <li>{{ $prod->price }}</li><br>
    <img src="{{ asset('img/for db/'.$prod->filepath) }}" height="400" width="300">
    <li><a href="products/delete/{{$prod->id}}">Delete product</a></li>
    <li><a href="products/edit/{{$prod->id}}">Edit product</a></li>
    </form>
    </div>
@empty
    <p>It's empty</p>
@endforelse
<a href="{{ route('product.add') }}" method="post">Add</a>
