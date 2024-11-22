    @extends('layouts.admin')

    @section('content')
        <div class="row ms-1 mt-2">
            <div class="bg-light p-4 rounded" style="max-width: 1080px; width: 100%;">
                <div class="row mb-3 mt-2 text-between">
                    <div class="col">
                        <a href="{{ route('menu.add') }}" class="btn btn-outline-dark"><i class="bi bi-plus-square"></i> Add Menu</a>
                        <button class="btn btn-dark"><i class="bi bi-file-earmark-arrow-up"></i> Export</button>
                    </div>
                    <div class="col">
                        <form class="d-flex" role="search" id="searchForm">
                            <input class="form-control me-2" type="search" id="searchInput" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-dark" type="submit">Search</button>
                        </form>
                        <div id="searchResults" class="dropdown-menu" style="display: none;"></div>
                    </div>
                </div>

                <table class="table table-bordered table-striped">
                    <thead class="table-primary">
                    <tr>
                        <th class="col-md-1">#</th>
                        <th class="col-md-1">Image</th>
                        <th class="col-md-2">Menu Name</th>
                        <th class="col-md-3">Description</th>
                        <th class="col-md-2">Price</th>
                        <th class="col-md-1 description-cell">Available</th>
                        <th class="col-md-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                        <tr>
                            <td>{{ $loop->iteration + ($menus->currentPage() - 1) * $menus->perPage() }}</td>
                            <td>
                                @if ($menu->image)
                                    <img src="{{ asset('upload/menus-img/' . $menu->image) }}" alt="{{ $menu->menu_name }}" style="object-fit: cover; border-radius: 10%;" width="50" height="50">
                                @else
                                    <img src="{{ asset('assets/img/menu-default.png') }}" alt="{{ $menu->menu_name }}" style="object-fit: cover; border-radius: 10%;" width="50" height="50">
                                @endif
                            </td>
                            <td>{{ $menu->menu_name}}</td>
                            <td class="description-cell">{{ $menu->description }}</td>
                            <td>{{ $menu->formatted_price }}</td>
                            <td>{{ $menu->isAvailable ? 'Yes' : 'No' }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#menuModal" 
                                        data-menu-name="{{ $menu->menu_name }}"
                                        data-description="{{ $menu->description }}"
                                        data-price="{{ $menu->formatted_price }}"
                                        data-image="{{ asset('upload/menus-img/' . $menu->image) }}"
                                        data-availability="{{ $menu->isAvailable ? 'Available' : 'Not Available' }}">
                                    View
                                </button>
                                <a href="{{ route('menu.showEdit', $menu->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this menu?')"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            {{-- Previous Page Link --}}
                            @if ($menus->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">Previous</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $menus->previousPageUrl() }}">Previous</a></li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($menus->links()->elements as $element)
                                {{-- "Three Dots" Separator --}}
                                @if (is_string($element))
                                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                                @endif

                                {{-- Array Of Links --}}
                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        @if ($page == $menus->currentPage())
                                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                        @else
                                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($menus->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $menus->nextPageUrl() }}">Next</a></li>
                            @else
                                <li class="page-item disabled"><span class="page-link">Next</span></li>
                            @endif
                        </ul>
                    </nav>

                    <div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="menuModalLabel">Menu Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body row">
                                    <div class="col-md-4">
                                        <img id="modalImage" src="" alt="Menu Image" class="img-fluid mb-3"  style="object-fit: cover; border-radius: 10%;">
                                    </div>
                                    <div class="col-md-8">
                                        <h5 id="modalMenuName"></h5>
                                        <p id="modalDescription"></p>
                                        <p><strong>Price:</strong> <span id="modalPrice"></span></p>
                                        <p><strong>Status:</strong> <span id="modalAvailability"></span></p>
                                        <a href="{{ route('menu.showEdit', $menu->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                        <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this menu?')"><i class="bi bi-trash"></i> Delete</button>
                                        </form>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
