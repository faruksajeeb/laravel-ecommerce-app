<x-slot name="title">
    Subcategories
</x-slot>

<div>
    <section class="container-fluid py-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom py-3">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                    <h5 class="card-title mb-0 d-flex align-items-center gap-2">
                        <i class="fa fa-list text-primary"></i>
                        <span>Subcategories Manager</span>
                    </h5>
                    
                    <div class="d-flex gap-2 justify-content-start justify-content-md-end flex-wrap">
                        <button type="button" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-2"
                                data-bs-toggle="modal" data-bs-target="#addModal" wire:click="resetInputFields()">
                            <i class="fa-solid fa-plus"></i> Create New
                        </button>
                        
                        <button type="button" class="btn btn-sm btn-success d-inline-flex align-items-center gap-2" 
                                wire:click.prevent="render('excelExport')">
                            <i class="fa-solid fa-download"></i> Export
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row g-3 mb-4 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label text-muted small fw-bold">Search</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 text-muted">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0" 
                                   placeholder="Search subcategories..." wire:model.live="searchTerm">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label text-muted small fw-bold">Status</label>
                        <select wire:model.live="status" class="form-select">
                            <option value="">All Statuses</option>
                            <option value="1">Active</option>
                            <option value="-1">Inactive</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label text-muted small fw-bold">Filter By Category</label>
                        <div wire:ignore>
                            <select id="search_category_id" wire:model.live="search_category_id" class="form-select select2">
                                <option value="">All Categories</option>
                                @foreach ($categories as $val)
                                    <option value="{{ $val->id }}">{{ $val->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label text-muted small fw-bold">Order By</label>
                        <select wire:model.live="orderBy" class="form-select">
                            <option value="">Default Column</option>
                            @foreach ($columns as $col)
                                <option value="{{ $col }}">{{ ucwords(str_replace('_', ' ', $col)) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label text-muted small fw-bold">Sort Direction</label>
                        <select wire:model.live="sortBy" class="form-select">
                            <option value="">Default Sort</option>
                            <option value="DESC">Descending</option>
                            <option value="ASC">Ascending</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between bg-light rounded px-3 py-2 mb-3 text-muted small">
                    <div class="d-flex align-items-center gap-2">
                        <span>Show</span>
                        <select class="form-select form-select-sm w-auto py-0" wire:model.live="pazeSize">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="100">100</option>
                        </select>
                        <span>entries</span>
                    </div>
                    <div>
                        <span>Current Page: <strong>{{ $subcategories->currentPage() }}</strong></span>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle mb-0">
                        <thead class="table-light text-secondary">
                            <tr>
                                <th style="width: 60px;">Sl.</th>
                                <th>Category Name</th>
                                <th>Subcategory Name</th>
                                <th style="width: 100px;">Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th style="width: 120px;" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subcategories as $key => $val)
                                <tr>
                                    <td>{{ $key + $subcategories->firstItem() }}</td>
                                    <td class="text-muted small fw-semibold">{{ str_replace('_', ' ', $val->category->name ?? '') }}</td>
                                    <td class="fw-semibold text-dark">{{ str_replace('_', ' ', $val->subcategory_name) }}</td>
                                    <td>
                                        <div class="form-check form-switch mb-0">
                                            <input class="form-check-input active_inactive_btn" 
                                                   type="checkbox" 
                                                   role="switch"
                                                   id="row_{{ $val->id }}"
                                                   data-status="{{ $val->status }}"
                                                   data-table="subcategories"
                                                   value="{{ Crypt::encryptString($val->id) }}"
                                                   {{ $val->status == 1 ? 'checked' : '' }}
                                                   style="cursor: pointer;">
                                        </div>
                                    </td>
                                    <td class="text-muted small">{{ $val->created_at }}</td>
                                    <td class="text-muted small">{{ $val->updated_at }}</td>
                                    <td>
                                        <div class="d-flex gap-1 justify-content-center">
                                            <button class="btn btn-sm btn-outline-success"
                                                    wire:click.prevent="edit('{{ Crypt::encryptString($val->id) }}')"
                                                    data-bs-toggle="modal" data-bs-target="#editModal" 
                                                    title="Edit">
                                                <i class="fa-solid fa-file-pen"></i>
                                            </button>

                                            <button class="btn btn-sm btn-outline-danger"
                                                    wire:click.prevent="$dispatch('triggerDelete', '{{ Crypt::encryptString($val->id) }}')"
                                                    title="Delete">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-5">
                                        <i class="fa-regular fa-folder-open fa-2xl d-block mb-3 text-black-50"></i>
                                        No subcategories found matching your criteria.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-footer bg-white border-top py-3">
                <div class="row align-items-center g-3">
                    <div class="col-md-6">
                        {{ $subcategories->links() }}
                    </div>
                    <div class="col-md-6 text-md-end text-muted small">
                        <p class="mb-0">
                            {{ __('Showing') }} <span class="fw-semibold text-dark">{{ $subcategories->firstItem() }}</span>
                            {{ __('to') }} <span class="fw-semibold text-dark">{{ $subcategories->lastItem() }}</span>
                            {{ __('of') }} <span class="fw-semibold text-dark">{{ $subcategories->total() }}</span> {{ __('results') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @include('livewire.backend.subcategory.create')
        @include('livewire.backend.subcategory.edit')
    </section>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            if($('#search_category_id').length) {
                $('#search_category_id').select2({
                    width: '100%'
                });
                $('#search_category_id').on('change', function(e) {
                    var data = $('#search_category_id').select2("val");
                    if(typeof Livewire.emit !== "undefined") {
                        Livewire.emit('listenerReferenceHere', data);
                    }
                    @this.set('search_category_id', data);
                });
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const handleConfirmDelete = (deleteId) => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This subcategory record will be completely removed!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed || result.value) {
                        @this.call('destroy', deleteId);
                    }
                });
            };

            // Bridge layer setup to sync both Livewire v2 and Livewire v3 events flawlessly
            if (typeof Livewire !== 'undefined' && Livewire.on) {
                Livewire.on('triggerDelete', deleteId => handleConfirmDelete(deleteId));
            } else {
                window.addEventListener('triggerDelete', event => handleConfirmDelete(event.detail));
            }
        });
    </script>
@endpush