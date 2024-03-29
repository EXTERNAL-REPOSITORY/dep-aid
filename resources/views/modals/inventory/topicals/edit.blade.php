<div class="modal fade" id="editTopicals" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Topicals</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="#" method="POST" id="edit-topicals-form" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        @component('components.inputs.input')
                            @slot('label', 'Medicine Name')
                            @slot('attributes', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'name' => 'medicine_name',
                                'id' => 'edit_medicine_name',
                                'placeholder' => 'Medicine Name'
                            ])          
                        @endcomponent
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @component('components.inputs.input')
                            @slot('label', 'Brand')
                            @slot('attributes', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'name' => 'brand',
                                'id' => 'edit_brand',
                                'placeholder' => 'Brand'
                            ])          
                        @endcomponent
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        @component('components.inputs.input')
                            @slot('label', 'Beginning Balance')
                            @slot('attributes', [
                                'class' => 'form-control',
                                'type' => 'number',
                                'name' => 'beginning_balance',
                                'id' => 'edit_beginning_balance',
                                'placeholder' => 'Beginning Balance',
                                'readonly' => true
                            ])          
                        @endcomponent
                    </div>
                    <div class="col-12 col-md-6">
                        @component('components.inputs.input')
                            @slot('label', 'Reorder Level %')
                            @slot('attributes', [
                                'class' => 'form-control',
                                'type' => 'number',
                                'name' => 'reorder_level',
                                'id' => 'edit_reorder_level',
                                'placeholder' => 'Reorder Level',
                            ])          
                        @endcomponent
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col-md-2">
                        <a href="javascript:void(0)" class="btn btn-default mt-4 stock-balance-btn" id="minus-btn">
                            <i class="fa-solid fa-minus"></i>
                        </a>
                    </div> -->
                    <div class="col-md-12">
                        @component('components.inputs.input')
                            @slot('label', 'Stock Balance')
                            @slot('attributes', [
                                'class' => 'form-control',
                                'type' => 'number',
                                'name' => 'stock_balance',
                                'id' => 'edit_stock_balance',
                                'placeholder' => 'Stock Balance',
                                'readonly' => true
                            ])          
                        @endcomponent
                    </div>
                    <!-- <div class="col-md-2">
                        <a href="javascript:void(0)" class="btn btn-default mt-4 stock-balance-btn" id="add-btn">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @component('components.inputs.input')
                            @slot('label', 'Type')
                            @slot('attributes', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'name' => 'type',
                                'id' => 'type',
                                'placeholder' => 'Type',
                                'value' => 'Topicals',
                                'readonly' => true
                            ])          
                        @endcomponent
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="example-date-input" class="form-control-label">Manufacturer Date</label>
                            <input class="form-control" type="date" value="" name="manufacturer_date" id="edit_manufacturer_date">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="example-date-input" class="form-control-label">Expiration Date</label>
                            <input class="form-control" type="date" value="" name="expiration_date" id="edit_expiration_date">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-gradient-primary">Save</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>