<section class="national-award-section big-sec-height d-flex align-items-center">
    <div class="container">
        <div class="award-row">
            <div class="section-heading text-align">
                <h2>ICSB National Award</h2>
            </div>
            <div class="award-column flex">
                @forelse ($national_awards as $award)
                    <div class="award-inner">
                        <a href="{{ $award->file ? route('sp.file.download', base64_encode($award->file)) : route('sp.file.download', base64_encode($award->image)) }}"><img src="{{storage_url($award->image)}}" align="{{ $award->title }}"></a>
                    </div>
                @empty
                <div class="award-inner">
                    <a href=""><img src="{{ asset('no_img/no_img.jpg')}}" align="...."></a>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
