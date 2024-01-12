@include('frontend.layout.head')
@include('frontend.layout.header')




<section class="content">
    <div class="body_scroll">

        <div class="container" style="background: #f5f5f5;">
            <br>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="blogitem mb-5">
                            <div class="blogitem-image">
                                <a href="blog-details.html"><img src="{{ asset('assets/images/blog') }}/{{ $single_post->file }}" alt="blog image"></a>
                                <span class="blogitem-date">{{ $single_post->created_at }}</span>
                            </div>
                            <div class="blogitem-content">
                                <div class="blogitem-header">
                                    <div class="blogitem-meta">
                                        <span><i class="zmdi zmdi-account"></i>By <a href="javascript:void(0);">Michael</a></span>
                                        <span><i class="zmdi zmdi-comments"></i><a href="blog-details.html">Comments(3)</a></span>
                                    </div>
                                    <div class="blogitem-share">
                                        <ul class="list-unstyled mb-0">
                                            <li><a href="javascript:void(0);"><i class="zmdi zmdi-facebook-box"></i></a></li>
                                            <li><a href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                                            <li><a href="javascript:void(0);"><i class="zmdi zmdi-twitter-box"></i></a></li>
                                            <li><a href="javascript:void(0);"><i class="zmdi zmdi-linkedin-box"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <h5><a href="blog-details.html">{{ $single_post->title }}</a></h5>
                                <p>{{ $single_post->post_text }}</p>
                                {{-- <blockquote class="blockquote">
                                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit. Aliquam vulputate tortor nec commodo ultricies lectus nisl facilisis enim trpis.</p>
                                    <footer>by <a href="blog.html">ThemeMakker</a></footer>
                                </blockquote> --}}
                                </div>
                        </div>
                    </div>


                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="body search">
                            <div class="input-group mb-0">
                                <input type="text" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i class="zmdi zmdi-search"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Categories</strong></h2>
                        </div>
                        <div class="body">
                         <ul class="list-unstyled mb-0 widget-categories">
                                @foreach ($category as $list )
                                <li><a href="javascript:void(0);">{{ $list->subcategory_name }}</a></li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Recent</strong> Posts</h2>
                        </div>
                        <div class="body">
                            @foreach ($recent as $list )

                            <ul class="list-unstyled mb-0 widget-recentpost">
                                <li>
                                    <a href="blog-details.html"><img src="{{ asset('assets/images/blog') }}/{{ $list->file }}" alt="blog thumbnail"></a>
                                    <div class="recentpost-content">
                                        <a href="blog-details.html">{{ $list->title }}</a>
                                        <span>{{ $list->created_at}}</span>
                                    </div>
                                </li>


                            </ul>
                            @endforeach
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.layout.footer')
</body>
</html>
