<form method="POST" action="#" id="form-delete">
    @csrf
    @method('DELETE')
</form>

<div class="modal fade" id="modal-delete" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Are you sure?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-delete">Delete</button>
            </div>
        </div>
    </div>
</div>

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('.confirm-delete').click(function() {
            var delUrl = $(this).data('url');
            $('#form-delete').attr('action', delUrl);
        });
        $('#btn-delete').click(function() {
            $('#form-delete').submit();
        });

        $(document).ready(function() {
            $(".excel").click(function() {
                $("#table2excel").table2excel({
                    name: "Worksheet Name",
                    filename: "FileExcel",
                    fileext: ".xls"
                });
            });
        });
    });
</script>
@endsection