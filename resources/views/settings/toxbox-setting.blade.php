<x-app-layout>
    <x-slot name="title">
        Toxbox Settings
    </x-slot>
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="page-header py-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Toxbox Settings</h3>
                        </div>
                    </div>
                </div>

                <form>
                    <div class="form-group">
                        <label>ApiKey <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="xxxxxxxx" readonly="">
                    </div>
                    <div class="form-group">
                        <label>ApiSecret <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="xxxxxxxxxxxxxxxxxxxxxxxxxx" readonly="">
                    </div>
                    <br>
                    <div class="submit-section">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            <button class="btn btn-lg btn-outline-secondary submit-btn rounded-pill">Save
                                Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
