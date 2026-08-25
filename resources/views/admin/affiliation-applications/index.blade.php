@extends('admin.layouts.app')

@section('title','Affiliation Applications')

@section('content')

<div class="d-flex justify-content-between flex-wrap gap-3 mb-4">
<div>
<h2 class="admin-heading">Affiliation Applications</h2>
<p class="text-muted">Institution / School applications</p>
</div>

<form method="GET">
<select name="status" class="form-select" onchange="this.form.submit()">
<option value="">All Status</option>
@foreach(['pending','approved','rejected'] as $s)
<option value="{{ $s }}" @selected(request('status')===$s)>
{{ ucfirst($s) }}
</option>
@endforeach
</select>
</form>
</div>

@forelse($applications as $application)

<div class="card p-4 mb-3">

<div class="row g-3">

<div class="col-lg-7">
<h4 class="admin-heading">{{ $application->institution_name }}</h4>

<p class="mb-1">
<strong>Contact:</strong>
{{ $application->contact_person }} • {{ $application->mobile }}
</p>

<p class="mb-1">
<strong>Location:</strong>
{{ $application->district }}, {{ $application->state }}
</p>

@if($application->registration_number)
<p class="mb-1">
<strong>Registration:</strong>
{{ $application->registration_number }}
</p>
@endif

@if($application->courses_or_activities)
<p class="mb-0 text-muted">
{{ $application->courses_or_activities }}
</p>
@endif
</div>

<div class="col-lg-5">

<form method="POST"
action="{{ route('admin.affiliation-applications.update',$application) }}">
@csrf
@method('PATCH')

<select name="status" class="form-select mb-2">
<option value="pending" @selected($application->status==='pending')>Pending</option>
<option value="approved" @selected($application->status==='approved')>Approved</option>
<option value="rejected" @selected($application->status==='rejected')>Rejected</option>
</select>

<textarea class="form-control mb-2"
name="admin_note"
rows="3"
placeholder="Admin Note">{{ $application->admin_note }}</textarea>

<button class="btn btn-bsss btn-sm">Update</button>
</form>

<form method="POST"
action="{{ route('admin.affiliation-applications.destroy',$application) }}"
class="mt-2"
onsubmit="return confirm('Delete application?')">
@csrf
@method('DELETE')
<button class="btn btn-outline-danger btn-sm">Delete</button>
</form>

</div>
</div>

</div>

@empty

<div class="alert alert-light border text-center">
अभी कोई affiliation application नहीं है।
</div>

@endforelse

{{ $applications->links() }}

@endsection
