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
        <header class="row">
            <div class="col">
                <h2>Liste de produits</h2>
            </div>

            
            <div class="col text-right">
                <div class="row">
                    <div class="col">
                        <form method="get">
                            <select class="form-control" name="limit" id="limit-records">
                                <option selected value="10">Select limit record</option>
                                <?php foreach ([10, 20, 50, 200, 500] as $limit_record): ?>
                                    <option 
                                        value="<?= $limit_record ?>"
                                        <?= ($limit == $limit_record) ? "selected" : "" ?>
                                    ><?= $limit_record ?></option>
                                <?php endforeach; ?>
                            </select>
                        </form>
                    </div>
                    <div class="col-4">
                        <a href="view_import.php" class="btn btn-primary">Importer excel</a>
                    </div>
                </div>
                
                
            </div>

            
        </header>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['description']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td><?php echo $product['type']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <footer>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                    <a href="?page=<?= $currentPage - 1 ?>&limit=<?= $limit ?>" class="page-link">Précédente</a>
                </li>
                <?php for($page = 1; $page <= $totalPages; $page++): ?>
                    <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                        <a href="?page=<?= $page ?>&limit=<?= $limit ?>" class="page-link"><?= $page ?></a>
                    </li>
                <?php endfor ?>
                    <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                    <li class="page-item <?= ($currentPage == $totalPages) ? "disabled" : "" ?>">
                    <a href="?page=<?= $currentPage + 1 ?>&limit=<?= $limit ?>" class="page-link">Suivante</a>
                </li>
            </ul>
        </nav>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#limit-records').change(function() {
                $(this).closest('form').submit();
            })

            <?php if (isset($_SESSION['message'])): ?>
                swal("Succès", "<?= $_SESSION['message'] ?>", "success");
                <?php unset($_SESSION['message']); ?>
            <?php endif; ?>
        })

    </script>
</body>
</html>
