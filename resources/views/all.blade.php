<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class="container mt-4">

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success')}}
        </div>
    @elseif(Session::has('fail'))
        <div class="alert alert-success">
            {{ Session::get('fail')}}
        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Hospital Name</th>
            <th scope="col">Address</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        @forelse($hospitals as $hos)
        <tr>
            <th scope="row">{{$hos->id}}</th>
            <td>{{$hos->name}}</td>
            <td>{{$hos->address}}</td>
            <td>
                <a class="btn btn-danger" href="{{route("hospitals.delete",$hos->id)}}">
                  Delete
                </a>
            </td>
        </tr>
        @empty
            <tr  role="alert">
                There is no hospitals to show
            </tr>
        @endforelse
        </tbody>
    </table>
    <a class="btn btn-info" href="{{route("index")}}" >
        Go Back
    </a>
</div>
</body>
</html>
