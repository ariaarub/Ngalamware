<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>Cart</title>

	@include('ext.link')

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	@include('header')
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Ngalamware</p>
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
								@forelse($carts as $shopping)
								<tr class="table-body-row">
									<td class="product-remove"><a href="remove-from-cart/{{$shopping->id}}"><i class="far fa-window-close"></i></a></td>
									<td class="product-image"><img src="{{ asset('img/for db/'.$shopping->filepath) }}" alt=""></td>
									<td class="product-name">{{$shopping->name}}</td>
									<td class="product-price">{{$shopping->price}}</td>
									<td class="product-total">{{$shopping->amount}}</td>
									@empty
									<p>empty</p>
								</tr>
								@endforelse
								
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>{{$sum}}</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="{{route('checkout')}}" class="boxed-btn black">Check Out</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->

	

	@include('footer')
	
	@include('ext.scripts')

</body>
</html>