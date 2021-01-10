<?php
include "IncludesParts/header.php";
include "../model/getFeedBacks.php" ;
$feedbacks=getFeedBacks();
?>

<div class="container" style="height: 450px">
<div class="row barStyle m-2 p-1"><h3>Feedbacks from customers </h3></div>
    <div class="row m-3 ">
        <div class="col-md-3">Name</div>
        <div class="col-md-3">Phone</div>
        <div class="col-md-2">subject</div>
        <div class="col-md-3">Date</div>
        <div class="col-md-1">

        </div>
    </div>
    <?php while ($row=mysqli_fetch_array($feedbacks)){ ?>
    <div class="feed">

        <div class="row m-2">
            <div class="col-md-3"><?php echo $row["Contact_name"];?></div>
            <div class="col-md-3"><?php echo $row["Contact_number"];?></div>
            <div class="col-md-2"><?php echo $row["Subject"];?></div>
            <div class="col-md-3"><?php echo $row["FeedBack_Date"];?></div>
            <div class="col-md-1">
                <button type="button" data-toggle="collapse" data-target="#feedback<?php echo $row["ID"];?>" aria-expanded="false"
                        aria-controls="feedback<?php echo $row["ID"];?>" class="btn btn-primary">Show
                </button>
            </div>

        </div>
        <div class="row collapse" id="feedback<?php echo $row["ID"];?>">
            <div class="col-md-6">
                <div class="container">
                    <?php echo $row["Message"];?>

                </div>
            </div>
            <div class="col-md-6">
                <div class="container">
                    <form action="../model/sendFeedBackRespond.php" method="post">
                        <div class="form-group">
                            <textarea class="form-control" name="respond" id="" cols="30" rows="5" ></textarea>
                            <input type="hidden" name="feedbackID" value="<?php echo $row["ID"];?>">
                            <input class="form-control btn btn-primary m-1 " type="submit" value="Send Response">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php }?>
</div>


<?php include "IncludesParts/footer.php"; ?>

