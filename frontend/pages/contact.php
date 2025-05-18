<?php
$title = "About Us";
ob_start();
?>
<link rel="stylesheet" href="../css/contact.css">
    <div class="contact-section">
        <div class="contact-content">
            <div class="contact-text">
                <p class="contact-label">Contact Us</p>
                <h1>Get in touch</h1>
                <p class="contact-description">Need help choosing a Moodle product or can't find answers to your question in our FAQ centre? Our team is here to help!</p>
                <p class="contact-info">Simply fill out your details and the nature of your enquiry and one of our team or partners will get back to you.</p>
            </div>
            <div class="contact-form-container">
                <div class="contact-illustration">
                    <img src="../images/contact-intro.webp" alt="Contact Illustration">
                </div>
                <div class="contact-form">
                    <form id="contactForm">
                        <div class="form-group">
                            <label for="helpType">How can we help you today?*</label>
                            <select id="helpType" required>
                                <option value="">Please Select...</option>
                                <option value="get-started">I want to get started with Moodle</option>
                                <option value="support">I need support with an existing Moodle product</option>
                                <option value="other">I have a different enquiry</option>
                            </select>
                        </div>
                        <div id="differentEnquiryContent" class="form-group" style="display: none;">
                            <label for="enquiryType">What is the nature of your enquiry?*</label>
                            <select id="enquiryType" required>
                                <option value="">Please Select...</option>
                                <option value="trademarks">Questions related to trademarks</option>
                                <option value="privacy">Questions related to data privacy</option>
                                <option value="pr">PR & media enquiry</option>
                                <option value="security">Report a security issue or vulnerability</option>
                            </select>
                        </div>
                        <div id="securityInfo" class="form-group" style="display: none;">
                            <div class="form-notice">
                                <p>Please visit our page on <a href="#" class="contact-link">submitting a security report</a> where you will find the form as well as key information on how to submit a report.</p>
                            </div>
                        </div>
                        <div id="prInfo" class="form-group" style="display: none;">
                            <div class="form-row">
                                <div class="form-group half">
                                    <label for="firstName">First Name*</label>
                                    <input type="text" id="firstName" required>
                                </div>
                                <div class="form-group half">
                                    <label for="lastName">Last Name*</label>
                                    <input type="text" id="lastName" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group half">
                                    <label for="email">Email*</label>
                                    <input type="email" id="email" required>
                                </div>
                                <div class="form-group half">
                                    <label for="phone">Phone</label>
                                    <div class="phone-input">
                                        <select id="countryCode">
                                            <option value="+92">+92</option>
                                        </select>
                                        <input type="tel" id="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country">Country*</label>
                                <select id="country" required>
                                    <option value="">Please Select...</option>
                                    <option value="pakistan">Pakistan</option>
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group half">
                                    <label for="orgName">Organisation Name</label>
                                    <input type="text" id="orgName">
                                </div>
                                <div class="form-group half">
                                    <label for="orgType">Organisation Type*</label>
                                    <select id="orgType" required>
                                        <option value="">Please Select...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group half">
                                    <label for="industry">Industry*</label>
                                    <select id="industry" required>
                                        <option value="">Please Select...</option>
                                    </select>
                                </div>
                                <div class="form-group half">
                                    <label for="jobFunction">Job Function*</label>
                                    <select id="jobFunction" required>
                                        <option value="">Please Select...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message">Message*</label>
                                <textarea id="message" required></textarea>
                            </div>
                            <div class="form-group">
                                <p class="privacy-notice">By hitting 'SUBMIT' below you permit Moodle and its Certified Partners to contact you regarding Moodle software products and services in accordance with our <a href="#" class="contact-link">Privacy Policy</a>.</p>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="submit-btn">Send Message</button>
                            </div>
                        </div>
                        <div id="trademarksInfo" class="form-group" style="display: none;">
                            <div class="form-row">
                                <div class="form-group half">
                                    <label for="firstName">First Name*</label>
                                    <input type="text" id="firstName" required>
                                </div>
                                <div class="form-group half">
                                    <label for="lastName">Last Name*</label>
                                    <input type="text" id="lastName" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group half">
                                    <label for="email">Email*</label>
                                    <input type="email" id="email" required>
                                </div>
                                <div class="form-group half">
                                    <label for="phone">Phone</label>
                                    <div class="phone-input">
                                        <select id="countryCode">
                                            <option value="+92">+92</option>
                                        </select>
                                        <input type="tel" id="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country">Country*</label>
                                <select id="country" required>
                                    <option value="">Please Select...</option>
                                    <option value="pakistan">Pakistan</option>
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group half">
                                    <label for="orgName">Organisation Name</label>
                                    <input type="text" id="orgName">
                                </div>
                                <div class="form-group half">
                                    <label for="orgType">Organisation Type*</label>
                                    <select id="orgType" required>
                                        <option value="">Please Select...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group half">
                                    <label for="industry">Industry*</label>
                                    <select id="industry" required>
                                        <option value="">Please Select...</option>
                                    </select>
                                </div>
                                <div class="form-group half">
                                    <label for="jobFunction">Job Function*</label>
                                    <select id="jobFunction" required>
                                        <option value="">Please Select...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message">Message*</label>
                                <textarea id="message" required></textarea>
                            </div>
                            <div class="form-group">
                                <p class="privacy-notice">By hitting 'SUBMIT' below you permit Moodle and its Certified Partners to contact you regarding Moodle software products and services in accordance with our <a href="#" class="contact-link">Privacy Policy</a>.</p>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="submit-btn">Send Message</button>
                            </div>
                        </div>
                        <div id="privacyInfo" class="form-group" style="display: none;">
                            <div class="form-notice">
                                <p>Please request an export or deletion of personal data by filling out this form if you have a MoodleCloud site or you would like to ask for general information. Here are the <a href="#" class="contact-link">detailed steps</a> outlining how to delete or export your personal data from other sites hosted by us directly from your profile page.</p>
                            </div>
                            <div class="form-row">
                                <div class="form-group half">
                                    <label for="firstName">First Name*</label>
                                    <input type="text" id="firstName" required>
                                </div>
                                <div class="form-group half">
                                    <label for="lastName">Last Name*</label>
                                    <input type="text" id="lastName" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group half">
                                    <label for="email">Email*</label>
                                    <input type="email" id="email" required>
                                </div>
                                <div class="form-group half">
                                    <label for="phone">Phone</label>
                                    <div class="phone-input">
                                        <select id="countryCode">
                                            <option value="+92">+92</option>
                                        </select>
                                        <input type="tel" id="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country">Country*</label>
                                <select id="country" required>
                                    <option value="">Please Select...</option>
                                    <option value="pakistan">Pakistan</option>
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group half">
                                    <label for="orgName">Organisation Name</label>
                                    <input type="text" id="orgName">
                                </div>
                                <div class="form-group half">
                                    <label for="orgType">Organisation Type*</label>
                                    <select id="orgType" required>
                                        <option value="">Please Select...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group half">
                                    <label for="industry">Industry*</label>
                                    <select id="industry" required>
                                        <option value="">Please Select...</option>
                                    </select>
                                </div>
                                <div class="form-group half">
                                    <label for="jobFunction">Job Function*</label>
                                    <select id="jobFunction" required>
                                        <option value="">Please Select...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message">Message*</label>
                                <textarea id="message" required></textarea>
                            </div>
                            <div class="form-group">
                                <p class="privacy-notice">By hitting 'SUBMIT' below you permit Moodle and its Certified Partners to contact you regarding Moodle software products and services in accordance with our <a href="#" class="contact-link">Privacy Policy</a>.</p>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="submit-btn">Send Message</button>
                            </div>
                        </div>
                        <div id="getStartedContent" class="form-response" style="display: none;">
                            <p>If you're ready to get started with Moodle, please <a href="#" class="contact-link">get in contact with us here</a>.</p>
                        </div>
                        <div id="supportContent" class="form-group" style="display: none;">
                            <label for="productType">Which product/service do you need support with?*</label>
                            <select id="productType" required>
                                <option value="">Please Select...</option>
                                <option value="moodlecloud">MoodleCloud site</option>
                                <option value="moodle-lms">Moodle LMS</option>
                                <option value="moodle-workplace">Moodle Workplace</option>
                                <option value="meq">MEQ (Moodle Educator Qualification)</option>
                                <option value="moodle-app">Moodle App/Branded Moodle App</option>
                                <option value="moodlemoots">MoodleMoots</option>
                                <option value="community">Community Sites</option>
                                <option value="academy">Moodle Academy</option>
                                <option value="fund">Fund Moodle</option>
                            </select>
                            <div id="moodleWorkplaceInfo" class="form-group" style="display: none;">
                                <label for="userType">Are you a user, site administrator, Moodle Partner or reseller?*</label>
                                <select id="userType" required>
                                    <option value="">Please Select...</option>
                                    <option value="user">User or site administrator</option>
                                    <option value="partner">A Moodle Partner or reseller</option>
                                </select>
                            </div>
                            <div id="partnerInfo" class="form-group" style="display: none;">
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="firstName">First Name*</label>
                                        <input type="text" id="firstName" required>
                                    </div>
                                    <div class="form-group half">
                                        <label for="lastName">Last Name*</label>
                                        <input type="text" id="lastName" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="email">Email*</label>
                                        <input type="email" id="email" required>
                                    </div>
                                    <div class="form-group half">
                                        <label for="phone">Phone</label>
                                        <div class="phone-input">
                                            <select id="countryCode">
                                                <option value="+92">+92</option>
                                            </select>
                                            <input type="tel" id="phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="country">Country*</label>
                                    <select id="country" required>
                                        <option value="">Please Select...</option>
                                        <option value="pakistan">Pakistan</option>
                                    </select>
                                </div>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="orgName">Organisation Name</label>
                                        <input type="text" id="orgName">
                                    </div>
                                    <div class="form-group half">
                                        <label for="orgType">Organisation Type*</label>
                                        <select id="orgType" required>
                                            <option value="">Please Select...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="industry">Industry*</label>
                                        <select id="industry" required>
                                            <option value="">Please Select...</option>
                                        </select>
                                    </div>
                                    <div class="form-group half">
                                        <label for="jobFunction">Job Function*</label>
                                        <select id="jobFunction" required>
                                            <option value="">Please Select...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message*</label>
                                    <textarea id="message" required></textarea>
                                </div>
                                <div class="form-group">
                                    <p class="privacy-notice">By hitting 'SUBMIT' below you permit Moodle and its Certified Partners to contact you regarding Moodle software products and services in accordance with our <a href="#" class="contact-link">Privacy Policy</a>.</p>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="submit-btn">Send Message</button>
                                </div>
                            </div>
                            <div id="meqInfo" class="form-group" style="display: none;">
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="firstName">First Name*</label>
                                        <input type="text" id="firstName" required>
                                    </div>
                                    <div class="form-group half">
                                        <label for="lastName">Last Name*</label>
                                        <input type="text" id="lastName" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="email">Email*</label>
                                        <input type="email" id="email" required>
                                    </div>
                                    <div class="form-group half">
                                        <label for="phone">Phone</label>
                                        <div class="phone-input">
                                            <select id="countryCode">
                                                <option value="+92">+92</option>
                                            </select>
                                            <input type="tel" id="phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="country">Country*</label>
                                    <select id="country" required>
                                        <option value="">Please Select...</option>
                                        <option value="pakistan">Pakistan</option>
                                    </select>
                                </div>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="orgName">Organisation Name</label>
                                        <input type="text" id="orgName">
                                    </div>
                                    <div class="form-group half">
                                        <label for="orgType">Organisation Type*</label>
                                        <select id="orgType" required>
                                            <option value="">Please Select...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="industry">Industry*</label>
                                        <select id="industry" required>
                                            <option value="">Please Select...</option>
                                        </select>
                                    </div>
                                    <div class="form-group half">
                                        <label for="jobFunction">Job Function*</label>
                                        <select id="jobFunction" required>
                                            <option value="">Please Select...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message*</label>
                                    <textarea id="message" required></textarea>
                                </div>
                                <div class="form-group">
                                    <p class="privacy-notice">By hitting 'SUBMIT' below you permit Moodle and its Certified Partners to contact you regarding Moodle software products and services in accordance with our <a href="#" class="contact-link">Privacy Policy</a>.</p>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="submit-btn">Send Message</button>
                                </div>
                            </div>
                            <div id="moodleAppInfo" class="form-response" style="display: none;">
                                <p>Please create an account in our <a href="#" class="contact-link">Moodle Apps Portal</a> and log in to submit a support request.</p>
                            </div>
                            <div id="userAdminInfo" class="form-response" style="display: none;">
                                <p>Please contact your site administrator (the people who manage the Moodle at your school/university/company or learning organisation). If you don't know how to contact them, please contact your teachers/trainers.</p>
                                <p>Here is more information about our <a href="#" class="contact-link">Moodle Partners</a>.</p>
                                <p>Below is a list of resources you can use for help on any other Moodle topic:</p>
                                <ul>
                                    <li><a href="#" class="contact-link">Moodle Documentation</a> - Search for documentation on any Moodle topic, including site administration, managing courses, enrolment, activities and loads more.</li>
                                    <li><a href="#" class="contact-link">Moodle Community forums</a> - Here you will find links to many Moodle subject forums and loads of useful conversations about configuring Moodle. You can post questions here and one of the many Moodle experts in the community is likely to have an answer for you.</li>
                                </ul>
                                <p>Additional information to some of the most common questions can also be found on our <a href="#" class="contact-link">FAQ page</a>.</p>
                                <p>Happy Moodling!</p>
                            </div>
                            <div id="moodleCloudInfo" class="form-response" style="display: none;">
                                <p>If you have already signed up for a MoodleCloud site please <a href="#" class="contact-link">login</a> for faster support.</p>
                                <p>If you need assistance logging in to your MoodleCloud site, please <a href="https://moodlecloud.com" class="contact-link">fill out the contact form on moodlecloud.com</a>.</p>
                            </div>
                            <div id="moodleLmsInfo" class="form-response" style="display: none;">
                                <p>Please contact your site administrator (the people who manage the Moodle at your school/university/company or learning organisation). If you don't know how to contact them, please contact your teachers/trainers.</p>
                                <p>If you are a site administrator or need dedicated support then we recommend you speak to one of our Moodle Partners. They offer a range of services including hosting, support, training, consultancy, implementation, integrations, customisations, reporting, analytics and course content creation.</p>
                                <p>Here is more information about our <a href="#" class="contact-link">Moodle Partners</a>.</p>
                                <p>Below is a list of resources you can use for help on any other Moodle topic:</p>
                                <ul>
                                    <li><a href="#" class="contact-link">Moodle Documentation</a> - Search for documentation on any Moodle topic, including site administration, managing courses, enrolment, activities and loads more.</li>
                                    <li><a href="#" class="contact-link">Moodle Community forums</a> - Here you will find links to many Moodle subject forums and loads of useful conversations about configuring Moodle. You can post questions here and one of the many Moodle experts in the community is likely to have an answer for you.</li>
                                </ul>
                                <p>Additional information to some of the most common questions can also be found on our <a href="#" class="contact-link">FAQ page</a>.</p>
                                <p>Happy Moodling!</p>
                            </div>
                            <div id="moodleMootsInfo" class="form-group" style="display: none;">
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="firstName">First Name*</label>
                                        <input type="text" id="firstName" required>
                                    </div>
                                    <div class="form-group half">
                                        <label for="lastName">Last Name*</label>
                                        <input type="text" id="lastName" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="email">Email*</label>
                                        <input type="email" id="email" required>
                                    </div>
                                    <div class="form-group half">
                                        <label for="phone">Phone</label>
                                        <div class="phone-input">
                                            <select id="countryCode">
                                                <option value="+92">+92</option>
                                            </select>
                                            <input type="tel" id="phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="country">Country*</label>
                                    <select id="country" required>
                                        <option value="">Please Select...</option>
                                        <option value="pakistan">Pakistan</option>
                                    </select>
                                </div>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="orgName">Organisation Name</label>
                                        <input type="text" id="orgName">
                                    </div>
                                    <div class="form-group half">
                                        <label for="orgType">Organisation Type*</label>
                                        <select id="orgType" required>
                                            <option value="">Please Select...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="industry">Industry*</label>
                                        <select id="industry" required>
                                            <option value="">Please Select...</option>
                                        </select>
                                    </div>
                                    <div class="form-group half">
                                        <label for="jobFunction">Job Function*</label>
                                        <select id="jobFunction" required>
                                            <option value="">Please Select...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message*</label>
                                    <textarea id="message" required></textarea>
                                </div>
                                <div class="form-group">
                                    <p class="privacy-notice">By hitting 'SUBMIT' below you permit Moodle and its Certified Partners to contact you regarding Moodle software products and services in accordance with our <a href="#" class="contact-link">Privacy Policy</a>.</p>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="submit-btn">Send Message</button>
                                </div>
                            </div>
                            <div id="moodleMootsInfo" class="form-response" style="display: none;">
                                <p>For information about MoodleMoots, please visit our <a href="#" class="contact-link">MoodleMoots page</a>.</p>
                                <p>If you have any questions about an upcoming MoodleMoot, please contact the organiser directly.</p>
                            </div>
                            <div id="communitySitesInfo" class="form-group" style="display: none;">
                                <label for="communityIssueType">Are you having issues registering your Moodle site or logging in to moodle.org, moodle.academy or lang.moodle.org?*</label>
                                <select id="communityIssueType" required>
                                    <option value="">Please Select</option>
                                    <option value="moodle-sites">Moodle.org / Moodle.academy / Lang.moodle.org</option>
                                    <option value="registering">Registering my site</option>
                                    <option value="different">A different site</option>
                                </select>
                                <div id="communitySitesFormInfo" class="form-group" style="display: none;">
                                    <div class="form-row">
                                        <div class="form-group half">
                                            <label for="firstName">First Name*</label>
                                            <input type="text" id="firstName" required>
                                        </div>
                                        <div class="form-group half">
                                            <label for="lastName">Last Name*</label>
                                            <input type="text" id="lastName" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group half">
                                            <label for="email">Email*</label>
                                            <input type="email" id="email" required>
                                        </div>
                                        <div class="form-group half">
                                            <label for="phone">Phone</label>
                                            <div class="phone-input">
                                                <select id="countryCode">
                                                    <option value="+92">+92</option>
                                                </select>
                                                <input type="tel" id="phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="country">Country*</label>
                                        <select id="country" required>
                                            <option value="">Please Select...</option>
                                            <option value="pakistan">Pakistan</option>
                                        </select>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group half">
                                            <label for="orgName">Organisation Name</label>
                                            <input type="text" id="orgName">
                                        </div>
                                        <div class="form-group half">
                                            <label for="orgType">Organisation Type*</label>
                                            <select id="orgType" required>
                                                <option value="">Please Select...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group half">
                                            <label for="industry">Industry*</label>
                                            <select id="industry" required>
                                                <option value="">Please Select...</option>
                                            </select>
                                        </div>
                                        <div class="form-group half">
                                            <label for="jobFunction">Job Function*</label>
                                            <select id="jobFunction" required>
                                                <option value="">Please Select...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Message*</label>
                                        <textarea id="message" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <p class="privacy-notice">By hitting 'SUBMIT' below you permit Moodle and its Certified Partners to contact you regarding Moodle software products and services in accordance with our <a href="#" class="contact-link">Privacy Policy</a>.</p>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="submit-btn">Send Message</button>
                                    </div>
                                </div>
                            </div>
                            <div id="communitySitesInfo" class="form-response" style="display: none;">
                                <p>For information about MoodleMoots, please visit our <a href="#" class="contact-link">MoodleMoots page</a>.</p>
                                <p>If you have any questions about an upcoming MoodleMoot, please contact the organiser directly.</p>
                            </div>
                            <div id="differentSiteInfo" class="form-response" style="display: none;">
                                <p>If you are a trainee/student or teacher needing access to your organisation's site, please contact your site administrator.</p>
                                <p>If you are a site administrator or need dedicated support then we recommend you speak to one of our <a href="#" class="contact-link">Moodle Partners</a>.</p>
                                <p>Below is a list of resources you can use for help on any other Moodle topic:</p>
                                <ul>
                                    <li><a href="#" class="contact-link">Moodle Documentation</a> - Search for documentation on any Moodle topic, including site administration, managing courses, enrolment, activities and loads more.</li>
                                    <li><a href="#" class="contact-link">Moodle Community forums</a> - Here you will find links to many Moodle subject forums and loads of useful conversations about configuring Moodle. You can post questions here and one of the many Moodle experts in the community is likely to have an answer for you.</li>
                                </ul>
                                <p>Additional information to some of the most common questions can also be found on our <a href="#" class="contact-link">FAQ page</a>.</p>
                                <p>Happy Moodling!</p>
                            </div>
                            <div id="academyInfo" class="form-group" style="display: none;">
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="firstName">First Name*</label>
                                        <input type="text" id="firstName" required>
                                    </div>
                                    <div class="form-group half">
                                        <label for="lastName">Last Name*</label>
                                        <input type="text" id="lastName" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="email">Email*</label>
                                        <input type="email" id="email" required>
                                    </div>
                                    <div class="form-group half">
                                        <label for="phone">Phone</label>
                                        <div class="phone-input">
                                            <select id="countryCode">
                                                <option value="+92">+92</option>
                                            </select>
                                            <input type="tel" id="phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="country">Country*</label>
                                    <select id="country" required>
                                        <option value="">Please Select...</option>
                                        <option value="pakistan">Pakistan</option>
                                    </select>
                                </div>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="orgName">Organisation Name</label>
                                        <input type="text" id="orgName">
                                    </div>
                                    <div class="form-group half">
                                        <label for="orgType">Organisation Type*</label>
                                        <select id="orgType" required>
                                            <option value="">Please Select...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="industry">Industry*</label>
                                        <select id="industry" required>
                                            <option value="">Please Select...</option>
                                        </select>
                                    </div>
                                    <div class="form-group half">
                                        <label for="jobFunction">Job Function*</label>
                                        <select id="jobFunction" required>
                                            <option value="">Please Select...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message*</label>
                                    <textarea id="message" required></textarea>
                                </div>
                                <div class="form-group">
                                    <p class="privacy-notice">By hitting 'SUBMIT' below you permit Moodle and its Certified Partners to contact you regarding Moodle software products and services in accordance with our <a href="#" class="contact-link">Privacy Policy</a>.</p>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="submit-btn">Send Message</button>
                                </div>
                            </div>
                                <div id="fundMoodleInfo" class="form-group" style="display: none;">
                                    <div class="form-row">
                                        <div class="form-group half">
                                            <label for="firstName">First Name*</label>
                                            <input type="text" id="firstName" required>
                                        </div>
                                        <div class="form-group half">
                                            <label for="lastName">Last Name*</label>
                                            <input type="text" id="lastName" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group half">
                                            <label for="email">Email*</label>
                                            <input type="email" id="email" required>
                                        </div>
                                        <div class="form-group half">
                                            <label for="phone">Phone</label>
                                            <div class="phone-input">
                                                <select id="countryCode">
                                                    <option value="+92">+92</option>
                                                </select>
                                                <input type="tel" id="phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="country">Country*</label>
                                        <select id="country" required>
                                            <option value="">Please Select...</option>
                                            <option value="pakistan">Pakistan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="orgName">Organisation Name</label>
                                        <input type="text" id="orgName">
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Message*</label>
                                        <textarea id="message" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <p class="privacy-notice">By hitting 'SUBMIT' below you permit Moodle and its Certified Partners to contact you regarding Moodle software products and services in accordance with our <a href="#" class="contact-link">Privacy Policy</a>.</p>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="submit-btn">Send Message</button>
                                    </div>
                                </div>
                                <div id="moodleMootsInfo" class="form-response" style="display: none;">
                                    <p>For information about MoodleMoots, please visit our <a href="#" class="contact-link">MoodleMoots page</a>.</p>
                                    <p>If you have any questions about an upcoming MoodleMoot, please contact the organiser directly.</p>
                                </div>
                                <div id="communitySitesInfo" class="form-group" style="display: none;">
                                    <label for="communityIssueType">Are you having issues registering your Moodle site or logging in to moodle.org, moodle.academy or lang.moodle.org?*</label>
                                    <select id="communityIssueType" required>
                                        <option value="">Please Select</option>
                                        <option value="moodle-sites">Moodle.org / Moodle.academy / Lang.moodle.org</option>
                                        <option value="registering">Registering my site</option>
                                        <option value="different">A different site</option>
                                    </select>
                                    <div id="communitySitesFormInfo" class="form-group" style="display: none;">
                                        <div class="form-row">
                                            <div class="form-group half">
                                                <label for="firstName">First Name*</label>
                                                <input type="text" id="firstName" required>
                                            </div>
                                            <div class="form-group half">
                                                <label for="lastName">Last Name*</label>
                                                <input type="text" id="lastName" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group half">
                                                <label for="email">Email*</label>
                                                <input type="email" id="email" required>
                                            </div>
                                            <div class="form-group half">
                                                <label for="phone">Phone</label>
                                                <div class="phone-input">
                                                    <select id="countryCode">
                                                        <option value="+92">+92</option>
                                                    </select>
                                                    <input type="tel" id="phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="country">Country*</label>
                                            <select id="country" required>
                                                <option value="">Please Select...</option>
                                                <option value="pakistan">Pakistan</option>
                                            </select>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group half">
                                                <label for="orgName">Organisation Name</label>
                                                <input type="text" id="orgName">
                                            </div>
                                            <div class="form-group half">
                                                <label for="orgType">Organisation Type*</label>
                                                <select id="orgType" required>
                                                    <option value="">Please Select...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group half">
                                                <label for="industry">Industry*</label>
                                                <select id="industry" required>
                                                    <option value="">Please Select...</option>
                                                </select>
                                            </div>
                                            <div class="form-group half">
                                                <label for="jobFunction">Job Function*</label>
                                                <select id="jobFunction" required>
                                                    <option value="">Please Select...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="message">Message*</label>
                                            <textarea id="message" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <p class="privacy-notice">By hitting 'SUBMIT' below you permit Moodle and its Certified Partners to contact you regarding Moodle software products and services in accordance with our <a href="#" class="contact-link">Privacy Policy</a>.</p>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="submit-btn">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="communitySitesInfo" class="form-response" style="display: none;">
                                    <p>For information about MoodleMoots, please visit our <a href="#" class="contact-link">MoodleMoots page</a>.</p>
                                    <p>If you have any questions about an upcoming MoodleMoot, please contact the organiser directly.</p>
                                </div>
                                <div id="differentSiteInfo" class="form-response" style="display: none;">
                                    <p>If you are a trainee/student or teacher needing access to your organisation's site, please contact your site administrator.</p>
                                    <p>If you are a site administrator or need dedicated support then we recommend you speak to one of our <a href="#" class="contact-link">Moodle Partners</a>.</p>
                                    <p>Below is a list of resources you can use for help on any other Moodle topic:</p>
                                    <ul>
                                        <li><a href="#" class="contact-link">Moodle Documentation</a> - Search for documentation on any Moodle topic, including site administration, managing courses, enrolment, activities and loads more.</li>
                                        <li><a href="#" class="contact-link">Moodle Community forums</a> - Here you will find links to many Moodle subject forums and loads of useful conversations about configuring Moodle. You can post questions here and one of the many Moodle experts in the community is likely to have an answer for you.</li>
                                    </ul>
                                    <p>Additional information to some of the most common questions can also be found on our <a href="#" class="contact-link">FAQ page</a>.</p>
                                    <p>Happy Moodling!</p>
                            </div>
                            <div id="academyInfo" class="form-group" style="display: none;">
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="firstName">First Name*</label>
                                        <input type="text" id="firstName" required>
                                    </div>
                                    <div class="form-group half">
                                        <label for="lastName">Last Name*</label>
                                        <input type="text" id="lastName" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="email">Email*</label>
                                        <input type="email" id="email" required>
                                    </div>
                                    <div class="form-group half">
                                        <label for="phone">Phone</label>
                                        <div class="phone-input">
                                            <select id="countryCode">
                                                <option value="+92">+92</option>
                                            </select>
                                            <input type="tel" id="phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="country">Country*</label>
                                    <select id="country" required>
                                        <option value="">Please Select...</option>
                                        <option value="pakistan">Pakistan</option>
                                    </select>
                                </div>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="orgName">Organisation Name</label>
                                        <input type="text" id="orgName">
                                    </div>
                                    <div class="form-group half">
                                        <label for="orgType">Organisation Type*</label>
                                        <select id="orgType" required>
                                            <option value="">Please Select...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="industry">Industry*</label>
                                        <select id="industry" required>
                                            <option value="">Please Select...</option>
                                        </select>
                                    </div>
                                    <div class="form-group half">
                                        <label for="jobFunction">Job Function*</label>
                                        <select id="jobFunction" required>
                                            <option value="">Please Select...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message*</label>
                                    <textarea id="message" required></textarea>
                                </div>
                                <div class="form-group">
                                    <p class="privacy-notice">By hitting 'SUBMIT' below you permit Moodle and its Certified Partners to contact you regarding Moodle software products and services in accordance with our <a href="#" class="contact-link">Privacy Policy</a>.</p>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="submit-btn">Send Message</button>
                                </div>
                            </div>
                                <div id="fundMoodleInfo" class="form-group" style="display: none;">
                                    <div class="form-row">
                                        <div class="form-group half">
                                            <label for="firstName">First Name*</label>
                                            <input type="text" id="firstName" required>
                                        </div>
                                        <div class="form-group half">
                                            <label for="lastName">Last Name*</label>
                                            <input type="text" id="lastName" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group half">
                                            <label for="email">Email*</label>
                                            <input type="email" id="email" required>
                                        </div>
                                        <div class="form-group half">
                                            <label for="phone">Phone</label>
                                            <div class="phone-input">
                                                <select id="countryCode">
                                                    <option value="+92">+92</option>
                                                </select>
                                                <input type="tel" id="phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="country">Country*</label>
                                        <select id="country" required>
                                            <option value="">Please Select...</option>
                                            <option value="pakistan">Pakistan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="orgName">Organisation Name</label>
                                        <input type="text" id="orgName">
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Message*</label>
                                        <textarea id="message" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <p class="privacy-notice">By hitting 'SUBMIT' below you permit Moodle and its Certified Partners to contact you regarding Moodle software products and services in accordance with our <a href="#" class="contact-link">Privacy Policy</a>.</p>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="submit-btn">Send Message</button>
                                    </div>
                                </div>
                                <div id="moodleMootsInfo" class="form-response" style="display: none;">
                                    <p>For information about MoodleMoots, please visit our <a href="#" class="contact-link">MoodleMoots page</a>.</p>
                                    <p>If you have any questions about an upcoming MoodleMoot, please contact the organiser directly.</p>
                                </div>
                                <div id="communitySitesInfo" class="form-group" style="display: none;">
                                    <label for="communityIssueType">Are you having issues registering your Moodle site or logging in to moodle.org, moodle.academy or lang.moodle.org?*</label>
                                    <select id="communityIssueType" required>
                                        <option value="">Please Select</option>
                                        <option value="moodle-sites">Moodle.org / Moodle.academy / Lang.moodle.org</option>
                                        <option value="registering">Registering my site</option>
                                        <option value="different">A different site</option>
                                    </select>
                                    <div id="communitySitesFormInfo" class="form-group" style="display: none;">
                                        <div class="form-row">
                                            <div class="form-group half">
                                                <label for="firstName">First Name*</label>
                                                <input type="text" id="firstName" required>
                                            </div>
                                            <div class="form-group half">
                                                <label for="lastName">Last Name*</label>
                                                <input type="text" id="lastName" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group half">
                                                <label for="email">Email*</label>
                                                <input type="email" id="email" required>
                                            </div>
                                            <div class="form-group half">
                                                <label for="phone">Phone</label>
                                                <div class="phone-input">
                                                    <select id="countryCode">
                                                        <option value="+92">+92</option>
                                                    </select>
                                                    <input type="tel" id="phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="country">Country*</label>
                                            <select id="country" required>
                                                <option value="">Please Select...</option>
                                                <option value="pakistan">Pakistan</option>
                                            </select>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group half">
                                                <label for="orgName">Organisation Name</label>
                                                <input type="text" id="orgName">
                                            </div>
                                            <div class="form-group half">
                                                <label for="orgType">Organisation Type*</label>
                                                <select id="orgType" required>
                                                    <option value="">Please Select...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group half">
                                                <label for="industry">Industry*</label>
                                                <select id="industry" required>
                                                    <option value="">Please Select...</option>
                                                </select>
                                            </div>
                                            <div class="form-group half">
                                                <label for="jobFunction">Job Function*</label>
                                                <select id="jobFunction" required>
                                                    <option value="">Please Select...</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="message">Message*</label>
                                            <textarea id="message" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <p class="privacy-notice">By hitting 'SUBMIT' below you permit Moodle and its Certified Partners to contact you regarding Moodle software products and services in accordance with our <a href="#" class="contact-link">Privacy Policy</a>.</p>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="submit-btn">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="communitySitesInfo" class="form-response" style="display: none;">
                                    <p>For information about MoodleMoots, please visit our <a href="#" class="contact-link">MoodleMoots page</a>.</p>
                                    <p>If you have any questions about an upcoming MoodleMoot, please contact the organiser directly.</p>
                                </div>
                                <div id="differentSiteInfo" class="form-response" style="display: none;">
                                    <p>If you are a trainee/student or teacher needing access to your organisation's site, please contact your site administrator.</p>
                                    <p>If you are a site administrator or need dedicated support then we recommend you speak to one of our <a href="#" class="contact-link">Moodle Partners</a>.</p>
                                    <p>Below is a list of resources you can use for help on any other Moodle topic:</p>
                                    <ul>
                                        <li><a href="#" class="contact-link">Moodle Documentation</a> - Search for documentation on any Moodle topic, including site administration, managing courses, enrolment, activities and loads more.</li>
                                        <li><a href="#" class="contact-link">Moodle Community forums</a> - Here you will find links to many Moodle subject forums and loads of useful conversations about configuring Moodle. You can post questions here and one of the many Moodle experts in the community is likely to have an answer for you.</li>
                                    </ul>
                                    <p>Additional information to some of the most common questions can also be found on our <a href="#" class="contact-link">FAQ page</a>.</p>
                                    <p>Happy Moodling!</p>
                            </div>
                            <div id="academyInfo" class="form-group" style="display: none;">
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="firstName">First Name*</label>
                                        <input type="text" id="firstName" required>
                                    </div>
                                    <div class="form-group half">
                                        <label for="lastName">Last Name*</label>
                                        <input type="text" id="lastName" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="email">Email*</label>
                                        <input type="email" id="email" required>
                                    </div>
                                    <div class="form-group half">
                                        <label for="phone">Phone</label>
                                        <div class="phone-input">
                                            <select id="countryCode">
                                                <option value="+92">+92</option>
                                            </select>
                                            <input type="tel" id="phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="country">Country*</label>
                                    <select id="country" required>
                                        <option value="">Please Select...</option>
                                        <option value="pakistan">Pakistan</option>
                                    </select>
                                </div>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="orgName">Organisation Name</label>
                                        <input type="text" id="orgName">
                                    </div>
                                    <div class="form-group half">
                                        <label for="orgType">Organisation Type*</label>
                                        <select id="orgType" required>
                                            <option value="">Please Select...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group half">
                                        <label for="industry">Industry*</label>
                                        <select id="industry" required>
                                            <option value="">Please Select...</option>
                                        </select>
                                    </div>
                                    <div class="form-group half">
                                        <label for="jobFunction">Job Function*</label>
                                        <select id="jobFunction" required>
                                            <option value="">Please Select...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message">Message*</label>
                                    <textarea id="message" required></textarea>
                                </div>
                                <div class="form-group">
                                    <p class="privacy-notice">By hitting 'SUBMIT' below you permit Moodle and its Certified Partners to contact you regarding Moodle software products and services in accordance with our <a href="#" class="contact-link">Privacy Policy</a>.</p>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="submit-btn">Send Message</button>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="support-section">
        <div class="support-content">
            <p class="section-label">Extra Support and Resources</p>
            <h2>Learn from millions of Moodle users</h2>
            <div class="support-links">
                <a href="#" class="support-link-item">
                    <div class="link-content">
                        <h3>Moodle.org</h3>
                        <p>Access Q&A forums and resources on setting up and teaching with Moodle.</p>
                    </div>
                    <div class="link-arrow">→</div>
                </a>
                <a href="#" class="support-link-item">
                    <div class="link-content">
                        <h3>MoodleNet</h3>
                        <p>Explore our global networks to share and curate open educational resources.</p>
                    </div>
                    <div class="link-arrow">→</div>
                </a>
                <a href="#" class="support-link-item">
                    <div class="link-content">
                        <h3>Moodle Academy</h3>
                        <p>Join our learning hub for the global Moodle community.</p>
                    </div>
                    <div class="link-arrow">→</div>
                </a>
                <a href="#" class="support-link-item">
                    <div class="link-content">
                        <h3>Moodle Plugins</h3>
                        <p>Find Moodle-endorsed open source plugins for Moodle LMS and Moodle Workplace.</p>
                    </div>
                    <div class="link-arrow">→</div>
                </a>
            </div>
        </div>
    </div>
    <div class="faq-section">
        <div class="faq-content">
            <div class="faq-header">
                <div class="faq-title">
                    <p class="section-label">Moodle FAQs</p>
                    <h2>Frequently asked questions</h2>
                </div>
                <div class="faq-title-right">
                    <a href="#" class="view-all-link">View All →</a>
                </div>
            </div>
            <div class="faq-list">
                <div class="faq-item">
                    <div class="faq-item-left">
                        <span class="faq-number">01</span>
                    </div>
                    <div class="faq-item-content">
                        <h3>I'm a student. How do I login to my Moodle site?</h3>
                    </div>
                    <div class="faq-item-right">
                        <button class="expand-btn">
                            <svg width="14" height="8" viewBox="0 0 14 8" fill="none">
                                <path d="M1 1L7 7L13 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-item-left">
                        <span class="faq-number">02</span>
                    </div>
                    <div class="faq-item-content">
                        <h3>Where can I get support for my Moodle site?</h3>
                    </div>
                    <div class="faq-item-right">
                        <button class="expand-btn">
                            <svg width="14" height="8" viewBox="0 0 14 8" fill="none">
                                <path d="M1 1L7 7L13 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="faq-item">
                    <div class="faq-item-left">
                        <span class="faq-number">03</span>
                    </div>
                    <div class="faq-item-content">
                        <h3>My site is down / I can't login to my site.</h3>
                    </div>
                    <div class="faq-item-right">
                        <button class="expand-btn">
                            <svg width="14" height="8" viewBox="0 0 14 8" fill="none">
                                <path d="M1 1L7 7L13 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="../js/contact.js"></script>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/../partials/base.php';
?>
                        