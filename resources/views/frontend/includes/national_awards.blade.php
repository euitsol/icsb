<section class="national-award-section">
    <div class="container">
        <div class="award-row">
            <div class="section-heading text-align">
                <h2>ICSB National Award</h2>
            </div>
            <div class="award-column flex">
                @foreach ($national_awards as $award)
                    <div class="award-inner">
                        <a href="{{$award->url}}"><img src="{{storage_url($award->image)}}" align="{{ $award->title }}"></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
