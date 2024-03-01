@extends('admin.layout.app')

@section('heading', 'Dashboard')

@section('main_content')
    <div class="row">

        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fa fa-home"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Featured</h4>
                    </div>
                    <div class="card-body">
                        @php
                            $getcount = 0;
                        @endphp

                        @foreach ($user['list_images'] as $row)
                            @if ($row['featured'] == 1)
                                @php
                                    $getcount += 1;
                                @endphp
                            @endif
                        @endforeach

                        {{ $getcount }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <section class="section">
                <div class="section-header">
                    <h1>Listing</h1>
                </div>
            </section>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example1">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Owner</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($user['list_images'] as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        {{-- {{ $row['images'] ? $row['images']->path : 'sd' }} --}}


                                                        @if ($row['images'])
                                                            <img class="list-img"
                                                                src="{{ asset('storage/' . $row['images'][0]['path']) }}"
                                                                alt="Image">
                                                        @endif

                                                    </td>
                                                    <td>{{ $row['title'] }}</td>
                                                    <td>{{ $row['description'] }}</td>
                                                    <td>{{ $user['userdetail']['name'] }}</td>
                                                    <td>{{ $row['created_at'] }}</td>


                                                    <td class="pt_10 pb_10">
                                                        <a href="{{ route('listdetail', ['id' => $row['id']]) }}"
                                                            class="btn btn-success">View</a>
                                                        <a href="{{ route('editlist', ['id' => $row['id']]) }}"
                                                            class="btn btn-primary">Edit</a>
                                                        <a href="{{ route('deletelist', ['id' => $row['id']]) }}"
                                                            class="btn btn-danger"
                                                            onClick="return confirm('Are you sure?');">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
