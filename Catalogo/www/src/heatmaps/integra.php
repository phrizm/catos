<?php
// Supponiamo che questi dati vengano da un database o da un'altra fonte
$data = [
    ["name" => "Integra 130", "values" => [5, 15, 25, 35, 45,45,45,45,6]],
    ["name" => "Integra 2", "values" => [5, 15, 25, 35, 45,45,45,45,6]],
    ["name" => "Integra 3", "values" => [10, 15, 25, 35, 45,45,45,45,6]]
];
?>

    <div id="heatmap-chart"></div>

    <script>
    // Converti i dati PHP in formato JSON per l'uso in JavaScript
    const data = <?php echo json_encode($data); ?>;

    // Imposta le dimensioni e i margini del grafico
    const margin = {top: 30, right: 30, bottom: 30, left: 30},
          width = 400 - margin.left - margin.right,
          height = 200 - margin.top - margin.bottom;

    // Crea l'elemento SVG
    const svg = d3.select("#heatmap-chart")
        .append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", `translate(${margin.left},${margin.top})`);

    // Crea la scala Y
    const y = d3.scaleBand()
        .range([height, 0])
        .domain(data.map(d => d.name))
        .padding(0.1);

    svg.append("g")
        .call(d3.axisLeft(y));

    // Crea la scala X
    const x = d3.scaleLinear()
        .domain([0, d3.max(data, d => d3.max(d.values))])
        .range([0, width]);

    svg.append("g")
        .attr("transform", `translate(0,${height})`)
        .call(d3.axisBottom(x).ticks(5));

    // Crea la scala di colore
    const color = d3.scaleSequential(d3.interpolateYlOrRd)
        .domain([0, d3.max(data, d => d3.max(d.values))]);

    // Crea i rettangoli per la heatmap
    data.forEach(d => {
        svg.selectAll()
            .data(d.values)
            .enter()
            .append("rect")
            .attr("x", (v, i) => i * (width / d.values.length))
            .attr("y", y(d.name))
            .attr("width", width / d.values.length)
            .attr("height", y.bandwidth())
            .style("fill", v => color(v));
    });

    // Aggiungi le etichette dei metri quadrati sopra il grafico
    svg.append("g")
        .attr("text-anchor", "middle")
        .selectAll("text")
        .data(data[0].values)
        .enter().append("text")
        .attr("x", (d, i) => (i + 0.5) * (width / data[0].values.length))
        .attr("y", -10)
        .text((d, i) => `${i*10}-${(i+1)*10}m²`);
    </script>




