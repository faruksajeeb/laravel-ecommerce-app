<x-slot name="title">
    Option Groups
</x-slot>

<div>
    <section class="container-fluid py-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom py-3">
                <div class="row align-items-center g-3">
                    <div class="col-md-6">
                        <h5 class="card-title mb-0 d-flex align-items-center gap-2">
                            <i class="fa-solid fa-list text-primary"></i> 
                            <span>Option Groups</span>
                        </h5>
                    </div>
                    <div class="col-md-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 justify-content-md-end">
                                <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Master Data</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Option Groups</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row g-3 mb-4 align-items-center">
                    <div class="col-md-4 col-lg-3">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 text-muted">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0 ps-md-1" 
                                   placeholder="Search Option Groups..." wire:model.live="searchTerm">
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <select wire:model.live="orderBy" class="form-select">
                            <option value="">-- Order By --</option>
                            @foreach ($columns as $col)
                                <option value="{{ $col }}">{{ ucwords(str_replace('_', ' ', $col)) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select wire:model.live="sortBy" class="form-select">
                            <option value="">-- Sort By --</option>
                            <option value="DESC">Descending</option>
                            <option value="ASC">Ascending</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-lg-5 text-end ms-auto">
                        <div class="d-flex gap-2 justify-content-md-end flex-wrap">
                            <button type="button" class="btn btn-outline-primary d-inline-flex align-items-center gap-2"
                                    data-bs-toggle="modal" data-bs-target="#addPaymentDeduction" wire:click="resetInputFields()">
                                <i class="fa-solid fa-plus"></i> Create New
                            </button>
                            
                            <button type="button" class="btn btn-success d-inline-flex align-items-center gap-2" 
                                    wire:click.prevent="render('excelExport')">
                                <i class="fa-solid fa-download"></i> Export
                            </button>
                        </div>
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
                        <span>Current Page: <strong>{{ $option_groups->currentPage() }}</strong></span>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle mb-0">
                        <thead class="table-light text-secondary">
                            <tr>
                                <th style="width: 60px;">Sl.</th>
                                <th>Option Group Name</th>
                                <th style="width: 120px;">Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th style="width: 130px;" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($option_groups as $key => $val)
                                <tr>
                                    <td>{{ $key + $option_groups->firstItem() }}</td>
                                    <td class="fw-semibold text-dark">{{ str_replace('_', ' ', $val->option_group_name) }}</td>
                                    <td>
                                        <div class="form-check form-switch mb-0">
                                            <input class="form-check-input active_inactive_btn" 
                                                   type="checkbox" 
                                                   role="switch"
                                                   id="row_{{ $val->id }}"
                                                   data-status="{{ $val->status }}"
                                                   data-table="option_groups"
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
                                                    data-bs-toggle="modal" data-bs-target="#editModel" 
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
                                    <td colspan="6" class="text-center text-muted py-4">
                                        <i class="fa-regular fa-folder-open fa-2xl d-block mb-3 text-black-50"></i>
                                        No Option Groups found.
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
                        {{ $option_groups->links() }}
                    </div>
                    <div class="col-md-6 text-md-end text-muted small">
                        <p class="mb-0">
                            {{ __('Showing') }} <span class="fw-semibold text-dark">{{ $option_groups->firstItem() }}</span>
                            {{ __('to') }} <span class="fw-semibold text-dark">{{ $option_groups->lastItem() }}</span>
                            {{ __('of') }} <span class="fw-semibold text-dark">{{ $option_groups->total() }}</span> {{ __('results') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @include('livewire.backend.option-group.create')
        @include('livewire.backend.option-group.edit')
    </section>
</div>

@push('scripts')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        // Formatted to work natively on modern Livewire setups (supports Livewire v2 $emit and Livewire v3 $dispatch)
        const handleConfirmDelete = (deleteId) => {
            Swal.fire({
                title: 'Are you sure?',
                text: 'This record will be permanently deleted!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('destroy', deleteId);
                }
            });
        };

        // Listeners for modern Livewire lifecycles
        if (typeof Livewire !== 'undefined' && Livewire.on) {
            Livewire.on('triggerDelete', deleteId => handleConfirmDelete(deleteId));
        } else {
            window.addEventListener('triggerDelete', event => handleConfirmDelete(event.detail));
        }
    });
</script>
@endpush