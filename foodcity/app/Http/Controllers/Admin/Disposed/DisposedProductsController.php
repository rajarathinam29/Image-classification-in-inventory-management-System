<?php

namespace App\Http\Controllers\Admin\Disposed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DisposedProducts;

class DisposedProductsController extends Controller
{
    public function index(){
        return view('admin.disposed.disposed-products-list', ['title'=> 'Disposed Products']);
    }
}
