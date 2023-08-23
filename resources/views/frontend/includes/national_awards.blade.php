<!----============================ National Award Section ==========================---->
@if(count($national_awards))
<section class="national-award-section z-index big-sec-height">
    <div class="container">
        <div class="award-row">
            <div class="section-heading text-align">
                <h2 class="title-shap">{{_('ICSB National Award')}}</h2>
            </div>

            <div class="national-award-carousel">
                <div class="national-award-slider owl-carousel owl-theme">
                    @foreach ($national_awards as $award)
                        <div class="item">
                            <a href="{{ $award->file ? route('sp.file.download', base64_encode($award->file)) : route('sp.file.download', base64_encode($award->image)) }}"><img src="{{storage_url($award->image)}}" align="{{ $award->title }}"></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
