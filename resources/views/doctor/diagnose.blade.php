@extends('doctor.master')

@section('title-page')
Eye Analysis
@endsection

@section('styles')
<!-- Include specialized CSS for the diagnose page -->
<link rel="stylesheet" href="{{ asset('assets/css/diagnose.css') }}">
@endsection

@section('content')
<!-- Analysis form area start -->
<section class="analysis-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="section__title-wrapper text-center mb-60 mb-xs-40">
                    <h2 class="section__title mb-20 mb-xs-15 title-animation">AI Eye Analysis System</h2>
                    <p class="mb-0">Upload an eye image for instant AI-powered analysis and detailed diagnostic insights.</p>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <div class="upload-container">
                    <form id="analysisForm" action="{{ url('/doctor/diagnose') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="upload-area" id="upload-area">
                            <i class="fas fa-eye upload-icon"></i>
                            <h4 class="mb-15">Drag & Drop eye image here</h4>
                            <p class="mb-20">or click to browse from your device</p>
                            <input type="file" id="file-upload" name="eye_image" accept="image/*" required>
                        </div>
                        
                        <div class="file-info" style="display:none;">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Selected Image:</h5>
                                <button type="button" class="rr-btn rr-btn__theme-white btn-sm" id="remove-file">
                                    <span class="btn-wrap">
                                        <span class="text-one">Remove  <i class="fas fa-trash-alt"></i></span>
                                    </span>
                                </button>
                            </div>
                            <p id="file-name" class="mt-10 mb-0"></p>
                            <img id="image-preview" class="image-preview" src="#" alt="Eye image preview" style="display:none;">
                        </div>
                        <br>
                        <div class="patient-info mt-30">
                            <h4 class="mb-15"><i class="fas fa-user-md"></i> Patient Information </h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="patient_name" class="form-label">Patient Name</label>
                                    <input type="text" class="form-control" id="patient_name" name="patient_name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="patient_age" class="form-label">Patient Age</label>
                                    <input type="number" class="form-control" id="patient_age" name="patient_age" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="patient_gender" class="form-label">Gender</label>
                                    <select class="form-select" id="patient_gender" name="patient_gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="patient_id" class="form-label">Patient ID (optional)</label>
                                    <input type="text" class="form-control" id="patient_id" name="patient_id">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="patient_notes" class="form-label">Medical Notes (optional)</label>
                                    <textarea class="form-control" id="patient_notes" name="patient_notes" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center mt-40">
                            <button type="submit" class="rr-btn rr-btn__theme">
                                <span class="btn-wrap">
                                    <span class="text-one">Start Analysis <i class="fas fa-microscope"></i></span>
                                </span>
                            </button>
                        </div>
                    </form>
                    
                    <div class="loading-overlay" style="display:none;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <h4 class="mt-3">Analyzing Image...</h4>
                        <p>Please wait while our AI examines the eye image</p>
                    </div>
                    
                    <div class="analysis-result" id="analysis-result" style="display:none;">
                        <h4 class="mb-20"><i class="fas fa-chart-line"></i> Analysis Results </h4>
                        <div id="result-content"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Analysis form area end -->

<!-- Include diagnose.js for specialized functionality -->
<script src="{{ asset('assets/js/diagnose.js') }}"></script>

@endsection
