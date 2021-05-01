@extends('layouts.app')

@section('content')
    <div class="entries">
        <div class="entry">
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
                    {{ $post->title }}</a>

                    <a href="#" class="domain">
                    {{ $post->post_url }}</a>
                </div>


                @if (session('message'))
                    <div class="alert alert-info">{{ session('message') }}</div>
                @endif

                @if ($post->post_url != '')
                    <div class="mb-2">
                        <a href="{{ $post->post_url }}" target="_blank">{{ $post->post_url }}</a>
                    </div>
                @endif
                @if ($post->post_image != '')
                    <img src="{{ asset('storage/posts/' . $post->id . '/thumbnail_' . $post->post_image) }}"/>
                    <br/><br/>
                @endif
                {{ $post->post_text }}

                @auth
                    <hr/>
                    <h3 style="font-weight: 400px;">Comments</h3>
                    <div class="comment-thread">
                        <!-- Comment 1 start -->
                        <div class="comment" id="comment-1">
                            <div class="comment-heading">
                                <div class="comment-voting">
                                    <button type="button">
                                        <span aria-hidden="true">&#9650;</span>
                                        <span class="sr-only">Vote up</span>
                                    </button>
                                    <button type="button">
                                        <span aria-hidden="true">&#9660;</span>
                                        <span class="sr-only">Vote down</span>
                                    </button>
                                </div>
                                <div class="comment-info">
                                    <a href="#" class="comment-author">someguy14</a>
                                    <p class="m-0">
                                        22 points &bull; 4 days ago
                                    </p>
                                </div>
                            </div>

                            <div class="comment-body">
                                <p>
                                    This is really great! I fully agree with what you wrote, and this is sure to help me out in the future. Thank you for posting this.
                                </p>
                                <button type="button">Reply</button>
                                <button type="button">Flag</button>
                            </div>

                            <div class="replies">
                                <!-- Comment 2 start -->
                                @foreach ($post->comments as $comment)
                                <div class="comment" id="comment-2">
                                    <div class="comment-heading">
                                        <div class="comment-voting">
                                            <button type="button">
                                                <span aria-hidden="true">&#9650;</span>
                                                <span class="sr-only">Vote up</span>
                                            </button>
                                            <button type="button">
                                                <span aria-hidden="true">&#9660;</span>
                                                <span class="sr-only">Vote down</span>
                                            </button>
                                        </div>
                                        <div class="comment-info">
                                            <a href="#" class="comment-author"><b>{{ $comment->user->name }}</b></a>
                                            <p class="m-0">
                                                4 points &bull; 3 days ago
                                            </p>
                                        </div>
                                    </div>

                                    <div class="comment-body">
                                        <p>
                                            Took the words right out of my mouth!
                                        </p>
                                        <button type="button">Reply</button>
                                        <button type="button">Flag</button>
                                    </div>
                                </div>
                                <!-- Comment 2 end -->

                                <a href="#load-more">Load more replies</a>
                                @endforeach

                            </div>
                        </div>
                        <!-- Comment 1 end -->
                    </div>
                    @forelse ($post->comments as $comment)
                        <b></b>
                        <br/>
                        {{ $comment->created_at->diffForHumans() }}
                        <p class="mt-2">{{ $comment->comment_text }}</p>
                    @empty
                        No comments yet.
                    @endforelse
                    <hr/>
                    <form method="POST" action="{{ route('posts.comments.store', $post) }}">
                        @csrf
                        Add a comment:
                        <br/>
                        <textarea  name="comment_text" rows="5" required style="width: 50%;"></textarea>
                        <br/>
                        <button type="submit" class="btn btn-submit">Save</button>
                    </form>

                    <hr/>
                    @can('edit-post', $post)
                        <a href="{{ route('communities.posts.edit', [$post->community, $post]) }}"
                        class="btn btn-sm btn-primary">Edit post</a>
                    @endcan

                    @can('delete-post', $post)
                        <form action="{{ route('communities.posts.destroy', [$post->community, $post]) }}"
                            method="POST"
                            style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete post
                            </button>
                        </form>
                    @else
                        <form action="{{ route('post.report', $post->id) }}"
                            method="POST"
                            style="display: inline-block">
                            @csrf
                            <button type="submit"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure?')">Report post as inappropriate
                            </button>
                        </form>
                    @endcan
                @endauth
            </div>
        </div>
    </div>
@endsection
