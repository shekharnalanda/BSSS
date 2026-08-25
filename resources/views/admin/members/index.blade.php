@extends('admin.layouts.app')

@section('title','Members')

@section('content')

<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
<div>
<h2 class="admin-heading mb-1">Approved Members</h2>
<p class="text-muted mb-0">BSSS permanent membership records</p>
</div>

<form method="GET" class="d-flex gap-2">
<input class="form-control"
       name="search"
       value="{{ request('search') }}"
       placeholder="Name / Mobile / Member No.">
<button class="btn btn-outline-secondary">Search</button>
</form>
</div>

<div class="card overflow-hidden">
<div class="table-responsive">

<table class="table table-hover align-middle mb-0">

<thead class="table-light">
<tr>
<th>Membership No.</th>
<th>Member</th>
<th>Type</th>
<th>Location</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>

<tbody>

@forelse($members as $member)

<tr>

<td>
<strong>{{ $member->membership_number }}</strong>
</td>

<td>
<strong>{{ $member->name }}</strong><br>
<span class="small">{{ $member->mobile }}</span>
@if($member->institution_name)
<br><span class="small text-muted">{{ $member->institution_name }}</span>
@endif
</td>

<td>
{{ $member->membershipType?->name ?? '—' }}
</td>

<td>
{{ $member->district ?: '—' }}
@if($member->state)
<br><span class="small text-muted">{{ $member->state }}</span>
@endif
</td>

<td>
@if($member->status === 'active')
<span class="badge text-bg-success">Active</span>
@elseif($member->status === 'suspended')
<span class="badge text-bg-danger">Suspended</span>
@else
<span class="badge text-bg-secondary">Inactive</span>
@endif
</td>

<td style="min-width:250px">

<div class="d-flex flex-wrap gap-1 mb-2">

<a href="{{ route('admin.members.card',$member) }}"
   target="_blank"
   class="btn btn-sm btn-bsss">
ID Card
</a>

<a href="{{ route('admin.members.certificate',$member) }}"
   target="_blank"
   class="btn btn-sm btn-outline-secondary">
Certificate
</a>

</div>

<details>

<summary class="btn btn-sm btn-outline-dark">
Edit
</summary>

<form method="POST"
      action="{{ route('admin.members.update',$member) }}"
      enctype="multipart/form-data"
      class="mt-3 p-3 border rounded bg-light">

@csrf
@method('PUT')

<input class="form-control mb-2"
       name="name"
       value="{{ $member->name }}"
       required>

<input class="form-control mb-2"
       name="mobile"
       value="{{ $member->mobile }}"
       required>

<input class="form-control mb-2"
       type="email"
       name="email"
       value="{{ $member->email }}"
       placeholder="Email">

<input class="form-control mb-2"
       name="occupation"
       value="{{ $member->occupation }}"
       placeholder="Occupation">

<input class="form-control mb-2"
       name="institution_name"
       value="{{ $member->institution_name }}"
       placeholder="Institution">

<textarea class="form-control mb-2"
          name="address"
          placeholder="Address">{{ $member->address }}</textarea>

<input class="form-control mb-2"
       name="district"
       value="{{ $member->district }}"
       placeholder="District">

<input class="form-control mb-2"
       name="state"
       value="{{ $member->state }}"
       placeholder="State">

<input class="form-control mb-2"
       name="pincode"
       value="{{ $member->pincode }}"
       placeholder="PIN">

@if($member->photo)
<div class="mb-2">
<img src="{{ asset('storage/'.$member->photo) }}"
     alt="{{ $member->name }}"
     style="width:80px;height:95px;object-fit:cover;border-radius:8px">
</div>
@endif

<input class="form-control mb-2"
       type="file"
       name="photo"
       accept=".jpg,.jpeg,.png,.webp,image/*">

<input class="form-control mb-2"
       type="date"
       name="valid_until"
       value="{{ optional($member->valid_until)->format('Y-m-d') }}">

<select name="status" class="form-select mb-2">
<option value="active" @selected($member->status==='active')>Active</option>
<option value="inactive" @selected($member->status==='inactive')>Inactive</option>
<option value="suspended" @selected($member->status==='suspended')>Suspended</option>
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
<td colspan="6" class="text-center py-4 text-muted">
अभी कोई approved member नहीं है।
</td>
</tr>

@endforelse

</tbody>
</table>

</div>
</div>

<div class="mt-4">
{{ $members->links() }}
</div>

@endsection
