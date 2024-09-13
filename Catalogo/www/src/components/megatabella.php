<?php


$tableData = prepareMegaTableData('dati/megarw.json');
$versions = $tableData['versions'];
$technicalKeys = $tableData['technicalKeys'];
$accessoryKeys = $tableData['accessoryKeys'];
?>

<table class="min-w-full bg-white border border-gray-300 text-3xs">
    <thead class="bg-gray-100">
        <tr>
            <th>Versione</th>
            <?php foreach ($technicalKeys as $key): ?>
                <th><?php echo htmlspecialchars(formatKey($key)); ?></th>
            <?php endforeach; ?>
            <?php foreach ($accessoryKeys as $key): ?>
                <th><?php echo htmlspecialchars($key); ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($versions as $version): ?>
            <tr>
                <td class="font-bold"><?php echo htmlspecialchars($version['nome']); ?></td>
                <?php foreach ($technicalKeys as $key): ?>
                    <td><?php echo htmlspecialchars(getValueOrDefault($version['dati_tecnici'], $key)); ?></td>
                <?php endforeach; ?>
                <?php foreach ($accessoryKeys as $key): ?>
                    <td><?php echo formatAccessoryValue(getValueOrDefault($version['accessori'], $key, false)); ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
