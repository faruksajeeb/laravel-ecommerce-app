<x-slot name="title">
    Brands
</x-slot>

<div>
    <section class="container-fluid py-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom py-3">
                <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                    <h5 class="card-title mb-0 d-flex align-items-center gap-2">
                        <i class="fa-solid fa-tag text-primary"></i>
                        <span>Brands Manager</span>
                    </h5>

                    <div class="d-flex gap-2 justify-content-start justify-content-md-end flex-wrap">
                        <button type="button" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-2"
                                data-bs-toggle="modal" data-bs-target="#addModal" wire:click="resetInputFields()">
                            <i class="fa-solid fa-plus"></i> Create New
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row g-3 mb-4 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label text-muted small fw-bold">Search</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 text-muted">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0"
                                   placeholder="Search brands..." wire:model.live="searchTerm">
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
                        <label class="form-label text-muted small fw-bold">Order By</label>
                        <select wire:model.live="orderBy" class="form-select">
                            <option value="">Default Column</option>
                            @foreach ($columns as $col)
                                <option value="{{ $col }}">{{ ucwords(str_replace('_', ' ', $col)) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
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
                        <span>Current Page: <strong>{{ $brands->currentPage() }}</strong></span>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle mb-0">
                        <thead class="table-light text-secondary">
                            <tr>
                                <th style="width: 60px;">Sl.</th>
                                <th style="width: 80px;">Logo</th>
                                <th>Brand Name</th>
                                <th>Slug</th>
                                <th style="width: 100px;">Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th style="width: 120px;" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $key => $val)
                                <tr>
                                    <td>{{ $key + $brands->firstItem() }}</td>
                                    <td>
                                        @if($val->logo)
                                            <img src="{{ asset('frontend-assets/imgs/brands/' . $val->logo) }}"
                                                 alt="{{ $val->name }}"
                                                 class="img-thumbnail rounded"
                                                 style="width: 45px; height: 45px; object-fit: cover;" />
                                        @else
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted"
                                                 style="width: 45px; height: 45px;">
                                                <i class="fa-solid fa-image fa-sm"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="fw-semibold text-dark">{{ $val->name }}</td>
                                    <td class="text-muted small">{{ str_replace('_', ' ', $val->slug) }}</td>
                                    <td>
                                        <div class="form-check form-switch mb-0">
                                            <input class="form-check-input active_inactive_btn"
                                                   type="checkbox"
                                                   role="switch"
                                                   id="row_{{ $val->id }}"
                                                   data-status="{{ $val->status }}"
                                                   data-table="brands"
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
                                    <td colspan="8" class="text-center text-muted py-5">
                                        <i class="fa-regular fa-folder-open fa-2xl d-block mb-3 text-black-50"></i>
                                        No brands found matching your criteria.
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
                        {{ $brands->links() }}
                    </div>
                    <div class="col-md-6 text-md-end text-muted small">
                        <p class="mb-0">
                            {{ __('Showing') }} <span class="fw-semibold text-dark">{{ $brands->firstItem() }}</span>
                            {{ __('to') }} <span class="fw-semibold text-dark">{{ $brands->lastItem() }}</span>
                            {{ __('of') }} <span class="fw-semibold text-dark">{{ $brands->total() }}</span> {{ __('results') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @include('livewire.backend.brand.create')
        @include('livewire.backend.brand.edit')
    </section>
</div>

@push('scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const handleConfirmDelete = (deleteId) => {
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This brand will be completely removed!',
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

            if (typeof Livewire !== 'undefined' && Livewire.on) {
                Livewire.on('triggerDelete', deleteId => handleConfirmDelete(deleteId));
            } else {
                window.addEventListener('triggerDelete', event => handleConfirmDelete(event.detail));
            }
        });
    </script>
@endpush
