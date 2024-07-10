<!DOCTYPE html>
<html lang="en">

<head>
    @include('guest.head')
</head>

<body>
    @include('guest.navbar')

    <div>
        @yield('container')
    </div>

    @include('guest.footer')

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.js') }}"></script>
    <script src="{{ asset('js/wow.js') }}"></script>
    <script src="{{ asset('js/validation.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('js/appear.js') }}"></script>
    <script src="{{ asset('js/scrollbar.js') }}"></script>
    <script src="{{ asset('js/isotope.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jQuery.style.switcher.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/nav-tool.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <script>
        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        })
    </script>
    <script>
        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");
    
        title.addEventListener('change', function() {
            fetch('/posting-job/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug);
        });
    </script>
    <script type="text/javascript">
        function changeImage(element) {
        var main_prodcut_image = document.getElementById("main_product_image");
        main_prodcut_image.src = element.src;
        }
    </script>
    <script src="https://kit.fontawesome.com/2f7d0b4589.js" crossorigin="anonymous"></script>
</body>

</html>