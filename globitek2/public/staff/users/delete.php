<?php require_once('../../../private/initialize.php'); 


if(!isset($_GET['id'])) {
  redirect_to('index.php');
}
$users_result = find_user_by_id($_GET['id']);
// No loop, only one result
$user = db_fetch_assoc($users_result);

if(is_post_request())
{
	if(isset($_POST['yesButton']))
	{
		$result = delete_user($user);	
	}
		
	redirect_to('index.php');
	
}
?>
<?php $page_title = 'Staff: Delete User'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main content">

<h1> Are you sure you want to delete this user! </h1>

  <form action="delete.php?id=<?= $user['id'] ?>" method="post">
    
    <input type="submit" name="yesButton" value="YAHHHHH!" />
    &nbsp;
     
  </form>
  
  <form action="delete.php?id=<?= $user['id'] ?>" method="post">
  	<input type="submit" name="noButton"  value="Go Back" />
  </form>



	
	
</div>

