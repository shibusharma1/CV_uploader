<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Details Submission Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --accent: #4895ef;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #4cc9f0;
            --warning: #f72585;
            --gray: #6c757d;
            --light-gray: #e9ecef;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fb 0%, #e4edff 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .form-container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 30px 40px;
            text-align: center;
        }

        .form-header h1 {
            font-weight: 700;
            margin-bottom: 10px;
        }

        .form-header p {
            opacity: 0.9;
        }

        .form-progress {
            padding: 20px 30px;
            background: var(--light);
        }

        .progress-steps {
            display: flex;
            justify-content: space-between;
            position: relative;
        }

        .progress-steps::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--light-gray);
            z-index: 1;
        }

        .progress-bar {
            position: absolute;
            top: 20px;
            left: 0;
            height: 4px;
            background: var(--primary);
            z-index: 2;
            transition: width 0.4s ease;
        }

        .step {
            position: relative;
            z-index: 3;
            text-align: center;
            width: 24%;
        }

        .step-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            border: 3px solid var(--light-gray);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-weight: 700;
            color: var(--gray);
            transition: all 0.3s ease;
        }

        .step.active .step-icon {
            border-color: var(--primary);
            background: var(--primary);
            color: white;
        }

        .step.completed .step-icon {
            border-color: var(--success);
            background: var(--success);
            color: white;
        }

        .step-label {
            font-size: 14px;
            font-weight: 500;
            color: var(--gray);
        }

        .step.active .step-label,
        .step.completed .step-label {
            color: var(--dark);
            font-weight: 600;
        }

        .form-body {
            padding: 30px;
        }

        .form-section {
            display: none;
            animation: fadeIn 0.5s ease;
        }

        .form-section.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section-title {
            font-weight: 700;
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--light-gray);
        }

        .form-footer {
            padding: 20px 30px;
            background: var(--light);
            display: flex;
            justify-content: space-between;
        }

        .btn-nav {
            background: var(--primary);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-nav:hover {
            background: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }

        .btn-nav:disabled {
            background: var(--gray);
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .btn-prev {
            background: white;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-prev:hover {
            background: var(--light);
            color: var(--secondary);
        }

        .document-upload {
            border: 2px dashed var(--light-gray);
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            margin-bottom: 20px;
            transition: all 0.3s;
            background: var(--light);
        }

        .document-upload:hover {
            border-color: var(--primary);
            background: rgba(67, 97, 238, 0.05);
        }

        .upload-icon {
            font-size: 48px;
            color: var(--primary);
            margin-bottom: 15px;
        }

        .upload-label {
            font-weight: 600;
            margin-bottom: 10px;
            display: block;
        }

        .file-list {
            margin-top: 20px;
        }

        .file-item {
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 8px;
            background: white;
            margin-bottom: 10px;
            border: 1px solid var(--light-gray);
        }

        .file-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: rgba(67, 97, 238, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--primary);
        }

        .file-info {
            flex: 1;
        }

        .file-name {
            font-weight: 500;
            margin-bottom: 5px;
        }

        .file-size {
            font-size: 12px;
            color: var(--gray);
        }

        .file-actions {
            margin-left: 15px;
        }

        .family-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .family-card {
            border: 1px solid var(--light-gray);
            border-radius: 10px;
            padding: 20px;
            background: white;
        }

        .family-card h5 {
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--light-gray);
        }

        @media (max-width: 768px) {
            .form-header {
                padding: 20px;
            }

            .form-body {
                padding: 20px;
            }

            .step-label {
                font-size: 12px;
            }

            .family-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="form-container">
        <!-- Form Header -->
        <div class="form-header">
            <h1>
                <img src="{{ asset('biratnagar_logo.png')}}" alt="Logo" height="50">
                Schoolarship Form
            </h1>
            <p>Biratnagar Metropolitian city</p>
        </div>

        <!-- Progress Bar -->
        <div class="form-progress">
            <div class="progress-steps">
                <div class="progress-bar" id="progressBar" style="width: 20%;"></div>
                <div class="step active" id="step1">
                    <div class="step-icon">1</div>
                    <div class="step-label">Personal</div>
                </div>
                <div class="step" id="step2">
                    <div class="step-icon">2</div>
                    <div class="step-label">Address</div>
                </div>
                <div class="step" id="step3">
                    <div class="step-icon">3</div>
                    <div class="step-label">Family</div>
                </div>
                <div class="step" id="step4">
                    <div class="step-icon">4</div>
                    <div class="step-label">Academic</div>
                </div>
                <div class="step" id="step5">
                    <div class="step-icon">5</div>
                    <div class="step-label">Documents</div>
                </div>
            </div>
        </div>

        <!-- Form Body -->
        <form action="{{ route('applicants.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
                <div class="form-section active" id="personalSection" style="padding:10px;">
                    <h3 class="section-title" style="color:#004aad;font-weight:600;">
                        <i class="bi bi-person me-2"></i>१. विद्यार्थीको व्यक्तिगत विवरण
                    </h3>

                    <!-- Full Name Nepali -->
                    <div class="row" style="margin-top:10px;">
                        <div class="col-md-12 mb-3">
                            <label class="form-label" style="font-weight:500;">१. विद्यार्थीको पूरा नाम, थर
                                (देवनागरीमा):</label>
                            <input type="text" name="full_name_nepali" class="form-control" style="padding:6px;"
                                placeholder="विद्यार्थीको पूरा नाम" required>
                        </div>
                    </div>

                    <!-- Full Name English -->
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label" style="font-weight:500;">२. NAME IN ENGLISH (IN BLOCK
                                LETTER):</label>
                            <input type="text" name="full_name_english" class="form-control" style="padding:6px;"
                                placeholder="FULL NAME IN ENGLISH" required>
                        </div>
                    </div>

                    <!-- School Name -->
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label" style="font-weight:500;">३. अध्ययन गर्न चाहेको विद्यालयको
                                नाम:</label>
                            <input type="text" name="school_name" class="form-control" style="padding:6px;"
                                placeholder="विद्यालयको नाम" required>
                        </div>
                    </div>

                    <!-- Scholarship Group -->
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label" style="font-weight:500;">४. छात्रवृत्तिको लागि आवेदन दिन चाहेको
                                समूह:</label>
                            <div style="display:flex;flex-wrap:wrap;gap:10px; padding-top:4px;">
                                @php
                                $groups = ['madhesi', 'vepata', 'jehendar', 'bipanna', 'janjati', 'apanga', 'shahid',
                                'dalit'];
                                $group_labels = [
                                'मधेसी आन्दोलनका घाइतेका सन्तति', 'वेपत्ता परिवारका सन्तति', 'जेहेदार', 'विपन्नता',
                                'जनजाति', 'अपाङ्गता', 'जन आन्दोलनमा घाइते/शहिद परिवारका सन्तति', 'दलित'
                                ];
                                @endphp
                                @foreach($groups as $index => $group)
                                <div class="form-check" style="margin-right:10px;">
                                    <input class="form-check-input" type="radio" name="scholarship_group"
                                        value="{{ $group }}" id="{{ $group }}">
                                    <label class="form-check-label" for="{{ $group }}">{{ $group_labels[$index]
                                        }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Birth Dates -->
                    <div class="row" style="margin-top:10px;">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="font-weight:500;">५. जन्म मिति (वि.सं.):</label>
                            <input type="date" name="dob_bs" class="form-control" placeholder="YYYY/MM/DD (BS)"
                                style="padding:6px;">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" style="font-weight:500;">ई. सं.:</label>
                            <input type="date" name="dob_ad" class="form-control" placeholder="YYYY/MM/DD (AD)"
                                style="padding:6px;">
                        </div>
                    </div>

                    <!-- Gender -->
                    <div class="row" style="margin-top:10px;">
                        <div class="col-md-12 mb-3">
                            <label class="form-label" style="font-weight:500;">६. लिङ्ग:</label>
                            <div style="display:flex;gap:20px;padding-top:4px;">
                                @php
                                $genders = ['male' => 'पुरुष', 'female' => 'महिला', 'other' => 'अन्य'];
                                @endphp
                                @foreach($genders as $key => $label)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="{{ $key }}"
                                        id="{{ $key }}">
                                    <label class="form-check-label" for="{{ $key }}">{{ $label }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <!-- Address Details -->
            <div class="form-section" id="addressSection" style="margin-top: 20px;padding:10px;">
                <h5 class="section-title" style="color: #0056d2; font-weight: bold;">६. ठेगाना:</h5>

                <!-- स्थायी ठेगाना -->
                <div class="card mb-4" style="border: 1px solid #e0e0e0;">
                    <div class="card-header"
                        style="background-color: #f8f9fa; font-weight: bold; color: #0056d2; border-bottom: 1px dotted #007bff;">
                        क) स्थायी:
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">क। प्रदेश:</label>
                            <div class="col-md-9">
                                <input type="text" name="permanent_province" class="form-control"
                                    placeholder="प्रदेश नाम लेख्नुहोस्">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">ख। जिल्ला:</label>
                            <div class="col-md-9">
                                <input type="text" name="permanent_district" class="form-control"
                                    placeholder="जिल्ला लेख्नुहोस्">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">ग। स्थानीय तह:</label>
                            <div class="col-md-9">
                                <input type="text" name="permanent_municipality" class="form-control"
                                    placeholder="नगरपालिका/गाउँपालिका">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">घ। टोल:</label>
                            <div class="col-md-9">
                                <input type="text" name="permanent_ward" class="form-control" placeholder="टोल/स्थान">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- अस्थायी ठेगाना -->
                <div class="card mb-4" style="border: 1px solid #e0e0e0;">
                    <div class="card-header"
                        style="background-color: #f8f9fa; font-weight: bold; color: #0056d2; border-bottom: 1px dotted #007bff;">
                        ख) अस्थायी :
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">क। प्रदेश:</label>
                            <div class="col-md-9">
                                <input type="text" name="temporary_province" class="form-control"
                                    placeholder="प्रदेश नाम लेख्नुहोस्">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">ख। जिल्ला:</label>
                            <div class="col-md-9">
                                <input type="text" name="temporary_district" class="form-control"
                                    placeholder="जिल्ला लेख्नुहोस्">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">ग। स्थानीय तह:</label>
                            <div class="col-md-9">
                                <input type="text" name="temporary_municipality" class="form-control"
                                    placeholder="नगरपालिका/गाउँपालिका">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">घ। टोल:</label>
                            <div class="col-md-9">
                                <input type="text" name="temporary_ward" class="form-control" placeholder="टोल/स्थान">
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Family Details -->
            <div class="form-section" id="familySection" style="padding:10px;">
                <h3 class="section-title" style="color:#004aad;font-weight:600;">पारिवारिक विवरण</h3>

                <div class="family-grid" style="margin-top:10px;">
                    <!-- Father -->
                    <div class="family-card" style="padding:10px; border:1px solid #ddd; border-radius:8px;">
                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">८. बुबाको नाम, थर:</label>
                            <input type="text" name="father_name" class="form-control" placeholder="बुबाको पूरा नाम">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">पेशा:</label>
                            <input type="text" name="father_occupation" class="form-control" placeholder="पेशा">
                        </div>
                    </div>

                    <!-- Mother -->
                    <div class="family-card" style="padding:10px; border:1px solid #ddd; border-radius:8px;">
                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">९. आमाको नाम, थर:</label>
                            <input type="text" name="mother_name" class="form-control" placeholder="आमाको पूरा नाम">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">पेशा:</label>
                            <input type="text" name="mother_occupation" class="form-control" placeholder="पेशा">
                        </div>
                    </div>

                    <!-- Grandfather (Paternal) -->
                    <div class="family-card" style="padding:10px; border:1px solid #ddd; border-radius:8px;">
                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">१०. बाजेको नाम, थर:</label>
                            <input type="text" name="grandfather_name" class="form-control"
                                placeholder="बाजेको पूरा नाम">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-weight:500;">पेशा:</label>
                            <input type="text" name="grandfather_occupation" class="form-control" placeholder="पेशा">
                        </div>
                    </div>
                </div>

                <hr style="margin:20px 0; border-top:1px solid #ccc;">

                <div style="margin-bottom:10px;">
                    <label class="form-label" style="font-weight:500;">११. पारिवारिक आयस्रोतको स्रोत:</label>
                    <input type="text" name="family_income_source" class="form-control"
                        placeholder="पारिवारिक आय स्रोत">
                </div>

                <div style="margin-bottom:10px;">
                    <label class="form-label" style="font-weight:500;">१२. आयस्रोतको अनुमानित विवरण रकममा :</label>
                    <input type="text" name="family_income_amount" class="form-control" placeholder="रकम (रु)">
                </div>

                <div style="margin-bottom:10px;">
                    <label class="form-label" style="font-weight:500;">१३. विद्यार्थीको सम्पर्क नम्बर:</label>
                    <input type="tel" name="student_contact_number" class="form-control" placeholder="eg. 98xxxxxxxx">
                </div>
            </div>



            <!-- Academic Qualification -->
            {{-- <div class="form-section" id="academicSection">
                <h3 class="section-title"><i class="bi bi-journal me-2"></i>Academic Qualification</h3>

                <div class="mb-4">
                    <h5>Secondary Education</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">School Name</label>
                            <input type="text" class="form-control" placeholder="Enter school name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Board/University</label>
                            <input type="text" class="form-control" placeholder="Enter board/university">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Year of Completion</label>
                            <input type="number" class="form-control" placeholder="Year">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Percentage/GPA</label>
                            <input type="text" class="form-control" placeholder="Enter percentage or GPA">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Major Subjects</label>
                            <input type="text" class="form-control" placeholder="Enter major subjects">
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h5>Higher Secondary Education</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">School/College Name</label>
                            <input type="text" class="form-control" placeholder="Enter institution name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Board/University</label>
                            <input type="text" class="form-control" placeholder="Enter board/university">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Year of Completion</label>
                            <input type="number" class="form-control" placeholder="Year">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Percentage/GPA</label>
                            <input type="text" class="form-control" placeholder="Enter percentage or GPA">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Stream</label>
                            <select class="form-select">
                                <option selected>Select stream</option>
                                <option>Science</option>
                                <option>Commerce</option>
                                <option>Arts</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h5>Graduation</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">College/University Name</label>
                            <input type="text" class="form-control" placeholder="Enter institution name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Degree</label>
                            <input type="text" class="form-control" placeholder="Enter degree name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Year of Completion</label>
                            <input type="number" class="form-control" placeholder="Year">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Percentage/GPA</label>
                            <input type="text" class="form-control" placeholder="Enter percentage or GPA">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Major</label>
                            <input type="text" class="form-control" placeholder="Enter major specialization">
                        </div>
                    </div>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="addPostgrad">
                    <label class="form-check-label" for="addPostgrad">
                        Add Post-Graduation Details
                    </label>
                </div>

                <div id="postgradSection" style="display: none;">
                    <h5>Post-Graduation</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">College/University Name</label>
                            <input type="text" class="form-control" placeholder="Enter institution name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Degree</label>
                            <input type="text" class="form-control" placeholder="Enter degree name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Year of Completion</label>
                            <input type="number" class="form-control" placeholder="Year">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Percentage/GPA</label>
                            <input type="text" class="form-control" placeholder="Enter percentage or GPA">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Specialization</label>
                            <input type="text" class="form-control" placeholder="Enter specialization">
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="form-section" style="margin-top: 30px;padding:10px;">
                <h5 class="section-title mb-3" style="color: #0056b3; font-weight: bold;">SEE शैक्षिक विवरण</h5>
                <hr style="margin-top: -10px; margin-bottom: 20px;">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">१४. SEE उत्तीर्ण गरेको विद्यालयको प्रकार (सार्वजनिक/संस्थागत):</label>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="see_school_type" class="form-control" placeholder="">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">१५. कक्षा ११ मा अध्ययन गर्न चाहेको विषय समूह:</label>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="desired_stream" class="form-control" placeholder="">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">१६. SEE को सिट नंबर:</label>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="see_symbol_number" class="form-control" placeholder="">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">१७. SEE मा प्राप्त गरेको जी.पी.ए.:</label>
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" name="see_gpa" class="form-control" placeholder="">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">१८. SEE उत्तीर्ण गरेको विद्यालयको नाम ठेगाना:</label>
                    </div>
                    <div class="col-md-6 mb-3">
                        <textarea name="see_school_address" class="form-control" rows="3" placeholder=""></textarea>
                    </div>
                </div>
            </div>



            <!-- Documents Upload -->
            <div class="form-section" id="documentsSection" style="margin-top: 30px;padding:10px;">
                <h5 class="section-title mb-3" style="color: #0056d2; font-weight: bold;">
                    संलग्न गर्नु पर्ने कागजातहरू: <span style="font-weight: normal;">(Upload all required
                        documents)</span>
                </h5>
                <hr style="margin-top: -10px; margin-bottom: 20px;">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">SEE को ग्रेडसिटको प्रतिलिपि:</label>
                        <input type="file" name="see_gradesheet" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">सामुदायिक विद्यालय कागजात:</label>
                        <input type="file" name="community_school_document" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">नागरिकता/जन्म प्रमाणपत्र:</label>
                        <input type="file" name="citizenship_birth_certificate" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">अपांगता परिचयपत्र:</label>
                        <input type="file" name="disability_id_card" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">दलित/जनजाती सिफारिस:</label>
                        <input type="file" name="dalit_janjati_recommendation" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">विपन्न सिफारिस:</label>
                        <input type="file" name="bipanna_recommendation" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">शारीरिक कमजोरहरूको लागि प्रमाणपत्र:</label>
                        <input type="file" name="physical_disability_certificate" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">आन्दोलनका छात्र/शहीद/घाइते प्रमाणपत्र:</label>
                        <input type="file" name="movement_related_certificate" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label">पासपोर्ट साइज फोटो:</label>
                        <input type="file" name="passport_size_photo" class="form-control">
                    </div>
                </div>

                <div class="text-left" style="color: red; font-weight: bold;">
                    कृपया माथि उल्लेखित सबै कागजातहरू संलग्न गरी पेश गर्नुहोस्।
                </div>
            </div>




            <!-- Form Footer -->
            <div class="form-footer">
                <button type="button" class="btn btn-prev" id="prevBtn" disabled>
                    <i class="bi bi-arrow-left me-1"></i>Previous
                </button>
                <button type="button" class="btn btn-nav" id="nextBtn">
                    Next<i class="bi bi-arrow-right ms-1"></i>
                </button>
                <button type="submit" class="btn btn-nav" id="submitBtn" style="display: none;">
                    <i class="bi bi-check-circle me-1"></i>Submit
                </button>
            </div>
        </form>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Script -->
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Form navigation
            const sections = document.querySelectorAll('.form-section');
            const steps = document.querySelectorAll('.step');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const submitBtn = document.getElementById('submitBtn');
            const progressBar = document.getElementById('progressBar');
            
            let currentSection = 0;
            const totalSections = sections.length;
            
            // Update UI based on current section
            function updateUI() {
                // Hide all sections
                sections.forEach(section => section.classList.remove('active'));
                
                // Show current section
                sections[currentSection].classList.add('active');
                
                // Update steps
                steps.forEach((step, index) => {
                    step.classList.remove('active', 'completed');
                    if (index < currentSection) {
                        step.classList.add('completed');
                    } else if (index === currentSection) {
                        step.classList.add('active');
                    }
                });
                
                // Update buttons
                prevBtn.disabled = currentSection === 0;
                nextBtn.style.display = currentSection === totalSections - 1 ? 'none' : 'block';
                submitBtn.style.display = currentSection === totalSections - 1 ? 'block' : 'none';
                
                // Update progress bar
                const progress = ((currentSection + 1) / totalSections) * 100;
                progressBar.style.width = `${progress}%`;
            }
            
            // Next button click
            nextBtn.addEventListener('click', function() {
                if (currentSection < totalSections - 1) {
                    currentSection++;
                    updateUI();
                }
            });
            
            // Previous button click
            prevBtn.addEventListener('click', function() {
                if (currentSection > 0) {
                    currentSection--;
                    updateUI();
                }
            });
            
            // Submit button click
            // submitBtn.addEventListener('click', function() {
            //     alert('CV details submitted successfully!');
            //     // In a real app, this would submit the form data
            // });
            
            // Toggle permanent address
            const sameAddressCheckbox = document.getElementById('sameAddress');
            const permanentAddressDiv = document.getElementById('permanentAddress');
            
            sameAddressCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    permanentAddressDiv.style.display = 'none';
                } else {
                    permanentAddressDiv.style.display = 'block';
                }
            });
            
            // Toggle maternal grandparents
            const addMaternalCheckbox = document.getElementById('addMaternal');
            const maternalGrandparentsDiv = document.getElementById('maternalGrandparents');
            
            addMaternalCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    maternalGrandparentsDiv.style.display = 'block';
                } else {
                    maternalGrandparentsDiv.style.display = 'none';
                }
            });
            
            // Toggle post-graduation section
            const addPostgradCheckbox = document.getElementById('addPostgrad');
            const postgradSectionDiv = document.getElementById('postgradSection');
            
            addPostgradCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    postgradSectionDiv.style.display = 'block';
                } else {
                    postgradSectionDiv.style.display = 'none';
                }
            });
            
            // Initialize UI
            updateUI();
        });
    </script> --}}
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Form navigation
        const sections = document.querySelectorAll('.form-section');
        const steps = document.querySelectorAll('.step');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');
        const progressBar = document.getElementById('progressBar');
        const form = document.querySelector('form'); // Your form element

        let currentSection = 0;
        const totalSections = sections.length;

        // Update UI based on current section
        function updateUI() {
            sections.forEach(section => section.classList.remove('active'));
            sections[currentSection].classList.add('active');

            steps.forEach((step, index) => {
                step.classList.remove('active', 'completed');
                if (index < currentSection) {
                    step.classList.add('completed');
                } else if (index === currentSection) {
                    step.classList.add('active');
                }
            });

            prevBtn.disabled = currentSection === 0;
            nextBtn.style.display = currentSection === totalSections - 1 ? 'none' : 'inline-block';
            submitBtn.style.display = currentSection === totalSections - 1 ? 'inline-block' : 'none';

            const progress = ((currentSection + 1) / totalSections) * 100;
            progressBar.style.width = `${progress}%`;
        }

        // Validate required inputs before moving to next section
        nextBtn.addEventListener('click', function() {
            const currentInputs = sections[currentSection].querySelectorAll('input, select, textarea');
            let allValid = true;

            currentInputs.forEach(input => {
                if (!input.checkValidity()) {
                    allValid = false;
                    input.reportValidity();
                }
            });

            if (allValid && currentSection < totalSections - 1) {
                currentSection++;
                updateUI();
            }
        });

        // Previous button click
        prevBtn.addEventListener('click', function() {
            if (currentSection > 0) {
                currentSection--;
                updateUI();
            }
        });

        // Submit button click - Redirect to the form action (Laravel route)
        submitBtn.addEventListener('click', function(e) {
            // Validate current section inputs before submission
            const currentInputs = sections[currentSection].querySelectorAll('input, select, textarea');
            let allValid = true;

            currentInputs.forEach(input => {
                if (!input.checkValidity()) {
                    allValid = false;
                    input.reportValidity();
                }
            });

            if (allValid) {
                form.submit(); // Submit the whole form to the defined action="{{ route('applicants.store') }}"
            } else {
                e.preventDefault(); // stop if not valid
            }
        });

        // Toggle permanent address
        const sameAddressCheckbox = document.getElementById('sameAddress');
        const permanentAddressDiv = document.getElementById('permanentAddress');
        if (sameAddressCheckbox && permanentAddressDiv) {
            sameAddressCheckbox.addEventListener('change', function() {
                permanentAddressDiv.style.display = this.checked ? 'none' : 'block';
            });
        }

        // Toggle maternal grandparents
        const addMaternalCheckbox = document.getElementById('addMaternal');
        const maternalGrandparentsDiv = document.getElementById('maternalGrandparents');
        if (addMaternalCheckbox && maternalGrandparentsDiv) {
            addMaternalCheckbox.addEventListener('change', function() {
                maternalGrandparentsDiv.style.display = this.checked ? 'block' : 'none';
            });
        }

        // Toggle post-graduation section
        const addPostgradCheckbox = document.getElementById('addPostgrad');
        const postgradSectionDiv = document.getElementById('postgradSection');
        if (addPostgradCheckbox && postgradSectionDiv) {
            addPostgradCheckbox.addEventListener('change', function() {
                postgradSectionDiv.style.display = this.checked ? 'block' : 'none';
            });
        }

        // Initialize UI
        updateUI();
    });
</script>

</body>

</html>