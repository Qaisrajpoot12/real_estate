@extends('admin.layout.app')

@section('heading', 'View detail')

@section('right_top_button')
    <a href="{{ route('createlisting') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
@endsection

@section('main_content')
    <style>
        .myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .myImg:hover {
            opacity: 0.7;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 10;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.41);
            /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 55px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
            z-index: 123;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
    </style>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="heading">

                            <h3>Title: {{ $data[0]['title'] }}</h3>
                        </div>

                        <div class="description my-5">
                            <h6>Description: {{ $data[0]['description'] }}</h6>
                        </div>


                        <div class="featured my-3">
                            <h6>Featured: {{ $data[0]['featured'] == '0' ? 'Yes' : 'No' }}</h6>
                        </div>

                        <div class="col-md-12 ">
                            <h6>Images</h6>
                            <div class="row">



                                @if (isset($data[0]['images']))
                                    @foreach ($data[0]['images'] as $item)
                                        <div class="images col-md-4">
                                            <img class="myImg img-fluid" src="{{ asset('storage/' . $item['path']) }}"
                                                alt="{{ $item['path'] }}">
                                        </div>
                                    @endforeach
                                @endif


                                <div id="myModal" class="modal">
                                    <span class="close">&times;</span>
                                    <img class="modal-content" id="img01">
                                    <div id="caption"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementsByClassName("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        $('.myImg').on('click', function() {
            modal.style.display = "block";
            modalImg.src = this.src;

        })

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>
@endsection
