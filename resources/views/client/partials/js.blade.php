@push('custom_js')
<script>
    function previewFile(input, preview_id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#" + preview_id).attr('src', e.target.result);
                $("#" + preview_id).css('height', '100px');
                $("#" + preview_id).parent().parent().removeClass('d-none');
            }
            $("label[for='" + $(input).attr('id') + "']").text(input.files[0].name);
            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewPersistedFile(url, preview_id) {
        $("#" + preview_id).attr('src', url);
        $("#" + preview_id).css('height', '100px');
        $("#" + preview_id).parent().parent().removeClass('d-none');
    }

    function showContent() {
        element = document.getElementById("billetera");
        element2 = document.getElementById("bancolombia");
        check = document.getElementById("inlineRadio1");
        if (check.checked) {
            element.style.display='block';
            element2.style.display='none';
            document.getElementById('payment_type').value = 'C'
        }
        else {
            element.style.display='none';
            element2.style.display='block';
            document.getElementById('payment_type').value = 'B'
        }
    }

    function showContent2() {
        element = document.getElementById("bancolombia");
        element2 = document.getElementById("billetera");
        check = document.getElementById("inlineRadio2");
        if (check.checked) {
            element.style.display='block';
            element2.style.display='none';
            document.getElementById('payment_type').value = 'B'
        }
        else {
            element.style.display='none';
            element2.style.display='block';
            document.getElementById('payment_type').value = 'C'
        }
    }

    function editBill($item) {
        $("#hosting_id").val($item.id);        
        $("#user_id").val($item.user_id);        
    }

</script>
@endpush