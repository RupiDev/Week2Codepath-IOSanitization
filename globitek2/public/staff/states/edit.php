<?php
require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to('index.php');
}
$states_result = find_state_by_id($_GET['id']);
// No loop, only one result
$state = db_fetch_assoc($states_result);

// Se default values for all variables the page needs 
$errors = array();

if(is_post_request())
{
	if(isset($_POST['name'])) 
	{
		$state['name'] = h($_POST['name']);
	}
	
	if(isset($_POST['code']))
	{
		$state['code'] = h($_POST['code']);
	}
	
	$result = update_state($state);
	if($result == true)
	{
		redirect_to('show.php?id=' . u($state['id']));
	}
	else
	{
		$errors = $result; 
	}
			
}

?>
<?php $page_title = 'Staff: Edit State ' . $state['name']; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="index.php">Back to States List</a><br />

  <h1>Edit State: <?php echo h($state['name']); ?></h1>
  
  <?php echo display_errors($errors); ?>
  
  <form action="edit.php?id=<?php echo $state['id']; ?>" method="post">
    name:<br />
    <input type="text" name="name" value="<?php echo $state['name']; ?>" /><br />
    code:<br />
    <input type="text" name="code" value="<?php echo $state['code']; ?>" /><br />
    <br />
    <input type="submit" name="submit" value="Update"  />
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
