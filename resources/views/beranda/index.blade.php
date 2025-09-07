@extends('app')

@section('css')
    <style>
        /* === Animation Utilities === */
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        /* === Card Hover Effect === */
        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }

        /* === Gradient Utilities === */
        .gradient-bg {
            background: linear-gradient(120deg, #f0fdf4 0%, #ecfdf5 50%, #f0fdf4 100%);
        }

        .text-gradient {
            background: linear-gradient(135deg, #16a34a 0%, #0d9488 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* === Gallery Styles === */
        .gallery-container {
            position: relative;
            padding: 1rem 0 3rem;
        }

        .gallery-slide {
            height: auto;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .gallery-slide:hover {
            transform: translateY(-4px);
        }

        .gallery-image-container {
            position: relative;
            overflow: hidden;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            height: 100%;
        }

        .gallery-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            aspect-ratio: 4/3;
            transition: transform 0.5s ease;
        }

        .gallery-slide:hover .gallery-image {
            transform: scale(1.05);
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8) 0%, transparent 100%);
            padding: 1.5rem 1rem 1rem;
            color: white;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-slide:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-title {
            font-weight: 600;
            font-size: 0.875rem;
            line-height: 1.25;
            margin-bottom: 0.25rem;
        }

        .gallery-caption {
            font-size: 0.75rem;
            opacity: 0.9;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .gallery-nav-btn {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            background: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .gallery-nav-btn:hover {
            background: #f0fdf4;
            transform: translateY(-50%) scale(1.05);
        }

        .gallery-prev {
            left: -1.5rem;
        }

        .gallery-next {
            right: -1.5rem;
        }

        /* Lightbox Styles */
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }

        .lightbox-content {
            position: relative;
            max-width: 90%;
            max-height: 90%;
        }

        .lightbox-image {
            max-width: 100%;
            max-height: 80vh;
            border-radius: 0.5rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3);
        }

        .lightbox-caption {
            color: white;
            text-align: center;
            margin-top: 1rem;
            font-size: 1.1rem;
        }

        .lightbox-close {
            position: absolute;
            top: -2.5rem;
            right: 0;
            color: white;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 50%;
            width: 2.5rem;
            height: 2.5rem;
            font-size: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .lightbox-close:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .lightbox-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 50%;
            width: 3rem;
            height: 3rem;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lightbox-nav:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .lightbox-prev {
            left: 1rem;
        }

        .lightbox-next {
            right: 1rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .gallery-overlay {
                opacity: 1;
                padding: 1rem 0.75rem 0.75rem;
            }

            .gallery-title {
                font-size: 0.8125rem;
            }

            .gallery-caption {
                font-size: 0.6875rem;
            }

            .gallery-nav-btn {
                width: 2rem;
                height: 2rem;
            }

            .gallery-prev {
                left: -1rem;
            }

            .gallery-next {
                right: -1rem;
            }
        }

        @media (max-width: 640px) {
            .gallery-container {
                padding: 0.5rem 0 2.5rem;
            }
        }

        /* Swiper Pagination */
        .swiper-pagination-bullet {
            width: 8px;
            height: 8px;
            background-color: #d1d5db;
            opacity: 1;
            transition: all 0.3s ease;
        }

        .swiper-pagination-bullet-active {
            width: 24px;
            background-color: #16a34a;
            border-radius: 5px;
        }
    </style>
@endsection

@section('content')
    @include('beranda.headline')
    @include('beranda.waktu-sholat')
    @include('beranda.berita-lainnya')
    @include('beranda.layanan')
    @include('beranda.pengumuman')
    @include('beranda.video')
    @include('beranda.galeri')
    @include('beranda.lokasi')
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Gallery Swiper
            const gallerySwiper = new Swiper('.gallery-swiper', {
                slidesPerView: 3,
                grid: {
                    rows: 2, // <-- 2 baris
                    fill: 'row',
                },
                spaceBetween: 20,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        grid: {
                            rows: 1,
                        },
                    },
                    768: {
                        slidesPerView: 2,
                        grid: {
                            rows: 1,
                        },
                    },
                    1024: {
                        slidesPerView: 3,
                        grid: {
                            rows: 2,
                        },
                    },
                    1280: {
                        slidesPerView: 4,
                        grid: {
                            rows: 2,
                        },
                    }
                }
            });

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

            var swiper = new Swiper(".layanan-swiper", {
                slidesPerView: 1,
                spaceBetween: 30,
                freeMode: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 24,
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 30,
                    }
                },
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: true,
                },
                loop: false,
            });

            // Prayer Times Countdown
            const prayerTimes = {
                subuh: "{{ $jadwalSholat['jadwal']['subuh'] }}",
                dzuhur: "{{ $jadwalSholat['jadwal']['dzuhur'] }}",
                ashar: "{{ $jadwalSholat['jadwal']['ashar'] }}",
                maghrib: "{{ $jadwalSholat['jadwal']['maghrib'] }}",
                isya: "{{ $jadwalSholat['jadwal']['isya'] }}"
            };

            function getPrayerTime(prayerName) {
                const [hours, minutes] = prayerTimes[prayerName].split(':').map(Number);
                const now = new Date();
                const prayerTime = new Date(now);
                prayerTime.setHours(hours, minutes, 0, 0);
                return prayerTime;
            }

            function getNextPrayer() {
                const now = new Date();
                const prayers = [{
                        name: 'Subuh',
                        time: getPrayerTime('subuh')
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

                const nextPrayer = prayers
                    .sort((a, b) => a.time - b.time)
                    .find(prayer => prayer.time > now);

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

            function updateCountdown() {
                const nextPrayer = getNextPrayer();
                const now = new Date();
                const diff = nextPrayer.time - now;

                if (diff < 0) {
                    document.getElementById('next-prayer-indicator').innerHTML =
                        `Waktu ${nextPrayer.name} sudah lewat`;
                    document.getElementById('countdown').textContent = '--:--:--';
                    return;
                }

                const hours = Math.floor(diff / (1000 * 60 * 60));
                const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((diff % (1000 * 60)) / 1000);

                document.getElementById('next-prayer-indicator').innerHTML =
                    `Waktu ${nextPrayer.name} dalam`;

                document.getElementById('countdown').textContent =
                    `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
            }

            setInterval(updateCountdown, 1000);
            updateCountdown();
        });

        // Lightbox Functions
        let currentLightboxIndex = 0;
        const galleryItems = @json($galeries);

        function openLightbox(index) {
            currentLightboxIndex = index;
            const lightbox = document.getElementById('lightbox');
            const lightboxImage = document.getElementById('lightbox-image');
            const lightboxCaption = document.getElementById('lightbox-caption');

            lightboxImage.src = '{{ asset('storage') }}/' + galleryItems[index].gambar;
            lightboxImage.alt = galleryItems[index].judul;
            lightboxCaption.textContent = galleryItems[index].caption;

            lightbox.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            document.getElementById('lightbox').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function navigateLightbox(direction) {
            currentLightboxIndex += direction;

            if (currentLightboxIndex < 0) {
                currentLightboxIndex = galleryItems.length - 1;
            } else if (currentLightboxIndex >= galleryItems.length) {
                currentLightboxIndex = 0;
            }

            openLightbox(currentLightboxIndex);
        }

        // Close lightbox when clicking outside the image
        document.getElementById('lightbox').addEventListener('click', function(e) {
            if (e.target === this) {
                closeLightbox();
            }
        });

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            const lightbox = document.getElementById('lightbox');
            if (lightbox.style.display === 'flex') {
                if (e.key === 'Escape') {
                    closeLightbox();
                } else if (e.key === 'ArrowLeft') {
                    navigateLightbox(-1);
                } else if (e.key === 'ArrowRight') {
                    navigateLightbox(1);
                }
            }
        });

        // Load YouTube Iframe on Thumbnail Click
        function loadYouTubeIframe(element) {
            const videoId = element.getAttribute("data-video-id");

            // bikin iframe YouTube
            const iframe = document.createElement("iframe");
            iframe.setAttribute("src", "https://www.youtube.com/embed/" + videoId + "?autoplay=1");
            iframe.setAttribute("frameborder", "0");
            iframe.setAttribute("allowfullscreen", "1");
            iframe.setAttribute("allow",
                "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture");
            iframe.classList.add("w-full", "h-full");

            // replace thumbnail dengan iframe
            element.innerHTML = "";
            element.appendChild(iframe);
        }
    </script>
@endpush
