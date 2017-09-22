<script>
    @if (notify()->ready())
    swal({
        text: "{{notify()->message()}}",
        type: "{{notify()->type()}}"
    });
    @endif
</script>
