@extends('layouts.app')
@section('content')
<div class="container">
<div class="col-lg-12">
    <div class="row">
        <div class="card col-md-9">
            <div class="card-header">
                <h4>Add User</h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  <i class="fa fa-plus"></i>Add New User</a>

                </button>
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}

                  </div>
                  @endif
                  @if (session('Delete'))
                  <div class="alert alert-danger" role="alert">
                      {{ session('Delete') }}
                      
                    </div>
                    @endif
            </div>
            
            <div class="card-body">
                <table class="table table-borderd table-left" id=dataTable>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($users as $key =>$user)
                            <td>{{ $key+1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>@if($user->is_admin==1)
                                Admin 
                                @else
                                Cashier
                                @endif
                            <td><i class="fa fa-edit"></i> <a href="{{ $user->id }}" class="btn btn-info" data-toggle="modal" data-target="#editUser{{ $user->id }}">Edit{{ $user->id }} </a>
                                <i class="fa fa-cancel"></i> <a href="{{ route('users.destroy',$user->id) }}" data-toggle="modal" data-target="#deleteUser{{ $user->id }}" class="btn btn-danger delete" id="confirm-delete">Delete </a>
                            </td>
                        </tr>
                        
                           
                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            <!-- Edit User -->
                            {{-- <button class="test" type="submit">Delete</button> --}}
                            <div class="modal right fade" id="editUser{{ $user->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editUser">Modal title       
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('users.update', $user->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="">Name</label>
                                                    <input type="text" name="name"  class="form-control" value="{{$user->name}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="email" name="email"  class="form-control"  value="{{$user->email}}">
                                                </div>
                                                {{-- 
                                                <div class="form-group">
                                                    <label for="">phone</label>
                                                    <input type="number" name="phone"  class="form-control">
                                                </div>
                                                --}}
                                                <div class="form-group">
                                                    <label for="">password</label>
                                                    <input type="password" name="password"  class="form-control"  value="{{$user->password}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">confirm password</label>
                                                    <input type="password" name="confirm_password"  class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Select Admin role</label>
                                                    <select name="role"  class="form-control"  >
                                                    <option value="1" @if($user->is_admin==1) Selected  @endif >Admin</option>
                                                    <option value="2" @if($user->is_admin==2) Selected @endif >Cashier</option>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="submit" name="submit" class="btn btn-warning">Update user</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal right fade" id="deleteUser{{ $user->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="deleteUser">Modal title</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                              @csrf
                                              @method('delete')
                                              <div class="form-group">
                                                  {{-- 
                                                  <h3>are you sure to delete {{ $user->name }}?</h3>
                                                  --}}
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="submit" name="submit" data-dismiss="modal" class="btn btn-primary">cancel</button>
                                                  <button type="button" name="submit" class="btn btn-danger" onclick="deleteUser({{ $user->id }})">Delete</button>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                            @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card ">
                    <div class="card-header">
                        <h3>search users</h3>
                    </div>
                    <div class="card-body">
                        ..........
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- Button trigger modal -->
                            <!-- Modal -->
                            <!-- Add New User -->
                            <div class="modal right fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="addUser1">Modal title</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <form action="{{ route('users.store') }}" method="POST">
                                              @csrf
                                              <div class="form-group">
                                                  <label for="">Name</label>
                                                  <input type="text" name="name"  class="form-control">
                                              </div>
                                              <div class="form-group">
                                                  <label for="">Email</label>
                                                  <input type="email" name="email" class="form-control">
                                              </div>
                                              {{-- 
                                              <div class="form-group">
                                                  <label for="">phone</label>
                                                  <input type="number" name="phone"  class="form-control">
                                              </div>
                                              --}}
                                              <div class="form-group">
                                                  <label for="">password</label>
                                                  <input type="password" name="password"  class="form-control">
                                              </div>
                                              <div class="form-group">
                                                  <label for="">confirm password</label>
                                                  <input type="password" name="confirm_password"  class="form-control">
                                              </div>
                                              <div class="form-group">
                                                  <label for="">Select Admin role</label>
                                                  <select name="role"  class="form-control">
                                                      <option value="1">Admin</option>
                                                      <option value="2">Cashier</option>
                                                  </select>
                                              </div>
                                      </div>
                                      <div class="modal-footer">
                                      <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                      </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
<style>
    .modal.right .modal-dialog{
    right: 0;
    top: 0;
    margin-right:3vh; 
    }
</style>
{{-- sweet alert not working  --}}
<script>
    $(document).ready(function(){
    
        $("#dataTable").DataTable();
    // confirm delete-simple sections
    
  

    });
</script>
@endsection