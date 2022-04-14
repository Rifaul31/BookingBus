<!DOCTYPE html>
<html>
    <head>
        <title>Daftar Produk</title>
        <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <script src="{{ asset('assets/jquery.js') }}"></script>
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    </head>
    <body style="width:95%">
        <div class="row justify-content-center" style="margin-top:13%">
            <div class="col-4">
                <span class="float-left">{{ session('msg') }}</span>
                    <a href="/ticket/create" class="btn btn-secondary float-right">Add</a><br /><br />
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Bus Code</th>
                                <th>Bus Name</th>
                                <th>Depart Location</th>
                                <th>Destination</th>
                                <th>Travel Date</th>
                                <th>Departure Time</th>
                                <th>Arrival Time</th>
                                <th>Price</th>
                            </tr>
                            @foreach($list as $d)
                            <tr>
                                <td>{{ $d->code }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->depart_location }}</td>
                                <td>{{ $d->arrive_location }}</td>
                                <td>{{ $d->travel_date }}</td>
                                <td>{{ $d->departure_time }}</td>
                                <td>{{ $d->arrival_time }}</td>
                                <td>{{ $d->price }}</td>
                                <td>
                                    <a href="/ticket/{{ $d->code }}/edit" class="btn btn-primary">Edit</a>
                                    <form method="post" action="/ticket/{{ $d->code }}" style="display:inline" onsubmit="return confirm('Confirm Deletion?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
            </div>
        </div>
    </body>
</html>