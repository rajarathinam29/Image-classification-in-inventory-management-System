				<!--aside open-->
				<aside class="app-sidebar">
					<div class="app-sidebar__logo">
						<a class="header-brand" href="<?php echo e(route('adminDashboard')); ?>">
							<img src="<?php echo e(asset('assets/images/brand/foodcitylogo.png')); ?>" class="header-brand-img desktop-lgo" alt="Azea logo">
							<img src="<?php echo e(asset('assets/images/brand/foodcitylogo.png')); ?>" class="header-brand-img dark-logo" alt="Azea logo">
							<img src="<?php echo e(asset('assets/images/brand/foodcitylogo.png')); ?>" class="header-brand-img mobile-logo" alt="Azea logo">
							<img src="<?php echo e(asset('assets/images/brand/foodcitylogo.png')); ?>" class="header-brand-img darkmobile-logo" alt="Azea logo">
						</a>
					</div>
					<ul class="side-menu app-sidebar3" id="appSidebar">
						<li class="side-item side-item-category">Main</li>
						<li class="slide">
							<a class="side-menu__item"  href="<?php echo e(route('adminDashboard')); ?>">
								<svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm7 7v-5h4v5h-4zm2-15.586 6 6V15l.001 5H16v-5c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H6v-9.586l6-6z"/></svg>
							<span class="side-menu__label">Dashboard</span></a>
						</li>
						<li class="slide">
							<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="side-menu__icon bi bi-boxes" viewBox="0 0 16 16">
								<path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434zM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567zM7.5 9.933l-2.75 1.571v3.134l2.75-1.571zm1 3.134 2.75 1.571v-3.134L8.5 9.933zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567zm2.242-2.433V3.504L8.5 5.076V8.21zM7.5 8.21V5.076L4.75 3.504v3.134zM5.258 2.643 8 4.21l2.742-1.567L8 1.076zM15 9.933l-2.75 1.571v3.134L15 13.067zM3.75 14.638v-3.134L1 9.933v3.134z"/>
								</svg>
								<span class="side-menu__label">Products</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="slide-menu">
								<li class="liproductsView"><a href="<?php echo e(route('products')); ?>" class="slide-item "> Product List</a></li>
								<li class="liproductsView"><a href="<?php echo e(route('products.imagesearch')); ?>" class="slide-item "> Search Image</a></li>
								<li class="liproductsView"><a href="<?php echo e(route('productcategories')); ?>" class="slide-item "> Categories</a></li>
								<li class="liproductsView"><a href="<?php echo e(route('productcompanies')); ?>" class="slide-item "> Manufactures</a></li>
								<li class="liproductsView"><a href="<?php echo e(route('productbrands')); ?>" class="slide-item "> Brands</a></li>
							</ul>
						</li>
						<li class="slide">
							<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="side-menu__icon bi bi-people" viewBox="0 0 16 16">
								<path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
								</svg>
								<span class="side-menu__label">Suppliers</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="slide-menu">
								<li class="lisuppliersView"><a href="<?php echo e(route('suppliers')); ?>" class="slide-item"> Supplier List</a></li>
							</ul>
						</li>
						<li class="slide">
							<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
								<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M5 22h14c1.103 0 2-.897 2-2V9a1 1 0 0 0-1-1h-3V7c0-2.757-2.243-5-5-5S7 4.243 7 7v1H4a1 1 0 0 0-1 1v11c0 1.103.897 2 2 2zM9 7c0-1.654 1.346-3 3-3s3 1.346 3 3v1H9V7zm-4 3h2v2h2v-2h6v2h2v-2h2l.002 10H5V10z"></path></svg>
								
								<span class="side-menu__label ">Purchases</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="slide-menu">
								<li class="lipurchasesView"><a href="<?php echo e(route('purchases')); ?>" class="slide-item"> Purchase List</a></li>
								<li class="lipurchasesView"><a href="<?php echo e(route('purchases.purchaseOrder')); ?>" class="slide-item"> Purchase Order</a></li>
								<li class="lipurchase_paymentView"><a href="<?php echo e(route('purchases.purchasepayments')); ?>" class="slide-item"> Purchase Payments</a></li>
								<li class="lipurchase_paymentWrite"><a href="<?php echo e(route('payorder.create')); ?>" class="slide-item"> Pay order</a></li>
								<li class="lipurchase_returnView"><a href="<?php echo e(route('purchaseReturn')); ?>" class="slide-item"> Purchase Return</a></li>
							</ul>
						</li>
						<li class="slide">
							<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="side-menu__icon bi bi-people" viewBox="0 0 16 16">
								<path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
								</svg>
								<span class="side-menu__label">Customers</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="slide-menu">
								<li class="licustomersView"><a href="<?php echo e(route('customers')); ?>" class="slide-item"> Customer List</a></li>
							</ul>
						</li>
						
						<li class="slide">
							<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="side-menu__icon bi bi-cart2" viewBox="0 0 16 16">
								<path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l1.25 5h8.22l1.25-5zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
								</svg>
								<span class="side-menu__label">Sales</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="slide-menu">
								<li class="lisalesWrite"><a href="<?php echo e(route('sales.create')); ?>" class="slide-item"> New Sales</a></li>
								<li class="lisalesView"><a href="<?php echo e(route('sales')); ?>" class="slide-item"> Sales List</a></li>
								<li class="lisalesView"><a href="<?php echo e(route('sales.returns')); ?>" class="slide-item"> Returns</a></li>
								<li class="lisales_paymentView"><a href="<?php echo e(route('sales.salespayments')); ?>" class="slide-item"> Sales Payments</a></li>
								<li class="lisales_paymentWrite"><a href="<?php echo e(route('collectcredit.create')); ?>" class="slide-item"> Collect Credit</a></li>
							</ul>
						</li>
						<li class="slide">
							<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
								<svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm11 4h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zm-1 6h-4v-4h4v4zM17 3c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2zM7 13c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z"/></svg>
							<span class="side-menu__label">Stocks</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="slide-menu">
								<li class="listockView"><a href="<?php echo e(route('stock')); ?>" class="slide-item"> Stock</a></li>
								<li class="listock_transferView"><a href="<?php echo e(route('stockTransfer')); ?>" class="slide-item"> Stock Transfers</a></li>
								<li class="listock_countView"><a href="<?php echo e(route('stockcount')); ?>" class="slide-item"> Stock Count</a></li>
							</ul>
						</li>
						<li class="slide">
							<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="side-menu__icon bi bi-currency-pound" viewBox="0 0 16 16">
								<path d="M4 8.585h1.969c.115.465.186.939.186 1.43 0 1.385-.736 2.496-2.075 2.771V14H12v-1.24H6.492v-.129c.825-.525 1.135-1.446 1.135-2.694 0-.465-.07-.913-.168-1.352h3.29v-.972H7.22c-.186-.723-.372-1.455-.372-2.247 0-1.274 1.047-2.066 2.58-2.066a5.3 5.3 0 0 1 2.103.465V2.456A5.6 5.6 0 0 0 9.348 2C6.865 2 5.322 3.291 5.322 5.366c0 .775.195 1.515.399 2.247H4z"/>
								</svg>
							<span class="side-menu__label">Expenses</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="slide-menu">
								<li class="liexpensesView"><a href="<?php echo e(route('expenses')); ?>" class="slide-item"> Expenses List</a></li>
							</ul>
						</li>
						<li class="slide">
							<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="side-menu__icon bi bi-currency-pound" viewBox="0 0 16 16">
								<path d="M4 8.585h1.969c.115.465.186.939.186 1.43 0 1.385-.736 2.496-2.075 2.771V14H12v-1.24H6.492v-.129c.825-.525 1.135-1.446 1.135-2.694 0-.465-.07-.913-.168-1.352h3.29v-.972H7.22c-.186-.723-.372-1.455-.372-2.247 0-1.274 1.047-2.066 2.58-2.066a5.3 5.3 0 0 1 2.103.465V2.456A5.6 5.6 0 0 0 9.348 2C6.865 2 5.322 3.291 5.322 5.366c0 .775.195 1.515.399 2.247H4z"/>
								</svg>
							<span class="side-menu__label">Revenues</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="slide-menu">
								<li class="lirevenuesView"><a href="<?php echo e(route('revenues')); ?>" class="slide-item"> Revenue List</a></li>
							</ul>
						</li>
						<li class="slide">
							<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="side-menu__icon bi bi-ticket-detailed" viewBox="0 0 16 16">
								<path d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5M5 7a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2z"/>
								<path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6zM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5z"/>
								</svg>
								<span class="side-menu__label">Vouchers</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="slide-menu">
								<li class="livouchersWrite"><a href="<?php echo e(route('vouchers.sale')); ?>" class="slide-item"> Voucher Sale</a></li>
								<li class="livouchersView"><a href="<?php echo e(route('vouchers.saleslists')); ?>" class="slide-item"> Voucher Sales List</a></li>
								<li class="livouchersView"><a href="<?php echo e(route('vouchers')); ?>" class="slide-item"> Gift Vouchers</a></li>
							</ul>
						</li>
						<li class="slide">
							<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="side-menu__icon bi bi-credit-card-2-front" viewBox="0 0 16 16">
								<path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z"/>
								<path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5"/>
								</svg>
								<span class="side-menu__label">Cheques</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="slide-menu">
								<li class="lichequesView"><a href="<?php echo e(route('chequeissued')); ?>" class="slide-item"> Cheque Issued</a></li>
								<li class="lichequesView"><a href="<?php echo e(route('chequereceived')); ?>" class="slide-item"> Cheque Received</a></li>
							</ul>
						</li>
						<li class="slide">
							<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
								<svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24"><path d="M20 7h-4V4c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H4c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9c0-1.103-.897-2-2-2zM4 11h4v8H4v-8zm6-1V4h4v15h-4v-9zm10 9h-4V9h4v10z"></path></svg>
								<span class="side-menu__label">Reports</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="slide-menu">
								<li class="lireportsStockReport"><a href="<?php echo e(route('reports.stockReport')); ?>" class="slide-item"> Stock Report</a></li>
								<li class="lireportsFrequentlySales"><a href="<?php echo e(route('reports.frequentlysales-report')); ?>" class="slide-item"> Frequently Sales Report</a></li>
								<li class="lireportsFrequentlyPurchase"><a href="<?php echo e(route('reports.frequentlypurchase-report')); ?>" class="slide-item"> Frequently Purchase Report</a></li>
								<li class="lireportsSalesSummaryReport"><a href="<?php echo e(route('reports.salessummary-report')); ?>" class="slide-item"> Sales Summary Report</a></li>
								<li class="lireportsSalesSummaryReport"><a href="<?php echo e(route('reports.profit-report')); ?>" class="slide-item"> Profit Report</a></li>
							</ul>
						</li>
						
						<li class="slide">
							<a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="side-menu__icon bi bi-activity" viewBox="0 0 16 16">
								<path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2"/>
								</svg>
								<span class="side-menu__label">Logs</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="slide-menu">
								<li class="lilogsView"><a href="<?php echo e(route('logs')); ?>" class="slide-item">Logs</a></li> 
							</ul>
						</li>
						
					</ul>
				</aside>
				<!--aside closed--><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/layouts/vertical/app-sidebar.blade.php ENDPATH**/ ?>