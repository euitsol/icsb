<div class="top-header-section">
    <div class="container">
        <div class="header-content-column flex">
            <div class="header-column text-center  flex ">
                <a href="https://icsberp.org/users/login.aspx">Member's Login</a>
                <a href="https://icsberp.org/users/login.aspx">Students Login</a>
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
