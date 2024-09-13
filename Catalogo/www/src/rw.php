<?php
$jsonData = file_get_contents('dati/rw.json');
$data = json_decode($jsonData, true);
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>



<?php foreach ($data['products'] as $product): ?>
    <h2><?php echo htmlspecialchars($product['nome_commerciale']); ?></h2>
    <p><?php echo htmlspecialchars($product['testo_ita']); ?></p>
    <p><?php echo htmlspecialchars($product['testo_en']); ?></p> 
    <p><?php echo htmlspecialchars($product['testo_fr']); ?></p>
    





    <table>
        <tr>
            <th>Potenza Frigorifera 0°C</th>
            <th>Potenza Frigorifera -20°C</th>
            <th>Tensione di Alimentazione</th>
           
        </tr>
        <tr>
            <td><?php echo htmlspecialchars($product['dati_tecnici_nominali']['potenza_frigorifera_0C']); ?></td>
            <td><?php echo htmlspecialchars($product['dati_tecnici_nominali']['potenza_frigorifera_20C']); ?></td>
            <td><?php echo htmlspecialchars($product['dati_tecnici_nominali']['tensione_alimentazione']); ?></td>
            <!-- ... altri dati ... -->
        </tr>
    </table>

    <!-- Tabella Accessori -->
    <table>
        <tr>
            <th>Gruppo</th>
            <th>Accessorio</th>
            <th>Disponibilità</th>
        </tr>
        <?php foreach ($product['accessori'] as $gruppo): ?>
            <?php foreach ($gruppo['accessori'] as $accessorio): ?>
                <tr>
                    <td><?php echo htmlspecialchars($gruppo['nome_gruppo']); ?></td>
                    <td><?php echo htmlspecialchars($accessorio['nome']); ?></td>
                    <td><?php echo $accessorio['disponibilita'] ? 'Sì' : 'No'; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </table>

    <!-- Tabella Guida alla Scelta -->
    <table>
        <tr>
            <th>Gruppo</th>
            <th>Range</th>
        </tr>
        <?php foreach ($product['guida_alla_scelta'] as $guida): ?>
            <tr>
                <td><?php echo htmlspecialchars($guida['nome_gruppo']); ?></td>
                <td><?php echo htmlspecialchars($guida['range']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endforeach; ?>
