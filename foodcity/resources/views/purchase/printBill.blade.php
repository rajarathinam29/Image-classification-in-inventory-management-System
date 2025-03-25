<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="Azea – Laravel Admin & Dashboard Template" name="description">
		<meta content="Spruko Private Limited" name="author">
		<meta name="keywords" content="laravel ui admin template, laravel admin template, laravel dashboard template,laravel ui template, laravel ui, livewire, laravel, laravel admin panel, laravel admin panel template, laravel blade, laravel bootstrap5, bootstrap admin template, admin, dashboard, admin template">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<!-- Title -->
		<title>{{$title}} Daily Food city</title>

        @include('layouts.horizontal.styles')

    </head>

	<body class="app">

		<!-- Page -->
		<div class="page">
			<div class="page-main">

                <!-- App-Content -->
				<div class="hor-content main-content">
                    <div class="container">
                        <!-- Row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card overflow-hidden">
                                    <div class="card-body">
                                        <h2 class="font-weight-bold text-primary">INV#{{$purchase->id}}</h2>
                                        <div class="">
                                            <h5 class="mb-1" >{{$purchase->date}}</h5>
                                            <h6 class="mb-1" >{{$purchase->invoice_no}}</h6>
                                        </div>

                                        <!-- <div class="card-body ps-0 pe-0">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <span>Payment No.</span><br>
                                                    <strong>INV23456-234</strong>
                                                </div>
                                                <div class="col-sm-6 text-end">
                                                    <span>Payment Date</span><br>
                                                    <strong>July 10, 2021 - 12:20 pm</strong>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="dropdown-divider"></div>
                                        <div class="row pt-4">
                                            <div class="col-6 ">
                                                <p class="h5 font-weight-bold">Bill From</p>
                                                <address id="billFrom">
                                                    {{$purchase->suppliers->company_name}}<br>
                                                    @if($purchase->suppliers->building_no || $purchase->suppliers->street)
                                                    {{$purchase->suppliers->building_no}}, {{$purchase->suppliers->street}}<br>
                                                    @endif
                                                    @if($purchase->suppliers->state || $purchase->suppliers->city)
                                                    {{$purchase->suppliers->state}}, {{$purchase->suppliers->city}}<br>
                                                    @endif
                                                    {{$purchase->suppliers->country}}, {{$purchase->suppliers->zipcode}}<br>
                                                    {{$purchase->suppliers->email}}, {{$purchase->suppliers->phone_no}}
                                                </address>
                                            </div>
                                            <div class="col-6 text-end">
                                                <p class="h5 font-weight-bold">Bill To</p>
                                                <address id="billTo">
                                                    {{$purchase->company->name}} - {{$purchase->branch->branch_name}}<br>
                                                    {{$purchase->branch->building_no}}, {{$purchase->branch->street}}<br>
                                                    {{$purchase->branch->state}}, {{$purchase->branch->city}}<br>
                                                    {{$purchase->branch->country}}, {{$purchase->branch->zipcode}}<br>
                                                    {{$purchase->branch->email}}, {{$purchase->branch->phone_no}}
                                                </address>
                                            </div>
                                        </div>
                                        <div class="table-responsive push">
                                            <table class="table table-bordered table-hover text-nowrap">
                                                <tbody>
                                                    <tr class=" ">
                                                        <th class="text-center " style="width: 1%"></th>
                                                        <th style="width: 15%">Product</th>
                                                        <th class="text-center" >Units</th>
                                                        <th class="text-center" >Free</th>
                                                        <th class="text-center" >Expiry</th>
                                                        <th class="text-end" >Pur. Price</th>
                                                        <th class="text-end" >Dis. price</th>
                                                        <th class="text-end" >Mrp</th>
                                                        <th class="text-end" >Mrp_c</th>
                                                        <th class="text-end" >Total</th>
                                                    </tr>
                                                </tbody>
                                                @php
                                                    $sub_total = 0;
                                                    $no = 0
                                                @endphp
                                                <tbody id="productContent">
                                                @forelse ($products as $product)
                                                    @php
                                                        $sub_total += $product->cost_price*$product->units;
                                                    @endphp
                                                    <tr>
                                                        <td class="text-center">{{$no += 1}}</td>
                                                        <td>
                                                            <p class="font-weight-semibold mb-1">
                                                                {{$product->product->product_name}}
                                                            </p>
                                                    
                                                            <div class="text-muted product_name">{{$product->product->bar_code}}</div>
                                                        </td>
                                                        <td class="text-center">{{$product->units}}</td>
                                                        <td class="text-center">{{$product->free}}</td>
                                                        <td class="text-center">{{$product->expiry_date}}</td>
                                                        <td class="text-end">{{$product->cost_price}}</td>
                                                        <td class="text-end">{{$product->sale_price}}</td>
                                                        <td class="text-end">{{$product->mrp}}</td>
                                                        <td class="text-end">{{$product->mrp_c}}</td>
                                                        <td class="text-end">{{$product->total}}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="10" class="font-weight-semibold text-end">No Products Available</td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                                @php
                                                $net_total = $sub_total - $purchase->discount + $purchase->cost;
                                                @endphp
                                                <tfoot>
                                                    <tr>
                                                        <td colspan="9" class="font-weight-semibold text-end">Subtotal</td>
                                                        <td class="text-end" >{{number_format((float)$sub_total, 2, '.', '')}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="9" class="font-weight-semibold text-end">Discount</td>
                                                        <td class="text-end" >{{$purchase->discount}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="9" class="font-weight-semibold text-end">Cost</td>
                                                        <td class="text-end" >{{$purchase->cost}}</td>
                                                    </tr>
                                                    <tr class="text-danger">
                                                        <td colspan="9" class="font-weight-bold text-uppercase text-end h4 mb-0">Total Due</td>
                                                        <td class="font-weight-bold text-end h4 mb-0" id="purchaseTotal">{{number_format((float)$net_total, 2, '.', '')}}</td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <p class="text-muted text-center">Thank you very much for doing business with us. We look forward to working with you again!</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-- End row-->

                    </div>
                </div>
            </div>

        </div>
    </body>
</html>
