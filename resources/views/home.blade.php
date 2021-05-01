@extends('layouts.app')

@section('content')
<div class="entries">
    @foreach ($newestPosts as $post)
        <div class="entry">
            <!-- Numbering -->
            <p class="numbering">{{ ++$i }}</p>

            <!-- voting -->
            @livewire('post-votes', ['post' => $post])

            <!-- thumbnail -->
            <a href="#" class="thumbnail link">
                <img src="{{ asset('storage/posts/' . $post->id . '/thumbnail_' . $post->post_image) }}"
                style="height:50px; width:50px; margin-left: 20px;">
            </a>

            <!-- topic -->
            <div class="topic">
                <div class="title">
                    <a href="{{ route('communities.posts.show', [$post->id]) }}" class="link">
                    {{ $post->title }}
                </a>

                    <a href="#" class="domain">
                    {{ $post->post_url }}
                </a>
                </div>

                <div class="details">
                    <a href="#" class="btn-expand link"></a>

                    <div class="inner-details">
                        <div class="submit-detail">
                            <p class="submitted">
                                submitted {{ $post->created_at->diffForHumans() }} by
                            </p>

                            <a href="#" class="user">
                            {{ $post->user->name }}
                        </a>

                            <p>
                                to
                            </p>

                            <a href="#" class="subscribe" title="subscribe to">
                                <i class="fa fa-plus-circle"></i>
                            </a>

                            <a href="#" class="subreddit-link">
                            r/wheredidthesodago
                        </a>
                        </div>

                        <div class="action-detail">
                            <a href="#" class="comments">
                            {{ $post->comments->count() }} comments
                        </a>
                            <a href="#" class="share">
                            share
                        </a>
                            <a href="#" class="save">
                            save
                        </a>
                            <a href="#" class="hide">
                            hide
                        </a>
                            <a href="#" class="report">
                            report
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
</div>
@endsection
