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
                                <input type="text" id="permission" name="permission" class="form-control"
                                       placeholder="New Permission">
                            </div>
                            <div class="col-3">
                                <button style="vertical-align: center" onclick="createPermission(document.getElementById('permission').value)" class="btn btn-primary btn-sm">Add
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
                                        <td>{{ $permission['name'] }}
                                            <span style="cursor:pointer;" onclick="deletePermission('{{ $role->id }}', '{{ $permission->id }}')" class="badge badge-danger">
                                                Hapus Permission
                                            </span>
                                        </td>
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
            .then((json) => {
                console.log(json);
                location.reload();
            });
    }

    function deleteRole(roleId) {
        if (confirm("Apakah anda ingin menghapus Role ini?") === true) {
            let url = 'http://127.0.0.1:8000/api/rbac/role/' + roleId;
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
                .then((json) => {
                    console.log(json);
                    location.reload();
                });
        }
<<<<<<< HEAD
    </script>
    <script>
        function deletePermission(permissionId) {
            if (confirm("Apakah Anda ingin menghapus Permission ini dari semua Role?") === true) {
                let url = `{{ url('api/rbac/permission/') }}/${permissionId}`;
                fetch(url, {
                    method: "DELETE",
                    headers: {
                    "Accept": "application/json",
                    "Content-type": "application/json"
                    }
                })
                    .then(response => response.json())
                    .then(json => {
                        console.log(json);
                        location.reload();
                    })
                    .catch(error => console.error('Error:', error));
            }
        }
    </script>

@endpush
=======
    }

    function deletePermission(roleId, permissionId) {
        if (confirm("Apakah anda ingin menghapus Permission ini?") === true) {
            let url = '{{ route('api.rbac.destroy_permission') }}';
            let data = {
                roleId: roleId,
                permissionId: permissionId
            };

            fetch(url, {
                method: "DELETE",
                body: JSON.stringify(data),
                headers: {
                    "Accept": "application/json",
                    "Content-type": "application/json"
                }
            })
                .then((response) => response.json())
                .then((json) => {
                    console.log(json);
                    location.reload();
                });
        }
    }
<<<<<<< HEAD
</script>
@endpush
>>>>>>> bd8cc54903d0eea8db88f037b7567a7167139e30
=======
    </script>

    <script>
        function createPermission(permissionName) {
            let url = '{{ route('api.rbac.store_permission') }}';
            let data = {
                permission: permissionName
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
@endpush
>>>>>>> f79dd6ad324aa8976b46df5b560fa335afe1ff72
