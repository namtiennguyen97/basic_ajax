
<form role="form" id="accessoryForm" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <td>Name: </td>
            <td> <input type="text" name="name"></td>
        </tr>

        <tr>
            <td>Vendor:</td>
            <td><input type="text" name="vendor"></td>
        </tr>
        <tr>
            <td>Image:</td>
            <td><input type="file" name="image"  class="form-control-file"></td>
        </tr>
        <tr>
            <td>Price:</td>
            <td><input type="number" name="price"></td>
        </tr>
        <tr>
            <td><button class="btn btn-success" id="addAccessory">Add</button></td>
        </tr>
    </table>
</form>
