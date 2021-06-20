<?php
  $stmt = $conn->prepare("SELECT * FROM notifikasi ORDER BY id DESC");
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Inbox</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href=".">Home</a></li>
                        <li><a href="inbox">Inbox</a></li>
                    </ol>
                </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                    <?php foreach($result as $row) { ?>
                <div class="white-box">
                    <div class="comment-center">
                        <div class="comment-body b-none">
                            <div class="mail-contnet">
                                <h5>Perbaruan Data <?php echo ucfirst($row['kategori'])?></h5>
                                <span class="label label-success"><?php echo $row['nip']?></span>
                                <span class="label label-primary"><?php echo $row['nama']?></span>
                                <br>
                                <span class="mail-desc"><?php echo $row['keterangan']?></span>
                                <?php
                                if ($row['status'] == 'approved') { ?>
                                    <a href="#"><button class="btn btn-rounded btn-success m-r-5 approve" disabled>Approved</button></a>
                                    <a href="api/?id=<?php echo $row['id']?>&status=rejected"><button class="btn-rounded btn btn-default btn-outline approve"><i class="ti-close text-danger m-r-5"></i>Reject</button></a> 
                                <?php
                                }
                                else if ($row['status'] == 'rejected'){ ?>
                                    <a href="api/?id=<?php echo $row['id']?>&status=approved"><button class="btn btn btn-rounded btn-default btn-outline m-r-5 approve"><i class="ti-check text-success m-r-5"></i>Approve</button></a>
                                    <a href="#"><button class="btn-rounded btn btn-danger approve" disabled>Rejected</button></a>
                                <?php 
                                }
                                else { ?>
                                    <a href="api/?id=<?php echo $row['id']?>&status=approved"><button class="btn btn btn-rounded btn-default btn-outline m-r-5 approve"><i class="ti-check text-success m-r-5"></i>Approve</button></a>
                                    <a href="api/?id=<?php echo $row['id']?>&status=rejected"><button class="btn-rounded btn btn-default btn-outline approve"><i class="ti-close text-danger m-r-5"></i>Reject</button></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                    <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->