<section class="notice-section big-sec-height position-relative" id="particles-js-snow">


    <div class="bird-container bird-container-one">
        <div class="bird bird-one"></div>
     </div>
     <div class="bird-container bird-container-two">
       <div class="bird bird-two"></div>
     </div>
      <div class="bird-container bird-container-three">
        <div class="bird bird-three"></div>
      </div>
      <div class="bird-container bird-container-four">
        <div class="bird bird-four"></div>
      </div>

     <div class="bird-container bird-container-one">
        <div class="bird bird-one"></div>
     </div>
     <div class="bird-container bird-container-two">
       <div class="bird bird-two"></div>
     </div>
      <div class="bird-container bird-container-three">
        <div class="bird bird-three"></div>
      </div>
      <div class="bird-container bird-container-four">
        <div class="bird bird-four"></div>
      </div>


    <div class="container">
        <div class="notice-row">
            <div class="section-heading text-align wow fadeInRightBig">
                <h2 class="title-shap">{{_('Notice Board')}}</h2>
            </div>
            <div class="notice-board-wrapper">
                <div class="left-column notice-details-col wow fadeInLeftBig">
                    @foreach ($notices as $notice)
                    <div class="notice-content flex w-100">
                        <div class="date-col">
                            <h4>{{date('M d, Y', strtotime($notice->created_at))}}</h4>
                        </div>
                        <div class="content-col">
                            <h3>
                                <a href="{{ route('notice_view.notice',$notice->slug) }}">{{$notice->title}}</a>
                            </h3>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-clock"></i>{{date('H:i A', strtotime($notice->created_at))}}
                                </li>
                                <li>
                                    <i class="fa-solid fa-user-large"></i>{{_('CS Bangladesh')}}
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="right-column notice-title-col wow fadeInRightBig">
                    <div class="notice-wrapper">
                        <div class="title-box">
                            <h4>{{_('Categories')}}</h4>
                            <ul>
                                <li class="active category" data-cat-id="0"><a href="javascript:void(0)" >{{_('All')}}</a></li>
                                @foreach ($notice_cats as $cat)
                                    <li class="category" data-cat-id="{{$cat->id}}"><a href="javascript:void(0)" >{{$cat->title}}</a></li>
                                @endforeach
                            </ul>
                            <div class="button-wrapper">
                                <a class="transparent-button" href="{{route('notice_view.notice')}}">{{_('View All Notice')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('js')
<script>
    $(document).ready(function () {
        $('.category').on('click', function () {
            let id = $(this).data('cat-id');
            let _url = ("{{ route('home.notice', ['cat_id']) }}");
            let __url = _url.replace('cat_id', id);
            $.ajax({
                url: __url,
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    var noticeDetailsHtml = '';

                    // Loop through the notices data
                    data.notices.forEach(function (notice) {
                        let route = ("{{ route('notice_view.notice', ['slug']) }}");
                        let _route = route.replace('slug', notice.slug);
                        noticeDetailsHtml += `
                            <div class="notice-content flex w-100">
                                <div class="date-col">
                                    <h4>${notice.date}</h4>
                                </div>
                                <div class="content-col">
                                    <h3><a href="${_route}">${notice.title}</a></h3>
                                    <ul>
                                        <li><i class="fa-solid fa-clock"></i>${notice.time}</li>
                                        <li><i class="fa-solid fa-user-large"></i>${notice.category.title}</li>
                                    </ul>
                                </div>
                            </div>
                        `;
                    });
                    // Insert the generated HTML into the '.notice-details-col' element
                    $('.notice-details-col').html(noticeDetailsHtml);
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching notices:', error);
                }
            });
        });
    });
</script>

@endpush
