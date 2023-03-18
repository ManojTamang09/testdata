<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <script>
        $.ajax({
    url: 'upload.index',
    type: 'POST',
    data: formData,
    contentType: false,
    processData: false,
    xhr: function() {
        var xhr = new XMLHttpRequest();
        xhr.addEventListener('progress', function(e) {
            if (e.lengthComputable) {
                var percent = e.loaded / e.total * 100;
                console.log(percent + '%');
            }
        });
        return xhr;
    },
    success: function(data) {
        // Display the data on the frontend
        console.log(data);
    }
});

        </script>
        <div id="loading">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>

        <script>
            $('#loading').hide();

            </script>

{{--
 <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
 <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <div class="container">

        <div class="card-body table-responsive">
            <span style="float: right;">   {!! $fetch->appends(request()->query())->links() !!} </span>
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Sl no</th>
                    <th> title</th>
                    <th> firstname</th>
                   <th> lastname</th>
                     <th> lastname</th>
                     <th> gender</th>
                    <th> specialty</th>
                   <th> practice</th>
                     <th> phone</th>
                    <th> fax</th>
                    <th> email</th>
                    <th> address</th>
                    <th> city</th>
                    <th> county</th>
                    <th> state</th>
                    <th> zip</th>
                    <th> latitude</th>
                     <th> longitude</th>

                    <th> siccode</th>
                    <th> website</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fetch as $key => $f)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$f->title}}</td>
                    <td>{{$f->firstname}}</td>
                    <td>{{$f->lastname}}</td>
                    <td>{{$f->lastname}}</td>
                    <td>{{$f->gender}}</td>
                    <td>{{$f->specialty}}</td>
                    <td>{{$f->practice}}</td>
                    <td>{{$f->phone}}</td>
                    <td>{{$f->fax}}</td>
                    <td>{{$f->email}}</td>
                    <td>{{$f->address}}</td>
                    <td>{{$f->city}}</td>
                    <td>{{$f->county}}</td>
                    <td>{{$f->state}}</td>
                    <td>{{$f->zip}}</td>
                    <td>{{$f->latitude}}</td>
                    <td>{{$f->longitude}}</td>
                    <td>{{$f->siccode}}</td>
                    <td>{{$f->website}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>



        </div>
    </div>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script> --}}

</body>
</html>
