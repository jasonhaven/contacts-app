@extends('layout')

@section('content')
<style>

    .contacts-container {
    margin-top: 40px;
    width: 96%;
    margin-left: auto;
    margin-right: auto;
  }



</style>

<script>

    $(document).ready(function() {
      // init datatable on #example table
      $('#datatable').DataTable({
        "ordering": true,
        columnDefs: [{
          orderable: false,
          targets: "no-sort"
        }]
      });
    });

</script>

<div class="contacts-container">
    <h1>My Contacts</h1>


    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif

    <div class="table-responsive">
        <table id="datatable" class="table">
            <thead>
                <tr>
                    <th>Name</td>
                    <th>Email</td>
                    <th>Phone</td>
                    <th>Address</td>
                    <th>Birthday</td>
                    <th class="no-sort">Edit</td>
                    <th class="no-sort">View</td>
                    <th class="no-sort">Delete</td>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr>
                    <td scope="row">{{$contact->first_name}} {{$contact->last_name}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->phone}}</td>
                    <td> {{$contact->address}} {{$contact->city}}, {{$contact->state}} {{$contact->zip}} </td>
                    <td>{{$contact->birthday}}</td>
                    <td>
                      <a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-outline-primary">Edit</a>                        
                    </td>
                    <td>
                        <a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-outline-info">View</a>
                    </td>
                    <td>
                        <form action="{{ route('contacts.destroy', $contact->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
