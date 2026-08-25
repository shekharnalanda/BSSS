@extends('admin.layouts.app')

@section('title','Affiliated Institutions')

@section('content')

<div class="d-flex justify-content-between flex-wrap gap-3 mb-4">

<div>
<h2 class="admin-heading">Affiliated Institutions</h2>
<p class="text-muted">Approved BSSS institutional affiliations</p>
</div>

<form method="GET" class="d-flex gap-2">
<input class="form-control"
name="search"
value="{{ request('search') }}"
placeholder="Institution / Number / Mobile">
<button class="btn btn-outline-secondary">Search</button>
</form>

</div>

<div class="card overflow-hidden">
<div class="table-responsive">

<table class="table table-hover align-middle mb-0">

<thead class="table-light">
<tr>
<th>Affiliation No.</th>
<th>Institution</th>
<th>Contact</th>
<th>Location</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>

<tbody>

@forelse($institutions as $institution)

<tr>

<td>
<strong>{{ $institution->affiliation_number }}</strong>
</td>

<td>
<strong>{{ $institution->institution_name }}</strong><br>
<span class="small text-muted">
{{ $institution->institution_type }}
</span>
</td>

<td>
{{ $institution->contact_person }}<br>
<span class="small">{{ $institution->mobile }}</span>
</td>

<td>
{{ $institution->district }},
{{ $institution->state }}
</td>

<td>
{{ strtoupper($institution->status) }}
</td>

<td>

<a href="{{ route('admin.affiliated-institutions.certificate',$institution) }}"
target="_blank"
class="btn btn-bsss btn-sm">
Certificate
</a>

<details class="mt-2">
<summary class="btn btn-outline-secondary btn-sm">
Edit
</summary>

<form method="POST"
action="{{ route('admin.affiliated-institutions.update',$institution) }}"
class="mt-3 p-3 bg-light border rounded">

@csrf
@method('PUT')

<input class="form-control mb-2"
name="institution_name"
value="{{ $institution->institution_name }}"
required>

<input class="form-control mb-2"
name="contact_person"
value="{{ $institution->contact_person }}"
required>

<input class="form-control mb-2"
name="mobile"
value="{{ $institution->mobile }}"
required>

<input class="form-control mb-2"
type="email"
name="email"
value="{{ $institution->email }}"
placeholder="Email">

<textarea class="form-control mb-2"
name="address"
required>{{ $institution->address }}</textarea>

<input class="form-control mb-2"
name="district"
value="{{ $institution->district }}">

<input class="form-control mb-2"
name="state"
value="{{ $institution->state }}">

<input class="form-control mb-2"
name="pincode"
value="{{ $institution->pincode }}">

<input class="form-control mb-2"
name="website"
value="{{ $institution->website }}"
placeholder="https://...">

<input type="date"
class="form-control mb-2"
name="valid_until"
value="{{ $institution->valid_until?->format('Y-m-d') }}">

<select name="status" class="form-select mb-2">
<option value="active" @selected($institution->status==='active')>Active</option>
<option value="inactive" @selected($institution->status==='inactive')>Inactive</option>
<option value="suspended" @selected($institution->status==='suspended')>Suspended</option>
</select>

<button class="btn btn-bsss btn-sm">
Save
</button>

</form>

</details>

</td>
</tr>

@empty

<tr>
<td colspan="6" class="text-center py-4">
अभी कोई approved affiliated institution नहीं है।
</td>
</tr>

@endforelse

</tbody>
</table>

</div>
</div>

<div class="mt-4">
{{ $institutions->links() }}
</div>

@endsection
