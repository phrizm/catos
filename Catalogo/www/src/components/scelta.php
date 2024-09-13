<section class="p-2 border border-red-500 border-dashed rounded-md">
<div class="flex flex-row justify-center w-full h-4 p-2 rounded-md accessori bg-surfacedark place-items-center">
<h2 class="font-bold text-2xs font-hubot">Guida alla scelta | Selection guide | Guide de sélection | Auswahlhilfe | Guía de selección</h2>
</div>

<?php
// Assumiamo che $productData contenga i dati del JSON
$guidaScelta = $productData['guida_alla_scelta'];

// Funzione per ottenere il valore di colore basato sul valore
function getColorValue($value, $greenMax, $yellowMax) {
    if ($value <= $greenMax) {
        return 1; // Verde pieno
    } elseif ($value <= $yellowMax) {
        return 1 - ($value - $greenMax) / ($yellowMax - $greenMax); // Sfumatura da verde a giallo
    } else {
        return -1 * ($value - $yellowMax) / (30 - $yellowMax); // Sfumatura da giallo a rosso
    }
}

// Preprocessiamo i dati per la heatmap
$heatmapData = [];
foreach ($guidaScelta as $gruppo) {
    $versione = $gruppo['nome_gruppo'];
    $greenMax = intval(explode('-', $gruppo['range_verde'])[1]);
    $yellowMax = intval(explode('-', $gruppo['range_giallo'])[1]);
    
    $values = array_map(function($i) use ($greenMax, $yellowMax) {
        return getColorValue($i, $greenMax, $yellowMax);
    }, range(1, 30));
    
    $heatmapData[] = [
        "name" => $versione,
        "values" => $values
    ];
}
?>

<div id="heatmap-chart"></div>

<script src="https://d3js.org/d3.v7.min.js"></script>
<script>
const data = <?php echo json_encode($heatmapData); ?>;

const margin = {top: 30, right: 30, bottom: 30, left: 100},
      width = 600 - margin.left - margin.right,
      height = 200 - margin.top - margin.bottom;

const svg = d3.select("#heatmap-chart")
    .append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
    .append("g")
    .attr("transform", `translate(${margin.left},${margin.top})`);

const y = d3.scaleBand()
    .range([height, 0])
    .domain(data.map(d => d.name))
    .padding(0.1);

svg.append("g")
    .call(d3.axisLeft(y));

const x = d3.scaleBand()
    .range([0, width])
    .domain(d3.range(30))
    .padding(0.05);

svg.append("g")
    .attr("transform", `translate(0,${height})`)
    .call(d3.axisBottom(x).tickValues([0, 9, 19, 29]).tickFormat(d => `${d+1}m³`));

const color = d3.scaleLinear()
    .domain([-1, 0, 1])
    .range(["#ff0000", "#ffff00", "#00ff00"]);

data.forEach(d => {
    svg.selectAll()
        .data(d.values)
        .enter()
        .append("rect")
        .attr("x", (v, i) => x(i))
        .attr("y", y(d.name))
        .attr("width", x.bandwidth())
        .attr("height", y.bandwidth())
        .style("fill", v => color(v));
});

// Aggiungi le etichette dei metri cubi sopra il grafico
svg.append("g")
    .attr("text-anchor", "middle")
    .attr("class", "text-3xs")
    .selectAll("text")
    .data([0, 9, 19, 29])
    .enter().append("text")
    .attr("x", d => x(d) + x.bandwidth() / 2)
    .attr("y", -10)
    .text(d => `${d+1}m³`);
</script>

<p></p>
</section>
