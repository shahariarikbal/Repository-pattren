<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Repository pattern</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="col-lg-12">
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="card-header bg-success">
                            <h2>Repository pattern CRUD operation</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        @if($page == 'index')
                                        <div class="card-header bg-primary">
                                            <span>Add new member</span>
                                        </div>
                                        <form action="{{ url('/store') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label>First name</label>
                                                <input type="text" name="first_name" class="form-control" placeholder="First name">
                                            </div>
                                            <div class="form-group">
                                                <label>Last name</label>
                                                <input type="text" name="last_name" class="form-control" placeholder="Last name">
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="phone" class="form-control" placeholder="Phone">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="password" class="form-control" placeholder="Password">
                                            </div>
                                            <button type="submit" name="btn" class="btn btn-primary btn-sm btn-block">Submit</button>
                                        </form>
                                        @endif
                                        @if($page == 'edit')
                                        <div class="card-header bg-primary">
                                            <span>Update member</span>
                                        </div>
                                        <form action="{{ url('/update/'.$member->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label>First name</label>
                                                <input type="text" name="first_name" value="{{ $member->first_name }}" class="form-control" placeholder="First name">
                                            </div>
                                            <div class="form-group">
                                                <label>Last name</label>
                                                <input type="text" name="last_name" value="{{ $member->last_name }}" class="form-control" placeholder="Last name">
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="phone" class="form-control" value="{{ $member->phone }}" placeholder="Phone">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control" value="{{ $member->email }}" placeholder="Email">
                                            </div>
                                            <button type="submit" name="btn" class="btn btn-primary btn-sm btn-block">Submit</button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-header bg-info">
                                            <div class="card-title">
                                                <span>All members list</span>
                                            </div>
                                        </div>
                                        <table class="table table-dark">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($members as $key => $member)
                                            <tr>
                                                <th scope="row">{{ ++$key }}</th>
                                                <td>{{ $member->full_name }}</td>
                                                <td>{{ $member->phone }}</td>
                                                <td>{{ $member->email }}</td>
                                                <td>
                                                    <a href="{{ url('view/'.$member->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                    <a href="{{ url('delete/'.$member->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
