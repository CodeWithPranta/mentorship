<!doctype html>
<html lang="bn">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>প্রান্ত মজুমদারের ওয়েব ডেভেলপমেন্ট ট্রেনিং</title>
  <link rel="icon" href="/favicon.png" sizes="any">
  <meta name="description" content="৩ মাসের ইনটেনসিভ ওয়েব ডেভেলপমেন্ট ট্রেনিং — মাসে ১০,০০০ টাকার ফি, ৩ মাস পরে ৪০,০০০ টাকা মাসিক ইনকাম গ্যারান্টি (শর্তাধীন)।" />
  
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: '#0a0a0a',
            accent: 'oklch(82.8% 0.189 84.429)',
          }
        }
      }
    }
  </script>

  <style>
    .float-up { transform: translateY(10px); opacity: 0; transition: .5s ease; }
    .float-up.in-view { transform: translateY(0); opacity: 1; }
    .card-shadow { box-shadow: 0 10px 30px rgba(0,0,0,0.06); }
  </style>
</head>

<body class="antialiased text-slate-800 bg-gradient-to-b from-slate-50 to-white">

  <!-- Navbar -->
  <header class="sticky top-0 z-40 bg-white/70 backdrop-blur-md border-b border-slate-200">
    <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">

      <a href="{{route('home')}}" class="flex items-center gap-3">
        <div class="w-10 h-10 rounded-full bg-accent/10 flex items-center justify-center text-accent font-bold">PM</div>
        <div>
          <div class="text-sm font-semibold">প্রান্ত মজুমদার</div>
          <div class="text-xs text-slate-500">লারাভেল ডেভেলপার</div>
        </div>
      </a>

      <nav id="mobileMenu" class="hidden md:flex items-center gap-6 text-sm">
        <a href="#about" class="hover:text-accent">বিস্তারিত</a>
        <a href="#curriculum" class="hover:text-accent">কোর্স সিলেবাস</a>
        <a href="#schedule" class="hover:text-accent">সময়সূচি</a>
        <a href="#pricing" class="hover:text-accent">প্যাকেজ</a>
        <a href="#faq" class="hover:text-accent">প্রশ্নোত্তর</a>
      </nav>

      <div class="flex items-center gap-3">
        @if (Route::has('login'))
          @auth
            <a href="{{route('dashboard')}}" class="hidden md:inline-block px-4 py-2 rounded-lg bg-accent text-white text-sm font-medium hover:opacity-95">
              ড্যাশবোর্ড
            </a>
          @else
          <a href="{{route('login')}}" class="hidden md:inline-block px-4 py-2 rounded-lg bg-accent text-white text-sm font-medium hover:opacity-95">
            সাইন ইন
          </a>
          @endauth
        @endif

        <a href="tel:01317071128" 
        class="px-3 py-2 text-accent flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" 
                fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                class="w-5 h-5 font-bold">
            <path stroke-linecap="round" stroke-linejoin="round" 
                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372
                c0-.516-.351-.966-.852-1.091l-4.423-1.106a1.125 1.125 0 00-1.173.417l-.97 
                1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.272.527-.734.417-1.173L6.963 
                3.102A1.125 1.125 0 005.872 2.25H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
            </svg>
        </a>

        <!-- Modern Hamburger Menu -->
        <button id="menuBtn" class="md:hidden relative w-10 h-10 flex flex-col justify-center items-center gap-1.5">
          <span class="block w-6 h-0.5 bg-accent transition-all duration-300 ease-in-out origin-left"></span>
          <span class="block w-6 h-0.5 bg-accent transition-all duration-300 ease-in-out"></span>
        </button>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileDropdown" class="hidden md:hidden px-6 pb-4 space-y-2 text-sm">
      <a href="#about" class="block py-2 border-b">বিস্তারিত</a>
      <a href="#curriculum" class="block py-2 border-b">কোর্স সিলেবাস</a>
      <a href="#schedule" class="block py-2 border-b">সময়সূচি</a>
      <a href="#pricing" class="block py-2 border-b">প্যাকেজ</a>
      <a href="#faq" class="block py-2">প্রশ্নোত্তর</a>
      @if (Route::has('login'))
        @auth
          <button id="signupBtn2" onclick="window.location='{{ route('dashboard') }}'" class="w-full py-2 rounded-lg bg-accent text-white mt-2">ড্যাশবোর্ড</button>
        @else
          <button id="signupBtn3" onclick="window.location='{{ route('login') }}'" class="w-full py-2 rounded-lg bg-accent text-white mt-2">সাইন ইন</button>
        @endauth
      @endif
    </div>
  </header>

  {{ $slot }}

<footer class="bg-slate-900 py-8 text-center text-slate-300">
    <div class="max-w-6xl mx-auto px-6 space-y-4">
        <div class="flex justify-center gap-6 text-sm">
            <a href="{{ route('privacy') }}" class="hover:text-accent transition-colors">প্রাইভেসি পলিসি</a>
            <a href="{{ route('terms') }}" class="hover:text-accent transition-colors">টার্মস & কন্ডিশন</a>
        </div>
        <div class="text-sm text-slate-400">
            © ২০২৫ প্রান্ত মজুমদার — সব অধিকার সংরক্ষিত.
        </div>
    </div>
</footer>

  <!-- Scripts -->
  <script>
    // mobile menu
    document.getElementById('menuBtn').onclick = () =>
      document.getElementById('mobileDropdown').classList.toggle('hidden');
    // scroll animation
    const items = document.querySelectorAll('[data-animate]');
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) entry.target.classList.add('in-view');
      });
    });

    items.forEach(i => observer.observe(i));
  </script>
  
  <script>
  const menuBtn = document.getElementById('menuBtn');
  let open = false;
  menuBtn.addEventListener('click', () => {
    const [line1, line2] = menuBtn.children;
    open = !open;
    if(open){
      // Animate to X
      line1.style.transform = 'rotate(45deg) translate(5px, 5px)';
      line2.style.transform = 'rotate(-45deg) translate(5px, -5px)';
    } else {
      // Reset to hamburger
      line1.style.transform = 'rotate(0deg) translate(0,0)';
      line2.style.transform = 'rotate(0deg) translate(0,0)';
    }
  });
</script>
</body>
</html>