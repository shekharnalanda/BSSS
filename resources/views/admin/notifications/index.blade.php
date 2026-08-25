@extends('admin.layouts.app')

@section('title','Notifications')

@section('content')

<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">

<div>
<h2 class="admin-heading mb-1">
Notifications
</h2>

<p class="text-muted mb-0">
Membership, affiliation और system activity alerts
</p>
</div>

<form method="POST"
      action="{{ route('admin.notifications.read-all') }}">
@csrf
@method('PATCH')

<button class="btn btn-outline-secondary">
Mark All Read
</button>
</form>

</div>

@forelse($notifications as $notification)

<div class="card p-4 mb-3 {{ $notification->is_read ? '' : 'border border-warning' }}">

<div class="d-flex flex-wrap justify-content-between gap-3">

<div class="flex-grow-1">

<div class="small text-uppercase fw-bold text-muted mb-1">
{{ str_replace('_',' ',ucfirst($notification->type)) }}
</div>

<h5 class="admin-heading mb-2">
{{ $notification->title }}
</h5>

<p class="mb-2">
{{ $notification->message }}
</p>

<div class="small text-muted">
{{ $notification->created_at->format('d M Y h:i A') }}
</div>

</div>

<div class="d-flex flex-column gap-2">

@if($notification->url)

<form method="POST"
      action="{{ route('admin.notifications.read',$notification) }}">
@csrf
@method('PATCH')

<button class="btn btn-bsss btn-sm">
Open
</button>
</form>

@elseif(!$notification->is_read)

<form method="POST"
      action="{{ route('admin.notifications.read',$notification) }}">
@csrf
@method('PATCH')

<button class="btn btn-outline-secondary btn-sm">
Mark Read
</button>
</form>

@endif

<form method="POST"
      action="{{ route('admin.notifications.destroy',$notification) }}"
      onsubmit="return confirm('Delete notification?')">
@csrf
@method('DELETE')

<button class="btn btn-outline-danger btn-sm">
Delete
</button>
</form>

</div>

</div>

</div>

@empty

<div class="alert alert-light border text-center">
अभी कोई notification नहीं है।
</div>

@endforelse

<div class="mt-4">
{{ $notifications->links() }}
</div>

@endsection
