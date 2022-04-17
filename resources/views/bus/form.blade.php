<!DOCTYPE html>
<html>
    <head>
        <title>Form {{ $title }} Produk</title>
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
        <div class="col-3">
        <h4>Form {{ $title }} Ticket</h4>
        <form class="border" style="padding:20px" method="POST" action="/{{ $action }}">
        @csrf
        <input type="hidden" name="_method" value="{{ $method }}" />
        <div class="form-group">
        <label>Bus Code</label>
        <input type="text" name="code" class="form-control" value="{{ isset($data)?$data->code:'' }}" />
        </div>
        <div class="form-group">
        <label>Bus Name</label>
        <input type="text" name="name" class="form-control" value="{{ isset($data)?$data->name:'' }}" />
        </div>
        <div class="form-group">
        <label>Depart Location</label>
        <input type="text" name="depart_location" class="form-control" value="{{ isset($data)?$data->depart_location:'' }}" />
        </div>
        <div class="form-group">
        <label>Destination</label>
        <input type="text" name="arrive_location" class="form-control" value="{{ isset($data)?$data->arrive_location:'' }}" />
        </div>
        <div class="form-group">
        <label>Travel Date</label>
        <input type="date" name="travel_date" class="form-control" value="{{ isset($data)?$data->travel_date:'' }}" />
        </div>
        <div class="form-group">
        <label>Departure Time</label>
        <input type="time" name="departure_time" class="form-control" value="{{ isset($data)?$data->departure_time:'' }}" />
        </div>
        <div class="form-group">
        <label>Arrival Time</label>
        <input type="time" name="arrival_time" class="form-control" value="{{ isset($data)?$data->arrival_time:'' }}" />
        </div>
        <div class="form-group">
        <label>Price</label>
        <input type="number" name="price" class="form-control" value="{{ isset($data)?$data->price:'' }}" />
        </div>
        <div class="form-group">
        <label>Seats</label>
        <input type="number" name="seats" class="form-control" value="{{ isset($data)?$data->seats:'' }}" />
        </div>
        <div style="text-align:center">
        <button class="btn btn-success">Save</button>
        </div>
        </form>
        </div>
        </div>
    </body>
</html>