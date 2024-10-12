

// route
 Route::post('updateOrderStatus', [OrderController::class, 'updateOrderStatus']);


//controller finction

    public function updateOrderStatus(Request $request)
{
    // Validate the request
    $request->validate([
        'id' => 'required|exists:orders,id',
        'status' => 'required|integer|min:0|max:3',
    ]);

    // Find the order and update its status
    $order = Order::find($request->id);
    $order->status = $request->status;
    $order->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Order status updated successfully!');
}




<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

@extends('backend.layout.app')

    @section ('content')
    <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <h1>Manage Order</h1>
                        </div>
                        <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                            <li class="breadcrumb-item active">Manage Order</li>
                          </ol>
                        </div>
                      </div>
                    </div><!-- /.container-fluid -->
                  </section>

                  <section class="content">
                    <div class="col-md-12">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-header">
                                   <h3 class="card-title">Total Product Order {{$TotalOrder}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                              <table id="example1" class="table table-bordered table-striped">
                                <thead style="background-color:#007bff">
                                <tr class="text-center" style="color:aliceblue">
                                <th>Sr No</th>
                                  <th>Order Id</th>
                                  <th>Price</th>
                                  <th>Quantity</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                            @foreach ( $order as $values )
                                <tr class="text-center">
                                 <td>{{$loop->iteration}}</td>
                                <td>{{ $values->order_id}}</td>
                                <td>{{ $values->pro_price}}</td>
                                <td>{{ $values->pro_quantity}}</td>
                                <td class="text-center">
                                  <form action="updateOrderStatus" method="POST" class="d-inline">
                                      @csrf
                                      <input type="hidden" name="id" value="{{ $values->id }}">
                                      <select name="status" class="form-control" onchange="this.form.submit()">
                                          <option value="0" {{ $values->status == 0 ? 'selected' : '' }}>Pending</option>
                                          <option value="1" {{ $values->status == 1 ? 'selected' : '' }}>Processing</option>
                                          <option value="2" {{ $values->status == 2 ? 'selected' : '' }}>Hold</option>
                                          <option value="3" {{ $values->status == 3 ? 'selected' : '' }}>Completed</option>
                                      </select>
                                  </form>
                              </td>
                              
                                <td class="text-center"> 
                                    <a href="/Vieworder?id={{ $values->id }}" class="btn btn-info" title="View record"><i class="fa fa-eye"></i></a>
                                </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>

    @endsection
    @section('title')
    Order
    @endsection

  
    @if (session('success'))
    <script>
        $(document).ready(function() {
            toastr.success("{{ session('success') }}");
        });
    </script>
    @endif

//view order
                    <section class="content">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="/order" class="btn btn-danger" style="margin-left:95%;">Back</a>
                </div>
                <div class="container mt-5">
                  <!-- First Row: Order Details -->
                  <div class="row mb-4">
                      <div class="col-md-12">
                        <fieldset class="border p-3 rounded">
                          <legend class="w-auto px-2">Order Details</legend>
                          <div class="d-flex justify-content-between">
                              <div class="w-50 me-2">
                                  <div class="mb-3">
                                      <label class="fw-bold">Order Order Id:</label>
                                      <p>{{ $order_data->order_id }}</p>
                                  </div>
                                  <div class="mb-3">
                                      <label class="fw-bold">Product Price:</label>
                                      <p>{{ $order_data->order_id }}</p> <!-- Make sure to use the correct property -->
                                  </div>
                              </div>
                      
                              <div class="w-50 ms-2">
                                  <div class="mb-3">
                                      <label class="fw-bold">Order Order Id:</label>
                                      <p>{{ $order_data->order_id }}</p>
                                  </div>
                                  <div class="mb-3">
                                      <label class="fw-bold">Product Price:</label>
                                      <p>{{ $order_data->order_id }}</p> <!-- Make sure to use the correct property -->
                                  </div>
                              </div>
                          </div>
                      </fieldset>
                      


                      <fieldset class="border p-3 rounded">
                        <legend class="w-auto px-2">Order Details</legend>
                        <div class="d-flex justify-content-between">
                            <div class="w-50 me-2">
                                <div class="mb-3">
                                    <label class="fw-bold">Order Id:</label>
                                    <p>{{ $order_data->order_id }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="fw-bold">Product Price:</label>
                                    <p>{{ $order_data->order_id }}</p>
                                </div>
                          
                            </div>
                            
                            <div class="w-50 ms-2">
                                <div class="mb-3">
                                    <label class="fw-bold">Order Id:</label>
                                    <p>{{ $order_data->order_id }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="fw-bold">Product Price:</label>
                                    <p>{{ $order_data->order_id }}</p>
                                </div>
                         
                            </div>
                        </div>
                    </fieldset>
                      
                      </div>
                  </div>
              </div>
              
            </div>
        </div>
    </div>
</div>








