@extends('layouts.warehouse')

@section('section-warehouse')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <div class="card-header border-bottom">
        <h5 class="card-title mb-3">List Products</h5>
      </div>
      <div class="card-datatable table-responsive">
        <table class="table border-top" id="listWarehouseProductsTable" data-id="{{ $warehouse->id }}">
          <thead>
            <tr>
              <th></th>
              <th class="text-center">No</th>
              <th class="text-center">Product</th>
              <th class="text-center">Actual Stock</th>
              <th class="text-center">Sale Price</th>
              <th class="text-center">Weight</th>
              <th class="text-center">Dimension</th>
              <th class="text-center">Expired Date</th>
              <th class="text-center">Status</th>
              <th class="text-center">Availability Status</th>
              <th class="text-center">Registered At</th>
              <th class="text-center">Last Update</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
        </table>
      </div>

    </div>
</div>
@endsection