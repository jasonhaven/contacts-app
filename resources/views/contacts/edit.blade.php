@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Book
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('contacts.update', $contact->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="first_name">First Name:</label>
              <input type="text" class="form-control" name="first_name" value="{{$contact->first_name}}"/>
          </div>
          <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value="{{$contact->last_name}}"/>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value="{{$contact->email}}"/>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" name="phone" value="{{$contact->phone}}"/>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" value="{{$contact->address}}"/>
            </div>

            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" name="city" value="{{$contact->city}}"/>
            </div>

            <div class="form-group">
                <label for="state">State:</label>
                <input type="text" class="form-control" name="state" value="{{$contact->state}}"/>
            </div>

            <div class="form-group">
                <label for="zip">Zipcode:</label>
                <input type="text" class="form-control" name="zip" value="{{$contact->zip}}"/>
            </div>

            <div class="form-group">
                <label for="birthday">Birthday:</label>
                <input type="text" class="form-control" name="birthday" value="{{$contact->birthday}}"/>
            </div>
          <button type="submit" class="btn btn-primary">Update Contact</button>
      </form>
  </div>
</div>
@endsection