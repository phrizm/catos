
<section class="p-2 border border-dashed rounded-md border-brand">
<div class="flex flex-row justify-center w-full h-4 p-2 rounded-md accessori bg-surfacedark place-items-center">
<h2 class="font-bold text-2xs font-hubot">Dati tecnici nominali | Nominal technical data  | Données techniques nominales  | Nominale technische Daten | Datos técnicos nominales </h2>
</div>

<?php
// Supponiamo che i dati del prodotto siano già caricati in $productData

// Definiamo le versioni del prodotto
$versions = ['RW 251', 'RW 261', 'RW 351', 'RW 361', 'RW 451', 'RW 461'];

// Estrai i dati tecnici dal prodotto
$datiTecnici = $productData['dati_tecnici_nominali'];

// Funzione per generare un valore casuale per i dati tecnici (da sostituire con dati reali)
function getRandomValue($baseValue) {
    return $baseValue . ' ±' . rand(1, 10) . '%';
}

// Inizio della tabella
echo '<table class="min-w-full bg-white border border-gray-300 text-3xs">';
echo '<thead class="bg-gray-100">';
echo '<tr>';
echo '<th class="py-2 px-4 border-b">Varianti</th>';

// Intestazioni delle colonne con i dati tecnici
foreach ($datiTecnici as $nome => $valore) {
    if ($nome !== 'dimensioni') {  // Includiamo 'peso' ma escludiamo 'dimensioni'
        if ($nome === 'peso') {
            echo '<th class="py-2 px-4 border-b">Peso Evaporatore</th>';
            echo '<th class="py-2 px-4 border-b">Peso Condensatore</th>';
        } else {
            echo '<th class="py-2 px-4 border-b">' . htmlspecialchars(str_replace('_', ' ', ucfirst($nome))) . '</th>';
        }
    }
}
echo '</tr>';
echo '</thead>';
echo '<tbody>';

// Righe per ciascuna versione del prodotto
foreach ($versions as $version) {
    echo '<tr>';
    echo '<td class="py-2 px-4 border-b font-bold">' . htmlspecialchars($version) . '</td>';
    
    // Per ogni dato tecnico, mostriamo un valore per questa versione
    foreach ($datiTecnici as $nome => $valore) {
        if ($nome !== 'dimensioni') {
            if ($nome === 'peso') {
                // Qui dovresti usare la logica reale per determinare i pesi specifici per questa versione
                $pesoEvaporatore = getRandomValue($valore['evaporatore']);
                $pesoCondensatore = getRandomValue($valore['condensatore']);
                echo '<td class="py-2 px-4 border-b text-center">' . $pesoEvaporatore . '</td>';
                echo '<td class="py-2 px-4 border-b text-center">' . $pesoCondensatore . '</td>';
            } else {
                // Qui dovresti usare la logica reale per determinare il valore specifico per questa versione
                $specificValue = getRandomValue($valore);
                echo '<td class="py-2 px-4 border-b text-center">' . $specificValue . '</td>';
            }
        }
    }
    
    echo '</tr>';
}

echo '</tbody>';
echo '</table>';

// Aggiungiamo una sezione separata per le dimensioni
echo '<div class="mt-4 text-3xs">';
echo '<h3 class="font-bold">Dimensioni:</h3>';
echo '<p>Evaporatore: ' . $datiTecnici['dimensioni']['evaporatore'] . '</p>';
echo '<p>Condensatore: ' . $datiTecnici['dimensioni']['condensatore'] . '</p>';
echo '</div>';
?>
<p></p>
</section>
