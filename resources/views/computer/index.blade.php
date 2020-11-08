<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>

    <title>Computer</title>
</head>
<body>
<table class="table table-bordered" id="mainTable">
    <thead>
    <tr style="text-align: center">
        <th scope="col">Name</th>
        <th scope="col">Vendor</th>
        <th scope="col">Price</th>
        <th scope="col">Delete</th>
        <th scope="col">Detail</th>
        <th scope="col">Edit</th>

    </tr>
    </thead>
    <tbody>
    @if(count($computer)==0)
        <a>No data</a>
    @endif
    @foreach($computer as $computers)
        <tr style="text-align: center">
            <td>{{$computers->name}}</td>
            <td>{{$computers->vendor}}</td>
            <td>{{$computers->price}}</td>
            <td><a class="deleteComputer btn btn-danger" data-id="{{$computers->id}}">Delete</a></td>
            <td><a class="showDetail btn btn-warning" data-id="{{$computers->id}}" data-name="{{$computers->name}}" data-vendor="{{$computers->vendor}}" data-price="{{$computers->price}}">Detail</a></td>
            <td><a class="showEditModal btn btn-success" data-id="{{$computers->id}}" data-name="{{$computers->name}}"
                   data-vendor="{{$computers->vendor}}"
                 data-price="{{$computers->price}}">Edit</a></td>
        </tr>
    @endforeach
    </tbody>
</table>


<button type="button" class="btn btn-primary" id="showAddComputer">
    Add new Computer
</button>
{{--MODAL ADD--}}
<div class="modal fade" id="addComputer" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add new Computer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="mainForm" role="form">
                    @csrf
                    <table>
                        <tr>
                            <td>Name:</td>
                            <td><input type="text" name="name" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Vendor:</td>
                            <td><input type="text" name="vendor" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Price:</td>
                            <td><input type="number" name="price" class="form-control"></td>
                        </tr>
                    </table>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="confirmAdd">Add</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateCom" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add new Computer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateForm" role="form">
                    @csrf
                    <table>
                        <tr>
                            <td>Name:</td>
                            <td><input type="text" name="name" id="updateName" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Vendor:</td>
                            <td><input type="text" name="vendor" id="updateVendor" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Price:</td>
                            <td><input type="number" name="price" id="updatePrice" class="form-control"></td>
                        </tr>
                    </table>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="confirmUpdate">Update</button>
            </div>
        </div>
    </div>
</div>


{{--show detail--}}
<div class="modal fade" id="detailCom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title detailTitle" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body detailBody">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

{{--end show detail--}}


<script>
    $(document).ready(function () {

        $('#showAddComputer').click(function () {
            $('#addComputer').modal('show');
        });


        $('#confirmAdd').click(function (e) {
            e.preventDefault();
            $.ajax({
                url: '{{route('computer.store')}}',
                type: 'post',
                data: $('#mainForm').serialize(),
                success: function (data) {
                    $('#mainTable').append("<tr style='text-align: center'>" +
                        "<td>" + data.name + "</td>" +
                        "<td>" + data.vendor + "</td>" +
                        "<td>" + data.price + "</td>" +
                        "<td>" + "<a class='deleteComputer test btn btn-danger' data-id='"+ data.id +"'>Delete</a>"+ "</td>" +
                        "<td>" + "<a class='showDetail btn btn-warning' data-id='"+ data.id+"' data-name='"+ data.name+"' data-vendor='"+ data.vendor+"' data-price='"+ data.price +"'>Detail</a> " + "</td>" +
                        "</tr>");
                }
            });

        });

        //delete
        let com_id;
        $('.deleteComputer').click(function () {
            com_id = $(this).data('id');
            $.ajax({
                url: '/computer/delete/' + com_id,
                type: 'get',
                success: function () {

                    location.reload();
                }
            });
        });

        //show detail

        $('.showDetail').click(function () {
            com_id = $(this).data('id');
            let name = $(this).data('name');
            let vendor = $(this).data('vendor');
            let price = $(this).data('price');
            $('#detailCom').modal('show');
            $.ajax({
                url: '/computer/show/' + com_id,
                type: 'get',
                success: function (data) {
                    $('.detailTitle').text(data.name);
                    $('.detailBody').text(data.vendor);
                }

            });
        });


        // update
        $('.showEditModal').click(function () {
            com_id = $(this).data('id');
            let name = $(this).data('name');
            let vendor = $(this).data('vendor');
            let price = $(this).data('price');
            $('#updateCom').modal('show');

            $('#updateName').val(name);
            $('#updateVendor').val(vendor);
            $('#updatePrice').val(price);

        });

        $('#confirmUpdate').click(function () {
            $.ajax({
                url: '/computer/update/' + com_id,
                type: 'post',
                data: $('#updateForm').serialize(),
                success: function (data) {
                    alert('success');
                }
            });
        });

    });
</script>


</body>
</html>
