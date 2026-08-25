@extends('admin.layouts.app')

@section('title','My Account')

@section('content')

<div class="mb-4">
<h2 class="admin-heading mb-1">My Account</h2>
<p class="text-muted mb-0">
Admin login details और password यहाँ से manage करें।
</p>
</div>

<div class="row g-4">

<div class="col-lg-6">

<div class="card p-4 h-100">

<h4 class="admin-heading h5 mb-3">
Profile Details
</h4>

<form method="POST"
      action="{{ route('admin.profile.update') }}">

@csrf
@method('PUT')

<div class="mb-3">
<label class="form-label">Admin Name</label>

<input class="form-control"
       name="name"
       value="{{ old('name',$user->name) }}"
       required>
</div>

<div class="mb-3">
<label class="form-label">Login Email</label>

<input type="email"
       class="form-control"
       name="email"
       value="{{ old('email',$user->email) }}"
       required>
</div>

<button class="btn btn-bsss">
Save Profile
</button>

</form>

</div>
</div>

<div class="col-lg-6">

<div class="card p-4 h-100">

<h4 class="admin-heading h5 mb-3">
Change Password
</h4>

<form method="POST"
      action="{{ route('admin.profile.password') }}">

@csrf
@method('PUT')

<div class="mb-3">
<label class="form-label">Current Password</label>

<input type="password"
       class="form-control"
       name="current_password"
       autocomplete="current-password"
       required>
</div>

<div class="mb-3">
<label class="form-label">New Password</label>

<input type="password"
       class="form-control"
       name="password"
       autocomplete="new-password"
       minlength="8"
       required>
</div>

<div class="mb-3">
<label class="form-label">Confirm New Password</label>

<input type="password"
       class="form-control"
       name="password_confirmation"
       autocomplete="new-password"
       minlength="8"
       required>
</div>

<button class="btn btn-bsss">
Change Password
</button>

</form>

<div class="small text-muted mt-3">
कम से कम 8 characters का मजबूत password रखें।
</div>

</div>
</div>

</div>

@endsection
