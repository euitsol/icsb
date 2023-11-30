<!----============================ National Award Section ==========================---->
@if (count($national_awards))
    <section class="national-award-section z-index big-sec-height">
        <div class="container">
            <div class="award-row">
                <div class="section-heading text-align">
                    <h2 class="title-shap">{{ _('ICSB National Award') }}</h2>
                </div>
                <div class="national-award-carousel">
                    <div class="owl-carousel owl-theme">
                        @foreach ($national_awards as $award)
                            <div class="item">
                                <a class="demo col-12"
                                    href="{{ $award->file ? route('sp.file.download', base64_encode($award->file)) : storage_url($award->image)}}"
                                    @if (empty($award->file)) data-lightbox="gallery" @else target="_blank" @endif>
                                    <img class="example-image" src="{{ storage_url($award->image) }}"
                                        alt="{{ $award->title }}" loading="lazy" />
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endif
