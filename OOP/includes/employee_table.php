<?php
if (!method_exists($user, 'getAllEmployees')) {
    echo "Access denied.";
    return;
}
$employees = $user->getAllEmployees();

echo "<table>
<tr>
    <th>Name</th>
    <th>ID</th>
    <th>Salary</th>
    <th>Email</th>
    <th>Role</th>
</tr>";

foreach ($employees as $info) {
    echo "<tr>
        <td>" . htmlspecialchars($info['name']) . "</td>
        <td>{$info['id']}</td>
        <td>{$info['salary']}</td>
        <td>" . htmlspecialchars($info['email']) . "</td>
        <td>" . ucfirst($info['role']) . "</td>
    </tr>";
}
echo "</table>";
