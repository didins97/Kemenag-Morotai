@extends('app')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/beranda.css') }}">
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
    <!-- Initialize Swiper JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const videoSlider = new Swiper('.video-slider', {
                effect: 'coverflow',
                loop: true,
                slidesPerView: 1,
                spaceBetween: 20,
                centeredSlides: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
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
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    }
                }
            });
        });
    </script>
    <!-- Initialize Swiper with Coverflow Effect -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const galleryCoverflow = new Swiper('.gallery-coverflow', {
                effect: "cube", // efek kubus
                grabCursor: true,
                cubeEffect: {
                    shadow: true,
                    slideShadows: true,
                    shadowOffset: 20,
                    shadowScale: 0.94,
                },
                slidesPerView: 1,
                centeredSlides: true,
                loop: true,
                autoplay: {
                    delay: 3000, // Ganti slide setiap 5 detik (5000 ms)
                    disableOnInteraction: false, // tetap jalan walau diinteraksi
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    dynamicBullets: true,
                },
                navigation: {
                    nextEl: '.gallery-coverflow-next',
                    prevEl: '.gallery-coverflow-prev',
                }
            });
        });
    </script>
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
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Update real-time clock
            function updateClock() {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                // const seconds = String(now.getSeconds()).padStart(2, '0');
                document.getElementById('real-time-clock').textContent = `${hours}:${minutes} JAM SEKARANG`;
            }
            setInterval(updateClock, 60000);
            updateClock();

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
@endpush
