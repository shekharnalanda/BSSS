@extends('admin.layouts.app')

@section('content')
<div style="max-width:1400px;margin:auto;padding:20px">

    <div style="margin-bottom:25px">
        <h1 style="margin:0;color:#7a1f2b;">BSSS कार्यकारिणी प्रबंधन</h1>
        <p style="color:#666;margin-top:6px;">
            राष्ट्रीय, प्रदेश, जिला एवं अन्य कार्यकारिणियों तथा सदस्यों का प्रबंधन
        </p>
    </div>

    @if(session('success'))
        <div style="padding:12px 15px;background:#e8f5e9;color:#1b5e20;border-radius:8px;margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="padding:12px 15px;background:#ffebee;color:#b71c1c;border-radius:8px;margin-bottom:20px;">
            <ul style="margin:0;padding-left:20px">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div style="background:#fff;border:1px solid #ddd;border-radius:12px;padding:20px;margin-bottom:30px;">
        <h2 style="margin-top:0;color:#17365d;">नई कार्यकारिणी जोड़ें</h2>

        <form method="POST" action="{{ route('admin.committees.store') }}">
            @csrf

            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:12px">
                <input name="name" required placeholder="कार्यकारिणी का नाम"
                       style="padding:10px;border:1px solid #ccc;border-radius:6px">

                <select name="level" required
                        style="padding:10px;border:1px solid #ccc;border-radius:6px">
                    <option value="">स्तर चुनें</option>
                    <option value="national">राष्ट्रीय</option>
                    <option value="state">प्रदेश</option>
                    <option value="district">जिला</option>
                    <option value="block">प्रखंड</option>
                    <option value="local">स्थानीय</option>
                </select>

                <input name="state" placeholder="राज्य"
                       style="padding:10px;border:1px solid #ccc;border-radius:6px">

                <input name="district" placeholder="जिला"
                       style="padding:10px;border:1px solid #ccc;border-radius:6px">

                <input type="number" name="sort_order" value="0" min="0"
                       placeholder="क्रम"
                       style="padding:10px;border:1px solid #ccc;border-radius:6px">
            </div>

            <textarea name="description" rows="2" placeholder="विवरण"
                      style="width:100%;margin-top:12px;padding:10px;border:1px solid #ccc;border-radius:6px;box-sizing:border-box"></textarea>

            <label style="display:inline-block;margin-top:12px">
                <input type="checkbox" name="is_active" value="1" checked>
                Active
            </label>

            <br>

            <button type="submit"
                    style="margin-top:12px;background:#7a1f2b;color:#fff;border:0;padding:10px 18px;border-radius:7px;cursor:pointer">
                कार्यकारिणी जोड़ें
            </button>
        </form>
    </div>

    @foreach($committees as $committee)
        <div style="background:#fff;border:1px solid #ddd;border-radius:12px;margin-bottom:25px;overflow:hidden">

            <div style="background:linear-gradient(90deg,#7a1f2b,#a63a2d);color:white;padding:15px 20px;">
                <strong style="font-size:20px">{{ $committee->name }}</strong>
                <div style="font-size:13px;margin-top:4px">
                    {{ strtoupper($committee->level) }}
                    @if($committee->state) • {{ $committee->state }} @endif
                    @if($committee->district) • {{ $committee->district }} @endif
                </div>
            </div>

            <div style="padding:20px">

                <details style="margin-bottom:20px">
                    <summary style="cursor:pointer;font-weight:bold;color:#17365d">
                        कार्यकारिणी विवरण संपादित करें
                    </summary>

                    <form method="POST"
                          action="{{ route('admin.committees.update',$committee) }}"
                          style="margin-top:15px">
                        @csrf
                        @method('PUT')

                        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(170px,1fr));gap:10px">
                            <input name="name" value="{{ $committee->name }}" required
                                   style="padding:9px;border:1px solid #ccc;border-radius:6px">

                            <select name="level"
                                    style="padding:9px;border:1px solid #ccc;border-radius:6px">
                                @foreach(['national'=>'राष्ट्रीय','state'=>'प्रदेश','district'=>'जिला','block'=>'प्रखंड','local'=>'स्थानीय'] as $value=>$label)
                                    <option value="{{ $value }}" @selected($committee->level === $value)>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>

                            <input name="state" value="{{ $committee->state }}" placeholder="राज्य"
                                   style="padding:9px;border:1px solid #ccc;border-radius:6px">

                            <input name="district" value="{{ $committee->district }}" placeholder="जिला"
                                   style="padding:9px;border:1px solid #ccc;border-radius:6px">

                            <input type="number" name="sort_order"
                                   value="{{ $committee->sort_order }}" min="0"
                                   style="padding:9px;border:1px solid #ccc;border-radius:6px">
                        </div>

                        <textarea name="description" rows="2"
                                  style="width:100%;margin-top:10px;padding:9px;border:1px solid #ccc;border-radius:6px;box-sizing:border-box">{{ $committee->description }}</textarea>

                        <label>
                            <input type="checkbox" name="is_active" value="1" @checked($committee->is_active)>
                            Active
                        </label>

                        <button type="submit"
                                style="margin-left:10px;background:#17365d;color:white;border:0;padding:8px 14px;border-radius:6px">
                            Update
                        </button>
                    </form>
                </details>

                <h3 style="color:#7a1f2b">सदस्य</h3>

                <div style="overflow-x:auto">
                    <table style="width:100%;border-collapse:collapse">
                        <thead>
                        <tr style="background:#f6efe8">
                            <th style="padding:9px;border:1px solid #ddd">क्रम</th>
                            <th style="padding:9px;border:1px solid #ddd">पद</th>
                            <th style="padding:9px;border:1px solid #ddd">नाम</th>
                            <th style="padding:9px;border:1px solid #ddd">मोबाइल</th>
                            <th style="padding:9px;border:1px solid #ddd">स्थिति</th>
                            <th style="padding:9px;border:1px solid #ddd">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse($committee->members as $member)
                            <tr>
                                <td style="padding:8px;border:1px solid #ddd">{{ $member->sort_order }}</td>
                                <td style="padding:8px;border:1px solid #ddd">{{ $member->designation }}</td>
                                <td style="padding:8px;border:1px solid #ddd">
                                    <strong>{{ $member->name }}</strong>

                                    @if($member->is_authorized_person)
                                        <div style="font-size:12px;color:#b26a00">Authorized Person</div>
                                    @endif
                                </td>
                                <td style="padding:8px;border:1px solid #ddd">
                                    {{ $member->mobile }}
                                    @if($member->alternate_mobile)
                                        <br>{{ $member->alternate_mobile }}
                                    @endif
                                </td>
                                <td style="padding:8px;border:1px solid #ddd">
                                    {{ $member->is_active ? 'Active' : 'Inactive' }}
                                </td>
                                <td style="padding:8px;border:1px solid #ddd">
                                    <details>
                                        <summary style="cursor:pointer;color:#17365d">Edit</summary>

                                        <form method="POST"
                                              action="{{ route('admin.committee-members.update',$member) }}"
                                              style="margin-top:10px">
                                            @csrf
                                            @method('PUT')

                                            <input name="designation" value="{{ $member->designation }}"
                                                   required placeholder="पद"
                                                   style="width:100%;padding:7px;margin-bottom:6px">

                                            <input name="name" value="{{ $member->name }}"
                                                   required placeholder="नाम"
                                                   style="width:100%;padding:7px;margin-bottom:6px">

                                            <input name="mobile" value="{{ $member->mobile }}"
                                                   placeholder="मोबाइल"
                                                   style="width:100%;padding:7px;margin-bottom:6px">

                                            <input name="alternate_mobile" value="{{ $member->alternate_mobile }}"
                                                   placeholder="वैकल्पिक मोबाइल"
                                                   style="width:100%;padding:7px;margin-bottom:6px">

                                            <input name="photo" value="{{ $member->photo }}"
                                                   placeholder="Photo path"
                                                   style="width:100%;padding:7px;margin-bottom:6px">

                                            <input type="number" name="sort_order"
                                                   value="{{ $member->sort_order }}" min="0"
                                                   style="width:100%;padding:7px;margin-bottom:6px">

                                            <label>
                                                <input type="checkbox" name="is_authorized_person" value="1"
                                                       @checked($member->is_authorized_person)>
                                                Authorized
                                            </label><br>

                                            <label>
                                                <input type="checkbox" name="is_featured" value="1"
                                                       @checked($member->is_featured)>
                                                Featured
                                            </label><br>

                                            <label>
                                                <input type="checkbox" name="is_active" value="1"
                                                       @checked($member->is_active)>
                                                Active
                                            </label><br>

                                            <button type="submit"
                                                    style="margin-top:7px;padding:7px 12px">
                                                Save
                                            </button>
                                        </form>

                                        <form method="POST"
                                              action="{{ route('admin.committee-members.destroy',$member) }}"
                                              onsubmit="return confirm('Delete this member?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    style="margin-top:6px;background:#b71c1c;color:white;border:0;padding:7px 12px;border-radius:5px">
                                                Delete
                                            </button>
                                        </form>
                                    </details>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6"
                                    style="padding:15px;text-align:center;border:1px solid #ddd">
                                    कोई सदस्य नहीं
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

                <details style="margin-top:18px">
                    <summary style="cursor:pointer;font-weight:bold;color:#17365d">
                        + नया सदस्य जोड़ें
                    </summary>

                    <form method="POST"
                          action="{{ route('admin.committee-members.store',$committee) }}"
                          style="margin-top:12px">
                        @csrf

                        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:8px">
                            <input name="designation" required placeholder="पद"
                                   style="padding:9px">

                            <input name="name" required placeholder="नाम"
                                   style="padding:9px">

                            <input name="mobile" placeholder="मोबाइल"
                                   style="padding:9px">

                            <input name="alternate_mobile" placeholder="वैकल्पिक मोबाइल"
                                   style="padding:9px">

                            <input name="photo" placeholder="Photo path"
                                   style="padding:9px">

                            <input type="number" name="sort_order" value="0" min="0"
                                   style="padding:9px">
                        </div>

                        <div style="margin-top:10px">
                            <label>
                                <input type="checkbox" name="is_authorized_person" value="1">
                                Authorized Person
                            </label>

                            <label style="margin-left:15px">
                                <input type="checkbox" name="is_featured" value="1">
                                Featured
                            </label>

                            <label style="margin-left:15px">
                                <input type="checkbox" name="is_active" value="1" checked>
                                Active
                            </label>
                        </div>

                        <button type="submit"
                                style="margin-top:10px;background:#7a1f2b;color:white;border:0;padding:9px 15px;border-radius:6px">
                            सदस्य जोड़ें
                        </button>
                    </form>
                </details>

            </div>
        </div>
    @endforeach

</div>
@endsection
