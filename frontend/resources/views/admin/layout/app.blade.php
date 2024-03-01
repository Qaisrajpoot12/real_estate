<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">
    <title>Real Estate</title>

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">

    @include('admin.layout.styles')

    @include('admin.layout.scripts')

</head>

<body>
    <div id="app">
        <div class="main-wrapper">

            @include('admin.layout.nav')

            @include('admin.layout.sidebar')

            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('heading')</h1>
                        <div class="ml-auto">
                            @yield('right_top_button')
                        </div>
                    </div>
                    @yield('main_content')
                </section>
            </div>
        </div>
    </div>

    @include('admin.layout.scripts_footer')


    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                iziToast.error({
                    title: '',
                    position: 'topRight',
                    message: '{{ $error }}',
                });
            </script>
        @endforeach
    @endif

    @if (session()->get('error'))
        <script>
            iziToast.error({
                title: '',
                position: 'topRight',
                message: '{{ session()->get('error') }}',
            });
        </script>
    @endif

    @if (session()->get('success'))
        <script>
            iziToast.success({
                title: '',
                position: 'topRight',
                message: '{{ session()->get('success') }}',
            });
        </script>
    @endif
    <script>
        $(document).ready(function() {

            let ids = [];
            let removed_files = [];
            $('.filechange').on('change', function() {

                    var input = this;

                    if (!ids.includes($(input).attr('id'))) {
                        // If not, add it to the ids array
                        ids.push($(input).attr('id'));
                    }
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $(input).parent().parent().find('.list-img').attr('src', e.target.result);
                    };

                    // Ensure that there is at least one file selected
                    if (input.files && input.files[0]) {
                        reader.readAsDataURL(input.files[0]);
                    }

                }

            )

            $('#primary_btn').on('click', function() {

                let setids = ids.toString()

                $('#changed_images').val(setids)
                $('#edit_btn').click()


            })
            // $('.delete_img').on('click', function() {
            //     let img = $(this).parent().parent().find('.list-img').attr('src', '');
            //     let file_id = $(this).parent().parent().parent().find('.filechange').attr('id');

            //     if (!ids.includes(file_id)) {
            //         // If not, add it to the ids array
            //         ids.push(file_id);
            //     }
            //     console.log(ids);
            // })

        });
    </script>
</body>

</html>
