<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Relasi One to One & Many To Many</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="card mt-5">
<div class="card-body">
<h5 class="text-center my-4">Laravel Eloquent Relationship : One To One dan Many To Many</h5>
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>Nama User</th>
<th>Roles</th>
</tr>
</thead>
<tbody>
@foreach ($users as $user)
<tr>
<td>{{ $user->name }}</td>
<td>
@foreach ($user->roles()->get() as $role)
<button class="btn btn-sm btn-primary me-2">{{ $role->name }}</button>
@endforeach
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</body>
</html>