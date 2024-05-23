<?php 
$sql = "SELECT `cname`, `position`, `CTC` FROM `jobs`";
$result=mysqli_query($conn,$sql);
$i = 0;
if ($result->num_rows>0) {
    while ($row = $result->fetch_assoc()) {
        echo "
        <tr>
        <td>".++$i."</td>
        <td>".$row['cname']."</td>
        <td>".$row['position']."</td>
        <td>".$row['CTC']."</td>
        </tr>";

    }
}
else {
    echo "No jobs found.";
}
mysqli_close($conn);
?>