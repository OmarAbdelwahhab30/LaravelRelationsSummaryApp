<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Relations</title>
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
        <caption>
            Doctor Name : {{$doc_services->name}}
        </caption>
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Service Name</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        @forelse($doc_services->services as $ser)
        <tr>
            <td>{{$ser->id}}</td>
            <td>{{$ser->name}}</td>
        </tr>
        @empty
            <tr>
                <td>There is no services to show</td>
            </tr>
        @endforelse
        </tbody>
    </table>
        <form method="POST" action="{{route("doctor.attachService")}}">
            @csrf
             <div class="form-group">
                 <label for="exampleInputEmail1"><h3>select Doctor</h3></label>
                <select class="form-control" name="doctor_id">
                    @foreach($alldocs as $doc)
                        <option value="{{$doc->id}}">{{$doc->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1"><h3>Select Services</h3></label>
                <div class="checkbox">
                    @foreach($allservices as $ser)
                    <label><input type="checkbox" name="services[]" value="{{$ser->id}}"> {{ $ser->name}}</label><br>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    <a class="btn btn-info" href="{{route("AllDoctors")}}">
        Go Back
    </a>
</div>
</body>
</html>
