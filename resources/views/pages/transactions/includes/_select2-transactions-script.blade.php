<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $(".customer-select2").select2({
            placeholder: "Seleccionar cliente",
            allowClear: true,
        });

        $(".cars-select2-multiple").select2({
            placeholder: "Seleccionar coche",
            allowClear: true,
        });
    });
</script>
