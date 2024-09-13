<?php foreach ($data['products'] as $product): ?>
    <div class="grid grid-cols-1 gap-4 p-4 md:grid-cols-2 lg:grid-cols-3">
        <!-- Card Italiano -->
        <div class="overflow-hidden bg-white rounded-lg shadow-md">
            <div class="flex items-center p-2">
                <svg class="w-4 h-4 mr-2" viewBox="0 0 3 2">
                    <rect width="3" height="2" fill="#009246"/>
                    <rect width="2" height="2" fill="#fff"/>
                    <rect width="1" height="2" fill="#ce2b37"/>
                </svg>
                <span class="font-bold font-hubot">Italiano</span>
            </div>
            <div class="p-4">
                <p class="text-xs"><?php echo htmlspecialchars($product['testo_ita']); ?></p>
            </div>
        </div>

        <!-- Card Inglese -->
        <div class="overflow-hidden bg-white rounded-lg shadow-md">
            <div class="flex items-center p-4 bg-gray-100">
                <svg class="w-6 h-6 mr-2" viewBox="0 0 60 30">
                    <clipPath id="t">
                        <path d="M30,15 h30 v15 z v15 h-30 z h-30 v-15 z v-15 h30 z"/>
                    </clipPath>
                    <path d="M0,0 v30 h60 v-30 z" fill="#00247d"/>
                    <path d="M0,0 L60,30 M60,0 L0,30" stroke="#fff" stroke-width="6"/>
                    <path d="M0,0 L60,30 M60,0 L0,30" clip-path="url(#t)" stroke="#cf142b" stroke-width="4"/>
                    <path d="M30,0 v30 M0,15 h60" stroke="#fff" stroke-width="10"/>
                    <path d="M30,0 v30 M0,15 h60" stroke="#cf142b" stroke-width="6"/>
                </svg>
                <span class="font-bold">English</span>
            </div>
            <div class="p-4">
            <p class="text-xs"><?php echo htmlspecialchars($product['testo_en']); ?></p>
            </div>
        </div>

        <!-- Card Francese -->
        <div class="overflow-hidden bg-white rounded-lg shadow-md">
            <div class="flex items-center p-4 bg-gray-100">
                <svg class="w-6 h-6 mr-2" viewBox="0 0 3 2">
                    <rect width="3" height="2" fill="#ED2939"/>
                    <rect width="2" height="2" fill="#fff"/>
                    <rect width="1" height="2" fill="#002395"/>
                </svg>
                <span class="font-bold">Français</span>
            </div>
            <div class="p-4">
            <p class="text-xs"><?php echo htmlspecialchars($product['testo_fr']); ?></p>
            </div>
        </div>

        <!-- Card Tedesco -->
        <div class="overflow-hidden bg-white rounded-lg shadow-md">
            <div class="flex items-center p-4 bg-gray-100">
                <svg class="w-6 h-6 mr-2" viewBox="0 0 3 2">
                    <rect width="3" height="2" fill="#000"/>
                    <rect width="3" height="1.33" fill="#D00"/>
                    <rect width="3" height="0.67" fill="#FFCE00"/>
                </svg>
                <span class="font-bold">Deutsch</span>
            </div>
            <div class="p-4">
            <p class="text-xs"><?php echo htmlspecialchars($product['testo_de']); ?></p>
            </div>
        </div>

        <!-- Card Spagnolo -->
        <div class="overflow-hidden bg-white rounded-lg shadow-md">
            <div class="flex items-center p-4 bg-gray-100">
                <svg class="w-6 h-6 mr-2" viewBox="0 0 3 2">
                    <rect width="3" height="2" fill="#c60b1e"/>
                    <rect width="3" height="1" y="0.5" fill="#ffc400"/>
                </svg>
                <span class="font-bold">Español</span>
            </div>
            <div class="p-4">
            <p class="text-xs"><?php echo htmlspecialchars($product['testo_es']); ?></p>
            </div>
        </div>
    </div>
<?php endforeach; ?>