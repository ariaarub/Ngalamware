
@forelse ($products as $prod)
    <div>
    <li> {{ $prod->name }}</li><br>
    <li>{{ $prod->description }}</li><br>
    <li>{{ $prod->price }}</li><br>
    <li><a href="data:image/png;base64, {{ chunk_split(base64_encode($prod->image)) }}"></a></li>
    <li><a href="">Remove product</a></li>
    <li><a href="">Add product</a></li>

    </div>
@empty
    <p>It's empty</p>
@endforelse
<a href="">Add</a>
