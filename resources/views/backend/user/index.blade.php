@extends('layouts.backend.master')

@section('title')
Users
@endsection

@section('description')
Admin | Users page
@endsection

@section('content')

<div class="container-fluid">



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h4 class="m-0 font-weight-bold text-primary">Users</h4>

            @if (Auth::user()->isAbleTo('admins-create'))
            <a href="{{ route('admin.user.create') }}" class="btn btn-primary"> Add User  <i class="fas fa-plus"></i></a>

            @else

            <button  class="btn btn-primary disabled"> Add User  <i class="fas fa-plus"></i></button>


            @endif

        </div>
        <div class="card-body" style="padding: 0">


            <div style="padding: 10px">
                <form  action="{{ route('admin.user.index') }}">

                    <div class="row justify-content-center align-content-center">
                        <div class="col-3">

                            <div class="form-group">

                                <input placeholder="Search ..." value="{{ request()->search }}" type="text" name="search" class="form-control" >


                            </div>

                        </div>
                        <div class="col">

                            <div class="form-group">
                                <select name="sorted_by" class="form-control">

                                    <option value="created_at"  {{ request()->sorted_by == 'created_at' ? 'selected':''}}>created at</option>
                                    <option value="title" {{ request()->sorted_by == 'title' ? 'selected':''}} >Title</option>

                                </select>
                            </div>
                        </div>

                        <div class="col">

                            <div class="form-group">
                                <select name="order_by" class="form-control">
                                    <option value="desc" {{ request()->order_by == 'desc' ? 'selected':''}}>Descending</option>
                                    <option value="asc" {{ request()->order_by == 'asc' ? 'selected':''}}>Ascending</option>
                                </select>
                            </div>

                        </div>

                        <div class="col">

                            <div class="form-group">
                                <select name="limit" class="form-control">
                                    <option value="5" {{ request()->limit == 5 ? 'selected':''}} >5</option>
                                    <option value="10" {{ request()->limit == 10 ? 'selected':''}} >10</option>
                                    <option value="20" {{ request()->limit == 20 ? 'selected':''}}>20</option>
                                    <option value="50" {{ request()->limit == 50 ? 'selected':''}}>50</option>
                                    <option value="100" {{ request()->limit == 100 ? 'selected':''}}>100</option>

                                </select>
                            </div>

                        </div>


                        <div class="col">

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block d-block">    <i class="fas fa-search"></i></button>

                            </div>

                        </div>
                    </div>




                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-hover  table-bordered text-center" >
                    <thead>
                        <tr class="text-center ">
                            <th>name</th>
                            <th>email</th>
                            <th> username </th>
                            <th> mobile </th>

                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>


                    <tbody>

                        @forelse ($users as $user)
                            <tr id="parent-id-{{ $user->id }}">
                                <td>  {{ Str::limit($user->name , 15) }} </td>
                                <td> {{ $user->email}}</td>
                                <td> {{ $user->username}}</td>
                                <td> {{ $user->mobile}}</td>
                                <td> {{ $user->created_at->format( ' Y d M H:i A')}}</td>

                                <td style="width: 190px; text-align:center">

                                   @if (Auth::user()->isAbleTo('users-update'))
                                       <a class="btn btn-primary" href="{{ route('admin.user.edit', $user->id) }}"><i class="fa fa-edit"></i></a>
                                   @else
                                       <button class="btn btn-primary disabled"> <i class="fa fa-edit"></i></button>
                                   @endif

                                   @if (Auth::user()->isAbleTo('users-delete'))
                                        <form data-parentid="{{ $user->id }}" method="POST" class="ajax-delete-admin" style="display: inline-block" action="{{ route('admin.user.destroy', $user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                   @else
                                   <button class="btn btn-danger disabled"><i class="fa fa-trash"></i></button>

                                   @endif



                                </td>

                            </tr>
                        @empty

                        <tr>
                            <td colspan="7">
                                <h5 >No users Founded</h5>
                            </td>
                        </tr>
                        @endforelse


                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="7" >


                                <div class="m-auto " style="width: max-content">
                                    {!! $users->appends(request()->input())->onEachSide(1)-> links() !!}
                                </div>


                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
