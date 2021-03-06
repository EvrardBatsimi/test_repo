<?php
require_once("git_connect.php");

// Prend le résultat d'une requête en paramètre
function resultAsArray($res)
{
    $result = array(); // Déclaration d'un tableau vide
    while ($resultRow = mysqli_fetch_assoc($res)) { // Itération sur tous les résultats de la requête
        array_push($result, $resultRow);  // Push de chaque résultat dans le tableau déclaré plus tôt
    }
    return $result; // Retourne le tableau de résultat
}

// Je récupère les données de tous les employés en bdd
$res = $db->query("SELECT * FROM employees");
// Je transforme mon résultat sous forme de tableau (je facilite la manipulation de mes données)
$employees = resultAsArray($res);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employés</title>
</head>

<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Date d'embauche</th>
            <th>Job ID</th>
            <th>Salaire</th>
            <th>Commission</th>
            <th>Manager ID</th>
            <th>Departement ID</th>
        </tr>

        <?php
        // J'itère sur mon tableau d'employés pour afficher leur données
        foreach ($employees as $employee) {
            echo "<tr>" .
                "<td>{$employee['employee_id']}</td>" .
                "<td>{$employee['first_name']}</td>" .
                "<td>{$employee['last_name']}</td>" .
                "<td>{$employee['email']}</td>" .
                "<td>{$employee['phone_number']}</td>" .
                "<td>{$employee['hire_date']}</td>" .
                "<td>{$employee['job_id']}</td>" .
                "<td>{$employee['salary']}</td>" .
                "<td>{$employee['commission_pct']}</td>" .
                "<td>{$employee['manager_id']}</td>" .
                "<td>{$employee['department_id']}</td>" .
                "</tr>";
        }
        ?>
    </table>
</body>

</html>