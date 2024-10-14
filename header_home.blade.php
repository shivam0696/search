







                                   <style>
                                        .pro_review {
                                        max-height: 50px; /* Adjust as needed */
                                        overflow-y: auto;
                                        }
                                        </style>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="pro_review" style="max-height: 300px; overflow-y: auto;">
                                                <h4>Review List</h4>
                                                <div>
                                                    @foreach ($review_data as $reviewvalues)
                                                        <ul>
                                                            <li>
                                                                <strong>{{$reviewvalues->coustomer_name}}</strong>
                                                                <p>{{$reviewvalues->review}}</p>
                                                            </li>
                                                        </ul>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>




//// order


            <td class="text-center">
                                  <form id="status-form-{{ $values->id }}" class="d-inline">
                                      @csrf
                                      <input type="hidden" name="id" value="{{ $values->id }}">
                                      <select name="status" class="form-control status-select" data-id="{{ $values->id }}">
                                          <option value="0" {{ $values->status == 0 ? 'selected' : '' }}>Pending</option>
                                          <option value="1" {{ $values->status == 1 ? 'selected' : '' }}>Processing</option>
                                          <option value="2" {{ $values->status == 2 ? 'selected' : '' }}>Hold</option>
                                          <option value="3" {{ $values->status == 3 ? 'selected' : '' }}>Completed</option>
                                      </select>
                                  </form>
                              </td>


/// controller    
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
    
        // Return a JSON response
        return response()->json(['message' => 'Order status updated successfully!']);
    }


// script

// order ststus update
    $(document).ready(function() {
        $('.status-select').change(function() {
            const form = $(this).closest('form');
            const formData = form.serialize(); // Serialize the form data
            
            $.ajax({
                url: 'updateOrderStatus',
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Handle success response
                    alert('Order status updated successfully!');
                },
                error: function(xhr) {
                    // Handle error response
                    alert('Error updating order status: ' + xhr.responseJSON.message);
                }
            });
        });
    });
  Route::post('updateOrderStatus', [OrderController::class, 'updateOrderStatus']);
