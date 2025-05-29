// Diagnose.js - JavaScript for the RetinaScan Diagnosis Tool
// Modified to send image to Flask API and receive predictions

document.addEventListener('DOMContentLoaded', function() {
    const uploadArea = document.getElementById('upload-area');
    const fileUpload = document.getElementById('file-upload');
    const fileName = document.getElementById('file-name');
    const imagePreview = document.getElementById('image-preview');
    const fileInfo = document.querySelector('.file-info');
    const removeFile = document.getElementById('remove-file');
    const loadingOverlay = document.querySelector('.loading-overlay');
    const analysisResult = document.getElementById('analysis-result');
    
    let selectedFile = null; // Store the selected file
    
    // Handle drag and drop events
    uploadArea.addEventListener('dragover', function(e) {
        e.preventDefault();
        uploadArea.classList.add('active');
    });
    
    uploadArea.addEventListener('dragleave', function() {
        uploadArea.classList.remove('active');
    });
    
    uploadArea.addEventListener('drop', function(e) {
        e.preventDefault();
        uploadArea.classList.remove('active');
        const file = e.dataTransfer.files[0];
        handleFile(file);
    });
    
    // Handle file selection via click
    uploadArea.addEventListener('click', function() {
        fileUpload.click();
    });
    
    fileUpload.addEventListener('change', function() {
        if (this.files.length > 0) {
            handleFile(this.files[0]);
        }
    });
    
    // Handle file removal
    removeFile.addEventListener('click', function() {
        fileUpload.value = '';
        fileName.textContent = '';
        imagePreview.src = '#';
        fileInfo.style.display = 'none';
        uploadArea.style.display = 'block';
        selectedFile = null;
    });
    
    // Process the selected file
    function handleFile(file) {
        if (file && file.type.startsWith('image/')) {
            selectedFile = file; // Store file for later use
            fileName.textContent = file.name;
            
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
            
            fileInfo.style.display = 'block';
            uploadArea.style.display = 'none';
        } else {
            alert('Please select a valid image file');
        }
    }
    
    // Function to send image to Flask API
    async function sendImageToFlask(file) {
        const formData = new FormData();
        formData.append('image', file);
        
        try {
            const response = await fetch('http://localhost:5000/predict', {
                method: 'POST',
                body: formData,
                // Don't set Content-Type header, let browser set it with boundary for FormData
            });
            
            const result = await response.json();
            return result;
        } catch (error) {
            console.error('Error sending to Flask:', error);
            throw new Error('Failed to connect to analysis server. Please ensure Flask server is running.');
        }
    }
    
    // Function to get disease description
    function getDiseaseDescription(diseaseCode) {
        const descriptions = {
            'AMD': 'Age-related Macular Degeneration - A common eye condition among people over 50',
            'DME': 'Diabetic Macular Edema - Swelling in the macula caused by diabetes',
            'ERM': 'Epiretinal Membrane - A thin layer of scar tissue over the macula',
            'NO': 'Normal Eye - No significant abnormalities detected',
            'RAO': 'Retinal Artery Occlusion - Blockage of retinal artery',
            'RVO': 'Retinal Vein Occlusion - Blockage of retinal vein',
            'VMT': 'Vitreomacular Traction - Abnormal adherence between vitreous and retina'
        };
        return descriptions[diseaseCode] || 'Unknown condition';
    }
    
    // Function to get severity level based on confidence
    function getSeverityLevel(confidence) {
        if (confidence >= 90) return { level: 'High Confidence', class: 'text-success' };
        if (confidence >= 75) return { level: 'Medium Confidence', class: 'text-warning' };
        if (confidence >= 60) return { level: 'Low Confidence', class: 'text-warning' };
        return { level: 'Very Low Confidence', class: 'text-danger' };
    }
    
    // Function to parse Flask response and create HTML
    function createResultHTML(flaskResponse) {
        let alertClass = 'alert-success';
        let alertIcon = 'fas fa-check-circle';
        let alertMessage = 'Analysis completed successfully';
        
        if (flaskResponse.status === 'error') {
            alertClass = 'alert-danger';
            alertIcon = 'fas fa-exclamation-triangle';
            alertMessage = 'Analysis failed';
        }
        
        // Parse the result to extract prediction and confidence
        let prediction = 'Unknown';
        let confidence = 0;
        let recommendation = '';
        let diseaseDescription = '';
        
        if (flaskResponse.result) {
            const resultText = flaskResponse.result;
            
            if (resultText.includes('This is not an OCT image')) {
                prediction = 'Not an OCT Image';
                confidence = 0;
                recommendation = 'Please upload a valid OCT image';
                diseaseDescription = 'The uploaded image does not appear to be an OCT scan';
            } else if (resultText.includes('Prediction:')) {
                // Extract prediction and confidence from Flask response
                const predictionMatch = resultText.match(/Prediction: (\w+)/);
                const confidenceMatch = resultText.match(/Confidence: ([\d.]+)%/);
                
                if (predictionMatch) {
                    prediction = predictionMatch[1];
                    diseaseDescription = getDiseaseDescription(prediction);
                }
                if (confidenceMatch) {
                    confidence = parseFloat(confidenceMatch[1]);
                }
                
                if (resultText.includes('Please consult a doctor')) {
                    recommendation = 'Please consult a doctor to confirm the diagnosis';
                }
            }
        }
        
        const severity = getSeverityLevel(confidence);
        
        // Create warnings HTML
        let warningsHTML = '';
        if (flaskResponse.warnings && flaskResponse.warnings.length > 0) {
            warningsHTML = `
                <div class="alert alert-warning mb-3">
                    <h6><i class="fas fa-exclamation-triangle me-2"></i>Image Quality Warnings:</h6>
                    <ul class="mb-0">
                        ${flaskResponse.warnings.map(warning => `<li>${warning}</li>`).join('')}
                    </ul>
                </div>
            `;
        }
        
        return `
            <div class="alert ${alertClass} mb-20">
                <i class="${alertIcon} me-2"></i> ${alertMessage}
            </div>
            
            ${warningsHTML}
            
            ${flaskResponse.confirmation ? `
                <div class="alert alert-info mb-3">
                    <i class="fas fa-info-circle me-2"></i> ${flaskResponse.confirmation}
                </div>
            ` : ''}
            
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Diagnosis Results</h5>
                        </div>
                        <div class="card-body">
                            <br>
                            <h6 class="fw-bold">Primary Findings:</h6>
                            <ul class="mt-2">
                                <li><strong>${prediction}</strong></li>
                                <li class="text-muted">${diseaseDescription}</li>
                                ${recommendation ? `<li class="text-warning mt-2"><i class="fas fa-exclamation-triangle"></i> ${recommendation}</li>` : ''}
                            </ul>
                            
                            ${flaskResponse.message ? `
                                <h6 class="fw-bold mt-3">Processing Information:</h6>
                                <p class="mt-2 text-muted">${flaskResponse.message}</p>
                            ` : ''}
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0">Analysis Details</h5>
                        </div>
                        <div class="card-body">
                            <br>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Confidence Score:</span>
                                <span class="fw-bold ${severity.class}">${confidence.toFixed(1)}%</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Reliability Level:</span>
                                <span class="fw-bold ${severity.class}">${severity.level}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Analysis Status:</span>
                                <span class="fw-bold">${flaskResponse.status === 'success' ? 'Completed' : 'Failed'}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Report ID:</span>
                                <span class="fw-bold">#OCT-${Math.floor(Math.random() * 10000)}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            ${confidence > 0 && flaskResponse.status === 'success' ? `
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-secondary text-white">
                                <h5 class="mb-0">Recommendations</h5>
                            </div>
                            <div class="card-body">
                                ${confidence < 60 ? `
                                    <div class="alert alert-warning">
                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                        Low confidence result. Please consider retaking the image with better quality or consult a specialist.
                                    </div>
                                ` : ''}
                                ${prediction !== 'NO' && prediction !== 'Not an OCT Image' ? `
                                    <div class="alert alert-info">
                                        <i class="fas fa-user-md me-2"></i>
                                        Abnormality detected. Please consult with an ophthalmologist for proper medical evaluation and treatment planning.
                                    </div>
                                ` : ''}
                                ${prediction === 'NO' ? `
                                    <div class="alert alert-success">
                                        <i class="fas fa-check-circle me-2"></i>
                                        Normal findings detected. Continue regular eye examinations as recommended by your healthcare provider.
                                    </div>
                                ` : ''}
                            </div>
                        </div>
                    </div>
                </div>
            ` : ''}
            
            <div class="text-center mt-30">
                <a href="#" class="rr-btn rr-btn__theme-white me-3" onclick="downloadReport()">
                    <span class="btn-wrap">
                        <span class="text-one">Download PDF Report <i class="fas fa-file-pdf"></i></span>
                    </span>
                </a>
                <a href="#" class="rr-btn rr-btn__theme" onclick="saveToRecords()">
                    <span class="btn-wrap">
                        <span class="text-one">Save to Patient Records <i class="fas fa-save"></i></span>
                    </span>
                </a>
            </div>
        `;
    }
    
    // Form submission
    document.getElementById('analysisForm').addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Check if file is selected
        if (!selectedFile) {
            alert('Please select an image first');
            return;
        }
        
        // Show loading overlay
        loadingOverlay.style.display = 'flex';
        analysisResult.style.display = 'none';
        
        try {
            // Send image to Flask API
            const flaskResponse = await sendImageToFlask(selectedFile);
            
            // Hide loading overlay
            loadingOverlay.style.display = 'none';
            
            // Create and show results
            document.getElementById('result-content').innerHTML = createResultHTML(flaskResponse);
            
            // Show result section
            analysisResult.style.display = 'block';
            
            // Scroll to results
            analysisResult.scrollIntoView({ behavior: 'smooth', block: 'start' });
            
        } catch (error) {
            // Hide loading overlay
            loadingOverlay.style.display = 'none';
            
            // Show error message
            document.getElementById('result-content').innerHTML = `
                <div class="alert alert-danger mb-20">
                    <i class="fas fa-exclamation-triangle me-2"></i> Analysis Error
                </div>
                <div class="card">
                    <div class="card-body text-center">
                        <h5>Failed to connect to analysis server</h5>
                        <p class="text-danger">${error.message}</p>
                        <div class="mt-3">
                            <h6>Troubleshooting Steps:</h6>
                            <ul class="text-start mt-2">
                                <li>Ensure Flask server is running on port 5000</li>
                                <li>Check your network connection</li>
                                <li>Verify that CORS is enabled in Flask</li>
                                <li>Check browser console for additional errors</li>
                            </ul>
                        </div>
                        <button class="btn btn-primary mt-3" onclick="location.reload()">
                            <i class="fas fa-redo me-2"></i>Retry Analysis
                        </button>
                    </div>
                </div>
            `;
            
            // Show result section
            analysisResult.style.display = 'block';
            analysisResult.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
});

// Helper functions for buttons (you can implement these)
function downloadReport() {
    alert('PDF report download functionality would be implemented here');
}

function saveToRecords() {
    alert('Save to patient records functionality would be implemented here');
}