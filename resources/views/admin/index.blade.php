@extends('layouts.adminapp')
@section('content')
<div class="app-content content">
<div class="content-wrapper">
 <div class="content-body">
 <section class="basic-elements">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add User</h4>
                </div>
                <form action="{{route('users.store')}}" method="post">
                   {{csrf_field()}}
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label for="basicInput">Name</label>
                                    <input type="text" class="form-control" id="basicInput" name="name" required="" >
                                </fieldset>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                 @endif
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                    <label for="basicInput">Email</label>
                                    <input type="text" class="form-control" id="basicInput" name="email" required="" >
                                </fieldset>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                 @endif
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label for="basicInput">Phone Number</label>
                                    <input type="text" class="form-control" id="basicInput" name="phone_number" required="" >
                                </fieldset>
                                @if ($errors->has('phone_number'))
                                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                 @endif
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label for="basicInput">Password</label>
                                    <input type="password" class="form-control" id="basicInput" name="password" required="" >
                                </fieldset>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                 @endif
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label for="basicInput">Password Confirmation</label>
                                    <input type="password" class="form-control" id="basicInput" name="password_confirmation" required="" >
                                </fieldset>
                            </div>

                              <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <fieldset class="form-group">
                                    <label for="basicSelect">Country</label>
                                    <select name="country" class="form-control" id="basicSelect" required="">
                                      <option>Select Type</option>
                                      <option value="India" selected>India</option>
                                      <option value="USA">USA</option>
                                      <option value="UK">UK</option>
                                    </select>
                                </fieldset>
                                </div>


                              <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                <button type="submit" class="btn btn-primary">
                                  <i class="fa fa-check-square-o"></i> submit
                              </button>
                            </div>
                        </div>
                    </div>
                </div>
              </form>
            </div>
        </div>
    </div>
</section>
</div>
</div>
</div>



@endsection