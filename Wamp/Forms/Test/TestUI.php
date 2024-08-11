<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card with Menus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="menu1-tab" data-bs-toggle="tab" data-bs-target="#menu1" type="button" role="tab" aria-controls="menu1" aria-selected="true">Menu 1</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="menu2-tab" data-bs-toggle="tab" data-bs-target="#menu2" type="button" role="tab" aria-controls="menu2" aria-selected="false">Menu 2</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="menu3-tab" data-bs-toggle="tab" data-bs-target="#menu3" type="button" role="tab" aria-controls="menu3" aria-selected="false">Menu 3</button>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="menu1" role="tabpanel" aria-labelledby="menu1-tab">
                        <h5 class="card-title">Content for Menu 1</h5>
                        <p class="card-text">This is the content displayed when Menu 1 is active.</p>
                    </div>
                    <div class="tab-pane fade" id="menu2" role="tabpanel" aria-labelledby="menu2-tab">
                        <h5 class="card-title">Content for Menu 2</h5>
                        <p class="card-text">This is the content displayed when Menu 2 is active.</p>
                    </div>
                    <div class="tab-pane fade" id="menu3" role="tabpanel" aria-labelledby="menu3-tab">
                        <h5 class="card-title">Content for Menu 3</h5>
                        <p class="card-text">This is the content displayed when Menu 3 is active.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
