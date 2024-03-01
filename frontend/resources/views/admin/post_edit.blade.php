@extends('admin.layout.app')

@section('heading', 'Edit Post')

@section('right_top_button')
    <a href="{{ route('home') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
@endsection

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('editListSubmit', ['id' => $data['id']]) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Featured *</label>
                                        <input type="checkbox" class="form-control" name="featured"
                                            {{ $data['featured'] == 1 ? 'checked' : '' }}>
                                    </div>


                                    <div class="mb-4">
                                        <label class="form-label">Title *</label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ $data['title'] }}">

                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Description *</label>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <textarea name="description" class="form-control h_100" cols="30" rows="10">{{ $data['description'] }}</textarea>

                                    </div>

                                    <div class="mb-4">
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        @if ($data['images'])

                                            @foreach ($data['images'] as $item)
                                                <div>


                                                    <label class="form-label">Photo *</label>
                                                    <div>
                                                        <input type="file" id="{{ $item['id'] }}" name="image[]"
                                                            value="{{ $item['path'] }}" class="filechange">


                                                    </div>

                                                    <div>
                                                        <img class="list-img" src="{{ asset('storage/' . $item['path']) }}"
                                                            alt="Image" name="path[]">
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                    @if (count($data['images']) < 3)
                                        {{ dd(count($data['images'])) }}
                                        @for ($i = count($data['images']); $i < 3; $i++)
                                            <div class="mb-4">
                                                <div>
                                                    <label class="form-label">Photo </label>
                                                    <div>
                                                        <input type="file" name="image[]" class="filechange">
                                                    </div>

                                                    <div>
                                                        <img class="list-img" src="" alt="Image" name="path[]">
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor


                                        {{-- <div class="mb-4">
                                            <div>
                                                <label class="form-label">Photo</label>
                                                <div>
                                                    <input type="file" name="image[]" value="{{ $item['path'] }}"
                                                        class="filechange">
                                                </div>
                                                <div>
                                                    <img class="list-img" src="" alt="Image" name="path[]">
                                                </div>
                                            </div>
                                        </div> --}}
                                    @endif




                                    <input type="hidden" name="images_id" id="changed_images">

                                    <div class="mb-4">
                                        <label class="form-label"></label>

                                        <button type="submit" style="visibility: hidden" id="edit_btn">
                                            submit</button>

                                        <button type="button" id="primary_btn" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
