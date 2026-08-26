<?php
// $pageTitle = '';
// $metaDescription = '';
// $metaKeywords = '';
include 'header.php';
?>

<section class="container-fluid py-5">
    <div class="container px-lg-5">
        <!-- <div class="text-center mb-5"> 
            <!-- <div class="text-center mb-5">

                <div class="section-title position-relative mb-4 pb-2">

                    <h6 class="position-relative text-primary ps-4">
                        Contact Us
                    </h6>

                    <h2 class="mt-2">
                        Let's talk about your digital growth
                    </h2>

                </div>

                <p class="mx-auto mb-0"
                   style="max-width: 650px;">

                    Have a project, question or growth challenge?
                    Tell us what you're looking to achieve and our
                    team will help you find the right digital solution.

                </p>

            </div> -->

        <!-- =================================================
                 CONTACT CONTENT
            ================================================== -->

        <div class="row g-5">
            <!-- CONTACT INFORMATION -->

            <div class="col-lg-5">
                <div class="section-title position-relative mb-4 pb-2">
                    <h6 class="position-relative text-primary ps-4">
                        Get In Touch
                    </h6>

                    <h2 class="mt-2">We'd love to hear from you</h2>
                </div>

                <p class="mb-4">
                    Whether you need SEO, digital marketing, Google Ads, Meta Ads,
                    website design or website development, we're here to help.
                </p>

                <!-- Address -->

                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <i class="fa fa-map-marker-alt"></i>
                    </div>

                    <div>
                        <h5>Our Office</h5>

                        <p>
                            Chandimata Colony, 1st Lane,<br />
                            Sabara Sahi, Behind Hanuman Store,<br />
                            Netaji Nagar,<br />
                            Plot No. 855/1293,<br />
                            Bhubaneswar, Odisha, India
                        </p>
                    </div>
                </div>

                <!-- Phone -->

                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <i class="fa fa-phone-alt"></i>
                    </div>

                    <div>
                        <h5>Call Us</h5>

                        <p>+91 7978311751</p>
                    </div>
                </div>

                <!-- Email -->

                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <i class="fa fa-envelope"></i>
                    </div>

                    <div>
                        <h5>Email Us</h5>

                        <p>info@softwebtechs.com</p>
                    </div>
                </div>

                <!-- Working Hours -->

                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <i class="fa fa-clock"></i>
                    </div>

                    <div>
                        <h5>Working Hours</h5>

                        <p>
                            Monday – Saturday<br />
                            10:00 AM – 7:00 PM
                        </p>
                    </div>
                </div>

                <!-- Social -->

                <div class="contact-social mt-4">
                    <a href="#" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a href="#" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a href="#" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>

                    <a href="#" aria-label="Twitter">
                        <i class="fab fa-x-twitter"></i>
                    </a>
                </div>
            </div>

            <!-- CONTACT FORM -->

            <div class="col-lg-7">
                <div class="contact-form-wrapper">
                    <div class="section-title position-relative mb-4 pb-2">
                        <h6 class="position-relative text-primary ps-4">
                            Send A Message
                        </h6>

                        <h2 class="mt-2">Tell us about your project</h2>
                    </div>

                    <form action="<?= $base_url ?>/send-email.php" method="POST" class="contact-form" enctype="multipart/form-data">
                        <div class="row g-4">
                            <!-- Name -->

                            <div class="col-md-6">
                                <label for="contactName" class="form-label">
                                    Your Name
                                </label>

                                <input type="text" id="contactName" name="user_name" class="form-control"
                                    placeholder="Enter your name" required />
                            </div>

                            <!-- Email -->

                            <div class="col-md-6">
                                <label for="contactEmail" class="form-label">
                                    Email Address
                                </label>

                                <input type="email" id="contactEmail" name="user_email" class="form-control"
                                    placeholder="Enter your email" required />
                            </div>

                            <!-- Phone -->

                            <div class="col-md-6">
                                <label for="contactPhone" class="form-label">
                                    Phone Number
                                </label>

                                <input type="tel" id="contactPhone" name="user_phone" class="form-control"
                                    placeholder="Enter your phone number" />
                            </div>

                            <!-- Service -->

                            <div class="col-md-6">
                                <label for="contactService" class="form-label">
                                    Interested In
                                </label>

                                <select id="contactService" name="service" class="form-select" required>
                                    <option value="">Select a service</option>

                                    <option value="digital-marketing">
                                        Digital Marketing
                                    </option>

                                    <option value="seo">SEO</option>

                                    <option value="google-ads">Google Ads</option>

                                    <option value="meta-ads">Meta Ads</option>

                                    <option value="website-design">Website Design</option>

                                    <option value="website-development">
                                        Website Development
                                    </option>
                                </select>
                            </div>

                            <!-- Budget -->

                            <div class="col-md-6">
                                <label for="contactBudget" class="form-label">
                                    Estimated Budget
                                </label>

                                <select id="contactBudget" name="budget" class="form-select">
                                    <option value="">Select your budget</option>

                                    <option value="under-10k">Under ₹10,000</option>

                                    <option value="10k-25k">₹10,000 – ₹25,000</option>

                                    <option value="25k-50k">₹25,000 – ₹50,000</option>

                                    <option value="50k-1l">₹50,000 – ₹1,00,000</option>

                                    <option value="1l-plus">₹1,00,000+</option>
                                </select>
                            </div>

                            <!-- Subject -->

                            <div class="col-md-6">
                                <label for="contactSubject" class="form-label">
                                    Subject
                                </label>

                                <input type="text" id="contactSubject" name="subject" class="form-control"
                                    placeholder="How can we help?" />
                            </div>

                            <!-- Message -->

                            <div class="col-12">
                                <label for="contactMessage" class="form-label">
                                    Your Message
                                </label>

                                <textarea id="contactMessage" name="message" class="form-control" rows="6"
                                    placeholder="Tell us about your project, goals or requirements..."
                                    required></textarea>
                            </div>

                            <!-- Submit -->

                            <div class="col-12">
                                <div class="form-message" style="display: none"></div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-4 py-3 submit-btn">
                                    Send Message
                                    <i class="fa fa-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid py-5 bg-light">
    <div class="container px-lg-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="contact-quick-card text-center">
                    <div class="contact-quick-icon">
                        <i class="fa fa-phone-alt"></i>
                    </div>

                    <h5>Call Our Team</h5>

                    <p>Have an urgent question?</p>

                    <a href="tel:+917978311751"> +91 7978311751 </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="contact-quick-card text-center">
                    <div class="contact-quick-icon">
                        <i class="fa fa-envelope"></i>
                    </div>

                    <h5>Email Us</h5>

                    <p>Send us your requirements.</p>

                    <a href="mailto:support@softwebtechs.com">
                        support@softwebtechs.com
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="contact-quick-card text-center">
                    <div class="contact-quick-icon">
                        <i class="fab fa-whatsapp"></i>
                    </div>

                    <h5>WhatsApp</h5>

                    <p>Chat with our team directly.</p>

                    <a href="https://api.whatsapp.com/send?phone=+917978311751&text=Hello" target="_blank"> Start
                        Conversation </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =====================================================
         MAP / LOCATION
    ====================================================== -->

<section class="container-fluid py-5">
    <div class="container px-lg-5">
        <div class="section-title position-relative mb-4 pb-2">
            <h6 class="position-relative text-primary ps-4">Find Us</h6>

            <h2 class="mt-2">Visit our office</h2>
        </div>

        <div class="contact-map">
            <!-- Replace with your Google Maps iframe -->
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3386.490967331761!2d85.85873422469524!3d20.29222171266909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a190a0fb9be3c4b%3A0x80a3d4bb8f350d7e!2sChandimata%20Colony%2C%20Rasulgarh%2C%20Bhubaneswar%2C%20Odisha%20751010!5e1!3m2!1sen!2sin!4v1786867472023!5m2!1sen!2sin"
                width="100%" height="300" style="border: 0" allowfullscreen="" loading="lazy"
                referrerpolicy="strict-origin-when-cross-origin"></iframe>
        </div>
    </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        const form = document.querySelector('.contact-form');
        const messageBox = document.querySelector('.form-message');
        const submitBtn = form.querySelector('.submit-btn');

        form.addEventListener('submit', async function(e) {

            e.preventDefault();

            // Clear previous message
            messageBox.style.display = 'none';
            messageBox.innerHTML = '';

            // Disable button
            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Sending...';

            const formData = new FormData(form);

            try {

                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData
                });

                const result = await response.json();

                if (result.status === 'success') {

                    messageBox.className = 'form-message alert alert-success';
                    messageBox.innerHTML = result.message;
                    messageBox.style.display = 'block';

                    // Clear form
                    form.reset();

                } else {

                    messageBox.className = 'form-message alert alert-danger';
                    messageBox.innerHTML = result.message || 'Something went wrong.';
                    messageBox.style.display = 'block';
                }

            } catch (error) {

                console.error(error);

                messageBox.className = 'form-message alert alert-danger';
                messageBox.innerHTML = 'Unable to submit the form. Please try again.';
                messageBox.style.display = 'block';

            } finally {

                // Enable button again
                submitBtn.disabled = false;

                submitBtn.innerHTML = `
                Send Message
                <i class="fa fa-arrow-right ms-2"></i>
            `;
            }

        });

    });
</script>

<?php include 'footer.php' ?>