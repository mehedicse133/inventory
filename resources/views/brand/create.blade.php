@extends('layouts.app') 
@section('title', 'Inventory') 
@section('content')
<main class="app-content">
   <!-- Start Module -->
   <hr>
   <a href="{{ route('brand.create') }}">Brand</a>
   <a href="{{ route('model.create') }}">Model</a>
   <a href="{{ route('item.create') }}">Item</a>
   <hr>
   <!-- End Module -->

   <div class="app-title">
      <div>
         <h2 class="text-center"><i class="fa fa-th-list"></i>  Brand List</h2>
      </div>
   </div>

   <div class="success"></div>

   <!--Start Add Brand modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brand</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('brand.store') }}" method="post" class="form-horizontal brandValidation" id="brandAddForm" name="brandAddForm">
               @csrf
               <div class="modal-body">
                  <div class="mb-3 mt-4">
                     <label for="exampleInputEmail1" class="form-label">Brand Name<strong style="color:red">*</strong></label>
                     <input type="text" name="name" id="name" class="form-control">
                     <div class="form-control-feedback" id="nameMessage"></div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Add</button>
               </div>
            </form>
         </div>
      </div>
   </div>
   <!--End Add Brand modal -->

   <!--Start record of data -->
   <table class="table" border="1px solid black">
      <thead>
         <tr>
            <th scope="col">SL</th>
            <th scope="col">Name</th>
            <th scope="col">Entry Date</th>
            <th scope="col">Action</th>
         </tr>
      </thead>
      <tbody>
         <?php $count = 1; ?>
         @foreach($brands as $brand)
            <tr>
               <th scope="row">{{ $count++ }}</th>
               <td>{{ $brand->name }}</td>
               <td>{{ $brand->entry_date->format('M j, Y') }}</td>
               <td>
                  <div class="btn-group">
                     <a class="edit" title="Edit" data-brandname="{{ $brand->name }}" data-bs-toggle="modal" data-bs-target="#editbrand{{$brand->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                     </a>&nbsp;&nbsp;&nbsp;
                     <a href="{{ url('brand/destroy',$brand->id) }}" onclick="return is_delete('Are You sure to delete the selected brand?');"><i class="fa fa-trash-o"></i></a>
                  </div>
               </td>
            </tr>
            <!-- Start Edit Brand modal -->
            <div class="modal fade" id="editbrand{{$brand->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Brand</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <form action="{{ route('update.brand') }}" method="post" class="form-horizontal brandEditValidation" id="brandEditForm" name="brandEditForm">
                        @csrf
                        <input type="hidden" name="ebrandid" id="ebrandid" value="{{$brand->id}}">
                        <div class="modal-body">
                           <div class="mb-3 mt-4">
                              <label for="exampleInputEmail1" class="form-label">Brand Name<strong style="color:red">*</strong></label>
                              <input type="text" name="editname" id="editname" class="form-control" value="{{$brand->name}}">
                              <div class="form-control-feedback" id="editnameMessage"></div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <!-- End Edit Brand modal -->
         @endforeach
      </tbody>
   </table>
   <!--End record of data -->
   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
   Add Brand
   </button>

</main>
@endsection
