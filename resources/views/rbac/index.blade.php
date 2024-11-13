@extends('layouts.dashboard')
@section('content')
    <div class="content-body default-height">
        <div class="container-fluid">
            <div class="row page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Bootstrap</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="card-title">CRM</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <input type="text" id="role" name="role" class="form-control" placeholder="New Role">
                                </div>
                                <div class="col-3">
                                    <button style="vertical-align: center" type="button" onclick="createRole(document.getElementById('role').value)" class="btn btn-primary btn-sm">Add Role</button>
                                </div>
                                <div class="col-3">
                                    <input type="text" name="permission" class="form-control"
                                           placeholder="New Permission">
                                </div>
                                <div class="col-3">
                                    <button style="vertical-align: center" class="btn btn-primary btn-sm">Add
                                        Permission
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                    <tr>
                                        <th style="width:50px;">
                                            Permission/Role
                                        </th>
                                        @foreach($roles as $role)
                                            <th>{{ $role['name'] }} <span onclick="deleteRole('{{ $role['id'] }}')"><i class="fa fa-trash text-danger"></i></span></th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($permissions as $i => $permission)
                                        <tr>
                                            <td>{{ $permission['name'] }}</td>
                                            @foreach($roles as $j => $role)
                                                <td>
                                                    <div class="form-check custom-checkbox checkbox-primary check-lg me-3">
                                                        <input type="checkbox" class="form-check-input"
                                                               id="p-{{ $i }}-r-{{ $j }}"
                                                               onchange="syncRole('p-{{ $i }}-r-{{ $j }}', '{{ $permission['id'] }}', '{{ $role->id }}')"
                                                            {{ $role->permissions->where('id', $permission['id'])->first() ? 'checked' : '' }}>
                                                    </div>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        function syncRole(id, permissionId, roleId) {
            let permission = document.getElementById(id).checked;
            let url = '{{ route('api.rbac.sync') }}';
            let data = {
                assign: permission,
                permissionId: permissionId,
                roleId: roleId
            };
            fetch(url, {
                method: "POST",
                body: JSON.stringify(data),
                headers: {
                    "Accept": "application/json",
                    "Content-type": "application/json"
                }
            })
                .then((response) => response.json())
                .then((json) => console.log(json));
        }
    </script>

    <script>
        function createRole(roleName) {
            let url = '{{ route('api.rbac.store') }}';
            let data = {
                role: roleName
            };
            fetch(url, {
                method: "POST",
                body: JSON.stringify(data),
                headers: {
                    "Accept": "application/json",
                    "Content-type": "application/json"
                }
            })
                .then((response) => response.json())
                .then(
                    (json) => {
                        console.log(json);
                        location.reload();
                    }
                );
        }
    </script>

    <script>
        function deleteRole(roleId) {
            if (confirm("Apakah anda ingin menghapus Role ini?") === true) {
                let url = 'http://127.0.0.1:8000/api/rbac/role/'+roleId;
                let data = {
                    _method: 'DELETE'
                };
                fetch(url, {
                    method: "POST",
                    body: JSON.stringify(data),
                    headers: {
                        "Accept": "application/json",
                        "Content-type": "application/json"
                    }
                })
                    .then((response) => response.json())
                    .then(
                        (json) => {
                            console.log(json);
                            location.reload();
                        }
                    );
            }
        }
    </script>
@endpush
