<?php foreach ($data['products'] as $product): ?>
<div class="relative flex items-center justify-center w-full overflow-hidden bg-white">
    <!-- Background SVG -->
    <div class="absolute inset-0 z-0 flex items-center justify-center">
    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev/svgjs" viewBox="0 0 800 800"><defs><linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="nnneon-grad"><stop stop-color="hsl(157, 100%, 54%)" stop-opacity="1" offset="0%"></stop><stop stop-color="hsl(0, 0%, 100%)" stop-opacity="1" offset="100%"></stop></linearGradient><filter id="nnneon-filter" x="-100%" y="-100%" width="400%" height="400%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
	<feGaussianBlur stdDeviation="17 8" x="0%" y="0%" width="100%" height="100%" in="SourceGraphic" edgeMode="none" result="blur"></feGaussianBlur></filter><filter id="nnneon-filter2" x="-100%" y="-100%" width="400%" height="400%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
	<feGaussianBlur stdDeviation="21 16" x="0%" y="0%" width="100%" height="100%" in="SourceGraphic" edgeMode="none" result="blur"></feGaussianBlur></filter></defs><g stroke-width="9" stroke="url(#nnneon-grad)" fill="none" transform="rotate(176, 400, 400)"><circle r="209" cx="400" cy="400" filter="url(#nnneon-filter)"></circle><circle r="209" cx="412" cy="400" filter="url(#nnneon-filter2)" opacity="0.25"></circle><circle r="209" cx="388" cy="400" filter="url(#nnneon-filter2)" opacity="0.25"></circle><circle r="209" cx="400" cy="400"></circle></g></svg>   
    </div>

    <!-- Contenuto principale -->
    <div class="relative z-10 flex flex-col items-center justify-center w-full max-w-[1800px] p-4">
        <div class="mb-4 text-center">
            <span class="block text-[#F4FFFA00] bg-clip-text bg-gradient-to-b from-brand to-surfacedark">Gruppi a tetto</span>
            <h1 class="block font-bold text-3xl text-[#F4FFFA00] bg-clip-text bg-gradient-to-b from-brand to-surfacedark">
                <?php echo htmlspecialchars($product['nome_commerciale']); ?>
            </h1>
        </div>
        
        <div class="flex items-center justify-center w-full">
            <img src="<?= htmlspecialchars($product['url_immagine_copertina']);?>" alt="" class="object-contain h-auto max-w-full">
        </div>
    </div>
</div>
<?php endforeach; ?>
