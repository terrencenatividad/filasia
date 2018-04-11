<style>
    .huge {
        font-size: 20px;
    }

    .panel-green {
        border-color: #5cb85c;
    }

    .panel-green .panel-heading {
        border-color: #5cb85c;
        color: #fff;
        background-color: #5cb85c;
    }

    .panel-green a {
        color: #5cb85c;
    }

    .panel-green a:hover {
        color: #3d8b3d;
    }

    .panel-red {
        border-color: #d9534f;
    }

    .panel-red .panel-heading {
        border-color: #d9534f;
        color: #fff;
        background-color: #d9534f;
    }

    .panel-red a {
        color: #d9534f;
    }

    .panel-red a:hover {
        color: #b52b27;
    }

    .panel-yellow {
        border-color: #f0ad4e;
    }

    .panel-yellow .panel-heading {
        border-color: #f0ad4e;
        color: #fff;
        background-color: #f0ad4e;
    }

    .panel-yellow a {
        color: #f0ad4e;
    }

    .panel-yellow a:hover {
        color: #df8a13;
    }

    .panel-pink {
        border-color: #FF69B4;
    }

    .panel-pink .panel-heading {
        color: white;
        background-color: #FF69B4;
    }

</style>
<section class="content">
    <div class="box box-primary">
        <div class="box-header pb-none">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa  fa-send fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php $i = 0; ?>
                                    <?php foreach($contacts as $cont) : ?>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                    <div class="huge">You have <?php echo $i; ?></div>
                                    <div>Contacts</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= BASE_URL?>contact">
                            <div class="panel-footer">
                                <span class="pull-left">View Contacts</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php $i = 0; ?>
                                    <?php foreach($products as $cont) : ?>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                    <div class="huge">You have <?php echo $i++; ?></div>
                                    <div>Products</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= BASE_URL?>product">
                            <div class="panel-footer">
                                <span class="pull-left">View Products</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-lightbulb-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php $i = 0; ?>
                                    <?php foreach($highlights as $cont) : ?>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                    <div class="huge">You have <?php echo $i++; ?></div>
                                    <div>Highlights</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= BASE_URL?>highlights">
                            <div class="panel-footer">
                                <span class="pull-left">View Highlights</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php $i = 0; ?>
                                    <?php foreach($projects as $cont) : ?>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                    <div class="huge">You have <?php echo $i++; ?></div>
                                    <div>Projects</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= BASE_URL?>projects">
                            <div class="panel-footer">
                                <span class="pull-left">View Projects</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="panel panel-pink">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notifications Panel
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="contact" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i> New Contact
                                    <span class="pull-right text-muted small">
                                        <em>
                                            <?php echo time_ago($timecontact->entereddate); ?>
                                        </em>
                                    </span>
                                </a>
                                <a href="product" class="list-group-item">
                                    <i class="fa fa-shopping-bag fa-fw"></i> New Product
                                    <span class="pull-right text-muted small"><em>
                                        <?php echo time_ago($productcontact->entereddate); ?></em>
                                    </span>
                                </a>
                                <a href="highlights" class="list-group-item">
                                    <i class="fa fa-lightbulb-o fa-fw"></i> Project Highlights
                                    <span class="pull-right text-muted small"><em>
                                        <?php echo time_ago($highlightcontact->entereddate); ?></em>
                                    </span></em>
                                </span>
                            </a>

                            <a href="projects" class="list-group-item">
                                <i class="fa fa-folder-open fa-fw"></i> Projects and Clients
                                <span class="pull-right text-muted small"><em>
                                    <?php echo time_ago($projectcontact->entereddate); ?></em>
                                </span></em>
                            </span>
                        </a>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>
</div>
</section>
<?php function time_ago( $date )
{
    if( empty( $date ) )
    {
        return "No date provided";
    }
    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths = array("60","60","24","7","4.35","12","10");
    $now = time();
    $unix_date = strtotime( $date );
    if( empty( $unix_date ) )
    {
        return "Bad date";
    }
    if( $now > $unix_date )
    {
        $difference = $now - $unix_date;
        $tense = "ago";
    }
    else
    {
        $difference = $unix_date - $now;
        $tense = "ago";
    }
    for( $j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++ )
    {
        $difference /= $lengths[$j];
    }
    $difference = round( $difference );
    if( $difference != 1 )
    {
        $periods[$j].= "s";
    }
    return "$difference $periods[$j] {$tense}";
} ?>
