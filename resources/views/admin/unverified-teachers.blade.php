<x-app-layout>
    <main class="app-main">
        <div class="app-content-header"> 
            <div class="container-fluid"> 
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Unverified Teachers</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Unverified Teachers
                            </li>
                        </ol>
                    </div>
                </div> 
            </div>
        </div> 

        <div class="app-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <span class="card-title fw-semibold">
                                    Unverified Teachers List
                                </span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-bordered table-hover align-middle nowrap">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>ID / License</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                let datatable = new DataTable('#datatable', {
                    ajax: `{{ route('get.teachers', 0) }}`,
                    columns: [
                        {
                            data: 'name'
                        },
                        {
                            data: 'email'
                        },
                        {
                            data: 'phone_number',
                            type: 'text'
                        },
                        {
                            data: 'id_path',
                            render: function(data, type, row) {
                                return `<a href="{{ url('view-file') }}/${data}" target="_blank">View ID/License</a>`
                            }
                        },
                        {
                            data: null,
                            orderable: false,
                            render: function(data, type, row) {
                                return `
                                    <div class="text-center">
                                        <button type="button" class="btn btn-success" id="approveBtn" onclick="teacherAction('Approve', ${row.id})">Approve</button>
                                        <button type="button" class="btn btn-danger" id="rejectBtn" onclick="teacherAction('Reject', ${row.id})">Reject</button> 
                                    </div>
                                `
                            }
                        }
                    ],
                });
            });
        </script>
    @endpush
</x-app-layout>