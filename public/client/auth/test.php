<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Xác thực</h6>
        </div>
        <div class='card-body p-3'>
            <div class='row'>
                <div class='col-lg-6'>
                    <div class='d-flex flex-column h-100'>
                        <h5 class='font-weight-bolder'>Bạn vui lòng xác thực tài khoản</h5>
                        <p class='mb-5'>Cảm ơn bạn đã tin tưởng và tham gia cùng <b><?=$knsite['Title']?></b>
                        </p>
                    </div>
                </div>
            </div>
            <a href='$url' class='btn bg-gradient-dark w-100 my-4 mb-2'>$url</a>
        </div>
    </div>
</div>