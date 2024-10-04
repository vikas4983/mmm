@extends('layouts.auth')
@section('title', ' Educations | Admin')
@section('styles')
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
    <script src="http://datatables.net/release-datatables/media/js/jquery.js"></script>
    <script src="http://datatables.net/release-datatables/media/js/jquery.dataTables.js"></script>
    <script src="http://datatables.net/release-datatables/extensions/Scroller/js/dataTables.scroller.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="{{ asset('assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}"
        rel="stylesheet" />
@endsection
@section('content')

    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"> <a href="{{ url('dashboard') }}">Home</a> </li>
                            <li class="breadcrumb-item active" aria-current="page">Education</li>
                        </ol>
                    </nav>
                    <span> <x-create-button-component createRoute="{{ url('admin/educations/create') }}"
                            activeRoute="{{ url('admin/educations-active') }}"
                            deleteAllRoute="{{ url('admin/educations-destroy') }}"
                            inActiveRoute="{{ url('admin/educations-inActive') }}" countAll="{{ $countAll }}"
                            active="{{ $active }}" inActive="{{ $inActive }}">
                        </x-create-button-component></span>
                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    @if (count($educations) > 0)
                        <table class="table table-striped" id="educations" class="display nowrap" width="100%">
                            <thead>

                                <th scope="col">#</th>
                                <th scope="col"><input type="checkbox" id="selectAllCheckbox"></th>
                                <th scope="col">Action</th>
                                <th scope="col">Education</th>
                            </thead>
                            <tbody>
                                @php
                                    $count = ($educations->currentPage() - 1) * $educations->perPage() + 1;
                                @endphp
                                @foreach ($educations as $education)
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td><input type="checkbox" class="selectCheckbox" name="selectedIds[]"
                                                value="{{ $education->id }}"></td>
                                        <td>
                                            <div class="d-flex flex-row">
                                                <x-edit-action-button-component :editRoute="route('educations.edit', $education->id)" :id="$education->id" />
                                                <x-destroy-action-button-component :destroyRoute="route('educations.destroy', $education->id)" :id="$education->id" />
                                            </div>
                                        </td>
                                        <td>
                                            <x-status-component :status="$education->status" />{{ $education->education }}


                                        </td>
                                    </tr>
                                    @php
                                        $count++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            <span>{{ $educations->links() }}</span>

                        </div>
                    @else()
                        <h3 class="text-center text-danger">No Educations found</h3>
                    @endif
                </div>


            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/auth/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#educations').DataTable();
            $(".dataTables_wrapper").css("width", "100%");
        });
    </script>

@endsection
