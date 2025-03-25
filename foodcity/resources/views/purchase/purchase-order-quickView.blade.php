
<!-- Row-->
<div class="row">
    <div class="col-md-12">
        <div class="card overflow-hidden">
            <div class="card-body">
                <h2 class="font-weight-bold text-primary">INV#{{$order->id}}</h2>
                <div class="">
                    <h5 class="mb-1" >{{$order->date}}</h5>
                    <h6 class="mb-1" >{{$order->order_id}}</h6>
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
                            {{$order->suppliers->company_name}}<br>
                            @if($order->suppliers->building_no || $order->suppliers->street)
                            {{$order->suppliers->building_no}}, {{$order->suppliers->street}}<br>
                            @endif
                            @if($order->suppliers->state || $order->suppliers->city)
                            {{$order->suppliers->state}}, {{$order->suppliers->city}}<br>
                            @endif
                            {{$order->suppliers->country}}, {{$order->suppliers->zipcode}}<br>
                            {{$order->suppliers->email}}, {{$order->suppliers->phone_no}}
                        </address>
                    </div>
                    <div class="col-6 text-end">
                        <p class="h5 font-weight-bold">Bill To</p>
                        <address id="billTo">
                            {{$order->company->name}} - {{$order->branch->branch_name}}<br>
                            {{$order->branch->building_no}}, {{$order->branch->street}}<br>
                            {{$order->branch->state}}, {{$order->branch->city}}<br>
                            {{$order->branch->country}}, {{$order->branch->zipcode}}<br>
                            {{$order->branch->email}}, {{$order->branch->phone_no}}
                        </address>
                    </div>
                </div>
                <div class="table-responsive push">
                    <table class="table table-bordered table-hover text-nowrap">
                        <tbody>
                            <tr class=" ">
                                <th class="text-center " style="width: 1%"></th>
                                <th >Product</th>
                                <th class="text-center" style="width: 15%">Units</th>
                                
                            </tr>
                        </tbody>
                        @php
                            $sub_total = 0;
                            $no = 0
                        @endphp
                        <tbody id="productContent">
                        @forelse ($products as $product)
                            
                            <tr>
                                <td class="text-center">{{$no += 1}}</td>
                                <td>
                                    <p class="font-weight-semibold mb-1">
                                        {{$product->product->product_name}}
                                    </p>
                            
                                    <div class="text-muted product_name">{{$product->product->bar_code}}</div>
                                </td>
                                <td class="text-center">{{$product->units}}</td>
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="font-weight-semibold text-end">No Products Available</td>
                            </tr>
                        @endforelse
                        </tbody>
                        
                        <tfoot>
                            
                        </tfoot>
                    </table>
                </div>
                <p class="text-muted text-center">Thank you very much for doing business with us. We look forward to working with you again!</p>
            </div>
        </div>
    </div>
    
</div>
<!-- End row-->