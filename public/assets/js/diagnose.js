// Diagnose.js - JavaScript for the RetinaScan Diagnosis Tool
// This script handles the drag-and-drop file upload, image preview, and form submission for the diagnosis tool.
    document.addEventListener('DOMContentLoaded', function() {
        const uploadArea = document.getElementById('upload-area');
        const fileUpload = document.getElementById('file-upload');
        const fileName = document.getElementById('file-name');
        const imagePreview = document.getElementById('image-preview');
        const fileInfo = document.querySelector('.file-info');
        const removeFile = document.getElementById('remove-file');
        const loadingOverlay = document.querySelector('.loading-overlay');
        const analysisResult = document.getElementById('analysis-result');
        
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
        });
        
        // Process the selected file
        function handleFile(file) {
            if (file && file.type.startsWith('image/')) {
                fileName.textContent = file.name;
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
                
                fileInfo.style.display = 'block';
            } else {
                alert('Please select a valid image file');
            }
        }
        
        // Form submission
        document.getElementById('analysisForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate form
            if (!this.checkValidity()) {
                e.stopPropagation();
                this.classList.add('was-validated');
                return;
            }
            
            // Show loading overlay
            loadingOverlay.style.display = 'flex';
            analysisResult.style.display = 'none';
            
            // Collect form data
            const formData = new FormData(this);
            
            // In a real application, you would send the formData to the server
            // For demo purposes, we'll simulate an API response after a delay
            setTimeout(function() {
                // Hide loading overlay
                loadingOverlay.style.display = 'none';
                
                // Show results with mock data
                document.getElementById('result-content').innerHTML = `
                    <div class="alert alert-success mb-20">
                        <i class="fas fa-check-circle me-2"></i> Analysis completed successfully
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Diagnosis</h5>
                                </div>
                                <div class="card-body">
                                <br>
                                    <h6 class="fw-bold">Primary Findings:</h6>
                                    <ul class="mt-2">
                                        <li>Diabetic Retinopathy - Mild</li>
                                        <li>Macular Edema - Not present</li>
                                    </ul>
                                    
                                    <h6 class="fw-bold mt-3">Secondary Observations:</h6>
                                    <ul class="mt-2">
                                        <li>Minor vascular changes</li>
                                        <li>Early signs of hypertensive retinopathy</li>
                                    </ul>
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
                                        <span class="fw-bold">94%</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Analysis Time:</span>
                                        <span class="fw-bold">3.2 seconds</span>
                                    </div>
                                   
                                    <div class="d-flex justify-content-between">
                                        <span>Report ID:</span>
                                        <span class="fw-bold">#EYE-${Math.floor(Math.random() * 10000)}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <div class="text-center mt-30">
                        <a href="#" class="rr-btn rr-btn__theme-white me-3">
                            <span class="btn-wrap">
                                <span class="text-one">Download PDF Report <i class="fas fa-file-pdf"></i></span>
                            </span>
                        </a>
                        <a href="#" class="rr-btn rr-btn__theme">
                            <span class="btn-wrap">
                                <span class="text-one">Save to Patient Records <i class="fas fa-save"></i></span>
                            </span>
                        </a>
                    </div>
                `;
                
                // Show result section
                analysisResult.style.display = 'block';
                
                // Scroll to results
                analysisResult.scrollIntoView({ behavior: 'smooth', block: 'start' });
                
            }, 3000);
        });
    });