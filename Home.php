<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <!-- Navbar -->
  <nav class="bg-white shadow-md px-4 py-2 md:px-8">
    <div class="container mx-auto flex items-center justify-between">
      
      <!-- Logo -->
      <div class="flex items-center">
        <img src="./images/v987-18a-removebg-preview.png" alt="Logo" class="h-8 w-8 mr-2">
        <p class="text-xl font-medium text-[#46C8BB]">OOP2 Hopsital</p>
      </div>

      <!-- Desktop Navigation Links -->
      <div class="hidden md:flex space-x-6">
        <a href="#" class="text-gray-500 hover:text-orange-500"></a>
        <a href="#" class="text-gray-500 hover:text-orange-500"></a>
        <a href="#" class="text-gray-500 hover:text-orange-500"></a>
        <a href="#" class="text-gray-500 hover:text-orange-500"></a>
        <a href="#" class="text-gray-500 hover:text-orange-500"></a>
        
        <!-- Dropdown for Features -->
        <div class="relative group">
          <button class="text-gray-500 hover:text-orange-500 flex items-center">
           
          </button>
        </div>

        <a href="#" class="text-gray-500 hover:text-orange-500"></a>
      </div>

      <!-- Action Buttons -->
      <div class="flex space-x-4 items-center">
        <a href="./login_signup.php" class="bg-blue-900 text-white px-4 py-2 rounded-md hover:bg-blue-800">Log In</a>
      </div>

      <!-- Mobile Menu Button -->
      <button id="mobile-menu-button" class="md:hidden text-gray-500 focus:outline-none">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </div>
    
    
  </nav>

  <!-- JavaScript for Mobile Menu Toggle -->
  <script>
    document.getElementById("mobile-menu-button").onclick = function() {
      const menu = document.getElementById("mobile-menu");
      menu.classList.toggle("hidden");
    };
  </script>


<!-- Main Section -->
<section class="container mx-auto px-4 py-12 md:py-24 flex flex-col md:flex-row items-center">
    <!-- Text Section -->
    <div class="md:w-1/2 space-y-4">
      <p class="text-orange-500 font-medium">5 Years Experience</p>
      <h1 class="text-4xl md:text-5xl font-bold text-black leading-tight">
        Digital Hospital Management at one place
      </h1>
      <p class="text-gray-500 text-lg">
        Next-Gen Hospital Solutions: Drive Innovation, Deliver Quality Healthcare
      </p>
      <a href="./login_signup.php" class="inline-block bg-orange-500 text-white px-6 py-3 rounded-md font-medium hover:bg-orange-400 transition">
        Log In
      </a>
    </div>

    <!-- Image Section -->
    <div class="md:w-1/2 mt-8 md:mt-0 flex justify-center">
      <img src="./images/medical-checkup.png" alt="Hospital Management Illustration" class="w-full h-auto max-w-md">
    </div>
  </section>

  <!-- Easy Solutions Section -->
  <section class="container mx-auto px-4 py-12 text-center">
    <p class="text-orange-500 font-medium">Easy Solutions</p>
    <h3 class="text-black text-3xl md:text-4xl font-bold pt-6">
      4 Easy Steps to Get the <br>World's Best Treatment
    </h3>
  </section>


  <div class="container mx-auto px-4 py-8">
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-2">
        
        <!-- Qualified Doctors Card -->
        <div class="p-6 border border-gray-200 rounded-lg shadow-lg text-center">
            <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 bg-green-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.042 12.042 0 0112 21.75a12.042 12.042 0 01-6.16-10.172L12 14z" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-800">Qualified Doctors</h3>
            <p class="mt-2 text-gray-600">Check expert Doctor profile as per your need and get consultation.</p>
        </div>
        
        <!-- Digital Consultation Card -->
        <div class="p-6 border border-gray-200 rounded-lg shadow-lg text-center">
            <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 bg-orange-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-orange-500" fill="none" viewBox="0 0 28 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h3m0 0h3m-3 0v3m0-3V9m13 3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-800">Digital Consultation</h3>
            <p class="mt-2 text-gray-600">Our utmost priority is to ensure safety and well being of our patients. To avoid adverse health conditions later, ...</p>
        </div>
        
        <!-- Get Your Consultant Card -->
        <div class="p-6 border border-gray-200 rounded-lg shadow-lg text-center">
            <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 bg-blue-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-800">Get Your Consultant</h3>
            <p class="mt-2 text-gray-600">Our internal medicine consultants provide personalized care and treat patients with a wide range of acute and chro...</p>
        </div>
        
        <!-- Get Your Treatment Card -->
        <div class="p-6 border border-gray-200 rounded-lg shadow-lg text-center">
            <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 bg-red-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-500" fill="none" viewBox="0 0 12 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m0 0V9m0 3v3m0-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-800">Get Your Treatment</h3>
            <p class="mt-2 text-gray-600">We offer expert care from the best doctors. The doctors may direct you to a specialist if needed, in order to hel...</p>
        </div>

    </div>
</div>



<div class="bg-gray-100 py-16">
    <div class="container mx-auto px-4 text-center">
        <!-- Section Title -->
        <p class="text-orange-500 font-semibold">Our Services</p>
        <h2 class="text-3xl font-bold text-gray-800 mt-2">
            We Offer Different Services <br> To Improve Your Health
        </h2>
        
        <!-- Services Grid -->
        <div class="grid gap-6 mt-10 md:grid-cols-2 lg:grid-cols-3">
            
            <!-- Cardiology Card -->
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg text-center">
                <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-orange-100 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l1.65 2.45M9 3l-1.65 2.45M15 3l1.65 2.45M21 3l-1.65 2.45M4.75 7.25h14.5M4.75 7.25l1.5 9m0 0L9 13.5M6.25 16l6-3.75M16.25 16L18 13.5M16.25 16l6-3.75" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800">Cardiology</h3>
                <p class="mt-2 text-gray-600">Cardiology is a medicine specialty that involves diagnosis and treatment of disorders of the heart and certain parts of the...</p>
            </div>
            
            <!-- Medicine Card -->
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg text-center">
                <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-orange-100 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v1h18V7M5 10h14v5a3 3 0 01-3 3H8a3 3 0 01-3-3v-5z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800">Medicine</h3>
                <p class="mt-2 text-gray-600">Medicine is the science and practice of caring for a patient, managing the diagnosis, prognosis, prevention, treatment...</p>
            </div>
            
            <!-- Additional Service Card (Example) -->
            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-lg text-center">
                <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-orange-100 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M4 7v6m0 0h8m-8 0v6m16-6v-6m0 6h-8m8 0v6" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800">Additional Service</h3>
                <p class="mt-2 text-gray-600">Description of the additional service provided by the clinic, such as diagnosis, treatment, prevention, etc...</p>
            </div>

        </div>
    </div>
</div>




<div class="bg-white py-16">
    <div class="container mx-auto px-4 flex flex-col lg:flex-row items-center space-y-10 lg:space-y-0 lg:space-x-10">
        
        <!-- Text Section -->
        <div class="lg:w-1/2 text-center lg:text-left">
            <p class="text-orange-500 font-semibold">Quality Healthcare</p>
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mt-2">
                Have Certified and High Quality Doctor For You
            </h2>
            <p class="mt-4 text-gray-600">
                Our medical clinic provides quality care for the entire family while maintaining a personable atmosphere and best services. Our medical clinic provides quality care for the entire family while maintaining a personable atmosphere and best services.
            </p>
        </div>
        
        <!-- Image Section with Badge -->
        <div class="relative lg:w-1/2 flex justify-center">
            <!-- Illustration -->
            <img src="./images/doctor.png" alt="Doctors Illustration" class="max-w-full h-auto">
            
            <!-- Certified Doctor Badge -->
            <div class="absolute bottom-0 left-0 transform translate-y-1/2 -translate-x-1/4 lg:translate-x-0 lg:-translate-y-1/2 lg:bottom-[0px] lg:left-auto lg:right-10 bg-blue-900 text-white p-4 rounded-lg shadow-lg w-64 text-left">
                <div class="flex items-center space-x-4">
                    <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center">
                        <!-- Badge Icon (Replace with an SVG or Font Icon if available) -->
                        <span class="text-white font-semibold text-xl">⭐</span>
                    </div>
                    <div>
                        <h4 class="font-semibold text-lg">Certified Doctor</h4>
                        <p class="text-sm mt-1">All expertise doctors as per Hospital and M...</p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>



<div class="bg-gray-50 flex justify-center items-center min-h-screen p-4">
    <!-- Container -->
    <div class="text-center max-w-4xl mx-auto">
      <!-- Header -->
      <h2 class="text-orange-600 font-semibold">Professional Doctors</h2>
      <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mt-1">We are Experienced Healthcare Professionals</h1>
  
      <!-- Profiles Section -->
      <div class="mt-8 grid grid-cols-1 sm:grid-cols-3 gap-6">
        <!-- Doctor 1 -->
        <div class="flex flex-col items-center bg-white shadow-md rounded-lg p-4">
         <img src="./images/smiling-doctor-with-strethoscope-isolated-grey-removebg-preview.png" alt="" class=" rounded-full bg-blue-500 flex items-center justify-center">
          <p class="mt-4 font-semibold text-gray-800">Ahsan Habib</p>
          <p class="mt-2 text-gray-600 items-center">MBBS</p>
        </div>
        
        <!-- Doctor 2 -->
        <div class="flex flex-col items-center bg-white shadow-md rounded-lg p-4">
            <img src="./images/woman-working-as-doctor-removebg-preview.png" alt="" class=" rounded-full bg-red-500 flex items-center justify-center">
          <p class="mt-4 font-semibold text-gray-800">Nusrat Jahan</p>
          <p class="mt-2 text-gray-600 items-center">MBBS</p>
        </div>
        
        <!-- Doctor 3 -->
        <div class="flex flex-col items-center bg-white shadow-md rounded-lg p-4">
            <img src="./images/healthcare-workers-medicine-covid-19-pandemic-self-quarantine-concept-cheerful-smiling-hispanic-male-nurse-doctor-er-wearing-scrubs-glasses-talking-patient-clinic-removebg-preview.png" alt="" class=" rounded-full bg-gray-500 flex items-center justify-center">

          <p class="mt-4 font-semibold text-gray-800">Tahmid Hasan</p>
          <p class="mt-2 text-gray-600 items-center">MBBS</p>
        </div>
      </div>
    </div>
</div>


<div class="bg-gray-50 flex justify-center items-center min-h-screen p-4">
    <!-- Container -->
    <div class="text-center max-w-4xl mx-auto">
      <!-- Header -->
      <h2 class="text-orange-600 font-semibold">Our Testimonials</h2>
      <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mt-1">What Our Patients Say About Our Medical Treatments</h1>
  
      <!-- Testimonial Card -->
      <div class="mt-8 flex flex-col md:flex-row items-center justify-center bg-white shadow-lg rounded-lg p-6 md:p-8">
        <!-- Image and Quote Icon -->
        <div class="relative mb-4 md:mb-0 md:mr-6">
          <img src="./images/464389353_1714997969333535_151542763742691463_n.jpg" alt="Patient" class="w-32 h-32 rounded-lg object-cover">
          <div class="absolute -top-3 -left-3 bg-orange-500 text-white w-8 h-8 rounded-full flex items-center justify-center text-2xl font-semibold">
            &ldquo;
          </div>
        </div>
        
        <!-- Testimonial Text -->
        <div class="text-left">
          <p class="font-semibold text-lg text-gray-800">Musfiq</p>
          <p class="text-gray-600 mt-2">
            The services are very good. I recommend another patient to come to this hospital. Everything in hospital is good.
          </p>
        </div>
      </div>
  
      <!-- Navigation Arrows -->
      <div class="flex justify-center mt-6 space-x-4">
        <button class="w-10 h-10 bg-orange-500 text-white rounded-full flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
        </button>
        <button class="w-10 h-10 bg-orange-500 text-white rounded-full flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </button>
      </div>
    </div>
</div>


<!-- Footer Section -->
<footer class="bg-blue-900 text-white py-10 px-6">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Company Info -->
      <div class="flex items-start">
        <img src="./images/v987-18a-removebg-preview.png" alt="Logo" class="mr-4 h-20 w-20">
        <p class="text-sm">
          Over past 10+ years of experience and skills in various technologies, we built great scalable products.
        </p>
      </div>
      
      <!-- Useful Links -->
      <div>
        <h3 class="text-orange-500 font-semibold mb-4">Useful Link</h3>
        <ul class="space-y-2">
          <li><a href="#" class="text-white hover:text-orange-500">Home</a></li>
          <li><a href="#" class="text-white hover:text-orange-500">Services</a></li>
          <li><a href="#" class="text-white hover:text-orange-500">Doctors</a></li>
          <li><a href="#" class="text-white hover:text-orange-500">About</a></li>
          <li><a href="#" class="text-white hover:text-orange-500">Contact</a></li>
        </ul>
      </div>
      
      <!-- Contact Information -->
      <div>
        <h3 class="text-lg font-semibold">Contact Information</h3>
        <ul class="mt-2 space-y-2 text-sm">
          <li>📞 +917096336561</li>
          <li>⏰ 08:00 AM to 21:00 PM</li>
          <li>📍 C/303, Atlanta Shopping Mall, Surat, Gujarat 394101</li>
        </ul>
      </div>
      
    </div>

    <!-- Bottom Section -->
    <div class="mt-8 border-t border-blue-800 pt-2 flex justify-center items-center">
        <p class="text-sm pl-10 pt">© Copyright by <a href="" class="font-bold">OOP2 Hospital</a>
    </div>
  </footer>

  
</body>
</html>