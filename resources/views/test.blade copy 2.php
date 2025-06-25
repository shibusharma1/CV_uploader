<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Scholarship Application Form</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="p-4">

  <div class="container">
    <div class="text-center mb-4">
      {{-- <img src="biratnagar_logo.png" alt="Logo" height="50" /> --}}
      <h1>Scholarship Form</h1>
      <p>Biratnagar Metropolitan City</p>
    </div>
    @if(session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('applicants.store')}}" method="POST" enctype="multipart/form-data">
      @csrf


      <!-- Personal Information -->
      <h3 class="text-primary mt-4">१. विद्यार्थीको व्यक्तिगत विवरण</h3>
      {{-- <input type="hidden" name="email" value="{{ $user->email }}">
      <input type="hidden" name="password" value="{{ $user->password }}">
      <input type="hidden" name="phone" value="{{ $user->phone }}"> --}}

      <input class="form-control mb-3" name="name_ne" placeholder="विद्यार्थीको पूरा नाम (देवनागरीमा)" required>
      <input class="form-control mb-3 text-uppercase" style="text-transform: uppercase;" name="name_en"
        placeholder="FULL NAME IN ENGLISH" value="{{ $user->name_en }}" required readonly>
      <input class="form-control mb-3" name="school_name" placeholder="अध्ययन गर्न चाहेको विद्यालयको नाम" required>

      <!-- Scholarship Group -->
      <label class="form-label">४. छात्रवृत्तिको लागि आवेदन दिन चाहेको समूह:</label><br>
      <div class="mb-3">
        <input type="radio" name="scholarship_group" value="madhesi"> मधेसी आन्दोलनका घाइतेका सन्तति
        <input type="radio" name="scholarship_group" value="vepata"> वेपत्ता परिवारका सन्तति
        <input type="radio" name="scholarship_group" value="jehendar"> जेहेदार
        <input type="radio" name="scholarship_group" value="bipanna"> विपन्नता
        <input type="radio" name="scholarship_group" value="janjati"> जनजाति
        <input type="radio" name="scholarship_group" value="apanga"> अपाङ्गता
        <input type="radio" name="scholarship_group" value="shahid"> शहिद परिवारका सन्तति
        <input type="radio" name="scholarship_group" value="dalit"> दलित
      </div>

      <!-- DOB -->
      <label>५. जन्म मिति (वि.सं. / इ.सं.):</label>
      <div class="row mb-3">
        <div class="col"><input type="date" class="form-control" name="dob_bs"></div>
        <div class="col"><input type="date" class="form-control" name="dob_ad"></div>
      </div>

      <!-- Gender -->
      <label>६. लिङ्ग:</label>
      <div class="mb-3">
        <input type="radio" name="gender" value="0"> पुरुष
        <input type="radio" name="gender" value="1"> महिला
        <input type="radio" name="gender" value="2"> अन्य
      </div>

      <!-- Permanent Address -->
      <h4 class="text-primary mt-4">ठेगाना (स्थायी)</h4>
      <input class="form-control mb-2" name="permanent_province" placeholder="प्रदेश">
      <input class="form-control mb-2" name="permanent_district" placeholder="जिल्ला">
      <input class="form-control mb-2" name="permanent_municipality" placeholder="नगरपालिका/गाउँपालिका">
      <input class="form-control mb-2" name="permanent_ward" placeholder="टोल/स्थान">

      <!-- Temporary Address -->
      <h4 class="text-primary mt-4">ठेगाना (अस्थायी)</h4>
      <input class="form-control mb-2" name="temporary_province" placeholder="प्रदेश">
      <input class="form-control mb-2" name="temporary_district" placeholder="जिल्ला">
      <input class="form-control mb-2" name="temporary_municipality" placeholder="नगरपालिका/गाउँपालिका">
      <input class="form-control mb-2" name="temporary_ward" placeholder="टोल/स्थान">

      <!-- Family Info -->
      <h3 class="text-primary mt-4">पारिवारिक विवरण</h3>
      <input class="form-control mb-2" name="father_name" placeholder="बुबाको पूरा नाम">
      <input class="form-control mb-2" name="father_occupation" placeholder="पेशा">
      <input class="form-control mb-2" name="mother_name" placeholder="आमाको पूरा नाम">
      <input class="form-control mb-2" name="mother_occupation" placeholder="पेशा">
      <input class="form-control mb-2" name="grandfather_name" placeholder="बाजेको पूरा नाम">
      <input class="form-control mb-2" name="grandfather_occupation" placeholder="पेशा">
      <input class="form-control mb-2" name="family_income_source" placeholder="आय स्रोत">
      <input class="form-control mb-2" name="family_income_amount" placeholder="आय रकम">
      <input class="form-control mb-2" name="student_contact_number" placeholder="विद्यार्थी सम्पर्क नम्बर"
        value="{{ $user->phone }}" readonly>

      <!-- Academic Info -->
      <h3 class="text-primary mt-4">SEE शैक्षिक विवरण</h3>
      <input class="form-control mb-2" name="see_school_type" placeholder="SEE उत्तीर्ण गरेको विद्यालयको प्रकार">
      <input class="form-control mb-2" name="desired_stream" placeholder="अध्ययन गर्न चाहेको विषय समूह">
      <input class="form-control mb-2" name="see_symbol_number" placeholder="SEE को सिट नम्बर">
      <input class="form-control mb-2" name="see_gpa" placeholder="SEE प्राप्त गरेको GPA">
      <textarea class="form-control mb-2" name="see_school_address"
        placeholder="SEE उत्तीर्ण गरेको विद्यालयको ठेगाना"></textarea>

      <!-- Document Uploads -->
      <h3 class="text-primary mt-4">कागजातहरू</h3>
      <input class="form-control mb-2" type="file" name="see_gradesheet">
      <input class="form-control mb-2" type="file" name="community_school_document">
      <input class="form-control mb-2" type="file" name="citizenship_birth_certificate">
      <input class="form-control mb-2" type="file" name="disability_id_card">
      <input class="form-control mb-2" type="file" name="dalit_janjati_recommendation">
      <input class="form-control mb-2" type="file" name="bipanna_recommendation">
      <input class="form-control mb-2" type="file" name="physical_disability_certificate">
      <input class="form-control mb-2" type="file" name="movement_related_certificate">
      <input class="form-control mb-2" type="file" name="passport_size_photo">

      <!-- Submit -->
      <button class="btn btn-primary mt-3 w-100" type="submit">Submit</button>

    </form>
  </div>

</body>

</html>