extract(shortcode_atts(array('coin' => 'none'), $atts));
extract(shortcode_atts(array('address' => 'none'), $atts));
extract(shortcode_atts(array('team' => 'none'), $atts));

$coin_data = file_get_contents("http://api.blockscan.com/api2?module=address&action=balance&btc_address=".$address."&asset=".$coin);
$coin_data = json_decode($coin_data, true);
$coin_confirmed = $coin_data['data'][0]['balance'];
$coin_unconfirmed = $coin_data['data'][0]['unconfirmed_balance'];
$coin_total = $coin_confirmed +$coin_unconfirmed;

?><br><br>

<a href="https://blockscan.com/address/<?php echo $address;?>" target="_new">Team <?php echo $team;?></a>- Total: 
<?php
echo $coin_total."<br>";
while($coin_total > 0)
{
?>
<?php
echo "<img src='/images/coinrepublic48.png'>";
  $coin_total--;
}
?>

