<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> - postkai.com</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $LinkWeb; ?>/new/css/style-sheet.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js" integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="row bg-dark m-0">
        <div class="col p-0">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark" aria-label="Offcanvas navbar large">

                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo $LinkWeb; ?>">Postkai</a>
                        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Menu</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                    <li class="nav-item me-2">
                                        <a class="nav-link <?php echo empty($UrlPage) ? "active" : ""; ?>" aria-current="page" href="<?php echo $LinkWeb; ?>"><?php echo $translations["home"]; ?></a>
                                    </li>
                                    <li class="nav-item me-2">
                                        <a class="nav-link <?php echo $UrlPage == "post-new" ? "active" : ""; ?>" href="<?php echo $LinkWeb; ?>post-new"><?php echo $translations["post-new"]; ?></a>
                                    </li>
                                    <li class="nav-item me-2">
                                        <a class="nav-link <?php echo $UrlPage == "post-all" ? "active" : ""; ?>" href="<?php echo $LinkWeb; ?>post-all"><?php echo $translations["post-all"]; ?></a>
                                    </li>
                                    <li class="nav-item me-2 dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php echo $translations["type-search"]; ?>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <?php
                                            $SqlSelect = "SELECT *
                                              FROM p_type
                                              ORDER BY name_Type ASC ;";
                                            if (select_num($SqlSelect) > 0) {
                                                foreach (select_tb($SqlSelect) as $row) {
                                            ?>
                                                    <li><a class="dropdown-item" href="<?php echo $LinkWeb; ?>search/?type=<?php echo $row['id_Type']; ?>"><?php echo $row['name_Type']; ?></a></li>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                </ul>
                                <form class="d-flex mt-3 mt-lg-0" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="<?php echo $translations["message-search"]; ?>">
                                        <button class="btn btn-secondary" type="button"><?php echo $translations["button-search"]; ?></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>

</body>

</html>