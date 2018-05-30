<?php
function visualizza($r){
    ?>
    <?php $nomesito = "Lista Questionari"; require __DIR__ . '/parcials/header.php'; ?>
    <body>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 80%;
            margin-left:auto;
            margin-right:auto;
        }

        td, th {
            border: 1px solid #848484;
            text-align: left;
            padding: 8px;
        }

        th{
            background-color: rgb(63, 81, 181);
            color: white;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        h1{
            text-align: center;
        }
    </style>
    <h1>Lista Questionari</h1>

    <table>
        <tr><th>Id questionario</th><th>Id amministratore</th><th>Nome amministratore</th><th>Nome questionario</th>
            <th>Punti</th><th>Tempo minimo</th></th><th>Tempo massimo</th></th><th>Data</th></tr>
        <?php while ($row = mysqli_fetch_array($r,MYSQLI_ASSOC)) {
            echo "<tr><td>".$row["id_questionario"]."</td><td>".$row["id_amministratore"]."</td><td>".$row["admin"]."</td>
            <td>".$row["nomeQ"]."</td><td>".$row["punti"]."</td><td>".$row["tempo_min"]."</td><td>".$row["tempo_max"]."</td>
            <td>".$row["data"]."</td></tr>";
        }?>
    </table>

    </body>
    </html>
<?php  }?>