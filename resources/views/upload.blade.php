'name',
        'image',
        'actual_price',
        'bidding_price',
        'expiring_date',
        'description'

<div>

<form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
        <!-- Add CSRF Token -->
        @csrf
    <div class="form-group">
        <label>Item Name</label>
        <input type="text" class="form-control" name="name" required>
    </div>

    <div class="form-group">
        <input type="file" name="file" required>
    </div>

    <div class="form-group">
        <label>actual price</label>
        <input type="number" name="actual_price" min="0.01" step="0.01"/>
    </div>

    <div class="form-group">
        <label>bidding price</label>
        <input type="number" name="bidding_price" min="0.01" step="0.01"/>
    </div>

    <div class="form-group">
        <label>expiring date</label>
        <input type="date" name="expiring date"/>
    </div>

    <div class="form-group">
        <label>description</label>
        <input type="text" name="description"/>
    </div>

    <button type="submit">Submit</button>
</form>

</div>