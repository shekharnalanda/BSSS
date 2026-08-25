@extends('admin.layouts.app')

@section('title','Programs')

@section('content')

<h2 class="admin-heading mb-4">Programs Management</h2>

<div class="card p-4 mb-4">
<h4 class="admin-heading h5">नया Program जोड़ें</h4>

<form method="POST" action="{{ route('admin.programs.store') }}">
@csrf

<div class="row g-3">
<div class="col-md-6">
<input class="form-control" name="title" placeholder="Program Title" required>
</div>

<div class="col-md-6">
<input class="form-control" name="slug" placeholder="Slug (optional)">
</div>

<div class="col-12">
<textarea class="form-control" name="short_description" rows="2" placeholder="Short Description"></textarea>
</div>

<div class="col-12">
<textarea class="form-control" name="description" rows="4" placeholder="Full Description"></textarea>
</div>

<div class="col-md-6">
<input class="form-control" name="image" placeholder="Image path / URL">
</div>

<div class="col-md-3">
<input class="form-control" type="number" name="sort_order" value="0" min="0">
</div>

<div class="col-md-3">
<label><input type="checkbox" name="is_featured" value="1"> Featured</label><br>
<label><input type="checkbox" name="is_active" value="1" checked> Active</label>
</div>

<div class="col-12">
<button class="btn btn-bsss">Program जोड़ें</button>
</div>
</div>
</form>
</div>

@foreach($programs as $program)
<div class="card p-4 mb-3">

<form method="POST" action="{{ route('admin.programs.update',$program) }}">
@csrf
@method('PUT')

<div class="row g-3">

<div class="col-md-6">
<input class="form-control" name="title" value="{{ $program->title }}" required>
</div>

<div class="col-md-6">
<input class="form-control" name="slug" value="{{ $program->slug }}">
</div>

<div class="col-12">
<textarea class="form-control" name="short_description" rows="2">{{ $program->short_description }}</textarea>
</div>

<div class="col-12">
<textarea class="form-control" name="description" rows="4">{{ $program->description }}</textarea>
</div>

<div class="col-md-6">
<input class="form-control" name="image" value="{{ $program->image }}">
</div>

<div class="col-md-3">
<input class="form-control" type="number" name="sort_order" value="{{ $program->sort_order }}" min="0">
</div>

<div class="col-md-3">
<label><input type="checkbox" name="is_featured" value="1" @checked($program->is_featured)> Featured</label><br>
<label><input type="checkbox" name="is_active" value="1" @checked($program->is_active)> Active</label>
</div>

<div class="col-12">
<button class="btn btn-bsss">Update</button>
</div>

</div>
</form>

<form method="POST"
action="{{ route('admin.programs.destroy',$program) }}"
onsubmit="return confirm('Delete this program?')"
class="mt-2">
@csrf
@method('DELETE')
<button class="btn btn-outline-danger btn-sm">Delete</button>
</form>

</div>
@endforeach

@endsection
