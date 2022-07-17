<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="row">
        <div class="container mt-3">
            <div class="card">
                <div class="card-header">
                    <h4>Data Peserta</h4>
                </div>
                <div class="card-body">
                    <form action="<?=base_url()?>admin/simpan" method="post">
                        <button type="submit" class="btn btn-primary btn-sm mb-2 float-right">Update</button>

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Pemenang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach($peserta as $p) { ?>
                                    <tr>
                                        <th scope="row"><?= $no++; ?></th>
                                        <td><?=$p->first_name; ?></td>
                                        <td>
                                            <?php if($p->pemenang_keberapa){ ?>
                                                <input type="checkbox" checked class="form-control" name="id_peserta[]" value="<?= $p->id; ?>">
                                            <?php } else { ?>
                                                <input type="checkbox" class="form-control" name="id_peserta[]" value="<?= $p->id; ?>">
                                            <?php } ?>                
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>