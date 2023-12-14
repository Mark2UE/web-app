@include('admin.admin-partials.header')
<!-- jQuery -->
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<!-- Bootstrap CSS (optional, if not included in your project) -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    .example_filter .dataTables_info,
    .dataTables_length label {
        color: white;
    }
</style>
<hr>
<div class="container-fluid">
    <div class="fs-1 text-white">
        Post Page
        <hr>
    </div>
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>body</th>
                <th>author</th>
                <th>status</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>Actions</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($users as $std)
                <tr>
                    <td>
                        {{ $std->id }}
                    </td>
                    <td>
                        {{ $std->title }}
                    </td>
                    <td>
                        {{ $std->body }}
                    </td>
                    <td>
                        {{ $std->author }}
                    </td>
                    <td>
                        {{ $std->status }}
                    </td>

                    <td>
                        {{ $std->created_at }}
                    </td>
                    <td>
                        {{ $std->updated_at }}
                    </td>


                    <td>



                        <a href="/admin/dashboard/post/update/{{ $std->id }}" type="submit"
                            class="btn btn-success">Update</a>


                    </td>
                    <td>

                        <a href="/admin/dashboard/post/delete/{{ $std->id }}" class="btn btn-danger">

                            Delete

                        </a>

                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

</div>

<script>
    $(document).ready(function() {
        // Destroy existing DataTable, if it exists
        if ($.fn.DataTable.isDataTable('#example')) {
            $('#example').DataTable().destroy();
        }

        // Initialize DataTable
        $('#example').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "paging": true,
            "ordering": true,
            "info": true
        });
    });
</script>

@include('admin.admin-partials.footer')
