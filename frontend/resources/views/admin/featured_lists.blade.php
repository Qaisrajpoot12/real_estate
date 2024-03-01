@extends('admin.layout.app')

@section('heading', 'Featured Listings')
@section('right_top_button')
    <a href="{{ route('createlisting') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
@endsection
@section('main_content')
    <div class="row">

    </div>
    <div class="row">
        <div class="col-md-12">

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
                                                <th>Featured</th>
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
                                                @if ($row['featured'] == 1)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td><button class="btn btn-warning"> Featured</button></td>
                                                        <td>


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
                                                @endif
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
