<?php
require_once dirname(__FILE__) . '/config.php';
//require_once nZEDb_LIB . 'binaries.php';
//require_once nZEDb_LIB . 'groups.php';
//require_once nZEDb_LIB . 'nntp.php';
//require_once nZEDb_LIB . 'ColorCLI.php';
//require_once nZEDb_LIB . 'site.php';

$binaries = new Binaries();
$c = new ColorCLI();
$s = new Sites();
$site = $s->get();

// Create the connection here and pass
$nntp = new Nntp();
if ($nntp->doConnect() === false)
	exit($c->error("Unable to connect to usenet."));
if ($site->nntpproxy === "1")
	usleep(500000);

if (isset($argv[1]))
{
	$groupName = $argv[1];
	echo $c->header("Updating group: $groupName");

	$grp = new Groups();
	$group = $grp->getByName($groupName);
	$binaries->updateGroup($group, $nntp);
}
else
	$binaries->updateAllGroups($nntp);
if ($site->nntpproxy != "1")
	$nntp->doQuit();
?>
