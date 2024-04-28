<!doctype html>
<html lang="en">

<head>
    <title>Edit Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>

<body>
    
    @php
        $service = App\Models\Service::where('id', request()->route()->parameter('id'))->first();
    @endphp
    
    <main>
        <div class="container mt-5">
            <h1 class="service text-center my-3">Service Form</h1>
            <form action="{{ route('service.update', request()->route()->parameter('id')) }}" method="post" enctype="multipart/form-data">@csrf
                <div class="row">
                    <div class="col-6 mb-3">
                        <input type="text" name="title" value="{{ $service->title }}" placeholder="title" class="form-control">
                    </div>

                    <div class="col-6 mb-3">
                        <input type="text" name="slogan" value="{{ $service->slogan }}" placeholder="slogan" class="form-control">
                    </div>

                    <div class="col-6 mb-3">
                        <input type="file" name="icon" class="form-control">
                    </div>

                    <div class="col-6 mb-3">
                        <input type="file" name="thumbnail" class="form-control">
                    </div>

                    <div class="mb-3">
                        <textarea name="content" class="form-control shadow-none">{!! $service->content !!}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>

    <script>
        $(document).ready(function() {
            $('textarea').summernote({
                height: 500
            });
        });
    </script>
</body>

</html>