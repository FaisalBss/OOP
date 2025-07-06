<?php
if (!method_exists($user, 'getInterns')) {
    echo "Access denied.";
    return;
}
$interns = $user->getInterns();

echo "<table>
<tr>
    <th>Name</th>
    <th>ID</th>
    <th>Email</th>
    <th>Role</th>
</tr>";

foreach ($interns as $info) {
    echo "<tr>
        <td>" . htmlspecialchars($info['name']) . "</td>
        <td>{$info['id']}</td>
        <td>" . htmlspecialchars($info['email']) . "</td>
        <td>" . ucfirst($info['role']) . "</td>
    </tr>";
}
echo "</table>";
