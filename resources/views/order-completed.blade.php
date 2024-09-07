@extends("Layout.Layout")
@section("Content")
<x-Breadcrumb :items="['Home', 'Order Complated']" />

		<!-- order complete Page Start -->
		<section class="order-complete inner-page-sec-padding-bottom">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="order-complete-message text-center">
							<h1>Thank you !</h1>
							<p>Your order has been received.</p>
						</div>
						<ul class="order-details-list">
							<li>Order Number: <strong>3053</strong></li>
							<li>Date: <strong>January 24, 2019</strong></li>
							<li>Total: <strong>$117.00</strong></li>
							<li>Payment Method: <strong>Cash on Delivery</strong></li>
						</ul>
						<p>Pay with cash upon delivery.</p>
						<h3 class="order-table-title">Order Details</h3>
						<div class="table-responsive">
							<table class="table order-details-table">
								<thead>
									<tr>
										<th>Product</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><a href="https://htmldemo.net/pustok/pustok/single-product">Vans Off The Wall T-Shirt In</a> <strong>× 1</strong></td>
										<td><span>$59.00</span></td>
									</tr>
									<tr>
										<td><a href="https://htmldemo.net/pustok/pustok/single-product">Supreme Being Icon Glitch T-Shirt</a> <strong>× 1</strong></td>
										<td><span>$58.00</span></td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<th>Subtotal:</th>
										<td><span>$117.00</span></td>
									</tr>
									<tr>
										<th>Payment Method:</th>
										<td>Cash on Delivery</td>
									</tr>
									<tr>
										<th>Total:</th>
										<td><span>$117.00</span></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- order complete Page End -->
@endsection