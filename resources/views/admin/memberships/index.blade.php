@extends('admin.layouts.app')

@section('title','Membership Types')

@section('content')

<h2 class="admin-heading mb-4">Membership Types</h2>

<div class="card p-4 mb-4">

<h4 class="admin-heading h5">नई Membership Type जोड़ें</h4>

<form method="POST" action="{{ route('admin.memberships.store') }}">
@csrf

<div class="row g-3">

<div class="col-md-6">
<input class="form-control" name="name" placeholder="Membership Name" required>
</div>

<div class="col-md-6">
<input class="form-control" name="slug" placeholder="Slug (optional)">
</div>

<div class="col-12">
<textarea class="form-control" name="description" rows="3" placeholder="Description"></textarea>
</div>

<div class="col-md-4">
<input class="form-control" type="number" step="0.01" min="0" name="fee" placeholder="Fee">
</div>

<div class="col-md-4">
<input class="form-control" type="number" min="1" name="validity_months" placeholder="Validity months">
</div>

<div class="col-md-2">
<input class="form-control" type="number" min="0" name="sort_order" value="0">
</div>

<div class="col-md-2">
<label><input type="checkbox" name="is_active" value="1" checked> Active</label>
</div>

<div class="col-12">
<button class="btn btn-bsss">Membership जोड़ें</button>
</div>

</div>
</form>
</div>

@foreach($membershipTypes as $type)

<div class="card p-4 mb-3">

<form method="POST" action="{{ route('admin.memberships.update',$type) }}">
@csrf
@method('PUT')

<div class="row g-3">

<div class="col-md-6">
<input class="form-control" name="name" value="{{ $type->name }}" required>
</div>

<div class="col-md-6">
<input class="form-control" name="slug" value="{{ $type->slug }}">
</div>

<div class="col-12">
<textarea class="form-control" name="description" rows="3">{{ $type->description }}</textarea>
</div>

<div class="col-md-4">
<input class="form-control" type="number" step="0.01" min="0" name="fee" value="{{ $type->fee }}">
</div>

<div class="col-md-4">
<input class="form-control" type="number" min="1" name="validity_months" value="{{ $type->validity_months }}">
</div>

<div class="col-md-2">
<input class="form-control" type="number" min="0" name="sort_order" value="{{ $type->sort_order }}">
</div>

<div class="col-md-2">
<label><input type="checkbox" name="is_active" value="1" @checked($type->is_active)> Active</label>
</div>

<div class="col-12">
<button class="btn btn-bsss">Update</button>
</div>

</div>
</form>

<form method="POST"
action="{{ route('admin.memberships.destroy',$type) }}"
onsubmit="return confirm('Delete this membership type?')"
class="mt-2">
@csrf
@method('DELETE')
<button class="btn btn-outline-danger btn-sm">Delete</button>
</form>

</div>

@endforeach

@endsection
