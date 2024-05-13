<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Products</title>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    Import Excel File
                </div>
                <div class="card-body">
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="excelFile">Choisir un fichier excel</label>
                            <input type="file" class="form-control-file" id="excelFile" name="excelFile">
                        </div>
                        <button type="submit" class="btn btn-primary" name="import">Import</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
