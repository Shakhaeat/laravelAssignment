<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('public/js/script.js') }}"></script>
<script src="{{ asset('public/js/sweetalert2.min.js') }}"></script>
<script src="{{ asset('public/js/popper.min.js') }}"></script>
<script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/js/all.min.js') }}"></script>


<script src="{{ asset('public/js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('public/js/dashboard.js') }}"></script>
<script src="{{ asset('public/js/widgets.js') }}"></script>
<script src="{{ asset('public/js/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('public/js/jquery.vmap.sampledata.js') }}"></script>
<script src="{{ asset('public/js/jquery.vmap.world.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
 $('.js-states').select2();
</script>
<script>
    (function ($) {
        "use strict";
        jQuery('#vmap').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#1de9b6', '#03a9f5'],
            normalizeFunction: 'polynomial'
        });
    })(jQuery);
</script>
 
    
