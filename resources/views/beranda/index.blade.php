@extends('app')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <style>
        #thumbnail-container {
            display: grid;
            grid-auto-flow: column;
            grid-template-columns: repeat(auto-fill, minmax(calc(50% - 0.5rem), 1fr));
            grid-template-rows: repeat(auto-fill, minmax(0, 1fr));
        }

        .thumbnail-item {
            transition: all 0.2s ease;
        }

        .thumbnail-item:hover {
            transform: translateY(-2px);
        }

        /* Pastikan container parent menggunakan flex dan items stretch */
        .flex-col.lg\:flex-row {
            align-items: stretch;
        }

        /* Atur tinggi Main Featured dan Sidebar agar sama */
        .w-full.lg\:w-2\/3,
        .w-full.lg\:w-1\/3 {
            display: flex;
            flex-direction: column;
        }

        /* Atur tinggi gambar utama dan sidebar */
        .lg\:w-2\/3 .relative,
        .lg\:w-1\/3 .bg-white {
            flex: 1;
            min-height: 0;
            /* Penting untuk mencegah overflow */
        }

        /* Pastikan gambar utama memenuhi container */
        .aspect-\[4\/3\].sm\:aspect-\[16\/9\] {
            height: 100%;
        }

        /* Atur tinggi thumbnail container */
        .gallery-thumbnails {
            height: calc(100% - 48px);
            /* 48px adalah tinggi header */
        }

        @media (min-width: 640px) {
            #thumbnail-container {
                grid-template-columns: repeat(auto-fill, minmax(calc(100% - 0.75rem), 1fr));
            }
        }
    </style>

    <style>
        /* Custom styles for the slider */
        .swiper-pagination-bullet {
            @apply w-2 h-2 bg-gray-300 opacity-100 transition-all;
        }

        .swiper-pagination-bullet-active {
            @apply w-6 bg-green-500 rounded-full;
        }

        /* Ensure proper aspect ratio for thumbnails */
        .aspect-video {
            aspect-ratio: 16/9;
        }

        /* Fallback for browsers that don't support aspect-ratio */
        @supports not (aspect-ratio: 16/9) {
            .aspect-video::before {
                float: left;
                padding-top: 56.25%;
                content: "";
            }

            .aspect-video::after {
                display: block;
                content: "";
                clear: both;
            }
        }
    </style>
@endsection

@section('content')
    @include('beranda.headline')

    @include('beranda.waktu-sholat')

    @include('beranda.berita-lainnya')

    @include('beranda.galeri')

    @include('beranda.video')

    @include('beranda.layanan')

    @include('beranda.lokasi')
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const servicesSlider = new Swiper('.services-slider', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 20,
                centeredSlides: false,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.services-next',
                    prevEl: '.services-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    dynamicBullets: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                    },
                    768: {
                        slidesPerView: 3,
                    },
                    1024: {
                        slidesPerView: 4,
                    },
                    1280: {
                        slidesPerView: 5,
                    }
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Get prayer times from the page (assuming they're in 24-hour format)
            const prayerTimes = {
                subuh: "{{ $jadwalSholat['jadwal']['subuh'] }}",
                dhuha: "{{ $jadwalSholat['jadwal']['dhuha'] }}",
                dzuhur: "{{ $jadwalSholat['jadwal']['dzuhur'] }}",
                ashar: "{{ $jadwalSholat['jadwal']['ashar'] }}",
                maghrib: "{{ $jadwalSholat['jadwal']['maghrib'] }}",
                isya: "{{ $jadwalSholat['jadwal']['isya'] }}"
            };

            // Convert prayer time string to Date object
            function getPrayerTime(prayerName) {
                const [hours, minutes] = prayerTimes[prayerName].split(':').map(Number);
                const now = new Date();
                const prayerTime = new Date(now);
                prayerTime.setHours(hours, minutes, 0, 0);
                return prayerTime;
            }

            // Find the next prayer time
            function getNextPrayer() {
                const now = new Date();
                const prayers = [{
                        name: 'Subuh',
                        time: getPrayerTime('subuh')
                    },
                    {
                        name: 'Dhuha',
                        time: getPrayerTime('dhuha')
                    },
                    {
                        name: 'Dzuhur',
                        time: getPrayerTime('dzuhur')
                    },
                    {
                        name: 'Ashar',
                        time: getPrayerTime('ashar')
                    },
                    {
                        name: 'Maghrib',
                        time: getPrayerTime('maghrib')
                    },
                    {
                        name: 'Isya',
                        time: getPrayerTime('isya')
                    }
                ];

                // Sort prayers by time and find the first one after now
                const nextPrayer = prayers
                    .sort((a, b) => a.time - b.time)
                    .find(prayer => prayer.time > now);

                // If no prayer found today, return first prayer of next day
                return nextPrayer || {
                    name: 'Subuh',
                    time: (() => {
                        const tomorrow = new Date(now);
                        tomorrow.setDate(tomorrow.getDate() + 1);
                        tomorrow.setHours(...prayerTimes.subuh.split(':').map(Number), 0, 0);
                        return tomorrow;
                    })()
                };
            }

            // Update countdown
            function updateCountdown() {
                const nextPrayer = getNextPrayer();
                const now = new Date();
                const diff = nextPrayer.time - now;

                if (diff < 0) {
                    // Prayer time has passed (shouldn't happen due to getNextPrayer logic)
                    document.getElementById('next-prayer-indicator').innerHTML =
                        `Waktu ${nextPrayer.name} sudah lewat`;
                    return;
                }

                const hours = Math.floor(diff / (1000 * 60 * 60));
                const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((diff % (1000 * 60)) / 1000);

                document.getElementById('next-prayer-indicator').innerHTML =
                    `Waktu ${nextPrayer.name} dalam <span id="countdown">${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}</span>`;
            }

            // Update countdown every second
            setInterval(updateCountdown, 1000);
            updateCountdown();
        });
    </script>

    <script>
        // Inisialisasi Swiper untuk thumbnail
        const thumbnailsSwiper = new Swiper('.gallery-thumbnails', {
            slidesPerView: 1,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            spaceBetween: 10,
            pagination: {
                el: '.swiper-pagination',
                type: 'fraction',
            },
            navigation: {
                nextEl: '.gallery-thumbnails-next',
                prevEl: '.gallery-thumbnails-prev',
            },
        });

        // Fungsi untuk menampilkan gambar yang dipilih di bagian utama
        function showFeaturedImage(index) {
            const galeries = @json($galeries);
            if (galeries[index]) {
                document.getElementById('featured-image').src = '{{ asset('storage') }}/' + galeries[index].gambar;
                document.getElementById('featured-image').alt = galeries[index].judul;
                document.getElementById('featured-title').textContent = galeries[index].judul;
                document.getElementById('featured-caption').textContent = galeries[index].caption;

                // Update active thumbnail
                document.querySelectorAll('.thumbnail-item').forEach(item => {
                    item.classList.remove('ring-2', 'ring-green-500');
                });
                document.querySelector(`.thumbnail-item[data-index="${index}"]`).classList.add('ring-2', 'ring-green-500');
            }
        }

        // Jika tidak ada gambar, sembunyikan thumbnail slider
        if (@json(count($galeries)) === 0) {
            document.querySelector('.gallery-thumbnails').style.display = 'none';
        }
    </script>

    <!-- Script for YouTube Video Loading -->
    <script>
        // Initialize Swiper
        document.addEventListener('DOMContentLoaded', function() {
            const videoSlider = new Swiper('.video-slider', {
                slidesPerView: 1,
                spaceBetween: 20,
                centeredSlides: false,
                navigation: {
                    nextEl: '.video-next',
                    prevEl: '.video-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    },
                    1280: {
                        slidesPerView: 4,
                    }
                }
            });
        });

        // Function to load YouTube iframe when thumbnail is clicked
        function loadYouTubeIframe(element) {
            const videoId = element.getAttribute('data-video-id');
            const iframeHtml = `
            <iframe class="w-full h-full"
                    src="https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        `;
            element.innerHTML = iframeHtml;
            element.classList.remove('video-thumbnail');
        }

        // Lazy loading for images
        document.addEventListener("DOMContentLoaded", function() {
            const lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));

            if ("IntersectionObserver" in window) {
                let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            let lazyImage = entry.target;
                            lazyImage.src = lazyImage.src;
                            lazyImage.classList.remove("lazy");
                            lazyImageObserver.unobserve(lazyImage);
                        }
                    });
                });

                lazyImages.forEach(function(lazyImage) {
                    lazyImageObserver.observe(lazyImage);
                });
            }
        });
    </script>
@endpush
