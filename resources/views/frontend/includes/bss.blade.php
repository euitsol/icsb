<section class="bss-section">
    <div class="container">
        <div class="bss-row flex">
            <div class="bss-left-column">
                <h2>{{_('Bangladesh Secretarial Standards (BSS)')}}</h2>
            </div>
            <div class="bss-right-column flex">
                @foreach ($home_bsss as $home_bss)
                    <div class="bss-item text-align">
                        <div class="bss-icon">
                            <img
                                src="{{storage_url($home_bss->image)}}" alt="{{$home_bss->short_title}}"
                            />
                        </div>
                        <h3>{{$home_bss->title}}</h3>
                        <div class="bottom-content">
                            <img
                                src="{{asset('frontend/img/bss/bss-check-icon.png')}}"
                            />
                            <h4>{{$home_bss->short_title}}</h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
