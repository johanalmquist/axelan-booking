	{{--}}<script>
		window.setTimeout(function() { $("#message").alert('close'); }, 10000);
	</script>
	<div class="alert alert-{{ notify()->type() }}"" id="message" >
		{{ notify()->message() }}
	</div>
	--}}

    <script>
        @if (notify()->ready())
            swal({
                text: "{{notify()->message()}}",
                type: "{{notify()->type()}}"
            });
        @endif
    </script>
