@extends('admin.layout.app')

@section('heading', 'Logs')

@section('right_top_button')
    {{-- <a href="{{ route('createlisting') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a> --}}
@endsection

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>User</th>
                                        <th>loggable_id</th>
                                        <th>loggable_type</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{ dd($responseData['data']['logs']) }} --}}
                                    @foreach ($responseData['data']['logs'] as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $responseData['data']['name'] }}
                                            </td>
                                            <td>
                                                {{ $row['loggable_id'] ?? '' }}
                                            </td>
                                            <td>{{ $row['loggable_type'] ?? '' }}</td>
                                            <td>{{ $row['created_at'] }}</td>
                                            <td>{{ $row['action'] }}</td>


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
@endsection
