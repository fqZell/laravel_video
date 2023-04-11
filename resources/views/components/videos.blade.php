@if(count($videos))

        <div class="videos">

            <h2 class="title">Видео</h2>

            <div class="video-cards">

                @foreach($videos as $video)

                <a href="{{ route('video.single', $video) }}" class="video-card">
                    <img src="{{ $video->image_url }}" alt="">
                    <div class="video_body">
                        <div class="video_header">
                            <p class="video-title">{{ $video->title }}</p>
                            <p><img src="{{ asset('images/icons/view_count.svg') }}" alt="view_count">{{ $video->view_count }}</p>
                        </div>
                        <div class="video_main">
                            <p class="video-author">{{ $video->author()->username }}</p>
                        </div>
                    </div>
                </a>

                @endforeach

            </div>

            <div class="pagination">
                {{ $videos->links('components.pagination') }}
            </div>

        </div>

    @else

        <h2>На данный момент видео нет!</h2>

@endif
