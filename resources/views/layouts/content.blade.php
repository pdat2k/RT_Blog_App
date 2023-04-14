<div class="detail">
    <div class="content">
        <div class="aside-breadcrumb">
            {{ __('util.home') }} > <span class="aside-breadcrumb-title">{{ __('util.detailBlog') }}</span>
        </div>
        <h3 class="detail-title">
            {{ $blog->title }}
        </h3>
        <div class="detail-nav">
            <div class="detail-author">
                <img src="https://images.unsplash.com/photo-1680022546558-550eaf22351e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                    alt="detail-author-image" class="detail-author-image">
                <div class="detail-author-infor">
                    <p class="detail-author-name">
                        {{ $blog->user->name }}
                    </p>
                    <p class="detail-author-time">
                        {{ $blog->getUpdatedAtAttribute() }}
                    </p>
                </div>
            </div>
            <div class="detail-button">
                <p class="detail-button-btn detail-button-approved">{{ __('util.notApproved') }}</p>
                @auth
                    @if ($blog->user->is(auth()->user()))
                        <button
                            class="detail-button-btn detail-button-deteteblog modalDelete">{{ __('util.deleteBlog') }}</button>
                        <a type="submit" class="btn btn-success detail-button-btn"
                            href="{{ route('user.edit', ['blog' => $id]) }}">{{ __('util.edit') }}</a>
                    @endif
                @endauth
            </div>
            @auth
                @if ($blog->user->is(auth()->user()))
                    <div class="modal fade deleteConfirmation" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title detail-content-title">{{ __('util.delete') }}</h5>
                                    <button type="button" class="close detail-comment-boxs-button modalDelete"
                                        data-dismiss="modal" aria-label="Close">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="modal-body text-center p-5">
                                    {{ __('util.messageDeleteBlog') }}
                                </div>
                                <div class="modal-footer d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary modalDelete"
                                        data-dismiss="modal">{{ __('util.cancel') }}</button>
                                    <form action="{{ route('user.remove', ['blog' => $id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">{{ __('util.delete') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endauth
        </div>
        <div class="detail-container">
            <img src="{{ $blog->image }}" alt="{{ $blog->image }}" class="detail-container-img"
                onerror="if (this.src != '/images/default-image.jpg') this.src = '/images/default-image.jpg';">
            <p class="detail-container-text">
                {{ $blog->content }}
            </p>
        </div>
        <div class="detail-content">
            @if (!$related->isEmpty())
                <h3 class="detail-content-title">
                    {{ __('util.related') }}
                </h3>
                <p class="detail-content-rectangle"></p>
                <div class="detail-content-boxs">
                    @foreach ($related as $relate)
                        <a class="detail-content-boxs-link" href="{{ route('user.detail', ['blog' => $relate->id]) }}">
                            <div class="detail-content-box">
                                <img src="{{ $relate->image }}" alt="{{ $relate->image }}"
                                    class="detail-content-box-img"
                                    onerror="if (this.src != '/images/default-image.jpg') this.src = '/images/default-image.jpg';">
                                <div class="detail-content-box-text">
                                    <p class="detail-content-box-paragraph">
                                        {{ $relate->title }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div id="slideDetail" class="carousel slide mb-3" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($related as $key => $relate)
                            <a class="detail-content-boxs-link"
                                href="{{ route('user.detail', ['blog' => $relate->id]) }}">
                                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                    <div class="detail-content-box">
                                        <img src="{{ $relate->image }}" alt="{{ $relate->image }}"
                                            class="detail-content-box-img"
                                            onerror="if (this.src != '/images/default-image.jpg') this.src = '/images/default-image.jpg';">
                                        <div class="detail-content-box-text">
                                            <p class="detail-content-box-paragraph">
                                                {{ $relate->title }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    @if ($related->count() > 1)
                        <div class="carousel-indicators carousel-indicators-list">
                            @foreach ($related as $key => $relate)
                                <button type="button" data-bs-target="#slideDetail"
                                    data-bs-slide-to="{{ $key }}"
                                    class="{{ $key == 0 ? 'active' : '' }} carousel-indicators-item"
                                    aria-current="true" aria-label="Slide {{ $key }}"></button>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif
        </div>
        <div class="detail-heart">
            <button class="detail-heart-btn" data-url="{{ route('user.likes.add') }}" data-id="{{ $id }}">
                @if (auth()->check())
                    <i
                        class="fa-{{ $blog->likes()->where('user_id', auth()->id())->exists()? 'sharp fa-solid fa-heart detail-iconHeart-active': 'regular fa-heart detail-iconHeart' }}"></i>
                @else
                    <i class="fa-regular fa-heart detail-iconHeart"></i>
                @endif
            </button>
            <span class="detail-numberHeart">{{ $blog->likes()->count() ?? '0' }} {{ __('util.likes') }}</span>
        </div>
        <div class="detail-content">
            <h3 class="detail-content-title">
                {{ __('util.comment') }}
            </h3>
            <p class="detail-content-rectangle"></p>
            <div class="detail-comment-boxs">
                <img src="https://images.unsplash.com/photo-1680022546558-550eaf22351e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                    alt="detail-author-image" class="detail-author-image">
                <textarea name="comment" class="detail-comment-text" id="content-comment"></textarea>
                <button class="detail-comment-boxs-button" id="comment"
                    data-url="{{ route('user.comments.store') }}" data-id="{{ $id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="detail-comment-list">
            @foreach ($comments as $comment)
                <div class="detail-comment-footer">
                    <img src="https://images.unsplash.com/photo-1680022546558-550eaf22351e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80"
                        alt="detail-author-image" class="detail-author-image">
                    <div class="detail-comment-group">
                        <h3 class="detail-content-title">{{ $comment->user->name }}
                        </h3>
                        <p class="detail-container-text"> {{ $comment->content }} </p>
                        <p class="detail-container-text">
                            {{ $comment->Time }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
