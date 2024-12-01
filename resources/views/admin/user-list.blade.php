@extends('layouts.admin')

@section('content')
    <div class="row mx-1 mt-2">
        <div class="bg-light p-4 rounded" style="max-width: 1080px; width: 100%;">

            @if (session()->has('success'))
                <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('error'))
                <div id="errorAlert" class="alert alert-danger fs-6 alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row mb-3 mt-2 justify-content-end">
                <div class="col col-md-6">
                    <form class="d-flex" role="search" id="searchForm"  method="GET" action="{{ route('admin.user-list') }}">
                        <input type="search" class="form-control me-2" id="userSearch" name="userSearch" placeholder="Search user" value="{{ old('userSearch', request('userSearch')) }}">                            
                        <button class="btn btn-outline-dark" type="submit">Search</button>
                    </form>
                </div>
            </div>

            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                <tr>
                    <th class="col-md-1">#</th>
                    <th class="col-md-1">Username</th>
                    <th class="col-md-3">Email</th>
                    <th class="col-md-1">Role</th>
                    <th class="col-md-1">Status</th>
                    <th class="col-md-2">Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->email}}</td>
                        <td>{{ $user->role}}</td>
                        <td>{{ $user->status}}</td>
                        <td>
                            <form action="{{ route('user.deactivate', $user->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <button class="btn btn-sm btn-danger"><i class="bi bi-ban"></i> Disable</button>
                            </form>
                            <form action="{{ route('user.activate', $user->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                <button class="btn btn-success btn-sm"><i class="bi bi-check-lg"></i> Enable</button>
                            </form>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        {{-- Previous Page Link --}}
                        @if ($users->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">Previous</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $users->previousPageUrl() }}">Previous</a></li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($users->links()->elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $users->currentPage())
                                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                    @else
                                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($users->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $users->nextPageUrl() }}">Next</a></li>
                        @else
                            <li class="page-item disabled"><span class="page-link">Next</span></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
