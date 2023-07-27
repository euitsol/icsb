@extends('frontend.master')

@section('title', 'Single Blog')

@section('content')
<!----============================= Breadcrumbs Section ========================---->
<!----============================= Breadcrumbs Section ========================---->
<section class="breadcrumbs-section">
    <div class="overly-image">
        <img src="{{asset('frontend/img/breadcumb/icsb-profile.png')}}" alt="">
    </div>
    <div class="container">
        <div class="breadcrumbs-row flex">
        <div class="left-column content-column">
            <div class="inner-column color-white">
                <h1 class="breadcrumbs-heading blog-breadcrumbs-heading">Mohan Shaheed Dibosh and International Mother </h1>
            </div>
        </div>
    </div>
    </div>
</section>
<!--============================= Blog Thumbnail Section ========================-->
<section class="blog-thumbnail-section">
    <div class="container">
        <div class="heading-content text-align">
            <img src="{{storage_url($blog->thumbnail_image)}}" alt="{{$blog->title}}">
        </div>
    </div>
</section>

<section class="blog-content-section">
    <div class="container">
        <div class="blog-content">
            <div class="blog-content-column">
                <h1>{{$blog->title}}</h1>
                <ul>
                    <li><img src="{{asset('frontend/img/blog-single/user.svg')}}" alt="User Icon"><a href="">{{auth()->user()->name}}</a></li>
                    <li><img src="{{asset('frontend/img/blog-single/calendar.svg')}}" alt="Calendar Icon"><a href="">{{ date('d M Y', strtotime($blog->created_at))}}</a></li>
                    <li><img src="{{asset('frontend/img/blog-single/comment.svg')}}" alt="Comment Icon"><a href="">25 Comments</a></li>
                </ul>
                <p>
                    {!! $blog->description !!}
                </p>
            </div>
            <div class="blog-sidebar-column">
                <div class="recent-post-section">
                    <h2>Recent Posts</h2>
                    <div class="recent-post-content">
                        <div class="image-column">
                            <a href=""><img src="{{asset('frontend/img/blog-single/blog_one.png')}}"></a>
                        </div>
                        <div class="content-column">
                            <h3><a href="">Chief guest speech in the 9th ICSB CGE Award, 20211</a></h3>
                            <p>Dec 20, 2022</p>
                        </div>
                    </div>

                    <div class="recent-post-content">
                        <div class="image-column">
                            <a href=""><img src="{{asset('frontend/img/blog-single/blog_one.png')}}"></a>
                        </div>
                        <div class="content-column">
                            <h3><a href="">Chief guest speech in the 9th ICSB CGE Award, 20211</a></h3>
                            <p>Dec 20, 2022</p>
                        </div>
                    </div>

                    <div class="recent-post-content">
                        <div class="image-column">
                            <a href=""><img src="{{asset('frontend/img/blog-single/blog_one.png')}}"></a>
                        </div>
                        <div class="content-column">
                            <h3><a href="">Chief guest speech in the 9th ICSB CGE Award, 20211</a></h3>
                            <p>Dec 20, 2022</p>
                        </div>
                    </div>

                    <div class="recent-post-content">
                        <div class="image-column">
                            <a href=""><img src="{{asset('frontend/img/blog-single/blog_one.png')}}"></a>
                        </div>
                        <div class="content-column">
                            <h3><a href="">Chief guest speech in the 9th ICSB CGE Award, 20211</a></h3>
                            <p>Dec 20, 2022</p>
                        </div>
                    </div>
                </div>
                <div class="tag-column">
                    <div class="tah-heading">
                        <h3>Popular Tags</h3>
                    </div>
                    <div class="tag-item-content">
                        <div class="tag-item">
                            <a href="">Finance</a>
                        </div>
                        <div class="tag-item">
                            <a href="">Tech</a>
                        </div>
                        <div class="tag-item">
                            <a href="">Life</a>
                        </div>
                        <div class="tag-item">
                            <a href="">News</a>
                        </div>
                        <div class="tag-item">
                            <a href="">Popular</a>
                        </div>
                        <div class="tag-item">
                            <a href="">Tutorial</a>
                        </div>
                        <div class="tag-item">
                            <a href="">Update</a>
                        </div>
                        <div class="tag-item">
                            <a href="">Download</a>
                        </div>
                        <div class="tag-item">
                            <a href="">News</a>
                        </div>
                        <div class="tag-item">
                            <a href="">Education</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-share-section">
    <div class="container">
        <div class="share-content">
            <div class="share-heading-column">
                <p>Share:</p>
            </div>
            <div class="share-icon-column">
                <ul>
                    <li><a href=""><i class="fa-brands fa-facebook-f"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-linkedin-in"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-whatsapp"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="comment-section">
    <div class="container">
        <div class="comment-form-column">
            <p>Write Your Comment</p>
            <form action="">
                <input type="text" name="name" placeholder="Name:">
                <input type="email" name="email" placeholder="Email:">
                <textarea name="message" placeholder="Your Message Here:"></textarea>
                <input class="comment-button" type="submit" value="Submit Now">
            </form>
        </div>
    </div>
</section>
@endsection
