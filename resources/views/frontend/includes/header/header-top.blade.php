<div class="top-header-section">
    <div class="container">
        <div class="header-content-column flex">
            <div class="header-column text-center  flex ">
                @if(isset($memberLogin->saved_data) && !empty(json_decode($memberLogin->saved_data)->{'url'}))
                    <a href="{{ json_decode($memberLogin->saved_data)->{'url'} }}" target="_blank">Member's Login</a>@endif
                @if(isset($studentLogin->saved_data) && !empty(json_decode($studentLogin->saved_data)->{'url'}))
                    <a href="{{ json_decode($studentLogin->saved_data)->{'url'} }}" target="_blank">Students Login</a>
                @endif
            </div>
            <div class="header-column text-center justify-content-center flex ">
                <p>{{ date( 'l, M d, Y', strtotime(Carbon\Carbon::now()) ) }}</p>
                <p id="currentTime"> (BST)</p>
            </div>
            <div class="header-column header-info-column text-center  flex ">
                @if(!empty($contact->phone))
                    @foreach (json_decode($contact->phone) as $phone)
                        @if($phone->type == 'Phone')
                            <a href="tel:88{{$phone->number}}"><i class="fa-solid fa-phone"></i>+88{{$phone->number}}</a>
                            @break
                        @endif
                    @endforeach
                @endif
                @if(!empty($contact->email))
                    @foreach (json_decode($contact->email) as $email)
                        <a href="mailto:{{$email}}"><i class="fa-solid fa-envelope"></i> {{ $email }}</a>
                        @break
                    @endforeach
                @endif


            </div>
        </div>
    </div>
</div>
