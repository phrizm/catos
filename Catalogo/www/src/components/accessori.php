<section class="p-2 border border-dashed rounded-md border-brand">
    <div class="flex flex-row justify-center w-full h-4 p-2 rounded-md accessori bg-surfacedark place-items-center">
        <h2 class="font-bold text-2xs font-hubot">Accessori | Accessories | Accessoires | Zubehör | Accesorios</h2>
    </div>

    <?php
    // Supponiamo che i dati del prodotto siano già caricati in $productData

    // Definiamo le versioni del prodotto
    $versions = ['RW 251', 'RW 261', 'RW 351', 'RW 361', 'RW 451', 'RW 461'];

    // Funzione per generare una disponibilità casuale (da sostituire con dati reali)
    function getRandomAvailability() {
        return rand(0, 1) ? '✓' : '-';
    }

    // Supponiamo che gli accessori siano nel primo gruppo di accessori del prodotto
    $accessori = $productData['accessori'][0]['accessori'];

    // Inizio della tabella
    echo '<table class="min-w-full bg-white border border-gray-300 text-3xs">';
    echo '<thead class="bg-gray-100">';
    echo '<tr>';
    echo '<th class="py-2 px-4 border-b">Varianti</th>';

    // Intestazioni delle colonne con gli accessori
    foreach ($accessori as $accessorio) {
        echo '<th class="py-2 px-4 border-b">' . htmlspecialchars($accessorio['nome']) . '</th>';
    }
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Righe per ciascuna versione del prodotto
    foreach ($versions as $version) {
        echo '<tr>';
        echo '<td class="py-2 px-4 border-b font-bold">' . htmlspecialchars($version) . '</td>';
        
        // Per ogni accessorio, mostriamo la disponibilità per questa versione
        foreach ($accessori as $accessorio) {
            // Qui dovresti usare la logica reale per determinare la disponibilità
            // Per ora, usiamo una funzione casuale come placeholder
            $availability = getRandomAvailability();
            echo '<td class="py-2 px-4 border-b text-center">' . $availability . '</td>';
        }
        
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    ?>

    <p></p>
</section>
