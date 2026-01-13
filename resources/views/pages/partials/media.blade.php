<div class="row g-3 mt-3 media-grid">
    @foreach($media as $m)

    @php
    $youtubeId = null;

    if ($m->media_type === 'youtube') {
    preg_match(
    '%(?:youtube\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
    $m->media_path,
    $match
    );
    $youtubeId = $match[1] ?? null;
    }
    @endphp

    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="media-box lazy-media"
            data-type="{{ $m->media_type }}"
            @if($m->media_type === 'youtube' && $youtubeId)
            data-id="{{ $youtubeId }}"
            @elseif($m->media_type === 'video')
            data-src="{{ asset($m->media_path) }}"
            @endif>

            {{-- IMAGE (FANCYBOX ENABLED) --}}
            @if($m->media_type === 'image')
            <a href="{{ asset($m->media_path) }}"
                data-fancybox="gallery">
                <img data-src="{{ asset($m->media_path) }}"
                    class="lazyload"
                    alt="image">
            </a>

            {{-- VIDEO --}}
            @elseif($m->media_type === 'video')
            <img src="{{ asset('images/video-placeholder.jpg') }}" alt="video">
            <div class="play-overlay">▶</div>

            {{-- YOUTUBE --}}
            @elseif($m->media_type === 'youtube' && $youtubeId)
            <img data-src="https://img.youtube.com/vi/{{ $youtubeId }}/hqdefault.jpg"
                class="lazyload"
                alt="youtube">
            <div class="play-overlay">▶</div>
            @endif

        </div>
    </div>

    @endforeach

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <!-- jQuery 3.6.0 (latest stable as of 2026) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        document.addEventListener('click', function(e) {
            const box = e.target.closest('.lazy-media');
            if (!box || box.classList.contains('loaded')) return;

            box.classList.add('loaded');
            const type = box.dataset.type;
            box.innerHTML = '';

            if (type === 'video') {
                const video = document.createElement('video');
                video.src = box.dataset.src;
                video.controls = true;
                video.autoplay = true;
                video.style.width = '100%';
                video.style.height = '100%';
                box.appendChild(video);
            }

            if (type === 'youtube') {
                const iframe = document.createElement('iframe');
                iframe.src = 'https://www.youtube.com/embed/' + box.dataset.id + '?autoplay=1';
                iframe.allowFullscreen = true;
                iframe.style.width = '100%';
                iframe.style.height = '100%';
                iframe.style.border = '0';
                box.appendChild(iframe);
            }
        });
    </script>

    <script>
        Fancybox.bind('[data-fancybox="gallery"]', {
            Thumbs: false,
            Toolbar: {
                display: ["close"]
            }
        });
    </script>

</div>