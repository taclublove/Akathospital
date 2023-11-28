{{-- <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script> --}}

<script src="//unpkg.com/alpinejs"></script>

{{-- AOS Start --}}
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
{{-- AOS End --}}

<script>
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].classList.add("hidden");
        }
        tablinks = document.getElementsByTagName("button");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("active:bg-gray-200");
        }
        document.getElementById(tabName).classList.remove("hidden");
        evt.currentTarget.classList.add("active:bg-gray-200");
    }
</script>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("imageSlider", () => ({
            currentIndex: 1,
            images: [
                "{{ url('image/Slider_Show/03.jpg') }}",
                "{{ url('image/Slider_Show/43.jpg') }}",
                "{{ url('image/Slider_Show/66.jpg') }}",
                "{{ url('image/Slider_Show/77.jpg') }}",
                "{{ url('image/Slider_Show/6511.jpg') }}",
                "{{ url('image/Slider_Show/6512.png') }}",
                "{{ url('image/Slider_Show/6514.jpg') }}",
                "{{ url('image/Slider_Show/nogift3.jpg') }}",
            ],
            previous() {
                if (this.currentIndex > 1) {
                    this.currentIndex = this.currentIndex - 1;
                }
            },
            forward() {
                if (this.currentIndex < this.images.length) {
                    this.currentIndex = this.currentIndex + 1;
                }
            },
        }));
    });
</script>
