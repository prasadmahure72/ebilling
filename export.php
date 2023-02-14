<?php include('config.php');

$html = '<table>
<tr>
<td> Customer Name  </td>
<td> Contact Number</td>
<td> Address  </td>
<td> Remarks  </td>
<td> Proof Date   </td>
<td> Total Items  </td>
<td> Delivery Date  </td>
<td> Amount  </td>
<td> Advance  </td>
<td> Balance  </td>
<td> Time  </td>


</tr>
';

$select_info = mysqli_query($con, "SELECT * FROM `order_form_client_details` ORDER BY `id` DESC");
$i = 1;
while ($data_info = mysqli_fetch_array($select_info)) {
    $date = date("d M Y, g:i a", strtotime($data_info["time"]));
  
    $html .= '<tr><td>' . $data_info['customer_name'] . '</td><td>' . $data_info['contact_number'] . '</td><td>' . $data_info['customer_address'] . '</td><td>' . $data_info['remarks'] . '</td><td>' . $data_info['proof_date'] . '</td><td>' . $data_info['total_items'] . '</td><td>' . $data_info['delivery_date'] . '</td><td>' . $data_info['amount'] . '</td><td>' . $data_info['advance'] . '</td><td>' . $data_info['balance'] . '</td><td>' . $date . '</td></tr>';
}
$html .= '</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attchment;filename=report.xls');
echo $html;
