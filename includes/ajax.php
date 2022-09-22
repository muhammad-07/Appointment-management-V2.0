<?php
define('PATH','../');
require_once(PATH . 'template/sesschk.php');
require_once 'condata.php';
require_once(PATH .'includes/funcs.php');

if( isset( $_POST['start'] ) && isset( $_POST['limit'] ) && !empty( $_POST['start'] ) && !empty( $_POST['limit'] ) ){
	$start = $_POST['start'];
	$limit = $_POST['limit'];
	$sql = "SELECT j.*, b.*,UNIX_TIMESTAMP() - UNIX_TIMESTAMP(j.addedon) AS TimeSpent FROM jobs j, business b
		WHERE j.pby = b.link
		ORDER BY j.jid DESC
		limit $start, $limit";
		$q = $dbh->query($sql);
		$data = array();
		/*while( $row = $q->fetch(PDO::FETCH_ASSOC) )
		{
			$data['content'][] = $row;
		}
		echo json_encode($data);exit;	*/
		while( $row = $q->fetch(PDO::FETCH_ASSOC) )
		{
			
		
		echo '<br>';
								
							
		?>
					    
                                                <li>
                                                    <img src="<?php echo PATH . 'profile/business/' .$row['link']. '/' .$row['profImage']; ?>" class="avatar" alt="user">
                                                    <div class="message_date">
                                                        <!--<h3 class="date text-info">24</h3>
                                                        <p class="month">May</p>-->
							<div style="text-align: center; margin-bottom: 17px">
									<span class="chart" data-percent="86">
									<span class="percent"></span>
									</span>
							</div>

								    
								   
                                                    </div>
                                                    <div class="message_wrapper">
                                                        <h4 class="heading"><?php echo $row['jtitle']; ?></h4>
							<div class="byline">
								&nbsp;&nbsp;<a class="green"><i class="fa fa-flag"></i>&nbsp;<?php echo $row['jtype']; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;
								<span>$<?php echo $row['salary']; ?></span> <?php echo $row['salarytype']; ?>
							</div>
                                                        <blockquote class="message"><pre><?php echo clickable_link( strlen($row['jdesc']) > 200 ? substr($row['jdesc'],0,200).'... <a href="viewJob.php?j='.$row['link'].'" target="_blank">read more </a>':''); ?></pre>
							<div class="byline">
								<span><?php echo postago($row['TimeSpent']);?></span> by <a><?php echo $row['contname']; ?></a>
								
							</div>
							</blockquote>
                                                        <br />
                                                        <!--<p class="url">
                                                            <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                                            <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
							    
                                                        </p>-->
                                                    </div>
                                                </li>
						<?php
							}
}
?>