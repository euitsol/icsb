<div class="top-header-section">
    <div class="container">
        <div class="header-content-column flex">
            <div class="header-column text-center  flex ">
                @if (isset($memberLogin->saved_data) && !empty(json_decode($memberLogin->saved_data)->{'url'}))
                    <a href="{{ json_decode($memberLogin->saved_data)->{'url'} }}" target="_blank">Member's Login</a>
                @endif
                @if (isset($studentLogin->saved_data) && !empty(json_decode($studentLogin->saved_data)->{'url'}))
                    <a href="{{ json_decode($studentLogin->saved_data)->{'url'} }}" target="_blank">Students Login</a>
                @endif
            </div>
            <div class="header-column text-center justify-content-center flex ">
                <p>{{ date('l, M d, Y', strtotime(Carbon\Carbon::now())) }}</p>
                <p id="currentTime"> (BST)</p>
            </div>
            <div class="header-column header-info-column text-center  flex ">
                @if (isset($contact->location) && !empty($contact->location))
                    @if (isset(json_decode($contact->location)->{1}->phones) && !empty(json_decode($contact->location)->{1}->phones))
                        @foreach (json_decode($contact->location)->{'1'}->phones as $phone)
                            @if ($phone->type == 'Phone')
                                <a href="tel:88{{ $phone->number }}"><i
                                        class="fa-solid fa-phone"></i>+88{{ $phone->number }}</a>
                            @break
                        @endif
                    @endforeach
                @endif
                @if (isset(json_decode($contact->location)->{'1'}->emails) && !empty(json_decode($contact->location)->{'1'}->emails))
                    <a href="mailto:{{ json_decode($contact->location)->{'1'}->emails[0] }}"><i
                            class="fa-solid fa-envelope"></i>
                        {{ json_decode($contact->location)->{'1'}->emails[0] }}</a>
                @endif
            @endif
        </div>
    </div>
</div>
</div>
