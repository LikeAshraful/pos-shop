@extends('backend.layouts.master')
@push('styles')
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
    <div class="content-wrapper" style="min-height: 1244.06px;">
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-md-center">

                    <div class="col-lg-12">
                        <div class="card card-info mt-2">
                            <div class="card-header">
                                <h3 class="card-title">{{ $title }}</h3>
                            </div>

                            <div class="card-body">

                                <div class="form-row">

                                    <div class="form-group col-md-2">
                                        <label>Date</label>

                                        <div class="input-group">
                                            <input class="form-control form-control-sm" name="date" id="date"
                                                   placeholder="MM-DD-YY"/>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Invoice No</label>

                                        <div class="input-group">
                                            <input class="form-control form-control-sm" name="invoice_no" id="invoice_no"
                                                   placeholder="Enter invoice no" readonly style="background-color: #d4edda"/>

                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <div class="form-group col-md-3">
                                    @if($brands->count() < 1)
                                        <!-- Button trigger modal -->
                                            <a type="button" class="btn btn-outline-info mt-md-4" style="margin-top: 30px !important;" data-toggle="modal" data-target="#addBrandModal">Add Brand <i class="fa fa-plus" aria-hidden="true"></i>
                                            </a>

                                        @else
                                            <label for="cuntry">Select Brand</label>
                                            <select class="form-control select2 form-control-sm" id="brand_id" name="brand_id">
                                                <option>Select brand</option>
                                                @foreach($brands as $data_row)
                                                    <option value="{{ $data_row->id}}">{{ $data_row->name }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-2">

                                        <label for="category_id">Select Category</label>
                                        <select class="form-control select2 form-control-sm" id="category_id" name="category_id">
                                            <option value="">Select Category</option>
                                        </select>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="sub_category_id">Subcategory</label>
                                        <select class="form-control select2 form-control-sm" id="sub_category_id" name="sub_category_id">
                                            <option value="">Select Subcategory</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="cuntry">Product name</label>
                                        <select class="form-control select2 form-control-sm" id="product_id" name="product_id">
                                            <option>Product name</option>
                                        </select>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="cuntry">Unit</label>
                                        <select class=" select2 form-control form-control-sm" id="unit_id" name="unit_id">
                                            <option>Select Unit</option>
                                            @foreach($units as $unit)
                                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="cuntry">Description</label>
                                        <input class="form-control" id="description" name="description" placeholder="Enter description">

                                    </div>

                                    <div class="form-group">
                                        <a class="btn btn-info text-white addEventMore btn-sm" style="margin-top: 30px !important;">
                                            <i class="fas fa-plus-circle">&nbsp;</i> Add More</a>

                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <hr style="background-color: #123455;">
                                <h3 class="card-title mb-2 text-bold">Purchase List</h3>
                                <form action="{{ route('admin.purchase.store') }}" method="post">
                                    @csrf
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>@lang('form.th_product_category')</th>
                                            <th>@lang('form.th_product_sub_category')</th>
                                            <th>@lang('form.th_title')</th>
                                            <th width="10%">Quantity</th>
                                            <th width="10%">Price</th>
                                            <th>Unit</th>
                                            <th>Description</th>
                                            <th width="15%">Total</th>
                                            <th width="3%" class="text-right">Action</th>

                                        </tr>
                                        </thead>

                                        <tbody id="addRow" class="addRow">

                                        </tbody>


                                        <tbody>
                                        <tr>
                                            <td colspan="7" class="text-bold text-dark">Line Total</td>

                                            <td  colspan="1" class="text-white text-bold text-center">
                                                <input id="estimated_amount" type="text" class="form-control text-right estimated_amount" readonly>
                                            </td>
                                            <td>&nbsp;</td>


                                        </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="form-group">
                                        <button type="submit" id="storeButton"  class="btn btn-info btn-sm text-white">Purchase Store</button>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
        </section>


    </div>

    <!-- Category Modal-->
    <div class="modal fade" id="addCatgModal" tabindex="-1" role="dialog" aria-labelledby="addCatgModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open([ 'route' => ['admin.category.store'], 'id' => 'prdForm','method' => 'post']) !!}
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">@lang('form.name')<span class="text-danger">*</span></label>
                            {!! Form::text('name', null, [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter category name']) !!}
                            {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                        </div>

                        <div class="form-group">
                            <label for="code">@lang('form.code')<span class="text-danger">*</span></label>
                            {!! Form::text('code', null, [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter category code']) !!}
                            {!! $errors->first('code', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                        <div class="form-group">
                            <label for="status">@lang('form.status')</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active">Select status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>

                            </select>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <a href="{{ route('admin.category.view') }}" class="btn btn-danger"><i class="fas fa-undo"></i></a>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

    <!-- Supplier Modal-->
    <div class="modal fade" id="addSupplierModal" tabindex="-1" role="dialog" aria-labelledby="addSupplierModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open([ 'route' => ['admin.supplier.store'], 'id' => 'prdForm','method' => 'post']) !!}
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">@lang('form.name')<span class="text-danger">*</span></label>
                            <input class="form-control" name="name" placeholder="Enter supplier name"/>
                            {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                        </div>

                        <div class="form-group">
                            <label for="email">@lang('form.email')<span class="text-danger">*</span></label>
                            <input class="form-control" name="email" placeholder="Enter supplier email"/>
                            {!! $errors->first('email', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                        <div class="form-group">
                            <label for="mobile_no">@lang('form.mobile_no')<span
                                    class="text-danger">*</span></label>

                            <input class="form-control" name="mobile_no"
                                   placeholder="Enter supplier mobile no"/>
                            {!! $errors->first('mobile_no', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                        <div class="form-group">
                            <label for="address">@lang('form.address')<span class="text-danger">*</span></label>
                            <input class="form-control" name="address" placeholder="Enter supplier address"/>
                            {!! $errors->first('address', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option>Select status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>

                            </select>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">@lang('form.btn_save')</button>
                        <a href="{{ route('admin.suppliers.view') }}" class="btn btn-danger"><i class="fas fa-undo"></i></a>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
    <!-- Brand Modal-->
    <div class="modal fade" id="addBrandModal" tabindex="-1" role="dialog" aria-labelledby="addBrandModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open([ 'route' => ['admin.brand.store'], 'name'=>'brandForm' , 'id' => 'brandForm', 'method' => 'post']) !!}

                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">@lang('form.name')<span class="text-danger">*</span></label>

                            <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}"
                                   name="name" id="name" placeholder="Enter brand name"/>

                            @if ($errors->has('name'))
                                <div class="error">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="code">@lang('form.code')<span class="text-danger">*</span></label>

                            <input class="form-control" name="code" placeholder="Enter brand code"/>

                            {!! $errors->first('code', '<label class="help-block text-danger">:message</label>') !!}
                        </div>
                        <div class="form-group">
                            <label>@lang('form.body')</label>
                            <textarea name="description" class="form-control" rows="3"
                                      placeholder="Enter short desc...."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="is_active">Status</label>
                            <select class="form-control" name="status">
                                <option>Select Option</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>


                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">@lang('form.btn_save')</button>
                        <a href="{{ route('admin.brand.view') }}" class="btn btn-danger"><i class="fas fa-undo"></i></a>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="addUnitModal" tabindex="-1" role="dialog" aria-labelledby="addUnitModal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product Unit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open([ 'route' => ['admin.units.store'], 'id' => 'customerForm','method' => 'post']) !!}
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">@lang('form.name')<span class="text-danger">*</span></label>
                            {!! Form::text('name', null, [ 'class' => 'form-control', 'data-validation-required-message' => 'This field is required', 'placeholder' => 'Enter category name']) !!}
                            {!! $errors->first('name', '<label class="help-block text-danger">:message</label>') !!}
                        </div>

                        <div class="form-group">
                            <label for="status">@lang('form.brand')</label>
                            <select class="form-control" id="brand_id" name="brand_id">

                                <option>Select brand</option>
                                @foreach ($brands as $key => $brand_data)
                                    <option value="{{ $brand_data->id }}">{{ $brand_data->name }}</option>
                                @endforeach


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="status">@lang('form.status')</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active">Select status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>

                            </select>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <a href="{{ route('admin.units.view') }}" class="btn btn-danger"><i class="fas fa-undo"></i></a>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>


@endsection
@push('scripts')
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

    <script id="document-template" type="text/x-handlebars-template">

        <tr class="delete_add_more_item" id="delete_add_more_item">

            <input type="hidden" name="date[]" value="@{{ date }}">

            <input type="hidden" name="purchase_no[]" value="@{{ purchase_no }}">

            <input type="hidden" name="brand_id[]" value="@{{ brand_id }}">

            <input type="hidden" name="supplier_id[]" value="@{{ supplier_id }}">


            <td>
                <input type="hidden" name="category_id[]" value="@{{ category_id }}">@{{ category_name }}
            </td>

            <td>
                <input type="hidden" name="sub_category_id[]" value="@{{ sub_category_id }}">@{{ sub_category_name }}
            </td>

            <td>
                <input type="hidden" name="product_id[]" value="@{{ product_id }}">@{{ product_name }}
            </td>
            <td>
                <input type="number" min="1" class="form-control form-control-sm buying_qty" name="buying_qty[]" value="1">
            </td>
            <td>
                <input type="number" class="form-control form-control-sm unit_price" name="unit_price[]" value="">
            </td>
            <td>
                <input type="hidden" class="form-control form-control-sm unit_id" name="unit_id[]" value="@{{ unit_id }}">@{{ unit_name }}
            </td>
            <td>
                <textarea type="text" class="form-control form-control-sm description" name="description[]">@{{ description }}</textarea>

            </td>
            <td>
                <input type="number" class="form-control form-control-sm text-right buying_price" value="1" name="buying_price[]" readonly>
            </td>
            <td>
                <i class="btn btn-danger btn-sm fa fa-window-close removeEventMore"></i>

            </td>



        </tr>


    </script>
    <script type="text/javascript">
        $(document).on('click', ".addEventMore", function () {

            var date = $('#date').val();
            var purchase_no = $('#purchase_no').val();
            var brand_id            = $('#brand_id').val();
            var brand_name          = $('#brand_id').find('option:selected').text();
            var supplier_id         = $('#supplier_id').val();
            var supplier_name       = $('#supplier_id').find('option:selected').text();
            var category_id           = $('#category_id').val();
            var category_name         = $('#category_id').find('option:selected').text();
            var sub_category_id       = $('#sub_category_id').val();
            var sub_category_name     = $('#sub_category_id').find('option:selected').text();
            var product_id            = $('#product_id').val();
            var product_name          = $('#product_id').find('option:selected').text();
            var unit_id               = $('#unit_id').val();
            var unit_name             = $('#unit_id').find('option:selected').text();
            var buying_qty            = $('#buying_qty').val();
            var unit_price            = $('#unit_price').val();
            var description           = $('#description').val();
            var buying_price          = $('#buying_price').val();

            if (date == '') {
                $.notify("Date is rquired", {globalPosition: 'top-right', className: 'error'});
                return false;
            }
            if (purchase_no == '') {
                $.notify("Purchase is rquired", {globalPosition: 'top-right', className: 'error'});
                return false;
            }
            if (brand_id == '') {
                $.notify("Brand is rquired", {globalPosition: 'top-right', className: 'error'});
                return false;
            }
            if (supplier_id == '') {
                $.notify("Supplier is rquired", {globalPosition: 'top-right', className: 'error'});
                return false;
            }
            if (category_id == '') {
                $.notify("Category is rquired", {globalPosition: 'top-right', className: 'error'});
                return false;
            }
            if (sub_category_id == '') {
                $.notify("Sub category is rquired", {globalPosition: 'top-right', className: 'error'});
                return false;
            }
            if (product_id == '') {
                $.notify("Product is rquired", {globalPosition: 'top-right', className: 'error'});
                return false;
            }
            if (unit_id == '') {
                $.notify("Unit is rquired", {globalPosition: 'top-right', className: 'error'});
                return false;
            }

            if (buying_qty == '') {
                $.notify("Buying Quantity is rquired", {globalPosition: 'top-right', className: 'error'});
                return false;
            }
            if (unit_price == '') {
                $.notify("Unit price is rquired", {globalPosition: 'top-right', className: 'error'});
                return false;
            }

            if (buying_price == '') {
                $.notify("Puying price is rquired", {globalPosition: 'top-right', className: 'error'});
                return false;
            }

            var source = $("#document-template").html();
            var template = Handlebars.compile(source);
            var data = {
                date: date,
                purchase_no: purchase_no,
                brand_id:        brand_id,
                supplier_id:      supplier_id,
                category_id: category_id,
                category_name: category_name,
                sub_category_id: sub_category_id,
                sub_category_name: sub_category_name,
                product_id: product_id,
                product_name: product_name,
                buying_qty: buying_qty,
                unit_price: unit_price,
                unit_id: unit_id,
                unit_name: unit_name,
                buying_price: buying_price,
                description: description
            };
            var html = template(data);
            $("#addRow").append(html);
        });
        $(document).on('click',".removeEventMore", function (event) {
            $(this).closest(".delete_add_more_item").remove();
            totalAmountPrice();
        });

        $(document).on('keyup click', '.unit_price,.buying_qty', function (event) {
            var unit_price  = $(this).closest("tr").find("input.unit_price").val();
            var qty         = $(this).closest("tr").find("input.buying_qty").val();
            var total = unit_price * qty;
            $(this).closest("tr").find("input.buying_price").val(total);
            totalAmountPrice();

        });
        //totalAmountPrice
        function totalAmountPrice(){
            var sum=0;
            $(".buying_price").each(function (){
                var value = $(this).val();
                if(!isNaN(value) && value.length != 0){
                    sum += parseFloat(value);
                }
            })
            $('#estimated_amount').val(sum);
        }

    </script>


    <script type="text/javascript">
        $(function () {
            //Loading category under brand_id selection
            $(document).on('change', '#brand_id', function () {
                $('#sub_category_id').empty()
                $('#sub_category_id').append(`<option value="">Select subcategory</option>`)
                $('#category_id').empty()
                $('#category_id').append(`<option value="">Select category</option>`)

                var my_brand_id = $(this).val();
                $.ajax({
                    url: "{{ route('category-for-invoice') }}",
                    type: "GET",
                    data: {brand_id: my_brand_id},
                    success: function (data) {
                        var html = '<option value="">Select category</option>';

                        $.each(data, function (key, v) {
                            html += '<option value="' + v.category_id + '">' + v.category.name + '</option>'
                        });
                        $('#category_id').html(html);
                    }
                });
            });

            //Loading sub_category_id under category_id selection
            $(document).on('change', '#category_id', function () {
                var my_category_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-sub-category') }}",
                    type: "GET",
                    data: {category_id: my_category_id},
                    success: function (data) {
                        var html = '<option value="">Select subcategory</option>';

                        $.each(data, function (key, v) {
                            html += '<option value="' + v.sub_category_id + '">' + v.product_sub_category.name + '</option>' //prd_category_relation
                        });
                        $('#sub_category_id').html(html);
                    }
                });
            });

            //Loading product under subcategory_id selection
            $(document).on('change', '#sub_category_id', function () {
                var my_sub_category_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-products') }}",
                    type: "GET",
                    data: {sub_category_id: my_sub_category_id},
                    success: function (data) {
                        var html = '<option value="">Select product</option>';

                        $.each(data, function (key, v) {
                            html += '<option value="' + v.id + '">' + v.name + '</option>'
                        });
                        $('#product_id').html(html);
                    }
                });
            });


        });

    </script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#date').datepicker({
                uiLibrary: 'bootstrap4'
            });

        });
    </script>


@endpush
