<h2>Edit Position</h2>

<form action="/admin/positions/update/<?= $position['id'] ?>" method="post">
    <div class="form-group">
        <label for="name">Position Name:</label>
        <input type="text" name="name" id="name" required value="<?= $position['position_name'] ?>">
    </div>
    <button type="submit">Update Position</button>
</form>
