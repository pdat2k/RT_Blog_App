<section class="section">
    <div class="content">
        <div class="blogpost-content d-flex justify-content-between align-items-center">
            <h1 class="blogpost-title">{{ __('util.listBlog') }}</h1>
            <div class="blogpost-box">
                <form class="blogpost-box-form" action="{{ route('user.home') }}" method="get">
                    <input type="hidden" name="search" value="{{ $search ?? '' }}">
                    <select class="form-select blogpost-category bg-white" name="category_id"
                        onchange='if(this.value != 0) { this.form.submit(); }'>
                        <option value="0" selected hidden>{{ __('util.category') }}</option>
                        @foreach ($categories as $id => $title)
                            <option value="{{ $id }}"
                                {{ isset($category_id) && $category_id == $id ? 'selected' : '' }}>
                                {{ $title }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
        @if ($blogs->count() > 0)
            <div class="blogpost-card-list">
                @foreach ($blogs as $blog)
                    <div class="blogpost-card">
                        <img src="{{ $blog->image }}" alt="{{ $blog->image }}" class="blogpost-card-img"
                            onerror="if (this.src != '/images/default-image.jpg') this.src = '/images/default-image.jpg';" />
                        <div class="blogpost-card-content">
                            <div class="blogpost-card-infomation d-flex justify-content-between align-items-center">
                                <div class="blogpost-card-group d-flex">
                                    <div class="blogpost-card-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            strokeWidth="{1.5}" stroke="currentColor" className="w-6 h-6">
                                            <path strokeLinecap="round" strokeLinejoin="round"
                                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>
                                    </div>
                                    <p class="blogpost-card-author blogpost-card-authorCustom">{{ $blog->user->name }}
                                    </p>
                                </div>
                                <div class="blogpost-card-group d-flex">
                                    <div class="blogpost-card-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <p class="blogpost-card-author">{{ $blog->Time }}</p>
                                </div>
                            </div>
                            <h4 class="blogpost-card-title">
                                {{ $blog->title }}
                            </h4>
                            <p class="blogpost-card-paragraph">
                                {{ $blog->content }}
                            </p>
                            <div class="blogpost-card-btn">
                                <a href="{{ route('user.detail', ['blog' => $blog->id]) }}"
                                    class="blogpost-card-link">{{ __('util.readMore') }}
                                    <div class="blogpost-card-right">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6 card-icon">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <img class="blogpost-empty"
                src="https://img.freepik.com/free-vector/no-data-concept-illustration_114360-536.jpg?w=2000"
                alt="data-empty">
        @endif
        <div class="session-pagination">
            {{ $blogs->appends(request()->input())->links() }}
        </div>
    </div>
</section>
