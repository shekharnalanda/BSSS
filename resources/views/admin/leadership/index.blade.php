@extends('admin.layouts.app')

@section('content')
<div style="max-width:1200px;margin:auto;padding:20px">

    <h1 style="color:#7a1f2b">राष्ट्रीय नेतृत्व संदेश</h1>

    @if(session('success'))
        <div style="padding:12px;background:#e8f5e9;color:#1b5e20;border-radius:8px;margin-bottom:20px">
            {{ session('success') }}
        </div>
    @endif

    @foreach($messages as $message)
        <div style="background:white;border:1px solid #ddd;border-radius:12px;padding:20px;margin-bottom:20px">

            <h2 style="margin-top:0">{{ $message->title ?: 'नेतृत्व संदेश' }}</h2>

            <form method="POST"
                  action="{{ route('admin.leadership.update',$message) }}">
                @csrf
                @method('PUT')

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px">
                    <input name="name" value="{{ $message->name }}" required
                           placeholder="नाम" style="padding:10px">

                    <input name="designation" value="{{ $message->designation }}" required
                           placeholder="पद" style="padding:10px">

                    <input name="title" value="{{ $message->title }}"
                           placeholder="शीर्षक" style="padding:10px">

                    <input name="mobile" value="{{ $message->mobile }}"
                           placeholder="मोबाइल" style="padding:10px">

                    <input name="photo" value="{{ $message->photo }}"
                           placeholder="Photo path" style="padding:10px">

                    <input type="number" name="sort_order"
                           value="{{ $message->sort_order }}" min="0"
                           style="padding:10px">
                </div>

                <textarea name="message" rows="8"
                          placeholder="राष्ट्रीय अध्यक्ष का संदेश..."
                          style="width:100%;margin-top:12px;padding:12px;box-sizing:border-box">{{ $message->message }}</textarea>

                <div style="margin-top:10px">
                    <label>
                        <input type="checkbox" name="is_featured" value="1"
                               @checked($message->is_featured)>
                        Featured
                    </label>

                    <label style="margin-left:15px">
                        <input type="checkbox" name="is_active" value="1"
                               @checked($message->is_active)>
                        Active
                    </label>
                </div>

                <button type="submit"
                        style="margin-top:12px;background:#7a1f2b;color:white;border:0;padding:10px 18px;border-radius:6px">
                    संदेश सुरक्षित करें
                </button>
            </form>
        </div>
    @endforeach

</div>
@endsection
