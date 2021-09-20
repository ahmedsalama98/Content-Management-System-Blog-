@extends('layouts.backend.master')

@section('title')
Admin | Dashboard
@endsection

@section('description')
Admin | Dashboard page
@endsection

@section('content')





<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                           All Users


                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($all_users )}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success  shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-succes text-uppercase mb-1">
                           Active Posts


                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($active_posts )}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info  shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-succes text-uppercase mb-1">
                           InActive Posts


                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($inactive_posts )}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger  shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-succes text-uppercase mb-1">
                           Active Comments


                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($active_comments )}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>




</div>


{{-- chart --}}

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Social
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Referral
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- chart --}}


<div class="row">

{{-- last posts --}}
    <div class="col-xl-6">
        <div class="card">

            <div class="card-header">
                <h4>Last Posts</h4>
            </div>

            <div class="card-body" style="padding:0">

                <div class="table-resbonsive">

                    <table class="table table-hover text-center" >

                        <thead>
                            <th>Title</th>
                            <th> Post</th>
                            <th> user</th>
                            <th>comments</th>
                        </thead>

                        <tbody>
                            @forelse (   $last_posts as  $post)

                            <tr>
                                <td>
                                <a href="{{ route('post.show',$post->slug) }}">{{  Str::limit($post->title ,15)}}</a>
                                </td>
                                <td> {{  Str::limit($post->body ,25)}}</td>
                                <td> <a href="{{ route('admin.post.index',['user_id'=>$post->user->id] ) }}"> {{  Str::limit($post->user->name, 25)}}</a></td>
                                <td>

                                    {!!  $post->comments_count > 0? '<a href="'.route("admin.comment.index",["user_id"=>$post->user->id]).'">'.number_format($post->comments_count).'</a>':0 !!}

                                </td>


                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>


            </div>

        </div>
    </div>
{{-- last posts --}}
{{-- last comments --}}
    <div class="col-xl-6">
        <div class="card">

            <div class="card-header">
                <h4>Last Comments</h4>
            </div>

            <div class="card-body" style="padding:0">

                <div class="table-resbonsive">

                    <table class="table table-hover text-center" >

                        <thead>
                            <th>user</th>
                            <th> Comment</th>
                            <th> Comment Post</th>
                        </thead>

                        <tbody>
                            @forelse (   $last_comments as  $comment)

                            <tr>
                                <td> {{  Str::limit($comment->name ,15)}}</td>
                                <td> {{  Str::limit($comment->comment ,25)}}</td>
                                <td> <a href="{{ route('admin.comment.index',['post_id'=>$comment->post->id] ) }}"> {{  Str::limit($comment->post->title, 25)}}</a></td>



                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>


            </div>

        </div>
    </div>
{{-- last comments --}}

</div>



@endsection

@section('script')

    <!-- Page level plugins -->
    <script src="{{ asset('layouts/admin/js/Chart.min.js') }}"></script>

    {{-- <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> --}}


@endsection