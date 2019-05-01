<script type="text/javascript">
    swal({
        title: '{{ $title ?? ''}}',
        text: '{{ $slot }}',
        type: '{{ $type ?? "info" }}',
        html: '{{ $html ?? "false" }}'
    });
</script>
