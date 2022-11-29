<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Fashi Template" />
    <meta name="keywords" content="Fashi, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Fashi | Template</title>

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/themify-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/elegant-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slicknav.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" type="text/css" />

    @yield('style')

    {{-- <script nonce="79886520-4d96-47f0-9e69-cb4ae2976cc1">
        (function (w, d) {
        !(function (e, f, g, h) {
          e.zarazData = e.zarazData || {};
          e.zarazData.executed = [];
          e.zaraz = { deferred: [], listeners: [] };
          e.zaraz.q = [];
          e.zaraz._f = function (i) {
            return function () {
              var j = Array.prototype.slice.call(arguments);
              e.zaraz.q.push({ m: i, a: j });
            };
          };
          for (const k of ["track", "set", "debug"]) e.zaraz[k] = e.zaraz._f(k);
          e.zaraz.init = () => {
            var l = f.getElementsByTagName(h)[0],
              m = f.createElement(h),
              n = f.getElementsByTagName("title")[0];
            n && (e.zarazData.t = f.getElementsByTagName("title")[0].text);
            e.zarazData.x = Math.random();
            e.zarazData.w = e.screen.width;
            e.zarazData.h = e.screen.height;
            e.zarazData.j = e.innerHeight;
            e.zarazData.e = e.innerWidth;
            e.zarazData.l = e.location.href;
            e.zarazData.r = f.referrer;
            e.zarazData.k = e.screen.colorDepth;
            e.zarazData.n = f.characterSet;
            e.zarazData.o = new Date().getTimezoneOffset();
            if (e.dataLayer)
              for (const r of Object.entries(
                Object.entries(dataLayer).reduce((s, t) => ({
                  ...s[1],
                  ...t[1],
                }))
              ))
                zaraz.set(r[0], r[1], { scope: "page" });
            e.zarazData.q = [];
            for (; e.zaraz.q.length; ) {
              const u = e.zaraz.q.shift();
              e.zarazData.q.push(u);
            }
            m.defer = !0;
            for (const v of [localStorage, sessionStorage])
              Object.keys(v || {})
                .filter((x) => x.startsWith("_zaraz_"))
                .forEach((w) => {
                  try {
                    e.zarazData["z_" + w.slice(7)] = JSON.parse(v.getItem(w));
                  } catch {
                    e.zarazData["z_" + w.slice(7)] = v.getItem(w);
                  }
                });
            m.referrerPolicy = "origin";
            m.src =
              "../../cdn-cgi/zaraz/sd0d9.js?z=" +
              btoa(encodeURIComponent(JSON.stringify(e.zarazData)));
            l.parentNode.insertBefore(m, l);
          };
          ["complete", "interactive"].includes(f.readyState)
            ? zaraz.init()
            : e.addEventListener("DOMContentLoaded", zaraz.init);
        })(w, d, 0, "script");
      })(window, document);
    </script> --}}
</head>
<body>
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    @include('frontend.header')
    @include('frontend.section')
    @include('frontend.footer')



    <script src="{{ asset('frontend/assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.dd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}" type="text/javascript"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag("js", new Date());

      gtag("config", "UA-23581568-13");
    </script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
        integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
        data-cf-beacon='{"rayId":"76e2311a3e06d1dc","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.0","si":100}'
        crossorigin="anonymous"></script>

    @yield('script')
</body>

</html>