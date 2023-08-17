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
         <h2 class="text-center"><i class="fa fa-th-list"></i>  Item List</h2>
      </div>
   </div>

   <div class="success"></div>

   <!--Start Add Item modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Add Item</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('item.store') }}" method="post" class="form-horizontal itemValidation" id="itemAddForm" name="itemAddForm">
               @csrf
               <div class="modal-body">
                 <?php
                    $brands = App\Models\Brand::orderBy('id','DESC')->get();
                  ?>
                  <div class="mb-3 mt-4">
                     <label class="control-label col-md-3"> Brand <strong style="color:red">*</strong></label>
                     <select style="text-align: center" class="form-control" aria-invalid="false" id="brand_id" name="brand_id">
                        <option value="">----select Brand ----</option>
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    <div class="form-control-feedback" id="brandMessage"></div>
                  </div>

                  <?php
                    $models = App\Models\Models::orderBy('id','DESC')->get();
                  ?>
                  <div class="mb-3 mt-4">
                     <label class="control-label col-md-3"> Model <strong style="color:red">*</strong></label>
                     <select style="text-align: center" class="form-control" aria-invalid="false" id="model_id" name="model_id">
                        <option value="">----select Model ----</option>
                        @foreach($models as $model)
                        <option value="{{ $model->id }}">{{ $model->name }}</option>
                        @endforeach
                    </select>
                    <div class="form-control-feedback" id="modelMessage"></div>
                  </div>

                  <div class="mb-3 mt-4">
                     <label for="exampleInputEmail1" class="form-label">Item Name<strong style="color:red">*</strong></label>
                     <input type="text" name="name" id="name" class="form-control">
                     <div class="form-control-feedback" id="itemMessage"></div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Add</button>
               </div>
            </form>
         </div>
      </div>
   </div>
   <!--End Add Item modal -->

   <!--Start record of data -->
   <table class="table" border="1px solid black">
      <thead>
         <tr>
            <th scope="col">SL</th>
            <th scope="col">Item</th>
            <th scope="col">Model Name</th>
            <th scope="col">Brand Name</th>
            <th scope="col">Entry Date</th>
            <th scope="col">Action</th>
         </tr>
      </thead>
      <tbody>
         <?php $count = 1; ?>
         @foreach($items as $item)
            <tr>
               <th scope="row">{{ $count++ }}</th>
               <td>{{ $item->name }}</td>
               <td>{{ $item->modelName }}</td>
               <td>{{ $item->brandName }}</td>
               <td>{{ $item->entry_date->format('M j, Y') }}</td>
               
                <td></td>
               <td>
                  <div class="btn-group">
                     <a class="edit" title="Edit" data-brandname="{{ $item->name }}" data-bs-toggle="modal" data-bs-target="#edititem{{$item->model_id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                     </a>&nbsp;&nbsp;&nbsp;
                     <a href="{{ url('item/destroy',$item->id) }}" onclick="return is_delete('Are You sure to delete the selected item?');"><i class="fa fa-trash-o"></i></a>
                  </div>
               </td>
            </tr>
            <!-- Start Edit Brand modal -->
            <div class="modal fade" id="edititem{{$item->model_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Item</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <form action="{{ route('update.item') }}" method="post" class="form-horizontal brandEditValidation" id="editForm" name="itemEditForm">
                        @csrf
                        <input type="hidden" name="eitem_id" value="{{$item->id}}">
                        <div class="modal-body">
                            <!-- brand -->
                            <div class="mb-3 mt-4">
                                <label class="control-label col-md-3"> Brand <strong style="color:red">*</strong></label>
                                <select style="text-align: center" class="form-control" aria-invalid="false" id="brand_id" name="brand_id">
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" {{$brand->id == $item->brand_id ? 'selected' : ''}}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                <div class="form-control-feedback" id="brandMessage"></div>
                            </div>
                            <!-- end brand -->
                            <!-- Model -->
                            <div class="mb-3 mt-4">
                                <label class="control-label col-md-3"> Model <strong style="color:red">*</strong></label>
                                <select style="text-align: center" class="form-control" aria-invalid="false" id="model_id" name="model_id">
                                    @foreach($models as $model)
                                        <option value="{{ $model->id }}" {{ $model->id == $item->model_id ? 'selected' : ''}}>{{ $model->name }}</option>
                                    @endforeach
                                </select>
                                <div class="form-control-feedback" id="modelMessage"></div>
                            </div>
                            <div class="mb-3 mt-4">
                                <label for="exampleInputEmail1" class="form-label">Item Name<strong style="color:red">*</strong></label>
                                <input type="text" name="name" id="name" class="form-control" value="{{$item->name}}">
                                <div class="form-control-feedback" id="itemMessage"></div>
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
   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
   Add Item
   </button>
   <!--End record of data -->

</main>
@endsection
