<section class="notice-section big-sec-height">
    <div class="container">
        <div class="notice-row">
            <div class="section-heading text-align">
                <h2 class="title-shap">{{_('Notice Board')}}</h2>
            </div>
            <div class="notice-board-wrapper">
                <div class="left-column notice-details-col">
                    @foreach ($notices as $notice)
                    <div class="notice-content flex w-100">
                        <div class="date-col">
                            <h4>{{date('M d, Y', strtotime($notice->created_at))}}</h4>
                        </div>
                        <div class="content-col">
                            <h3>
                                <a href="#">{{$notice->title}}</a>
                            </h3>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-clock"></i>{{date('H:i A', strtotime($notice->created_at))}}
                                </li>
                                <li>
                                    <i class="fa-solid fa-user-large"></i>{{$notice->title}}
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="right-column notice-title-col">
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
                                <a class="transparent-button" href="{{route('notice_view.notice')}}">{{_('View All')}}</a>
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
            $.ajax({
                url: `/home/notice/${id}`,
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    var noticeDetailsHtml = '';

                    // Loop through the notices data
                    data.notices.forEach(function (notice) {
                        noticeDetailsHtml += `
                            <div class="notice-content flex w-100">
                                <div class="date-col">
                                    <h4>${notice.date}</h4>
                                </div>
                                <div class="content-col">
                                    <h3><a href="#">${notice.title}</a></h3>
                                    <ul>
                                        <li><i class="fa-solid fa-clock"></i>${notice.time}</li>
                                        <li><i class="fa-solid fa-user-large"></i>${notice.category.title}</li>
                                    </ul>
                                </div>
                            </div>
                        `;
                    });
                    // Insert the generated HTML into the '.notice-details-col' element
                    $('.left-column').html(noticeDetailsHtml);
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching notices:', error);
                }
            });
        });
    });
</script>

@endpush
