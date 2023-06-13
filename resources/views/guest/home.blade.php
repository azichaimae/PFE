<!DOCTYPE html>
<head>
    @include('partials.style')
    <title>Wasted to wanted - guest</title>

</head>
<body>
    {{-- header --}}
    @include('partials.ClientHeader')

    {{-- home content --}}
    @include('partials.ClientHome')

    <!-- Footer -->
    @include('partials.ClientFooter')

    <script src="{{asset('script.js')}}"></script>
    <script>
        // Add JavaScript code for toggling content visibility
        function toggleContent() {
            var content = document.getElementById('full-content');
            var button = document.getElementById('toggle-button');

            if (content.style.display === 'none') {
                content.style.display = 'block';
                button.innerHTML = 'Read Less';
            } else {
                content.style.display = 'none';
                button.innerHTML = 'Read More';
            }
        }
    </script>
</body>

