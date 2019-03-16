@extends('layout')

@section('content')
<style>
    .uper {
    margin-top: 40px;
  }

  .warning {      
      float: right;
  }

  .red-text {
    color: red;
  }

</style>
<div class="card uper">
    <div class="card-header">
        Create Contact <span class="warning red-text">* Required field</span>
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
        <form method="post" action="{{ route('contacts.store') }}">

            <div class="form-group">
                @csrf
                <label for="first_name">First Name: <span class="red-text">*</span></label>
                <input type="text" class="form-control" name="first_name" />
            </div>

            <div class="form-group">
                <label for="last_name">Last Name: <span class="red-text">*</span></label>
                <input type="text" class="form-control" name="last_name" />
            </div>

            <div class="form-group">
                <label for="email">Email: <span class="red-text">*</span></label>
                <input type="text" class="form-control" name="email" />
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" class="form-control" name="phone" />
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" />
            </div>

            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" name="city" />
            </div>

            <div class="form-group">
                <label for="state">State:</label>
                <input type="text" class="form-control" name="state" />
            </div>

            <div class="form-group">
                <label for="zip">Zipcode:</label>
                <input type="text" class="form-control" name="zip" />
            </div>

            <div class="form-group">
                <label for="birthday">Birthday:</label>
                <input type="text" class="form-control" name="birthday" />
            </div>

            <button type="submit" class="btn btn-primary">Create Contact</button>
        </form>
    </div>
</div>
@endsection
