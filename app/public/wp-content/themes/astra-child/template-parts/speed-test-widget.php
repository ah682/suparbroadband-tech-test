<!-- 
Speed Test Widget - Mock Version
Add this shortcode to any page: [speed_test_widget]
-->

<div class="speed-test-widget">
    <div class="speed-test-container">
        <div class="speed-test-header">
            <h3>Check Your Current Speed</h3>
            <p>Test your internet connection speed</p>
        </div>
        
        <div class="speed-test-display" id="speed-display">
            <div class="speed-meter">
                <svg viewBox="0 0 200 120" class="speedometer">
                    <path d="M 20 100 A 80 80 0 0 1 180 100" fill="none" stroke="#e0e0e0" stroke-width="20" stroke-linecap="round"/>
                    <path id="speed-arc" d="M 20 100 A 80 80 0 0 1 180 100" fill="none" stroke="#0066cc" stroke-width="20" stroke-linecap="round" stroke-dasharray="251.2" stroke-dashoffset="251.2"/>
                    <circle cx="100" cy="100" r="5" fill="#0066cc"/>
                    <line id="needle" x1="100" y1="100" x2="100" y2="40" stroke="#333" stroke-width="3" stroke-linecap="round"/>
                </svg>
                <div class="speed-value">
                    <span id="speed-number">--</span>
                    <span class="speed-unit">Mbps</span>
                </div>
            </div>
            
            <div class="speed-stats">
                <div class="stat-item">
                    <span class="stat-label">Download</span>
                    <span class="stat-value" id="download-speed">-- Mbps</span>
                </div>
                <div class="stat-item">
                    <span class="stat-label">Upload</span>
                    <span class="stat-value" id="upload-speed">-- Mbps</span>
                </div>
                <div class="stat-item">
                    <span class="stat-label">Ping</span>
                    <span class="stat-value" id="ping-time">-- ms</span>
                </div>
            </div>
        </div>
        
        <button id="start-test-btn" class="speed-test-btn">
            <span class="btn-text">Start Speed Test</span>
            <span class="btn-icon">▶</span>
        </button>
        
        <div class="speed-test-result" id="test-result" style="display: none;">
            <p class="result-message"></p>
            <a href="<?php echo home_url('/broadband-plans/'); ?>" class="upgrade-link">Find Faster Plans →</a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const startBtn = document.getElementById('start-test-btn');
    const speedNumber = document.getElementById('speed-number');
    const downloadSpeed = document.getElementById('download-speed');
    const uploadSpeed = document.getElementById('upload-speed');
    const pingTime = document.getElementById('ping-time');
    const speedArc = document.getElementById('speed-arc');
    const needle = document.getElementById('needle');
    const testResult = document.getElementById('test-result');
    const resultMessage = testResult.querySelector('.result-message');
    
    if (!startBtn) return;
    
    startBtn.addEventListener('click', function() {
        runSpeedTest();
    });
    
    function runSpeedTest() {
        // Disable button
        startBtn.disabled = true;
        startBtn.classList.add('testing');
        startBtn.querySelector('.btn-text').textContent = 'Testing...';
        
        // Reset display
        testResult.style.display = 'none';
        speedNumber.textContent = '0';
        downloadSpeed.textContent = '0 Mbps';
        uploadSpeed.textContent = '0 Mbps';
        pingTime.textContent = '0 ms';
        
        // Simulate speed test (mock implementation)
        simulateTest();
    }
    
    function simulateTest() {
        let progress = 0;
        const maxSpeed = Math.floor(Math.random() * 400) + 50; // Random speed between 50-450 Mbps
        const finalDownload = maxSpeed;
        const finalUpload = Math.floor(maxSpeed * 0.15); // Upload is typically ~15% of download
        const finalPing = Math.floor(Math.random() * 30) + 10; // Ping between 10-40ms
        
        const interval = setInterval(() => {
            progress += 2;
            
            if (progress <= 100) {
                const currentSpeed = Math.floor((finalDownload * progress) / 100);
                updateDisplay(currentSpeed, finalUpload, finalPing);
            } else {
                clearInterval(interval);
                completeTest(finalDownload, finalUpload, finalPing);
            }
        }, 50);
    }
    
    function updateDisplay(download, upload, ping) {
        speedNumber.textContent = download;
        downloadSpeed.textContent = download + ' Mbps';
        uploadSpeed.textContent = upload + ' Mbps';
        pingTime.textContent = ping + ' ms';
        
        // Update speedometer arc and needle
        const maxSpeed = 500;
        const percentage = Math.min(download / maxSpeed, 1);
        const arcLength = 251.2;
        const offset = arcLength - (arcLength * percentage);
        speedArc.style.strokeDashoffset = offset;
        
        // Rotate needle (180 degrees range)
        const rotation = -90 + (180 * percentage);
        needle.style.transform = `rotate(${rotation}deg)`;
        
        // Change arc color based on speed
        if (download < 100) {
            speedArc.style.stroke = '#dc3545'; // Red
        } else if (download < 300) {
            speedArc.style.stroke = '#ffc107'; // Yellow
        } else {
            speedArc.style.stroke = '#28a745'; // Green
        }
    }
    
    function completeTest(download, upload, ping) {
        // Re-enable button
        startBtn.disabled = false;
        startBtn.classList.remove('testing');
        startBtn.querySelector('.btn-text').textContent = 'Test Again';
        
        // Show result
        testResult.style.display = 'block';
        
        // Determine result message
        if (download < 100) {
            resultMessage.innerHTML = '<strong>Your connection could be faster!</strong> You might benefit from upgrading to a faster broadband plan.';
            testResult.style.background = '#fff3cd';
            testResult.style.borderColor = '#ffc107';
        } else if (download < 300) {
            resultMessage.innerHTML = '<strong>Good speed!</strong> Your connection is suitable for most activities. Check out our ultra-fast plans for even better performance.';
            testResult.style.background = '#e8f5e9';
            testResult.style.borderColor = '#28a745';
        } else {
            resultMessage.innerHTML = '<strong>Excellent speed!</strong> You have a very fast connection. Perfect for streaming, gaming, and large households.';
            testResult.style.background = '#e8f5e9';
            testResult.style.borderColor = '#28a745';
        }
    }
});
</script>
