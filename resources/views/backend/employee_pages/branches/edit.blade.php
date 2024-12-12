@extends('backend.layouts.master', ['pageSlug' => 'branch'])

@section('title', 'ICSB Branches')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ _('Edit ICSB Branch') }}</h5>
                </div>
                <form method="POST" action="{{ route('branch.branch_edit', $branch->id) }}" autocomplete="off"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8 form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label>{{ _('Name') }}<span class="text-danger">*</span></label>
                                <input type="text" name="name"
                                    class="form-control title {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    placeholder="{{ _('Enter Name') }}" value="{{ $branch->name }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                            <div class=" col-md-4 form-group {{ $errors->has('order_key') ? ' has-danger' : '' }}">
                                <label>{{ _('Order') }}</label>
                                <select class="form-control {{ $errors->has('order_key') ? ' is-invalid' : '' }}"
                                    name="order_key">
                                    @for ($x = 1; $x <= 1000; $x++)
                                        @php
                                            $check = App\Models\IcsbBranch::where('order_key', $x)->first();
                                        @endphp
                                        @if ($branch->order_key == $x)
                                            <option value="{{ $x }}" selected>{{ $x }}</option>
                                        @elseif(!$check)
                                            <option value="{{ $x }}">{{ $x }}</option>
                                        @endif
                                    @endfor
                                </select>
                                @include('alerts.feedback', ['field' => 'order_key'])
                            </div>
                            <div class="form-group col-md-12 {{ $errors->has('slug') ? ' has-danger' : '' }}">
                                <label>{{ _('Slug') }}<span class="text-danger">*</span></label>
                                <input type="text" class="form-control {{ $errors->has('slug') ? ' is-invalid' : '' }}"
                                    id="slug" name="slug" placeholder="{{ _('Enter Slug') }}"
                                    value="{{ $branch->slug }}">
                                @include('alerts.feedback', ['field' => 'slug'])
                            </div>
                            <div class="col-md-6 form-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
                                <label>{{ _('Phone') }}</label>
                                <input type="tel" name="phone"
                                    class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                    placeholder="{{ _('Enter Phone Number') }}" value="{{ $branch->phone }}">
                                @include('alerts.feedback', ['field' => 'phone'])
                            </div>
                            <div class="col-md-6 form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                                <label>{{ _('Email') }}</label>
                                <input type="text" name="email"
                                    class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    placeholder="{{ _('Enter Email') }}" value="{{ $branch->email }}">
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>
                            <div class="col-md-12 form-group {{ $errors->has('address') ? ' has-danger' : '' }}">
                                <label>{{ _('address') }}</label>
                                <textarea name="address" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}"
                                    placeholder="Enter address">{{ $branch->address }}</textarea>
                                @include('alerts.feedback', ['field' => 'address'])
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ _('Update') }}</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <b>{{ _('Assigned Officer') }}</b>
                    </p>
                    <div class="card-description">
                        <p><b>Name:</b> This field is required. It is a text field with character limit of 255 characters.
                        </p>
                        <p><b>Slug:</b> This field is required and unique. It is an auto-generated field from the Title. It
                            represents the URL of the Event.</p>
                        <b>Order:</b> This field is required and unique. It is a number field. It manages the order of the
                        ICSB Branches</p>
                        <p><b>Phone:</b> This field is nullable & unique. It represents the contact number of the assigned
                            officers</p>
                        <p><b>Email:</b> This field is nullable & unique. It is a email field with a maximum character limit
                            of 255. The entered value must follow the standard email format (e.g., user@example.com) and
                            represents the email of the assigned officers.</p>
                        <p><b>Address:</b> This field is nullable. It is a textarea field</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function generateSlug(str) {
            return str
                .toLowerCase()
                .replace(/\s+/g, "-")
                .replace(/[^\w-]+/g, "")
                .replace(/--+/g, "-")
                .replace(/^-+|-+$/g, "");
        }
        $(document).ready(function() {
            $(".title").on("keyup mouseleave blur focusout ", function() {
                const titleValue = $(this).val().trim();
                const slugValue = generateSlug(titleValue);
                $("#slug").val(slugValue);
            });
        });
    </script>
@endpush
