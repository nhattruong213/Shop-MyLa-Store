@extends('dashboard.layout.admin_layout')
@section('body')
    <!-- //market-->
		<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-usd"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Doanh thu</h4>
						<h3>1,500</h3>
						<p>Tổng doanh thu MylaStore</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</div>
					<div class="col-md-8 market-update-left">
						<h4>Đơn hàng</h4>
						<h3>1,500</h3>
						<p>Tổng đơn đặt hàng</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
            <div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<h4>Người dùng</h4>
						<h3>1,250</h3>
						<p>Số người đăng kí</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
            <div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-eye"> </i>
					</div>
					 <div class="col-md-8 market-update-left">
					 <h4>Tiếp cân</h4>
					<h3>13,500</h3>
					<p>Số người tiếp cận được</p>
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>	
		<!-- //market-->
@endsection