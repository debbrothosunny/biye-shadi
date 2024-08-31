@extends('backend.layouts.app')

@section('content')

<div class="row">
     <div class="col-sm-3 grid-margin">
          <div class="card">
               <div class="card-body">
                    <h5>Total Accounts</h5>
                    <div class="row">
                         <div class="col-8 col-sm-12 col-xl-8 my-auto">
                              <div class="d-flex d-sm-block d-md-flex align-items-center">
                                   <h2 class="mb-0">{{count($user)}}</h2>
                                   <p class="text-success ml-2 mb-0 font-weight-medium">See <a href="{{route('user_register_page')}}" class="text-info">({{count($user)}}) +</a></p>
                              </div>
                              <!-- <h6 class="text-muted font-weight-normal">11.38% Since last month</h6> -->
                         </div>
                         <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                              <i class="icon-md mdi mdi-account text-primary ml-auto"></i>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="col-sm-3 grid-margin">  
          <div class="card">
               <div class="card-body">
                    <h6>Paid Accounts Profile</h6>
                    <div class="row">
                         <div class="col-8 col-sm-12 col-xl-8 my-auto">
                              <div class="d-flex d-sm-block d-md-flex align-items-center">
                                   <h2 class="mb-0">{{count($user->where('status','0'))}}</h2>
                                   <p class="text-success ml-2 mb-0 font-weight-medium">Total</p>
                              </div>
                              <!-- <h6 class="text-muted font-weight-normal">11.38% Since last month</h6> -->
                         </div>
                         <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                              <i class="icon-md mdi mdi-account-star text-primary ml-auto"></i>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="col-sm-3 grid-margin">
          <div class="card">
               <div class="card-body">
                  <h6>Free Accounts Profile</h6>
                    <div class="row">
                         <div class="col-8 col-sm-12 col-xl-8 my-auto">
                              <div class="d-flex d-sm-block d-md-flex align-items-center">
                                   <h2 class="mb-0">{{count($user->where('status','1'))}}</h2>
                                   <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                              </div>
                              <!-- <h6 class="text-muted font-weight-normal">11.38% Since last month</h6> -->
                         </div>
                         <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                              <i class="icon-md mdi mdi-alert-outline text-primary ml-auto"></i>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="col-sm-3 grid-margin">
          <div class="card">
               <div class="card-body">
                  <h6>Total Bride</h6>
                    <div class="row">
                         <div class="col-8 col-sm-12 col-xl-8 my-auto">
                              <div class="d-flex d-sm-block d-md-flex align-items-center">
                                   <h2 class="mb-0">{{ $totalBrides }}</h2>
                                   <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                              </div>
                              <!-- <h6 class="text-muted font-weight-normal">11.38% Since last month</h6> -->
                         </div>
                         <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                              <i class="icon-md mdi mdi-account-multiple-outline text-primary ml-auto"></i>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="col-sm-3 grid-margin">
          <div class="card">
               <div class="card-body">
                  <h6>Total Groom </h6>
                    <div class="row">
                         <div class="col-8 col-sm-12 col-xl-8 my-auto">
                              <div class="d-flex d-sm-block d-md-flex align-items-center">
                                   <h2 class="mb-0">{{ $totalGrooms }}</h2>
                                   <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                              </div>
                              <!-- <h6 class="text-muted font-weight-normal">11.38% Since last month</h6> -->
                         </div>
                         <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                              <i class="icon-md mdi mdi-account-switch text-primary ml-auto"></i>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="col-sm-3 grid-margin">
          <div class="card">
               <div class="card-body">
                  <h6> Profile Visitor</h6>
                    <div class="row">
                         <div class="col-8 col-sm-12 col-xl-8 my-auto">
                              <div class="d-flex d-sm-block d-md-flex align-items-center">
                                   <h2 class="mb-0">{{ $totalVisits }}</h2>
                                   <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                              </div>
                              <!-- <h6 class="text-muted font-weight-normal">11.38% Since last month</h6> -->
                         </div>
                         <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                              <i class="icon-md mdi mdi-account-card-details text-primary ml-auto"></i>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="col-sm-3 grid-margin">
          <div class="card">
               <div class="card-body">
                  <h6> Deshi Profile</h6>
                    <div class="row">
                         <div class="col-8 col-sm-12 col-xl-8 my-auto">
                              <div class="d-flex d-sm-block d-md-flex align-items-center">
                                   <h2 class="mb-0">{{ $totalDeshiUsers }}</h2>
                                   <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                              </div>
                              <!-- <h6 class="text-muted font-weight-normal">11.38% Since last month</h6> -->
                         </div>
                         <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                              <i class="icon-md mdi mdi-human-male-female text-primary ml-auto"></i>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="col-sm-3 grid-margin">
          <div class="card">
               <div class="card-body">
                  <h6> Foreigner Profile</h6>
                    <div class="row">
                         <div class="col-8 col-sm-12 col-xl-8 my-auto">
                              <div class="d-flex d-sm-block d-md-flex align-items-center">
                                   <h2 class="mb-0">{{ $totalForeignerUsers }}</h2>
                                   <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                              </div>
                              <!-- <h6 class="text-muted font-weight-normal">11.38% Since last month</h6> -->
                         </div>
                         <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                              <i class="icon-md mdi mdi-airplane-landing text-primary ml-auto"></i>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="col-sm-3 grid-margin">
          <div class="card">
               <div class="card-body">
                  <h6>Total Hindu Profile</h6>
                    <div class="row">
                         <div class="col-8 col-sm-12 col-xl-8 my-auto">
                              <div class="d-flex d-sm-block d-md-flex align-items-center">
                                   <h2 class="mb-0">{{ $totalHinduUsers }}</h2>
                                   <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                              </div>
                              <!-- <h6 class="text-muted font-weight-normal">11.38% Since last month</h6> -->
                         </div>
                         <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                              <i class="icon-md mdi mdi-pine-tree text-primary ml-auto"></i>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="col-sm-3 grid-margin">
          <div class="card">
               <div class="card-body">
                  <h6>Total Muslim Profile</h6>
                    <div class="row">
                         <div class="col-8 col-sm-12 col-xl-8 my-auto">
                              <div class="d-flex d-sm-block d-md-flex align-items-center">
                                   <h2 class="mb-0">{{ $totalMuslimUsers }}</h2>
                                   <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                              </div>
                              <!-- <h6 class="text-muted font-weight-normal">11.38% Since last month</h6> -->
                         </div>
                         <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                              <i class="icon-md mdi mdi-pine-tree-box text-primary ml-auto"></i>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="col-sm-3 grid-margin">
          <div class="card">
               <div class="card-body">
                  <h6>Total Website Visitor</h6>
                    <div class="row">
                         <div class="col-8 col-sm-12 col-xl-8 my-auto">
                              <div class="d-flex d-sm-block d-md-flex align-items-center">
                                   <h2 class="mb-0">{{ session('website_visit_count', 0) }}</h2>
                                   <p class="text-success ml-2 mb-0 font-weight-medium">Total</p>
                              </div>
                              <!-- <h6 class="text-muted font-weight-normal">11.38% Since last month</h6> -->
                         </div>
                         <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                              <i class="icon-md mdi mdi-pine-tree-box text-primary ml-auto"></i>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

<div class="row ">
     <!-- Pending Tool -->
     <div class="col-lg-12 grid-margin stretch-card ">
        <div class="card">
            <div class="card-body">
                 <h4 class="card-title">Pending Payment <a href="{{route('payment')}}" class="text-info">View All ({{count($payment)}}) +</a></h4>
                <ul class="navbar-nav d-inline mb-3">

                </ul>
                <div class="table-responsive">
                    <table class="table table-hover ">
                        @if (Session::has('success'))
                        <div class="alert-success p-3 mb-3">{{ Session::get('success') }}</div>
                        @endif
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>User ID</th>
                                <th>Bkash ID</th>
                                <th>Transaction Number</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payment as $postData)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$postData->user_id }}</td>
                                <td>{{ $postData->b_number }}</td>
                                <td>{{ $postData->trans_number }}</td>
                                <td>{{ $postData->amount }}</td>
                                <td>
                                    @if( $postData->status == 'Free')
                                        <a href="{{route('payment.accept' , $postData->id)}}" class="btn btn-sm btn-primary  mb-0">Accept</a>
                                        <a href="{{route('payment.cancel', $postData->id)}}" class="btn btn-sm btn-success  mb-0">Cancal</a>
                                    @else
                                        <a  class="btn btn-sm btn-primary mb-0">Accepted</a>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">

                                        <div class="modal fade" id="user_delete{{ $postData->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"
                                                            style="color: #ac9f33;">
                                                            Delete Page</h5>
                                                        <a data-bs-dismiss="modal" aria-label="Close"> <i
                                                                class=" mdi mdi-close "></i></a>
                                                    </div>
                                                    <div class="modal-body" style="color: #cab562;">
                                                        Are you sure? Delete This Data.You Can't Revert This.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <a type="button" class="btn btn-danger"
                                                            href="{{ route('user_register.delete', $postData->id) }}">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            {{-- Delete Modal --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection