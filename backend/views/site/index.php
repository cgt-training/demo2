<?php
use backend\assets\LoginAsset;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<style type="text/css">
    .number {
  font-size: 61px;
  font-weight: bold;
  padding-top: 26%;
  text-align: center;
}
.card-title {
  text-align: center;
  text-transform: uppercase;
}
</style>
<?php 
    //echo "<pre>";
    //print_r($count);
    //exit;
?>
            <div class="content">
                <div class="container-fluid">
                    
                    <div class="row">
                        <?php 
                        if(!empty($count)){
                        foreach ($count as $key => $value) {

                            $ran = array('red','green','blue','orange','red','purple');
                            $randomElement = $ran[array_rand($ran, 1)];
                            ?>
                        <div class="col-md-4">
                            <div class="card card-chart">
                                <div class="card-header" data-background-color="<?php echo $randomElement; ?>" data-header-animation="true">
                                    <div class="number"><?php echo $value; ?></div>
                                </div>
                                <div class="card-content">
                                    <div class="card-actions">
                                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                                            <i class="material-icons">build</i> Fix Header!
                                        </button>
                                        <button type="button" class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Refresh">
                                            <i class="material-icons">refresh</i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Change Date">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </div>
                                    <h4 class="card-title"><?php echo $key; ?></h4>
                                    
                                </div>
                               
                            </div>
                        </div>
                        <?php 
                         }
                    }
                        ?>
                      ?>
                    </div>
                </div>
            </div>
           
       
