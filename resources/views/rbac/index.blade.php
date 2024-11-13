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
                                    <input type="text" name="role" class="form-control" placeholder="New Role">
                                </div>
                                <div class="col-3">
                                    <button style="vertical-align: center" class="btn btn-primary btn-sm">Add Role</button>
                                </div>
                                <div class="col-3">
                                    <input type="text" name="permission" class="form-control" placeholder="New Permission">
                                </div>
                                <div class="col-3">
                                    <button style="vertical-align: center" class="btn btn-primary btn-sm">Add Permission</button>
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
                                        <th>Role 1</th>
                                        <th>Role 2</th>
                                        <th>Role 3</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Permission 1</td>
                                        <td>
                                            <div class="form-check custom-checkbox checkbox-primary check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check custom-checkbox checkbox-primary check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check custom-checkbox checkbox-primary check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Permission 2</td>
                                        <td>
                                            <div class="form-check custom-checkbox checkbox-primary check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check custom-checkbox checkbox-primary check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check custom-checkbox checkbox-primary check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Permission 3</td>
                                        <td>
                                            <div class="form-check custom-checkbox checkbox-primary check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check custom-checkbox checkbox-primary check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check custom-checkbox checkbox-primary check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Permission 4</td>
                                        <td>
                                            <div class="form-check custom-checkbox checkbox-primary check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check custom-checkbox checkbox-primary check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check custom-checkbox checkbox-primary check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Permission 5</td>
                                        <td>
                                            <div class="form-check custom-checkbox checkbox-primary check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check custom-checkbox checkbox-primary check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check custom-checkbox checkbox-primary check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2">
                                            </div>
                                        </td>
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
