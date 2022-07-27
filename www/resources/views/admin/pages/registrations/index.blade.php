@extends('admin.layout.main')

@section('title', 'Registrations | 4TeamFantasy')

@section('custom_header')
@endsection

@section('page_heading')
    <div class="nav-item d-flex align-items-center">
        <h4 class="fw-bold py-3 mb-0"><span class="text-muted fw-light">Admin /</span> Registrations</h4>
    </div>
@endsection

@section('main')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">All users</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Level</th>
                            <th>Payment</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($registrations as $item)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Albert Cook</strong></td>
                                <td>alok@gmail.com</td>
                                <td>9999999999</td>
                                <td>Rookie Level</td>
                                <td><span class="badge bg-label-success me-1">Success</span></td>
                                <td>
                                    <a href="{{ route('admin.registrations', ['id' => Crypt::encrypt($item->id)]) }}"
                                        class="btn btn-primary btn-sm">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No data found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
@endsection
