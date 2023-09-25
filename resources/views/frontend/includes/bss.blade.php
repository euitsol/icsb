<!----============================ BSS Secretarial Section ==========================---->
<section class="bss-section both-sec-height">
    <div class="container">
        <div class="bss-row flex">
            <div class="bss-left-column wow fadeInLeftBig">
                <h2>{{_('Bangladesh Secretarial Standards (BSS)')}}</h2>
            </div>
            <div class="bss-right-column flex wow fadeInRightBig">
                @foreach ($home_bsss as $key => $home_bss)
                    <a href="{{ route('rules_view.bss.view', $home_bss->slug) }}">
                        <div class="bss-item text-align">
                            <div class="bss-icon">
                                <img
                                    src="{{ storage_url($home_bss->image) }}"
                                    alt="{{ $home_bss->short_title }}"
                                />
                            </div>
                            <div class="title">
                                <h3>
                                    {{ $home_bss->title }}
                                </h3>
                            </div>
                            <div class="bottom-content">
                                <img
                                    src="{{ asset('frontend/img/bss/bss-check-icon.png') }}"
                                />
                                <h4>{{ $home_bss->short_title }}</h4>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

