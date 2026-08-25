@extends('admin.layouts.app')

@section('title','Membership Applications')

@section('content')

<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">

<div>
<h2 class="admin-heading mb-1">Membership Applications</h2>
<p class="text-muted mb-0">BSSS के ऑनलाइन सदस्यता आवेदनों का प्रबंधन</p>
</div>

<form method="GET" class="d-flex gap-2">
<select name="status" class="form-select">
<option value="">All Status</option>
@foreach(['pending'=>'Pending','approved'=>'Approved','rejected'=>'Rejected'] as $value=>$label)
<option value="{{ $value }}" @selected(request('status') === $value)>
{{ $label }}
</option>
@endforeach
</select>

<button class="btn btn-outline-secondary">Filter</button>
</form>

</div>

<div class="card overflow-hidden">

<div class="table-responsive">

<table class="table table-hover align-middle mb-0">

<thead class="table-light">
<tr>
<th>ID</th>
<th>Applicant</th>
<th>Membership</th>
<th>Location</th>
<th>Status</th>
<th>Date</th>
<th>Action</th>
</tr>
</thead>

<tbody>

@forelse($applications as $application)

<tr>

<td>#{{ $application->id }}</td>

<td>
<strong>{{ $application->name }}</strong><br>
<span class="small">{{ $application->mobile }}</span>

@if($application->email)
<br><span class="small text-muted">{{ $application->email }}</span>
@endif

@if($application->institution_name)
<br><span class="small text-muted">{{ $application->institution_name }}</span>
@endif
</td>

<td>
{{ $application->membershipType?->name ?? '—' }}
</td>

<td>
{{ $application->district ?: '—' }}
@if($application->state)
<br><span class="small text-muted">{{ $application->state }}</span>
@endif
</td>

<td>
@if($application->status === 'approved')
<span class="badge text-bg-success">Approved</span>
@elseif($application->status === 'rejected')
<span class="badge text-bg-danger">Rejected</span>
@else
<span class="badge text-bg-warning">Pending</span>
@endif
</td>

<td>{{ $application->created_at->format('d M Y') }}</td>

<td style="min-width:260px">

<details>
<summary class="btn btn-sm btn-outline-secondary">View / Manage</summary>

<div class="mt-3 p-3 border rounded bg-light">

@if($application->father_or_spouse_name)
<p class="mb-1"><strong>Father/Spouse:</strong> {{ $application->father_or_spouse_name }}</p>
@endif

@if($application->date_of_birth)
<p class="mb-1"><strong>DOB:</strong> {{ $application->date_of_birth->format('d-m-Y') }}</p>
@endif

@if($application->occupation)
<p class="mb-1"><strong>Occupation:</strong> {{ $application->occupation }}</p>
@endif

@if($application->address)
<p class="mb-1"><strong>Address:</strong> {{ $application->address }}</p>
@endif

@if($application->pincode)
<p class="mb-1"><strong>PIN:</strong> {{ $application->pincode }}</p>
@endif

@if($application->message)
<p class="mb-3"><strong>Message:</strong> {{ $application->message }}</p>
@endif

<form method="POST"
action="{{ route('admin.membership-applications.update',$application) }}">
@csrf
@method('PATCH')

<select name="status" class="form-select mb-2">
<option value="pending" @selected($application->status==='pending')>Pending</option>
<option value="approved" @selected($application->status==='approved')>Approved</option>
<option value="rejected" @selected($application->status==='rejected')>Rejected</option>
</select>

<textarea name="admin_note"
class="form-control mb-2"
rows="3"
placeholder="Admin Note">{{ $application->admin_note }}</textarea>

<button class="btn btn-bsss btn-sm">
Update
</button>

</form>

<form method="POST"
action="{{ route('admin.membership-applications.destroy',$application) }}"
onsubmit="return confirm('Delete this application?')"
class="mt-2">
@csrf
@method('DELETE')
<button class="btn btn-outline-danger btn-sm">
Delete
</button>
</form>

</div>

</details>

</td>

</tr>

@empty

<tr>
<td colspan="7" class="text-center py-4 text-muted">
अभी कोई सदस्यता आवेदन प्राप्त नहीं हुआ है।
</td>
</tr>

@endforelse

</tbody>
</table>

</div>
</div>

<div class="mt-4">
{{ $applications->links() }}
</div>

@endsection
